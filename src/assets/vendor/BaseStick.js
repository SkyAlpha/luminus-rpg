/**
* @author       Richard Davey <rich@photonstorm.com>
* @copyright    2019 Photon Storm Ltd.
* @license      {@link http://choosealicense.com/licenses/no-license/|No License}
*/

import CONST from './const';
import EventEmitter from 'eventemitter3';
import { VirtualJoystick } from './VirtualJoystickPlugin';

/**
 * A `BaseStick` is the base virtual joystick class that all other types of stick extend from.
 */
export class BaseStick extends EventEmitter
{
    /**
     * @param {Phaser.Scene} scene - A reference to the Scene this stick was created in.
     * @param {number} x - The x coordinate to draw the joystick at. The joystick is centered on this coordinate.
     * @param {number} y - The y coordinate to draw the joystick at. The joystick is centered on this coordinate.
     * @param {number} distance - The distance threshold between the stick and the base. This is how far the stick can be pushed in any direction.
     */
    constructor (scene, x, y, distance)
    {
        super();

        /**
         * A reference to the Scene this stick was created in.
         * @type {Phaser.Scene}
         */
        this.scene = scene;

        /**
         * The position of the joystick in screen coordinates. To adjust please use `posX` and `posY`.
         * @type {Phaser.Math.Vector2}
         */
        this.position = new Phaser.Math.Vector2(x, y);

        /**
         * The line object used for stick to base calculations.
         * @type {Phaser.Geom.Line}
         */
        this.line = new Phaser.Geom.Line(x, y, x, y);

        /**
         * The circular hit area that defines the base of the joystick.
         * @type {Phaser.Geom.Circle}
         */
        this.baseHitArea = new Phaser.Geom.Circle(x, y, distance / 2);

        /**
         * The circular hit area that defines the stick or handle of the joystick.
         * @type {Phaser.Geom.Circle}
         */
        this.stickHitArea = new Phaser.Geom.Circle(x, y, distance / 2);

        /**
         * The Sprite that is used to display the base of the joystick.
         * @type {?Phaser.GameObjects.Sprite}
         */
        this.baseSprite = null;

        /**
         * The Sprite that is used to display the stick or handle of the joystick.
         * @type {?Phaser.GameObjects.Sprite}
         */
        this.stickSprite = null;

        /**
         * A Point object that holds the stick limits.
         * @type {Phaser.Math.Vector2}
         */
        this.limitPoint = new Phaser.Math.Vector2();

        /**
         * A reference to the Input Pointer being used to update this joystick.
         * @type {Phaser.Input.Pointer}
         */
        this.pointer = null;

        /**
         * Should this joystick process or dispatch any events? Set to `false` to disable it.
         * @type {boolean}
         */
        this.enabled = true;

        /**
         * The current down state of this joystick. A joystick is determined as being down if it has been pressed and interacted with.
         * If it has a `deadZone` set then it's not considered as being down unless it has moved beyond the limits of the deadZone.
         * @type {boolean}
         */
        this.isDown = false;

        /**
         * The current up state of this joystick. A joystick is determined as being up if it is not being interacted with.
         * If it has a `deadZone` set then it's considered as being up until it has moved beyond the limits of the deadZone.
         * @type {boolean}
         */
        this.isUp = true;

        /**
         * The time when the joystick last entered an `isDown` state.
         * @type {integer}
         */
        this.timeDown = 0;

        /**
         * The time when the joystick last entered an `isUp` state.
         * @type {integer}
         */
        this.timeUp = 0;

        /**
         * The angle of the joystick in degrees. From -180 to 180 where zero is right-handed.
         * @type {number}
         */
        this.angle = 0;

        /**
         * The angle of the joystick in degrees. From 0 to 360 where zero is right-handed.
         * @type {number}
         */
        this.angleFull = 0;

        /**
         * The 4-way direction the stick is currently pointing, if active.
         * 
         * @type {Phaser.NONE|Phaser.LEFT|Phaser.RIGHT|Phaser.UP|Phaser.DOWN}
         */
        this.direction = Phaser.NONE;

        /**
         * The quadrant the joystick is in.
         * Where 315 to 45 degrees is quadrant 0. 
         * 45 to 135 degrees is quadrant 1. 
         * 135 to 225 degrees is quadrant 2.
         * 225 to 315 degrees is quadrant 3.
         * @type {integer}
         */
        this.quadrant = 0;

        /**
         * The nearest octant of the joystick. Where each octant is 360 degrees / 45.
         * @type {integer}
         */
        this.octant = 0;

        /**
         * A Stick can be motion locked. When locked it can only move along the specified axis.
         * 
         * `motionLock = 0` will allow it to move freely.
         * `motionLock = 1` will only allow it to move horizontally.
         * `motionLock = 2` will only allow it to move vertically.
         * @type {VirtualJoystick.NONE|VirtualJoystick.HORIZONTAL|VirtualJoystick.VERTICAL}
         */
        this.motionLock = CONST.NONE;

        /**
         * Internal calculation var.
         * @type {number}
         * @private
         */
        this._distance = distance;

        /**
         * Internal calculation var.
         * @type {number}
         * @private
         */
        this._deadZone = distance * 0.10;

        /**
         * Internal calculation var.
         * @type {number}
         * @private
         */
        this._scale = 1;

        /**
         * Internal var.
         * @type {boolean}
         * @private
         */
        this._tracking = false;

        /**
         * Internal var.
         * @type {boolean}
         * @private
         */
        this._showOnTouch = false;

        const input = this.scene.sys.input;

        input.on('pointerdown', this.checkDown, this);
        input.on('pointerup', this.checkUp, this);
        input.on('pointerupoutside', this.checkUp, this);
        input.on('pointermove', this.moveStick, this);
    }

    /**
     * Processes the down event for this stick, or starts tracking if required.
     * 
     * @private
     * 
     * @param {Phaser.Input.Pointer} pointer - The Phaser Pointer that triggered the event.
     */
    checkDown (pointer)
    {
        const x = pointer.worldX;
        const y = pointer.worldY;
        const line = this.line;

        if (this.enabled && this.isUp)
        {
            this.pointer = pointer;

            if (this.motionLock === CONST.NONE)
            {
                line.x2 = x;
                line.y2 = y;
            }
            else if (this.motionLock === CONST.HORIZONTAL)
            {
                line.x2 = x;
            }
            else if (this.motionLock === CONST.VERTICAL)
            {
                line.y2 = y;
            }

            if (this._showOnTouch)
            {
                line.x1 = x;
                line.y1 = y;

                this.posX = x;
                this.posY = y;
                this.visible = true;

                this.setDown();
                this.moveStick(pointer);
            }
            else
            {
                if (this.stickHitArea.contains(x, y))
                {
                    if (Phaser.Geom.Line.Length(line) <= this.deadZone)
                    {
                        this._tracking = true;
                    }
                    else
                    {
                        this.setDown();
                        this.moveStick(pointer);
                    }
                }
            }
        }
    }

    /**
     * Processes the up event for this stick.
     *
     * @private
     * @emits {UpEvent}
     * 
     * @param {Phaser.Input.Pointer} pointer - The Phaser Pointer that triggered the event.
     */
    checkUp (pointer)
    {
        if (pointer === this.pointer)
        {
            this.pointer = null;

            this.stickHitArea.setPosition(this.position.x, this.position.y);

            if (this.stickSprite)
            {
                this.stickSprite.setPosition(this.position.x, this.position.y);
            }

            const line = this.line;

            line.x2 = line.x1;
            line.y2 = line.y1;

            this.isDown = false;
            this.isUp = true;
            this.direction = Phaser.NONE;

            this.timeUp = pointer.time;

            this.emit('up', this, pointer);

            if (this._showOnTouch)
            {
                this.visible = false;
            }
        }
    }

    /**
     * Internal down handler. Activated either onDown or after tracking if the stick has a dead zone.
     *
     * @private
     * @emits {DownEvent}
     */
    setDown ()
    {
        this.isDown = true;
        this.isUp = false;
        this.timeDown = this.pointer.time;
        this.timeUp = 0;

        this._tracking = false;

        this.checkArea();

        this.emit('down', this, this.pointer);
    }

    /**
     * Internal calculation method. Updates the various angle related properties.
     *
     * @private
     */
    checkArea ()
    {
        this.angle = Phaser.Math.RadToDeg(Phaser.Geom.Line.Angle(this.line));

        let angleFull = this.angle;
        let quadrant = 1;

        if (angleFull < 0)
        {
            angleFull += 360;
        }

        if (angleFull >= 45 && angleFull < 135)
        {
            quadrant = 1;
            this.direction = Phaser.DOWN;
        }
        else if (angleFull >= 135 && angleFull < 225)
        {
            quadrant = 2;
            this.direction = Phaser.LEFT;
        }
        else if (angleFull >= 225 && angleFull < 315)
        {
            quadrant = 3;
            this.direction = Phaser.UP;
        }
        else
        {
            quadrant = 0;
            this.direction = Phaser.RIGHT;
        }

        this.angleFull = angleFull;
        this.quadrant = quadrant;
        this.octant = 45 * (Math.round(angleFull / 45));
    }

    /**
     * Processes the movement event for this stick.
     *
     * @private
     * @emits {StickMoveEvent}
     * 
     * @param {Phaser.Input.Pointer} pointer - The Phaser Pointer that triggered the event.
     */
    moveStick (pointer)
    {
        const x = pointer.worldX;
        const y = pointer.worldY;

        if (!this.pointer || (!this.isDown && !this._tracking))
        {
            return;
        }

        const line = this.line;

        if (this.motionLock === CONST.NONE)
        {
            line.x2 = x;
            line.y2 = y;
        }
        else if (this.motionLock === CONST.HORIZONTAL)
        {
            line.x2 = x;
        }
        else if (this.motionLock === CONST.VERTICAL)
        {
            line.y2 = y;
        }

        this.checkArea();

        const lineLength = Phaser.Geom.Line.Length(line);
        const lineAngle = Phaser.Geom.Line.Angle(line);

        if (!this.isDown && lineLength <= this.deadZone)
        {
            return;
        }

        if (this._tracking)
        {
            //  Was tracking, now in the zone so dispatch and follow
            this.setDown();
        }

        if (lineLength < this.baseHitArea.radius)
        {
            if (this.motionLock === CONST.NONE)
            {
                this.stickHitArea.setPosition(x, y);
            }
            else if (this.motionLock === CONST.HORIZONTAL)
            {
                this.stickHitArea.x = x;
            }
            else if (this.motionLock === CONST.VERTICAL)
            {
                this.stickHitArea.y = y;
            }
        }
        else
        {
            //  Let it smoothly rotate around the base limit
            const limitPoint = this.limitPoint;

            Phaser.Geom.Circle.CircumferencePoint(this.baseHitArea, lineAngle, limitPoint);

            if (this.motionLock === CONST.NONE)
            {
                this.stickHitArea.setPosition(limitPoint.x, limitPoint.y);
            }
            else if (this.motionLock === CONST.HORIZONTAL)
            {
                this.stickHitArea.x = limitPoint.x;
            }
            else if (this.motionLock === CONST.VERTICAL)
            {
                this.stickHitArea.y = limitPoint.y;
            }
        }

        if (this.stickSprite)
        {
            this.stickSprite.setPosition(this.stickHitArea.x, this.stickHitArea.y);
        }

        this.emit('move', this, this.force, this.forceX, this.forceY);
    }

    /**
     * The update callback. This is called automatically by the Virtual Joystick Plugin.
     *
     * @private
     * @emits {StickUpdateEvent}
     */
    update ()
    {
        if (!this._tracking)
        {
            this.emit('update', this, this.force, this.forceX, this.forceY);
        }
    }

    /**
     * Visually aligns the joystick to the bottom left of the game view.
     * The optional spacing parameter allows you to add a border between the edge of the game and the joystick.
     *
     * @param {number} [spacing=0] - The spacing to apply between the edge of the game and the joystick.
     * 
     * @return {this} This joystick instance.
     */
    alignBottomLeft (spacing = 0)
    {
        if (this.baseSprite)
        {
            const w = (this.baseSprite.displayWidth / 2) + spacing;
            const h = (this.baseSprite.displayHeight / 2) + spacing;
    
            this.posX = w;
            this.posY = this.scene.scale.height - h;
        }

        return this;
    }

    /**
     * Visually aligns the joystick to the bottom right of the game view.
     * The optional spacing parameter allows you to add a border between the edge of the game and the joystick.
     *
     * @param {number} [spacing=0] - The spacing to apply between the edge of the game and the joystick.
     * 
     * @return {this} This joystick instance.
     */
    alignBottomRight (spacing = 0)
    {
        if (this.baseSprite)
        {
            const w = (this.baseSprite.displayWidth / 2) + spacing;
            const h = (this.baseSprite.displayHeight / 2) + spacing;

            this.posX = this.scene.scale.width - w;
            this.posY = this.scene.scale.height - h;
        }

        return this;
    }

    /**
     * Destroys this Stick.
     * 
     * Removes all associated event listeners and signals and calls destroy on the stick sprites.
     */
    destroy ()
    {
        const input = this.scene.sys.input;

        input.off('pointerdown', this.checkDown, this);
        input.off('pointerup', this.checkUp, this);
        input.off('pointerupoutside', this.checkUp, this);
        input.off('pointermove', this.moveStick, this);

        this.removeAllListeners();

        this.stickHitArea = null;
        this.baseHitArea = null;
        this.line = null;
        this.limitPoint = null;
        this.pointer = null;
        this.scene = null;
    }

    /**
     * A Stick can be motion locked. When locked it can only move along the specified axis.
     * 
     * `motionLock = 0` will allow it to move freely.
     * `motionLock = 1` will only allow it to move horizontally.
     * `motionLock = 2` will only allow it to move vertically.
     * 
     * @param {integer} [value=0] - The motion lock setting to use.
     * 
     * @return {this} This joystick instance.
     */
    setMotionLock (value = 0)
    {
        this.motionLock = value;

        return this;
    }

    /**
     * The dead zone is a distance in pixels within which the Stick isn't considered as down or moving.
     * Only when it moves beyond this value does it start dispatching events.
     * 
     * By default the deadZone is 15% of the given distance value. 
     * So if the distance is 100 pixels then the Stick won't be considered as active until it has moved at least 15 pixels from its base.
     * 
     * This value is adjusted for scale.
     * 
     * It should never be more than the `Stick.distance` value.
     * 
     * @param {integer} [value=0] - The dead zone to use.
     * 
     * @return {this} This joystick instance.
     */
    setDeadZone (value = 0)
    {
        this.deadZone = value;

        return this;
    }

    /**
     * Set the scale of the joystick.
     *
     * @param {number} value - The scale of the joystick.
     * 
     * @return {this} This joystick instance.
     */
    setScale (value)
    {
        this.scale = value;

        return this;
    }

    /**
     * Set the alpha of the joystick.
     *
     * @param {number} value - The alpha of the joystick.
     * 
     * @return {this} This joystick instance.
     */
    setAlpha (value)
    {
        this.alpha = value;

        return this;
    }

    /**
     * Set the visibility of the joystick.
     * 
     * Note that this dpad will carry on processing and dispatching events even when not visible.
     * If you wish to disable the dpad from processing events see `Stick.enabled`.
     *
     * @param {number} value - The visible state of the joystick.
     * 
     * @return {this} This joystick instance.
     */
    setVisible (value)
    {
        this.visible = value;

        return this;
    }

    /**
     * Renders out a debug view of this DPad to the given Graphics and Text objects.
     *
     * It optionally renders the geometry involved in the dpad hit areas and calculation line.
     * 
     * It also optionally renders text information relating to the current forces and angles.
     *
     * @param {Phaser.GameObjects.Graphics} [graphics] - Renders the geometry involved in the stick hit areas and calculation line to this Graphics object.
     * @param {Phaser.GameObjects.Text} [text] - Renders text information relating to the current forces and angles to this Text object.
     */
    debug (graphics, text)
    {
        if (graphics)
        {
            graphics.clear();

            graphics.lineStyle(2, 0xff0000);
            graphics.strokeCircleShape(this.baseHitArea);

            graphics.lineStyle(2, 0x00ff00);
            graphics.strokeCircleShape(this.stickHitArea);

            graphics.lineStyle(2, 0xffff00);
            graphics.strokeLineShape(this.line);
        }

        if (text)
        {
            text.setText([
                'Force: ' + this.force.toFixed(2),
                'ForceX: ' + this.forceX.toFixed(2),
                'ForceY: ' + this.forceY.toFixed(2),
                '',
                'Rotation: ' + this.rotation.toFixed(2),
                'Angle: ' + this.angle.toFixed(2),
                '',
                'Distance: ' + this.distance,
                'Quadrant: ' + this.quadrant,
                'Octant: ' + this.octant
            ]);
        }
    }

    /**
     * The rotation of the stick from its base in radians.
     * 
     * @type {number}
     */
    get rotation ()
    {
        return Phaser.Geom.Line.Angle(this.line);
    }

    /**
     * The current x value of the joystick.
     * 
     * This is a value between -1 and 1 calculated based on the distance of the stick from its base.
     * Where -1 is to the left of the base and +1 is to the right.
     * 
     * @type {number}
     */
    get x ()
    {
        const pi = Math.PI;
        const tau = Phaser.Math.TAU;
        const angle = Phaser.Geom.Line.Angle(this.line);

        if (angle >= 0)
        {
            if (angle <= tau)
            {
                //   Bottom right (0 - 90)
                return (tau - angle) / tau;
            }
            else
            {
                //   Bottom left (90 - 180)
                return -1 + (((pi - angle) / pi) * 2);
            }
        }
        else
        {
            if (angle >= -tau)
            {
                //   Top right (0 to -90)
                return (Math.abs(-tau - angle)) / tau;
            }
            else
            {
                //   Top left (-90 to -180)
                return -1 + ((Math.abs(-pi - angle) / pi) * 2);
            }
        }
    }

    /**
     * The current y value of the joystick.
     * 
     * This is a value between -1 and 1 calculated based on the distance of the stick from its base.
     * Where -1 is above the base and +1 is below the base.
     * 
     * @type {number}
     */
    get y ()
    {
        const tau = Phaser.Math.TAU;
        const angle = Phaser.Geom.Line.Angle(this.line);

        if (angle >= 0)
        {
            //  Down
            return 1 - (Math.abs(tau - angle) / tau);
        }
        else
        {
            //  Up
            return -1 + (Math.abs(-tau - angle) / tau);
        }
    }

    /**
     * The x coordinate the joystick is rendered at.
     * Use this to change the position of the joystick on-screen.
     * 
     * @type {number}
     */
    get posX ()
    {
        return this.position.x;
    }

    /**
     * The x coordinate the joystick is rendered at. Value should be given in pixel coordinates based on game dimensions.
     * Use this to change the position of the joystick on-screen. Value can even be tweened to display or hide the joystick in interesting ways.
     * 
     * @type {number}
     */
    set posX (x)
    {
        this.position.x = x;

        if (this.baseSprite)
        {
            this.baseSprite.x = x;
        }

        if (this.stickSprite)
        {
            this.stickSprite.x = x;
        }

        this.baseHitArea.x = x;
        this.stickHitArea.x = x;
        this.line.x1 = x;
        this.line.x2 = x;
    }

    /**
     * The y coordinate the joystick is rendered at.
     * Use this to change the position of the joystick on-screen.
     * 
     * @type {number}
     */
    get posY ()
    {
        return this.position.y;
    }

    /**
     * The y coordinate the joystick is rendered at. Value should be given in pixel coordinates based on game dimensions.
     * Use this to change the position of the joystick on-screen. Value can even be tweened to display or hide the joystick in interesting ways.
     * 
     * @type {number}
     */
    set posY (y)
    {
        this.position.y = y;

        if (this.baseSprite)
        {
            this.baseSprite.y = y;
        }

        if (this.stickSprite)
        {
            this.stickSprite.y = y;
        }

        this.baseHitArea.y = y;
        this.stickHitArea.y = y;
        this.line.y1 = y;
        this.line.y2 = y;
    }

    /**
     * The current force being applied to the joystick.
     * 
     * This is a value between 0 and 1 calculated based on the distance of the stick from its base.
     * It can be used to apply speed to physics objects, for example:
     * 
     * `ArcadePhysics.velocityFromRotation(Stick.rotation, Stick.force * maxSpeed, Sprite.body.velocity)`
     * 
     * @type {number}
     */
    get force ()
    {
        return Math.min(1, (Phaser.Geom.Line.Length(this.line) / this.distance * 2));
    }

    /**
     * The current force being applied to the joystick on the horizontal axis.
     * 
     * This is a value between 0 and 1 calculated based on the distance of the stick from its base.
     *
     * If you need to know which direction the Stick is facing (i.e. left or right) then see the `x` property value.
     * 
     * @type {number}
     */
    get forceX ()
    {
        return this.force * this.x;
    }

    /**
     * The current force being applied to the joystick on the vertical axis.
     * 
     * This is a value between 0 and 1 calculated based on the distance of the stick from its base.
     *
     * If you need to know which direction the Stick is facing (i.e. up or down) then see the `y` property value.
     * 
     * @type {number}
     */
    get forceY ()
    {
        return this.force * this.y;
    }

    /**
     * The filterX value is the forceX value adjusted to be used as the mouse input uniform for a filter.
     * 
     * This is a value between 0 and 1 where 0.5 is the center, i.e. the stick un-moved from its base.
     * 
     * @type {number}
     */
    get filterX ()
    {
        if (this.x === 0)
        {
            return 0.50;
        }
        else
        {
            const fx = Math.abs(this.forceX) / 2;

            if (this.x < 0)
            {
                return (0.5 - fx).toFixed(2);
            }
            else
            {
                return (0.5 + fx).toFixed(2);
            }
        }
    }

    /**
     * The filterY value is the forceY value adjusted to be used as the mouse input uniform for a filter.
     * 
     * This is a value between 0 and 1 where 0.5 is the center, i.e. the stick un-moved from its base.
     * 
     * @type {number}
     */
    get filterY ()
    {
        if (this.y === 0)
        {
            return 0.50;
        }
        else
        {
            const fy = Math.abs(this.forceY) / 2;

            if (this.y < 0)
            {
                return 1 - (0.5 - fy).toFixed(2);
            }
            else
            {
                return 1 - (0.5 + fy).toFixed(2);
            }
        }
    }

    /**
     * The alpha value of the Stick.
     * 
     * @type {number}
     */
    get alpha ()
    {
        return this.baseSprite.alpha;
    }

    /**
     * The alpha value of the Stick.
     * 
     * Adjusting this value changes the alpha property of both the base and stick sprites.
     * Reading it reads the alpha value of the base sprite alone.
     *
     * If you need to give the base and stick sprites *different* alpha values then you can access them directly:
     *
     * `stick.baseSprite.alpha` and `stick.stickSprite.alpha`.
     * 
     * Note that DPads only have a `baseSprite`.
     * 
     * @type {number}
     */
    set alpha (value)
    {
        if (this.baseSprite)
        {
            this.baseSprite.setAlpha(value);
        }

        if (this.stickSprite)
        {
            this.stickSprite.setAlpha(value);
        }
    }

    /**
     * The visible state of the Stick.
     * 
     * @type {number}
     */
    get visible ()
    {
        return (this.stickSprite) ? this.stickSprite.visible : false;
    }

    /**
     * The visible state of the Stick.
     * 
     * Adjusting this value changes the visible property of both the base and stick sprites.
     * Reading it reads the visible value of the stick sprite alone.
     *
     * Note that this stick will carry on processing and dispatching events even when not visible.
     * If you wish to disable the stick from processing events see `Stick.enabled`.
     *
     * If you need to give the base and stick sprites *different* visible values then you can access them directly:
     *
     * `stick.baseSprite.visible` and `stick.stickSprite.visible`.
     * 
     * Note that DPads only have a `baseSprite`.
     * 
     * @type {number}
     */
    set visible (value)
    {
        if (this.baseSprite)
        {
            this.baseSprite.setVisible(value);
        }

        if (this.stickSprite)
        {
            this.stickSprite.setVisible(value);
        }
    }

    /**
     * The distance in pixels that the stick needs to move from the base before it's at 'full force'.
     * 
     * This value is adjusted for scale.
     * 
     * @type {number}
     */
    get distance ()
    {
        return this._distance * this._scale;
    }

    /**
     * The distance in pixels that the stick needs to move from the base before it's at 'full force'.
     * 
     * This value is adjusted for scale.
     * 
     * It should never be less than the `Stick.deadZone` value.
     * 
     * @type {number}
     */
    set distance (value)
    {
        this._distance = value;
    }

    /**
     * The dead zone is a distance in pixels within which the Stick isn't considered as down or moving.
     * Only when it moves beyond this value does it start dispatching events.
     * 
     * By default the deadZone is 10% of the given distance value. 
     * So if the distance is 100 pixels then the Stick won't be considered as active until it has moved at least 10 pixels from its base.
     * 
     * @type {number}
     */
    get deadZone ()
    {
        return this._deadZone * this._scale;
    }

    /**
     * The dead zone is a distance in pixels within which the Stick isn't considered as down or moving.
     * Only when it moves beyond this value does it start dispatching events.
     * 
     * By default the deadZone is 10% of the given distance value. 
     * So if the distance is 100 pixels then the Stick won't be considered as active until it has moved at least 10 pixels from its base.
     * 
     * This value is adjusted for scale.
     * 
     * It should never be more than the `Stick.distance` value.
     * 
     * @type {number}
     */
    set deadZone (value)
    {
        this._deadZone = value;
    }

    /**
     * The scale of the Stick.
     * 
     * @type {number}
     */
    get scale ()
    {
        return this._scale;
    }

    /**
     * The scale of the Stick. The scale is applied evenly to both the x and y axis of the Stick.
     * You cannot specify a different scale per axis.
     * 
     * Adjusting this value changes the scale of both the base and stick sprites and recalculates all of the hit areas.
     *
     * The base and stick sprites must have the same scale.
     * 
     * @type {number}
     */
    set scale (value)
    {
        if (this.baseSprite)
        {
            this.baseSprite.setScale(value);
        }

        if (this.stickSprite)
        {
            this.stickSprite.setScale(value);
        }

        this.baseHitArea.setTo(this.position.x, this.position.y, (this.distance * value) / 2);

        const stickWidth = (this.stickSprite) ? this.stickSprite.displayWidth : (this.distance * value) / 2;

        this.stickHitArea.setTo(this.position.x, this.position.y, stickWidth);

        this._scale = value;
    }

    /**
     * A Stick that is set to `showOnTouch` will have `visible` set to false until the player presses on the screen.
     * When this happens the Stick is centered on the x/y coordinate of the finger and can be immediately dragged for movement.
     * 
     * @type {boolean}
     */
    get showOnTouch ()
    {
        return this._showOnTouch;
    }

    /**
     * A Stick that is set to `showOnTouch` will have `visible` set to false until the player presses on the screen.
     * When this happens the Stick is centered on the x/y coordinate of the finger and can be immediately dragged for movement.
     * 
     * @type {boolean}
     */
    set showOnTouch (value)
    {
        this._showOnTouch = value;

        if (this._showOnTouch && this.visible)
        {
            this.visible = false;
        }
    }
}

module.exports = BaseStick;
