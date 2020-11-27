/**
 * @author       Richard Davey <rich@photonstorm.com>
 * @copyright    2019 Photon Storm Ltd.
 * @license      {@link http://choosealicense.com/licenses/no-license/|No License}
 */

import BaseStick from './BaseStick';
import CONST from './const';

/**
 * A `DPad` is a virtual joystick. It belongs to the Virtual Joystick Plugin which is responsible for creating and updating it.
 *
 * Create a new stick by using the `VirtualJoystickPlugin.addDPad` method.
 *
 * While the Stick class creates an analogue joystick, the DPad one creates a digital joystick. The difference is that a digital joystick
 * is either "on" or "off" in any given direction. There is no pressure or degree of force in any direction, it's either moving or it isn't.
 * This is the same as the way in which NES style game pads work. The "D" stands for "Direction".
 *
 * Unlike the Stick class the DPad can use a different frame from the texture atlas for each of the 4 directions in which it can move.
 *
 * The DPad can either be on-screen all the time, positioned via the `posX` and `posY` setters. Or you can have it only appear when the
 * player touches the screen by setting `showOnTouch` to true.
 *
 * The DPad sprites are automatically added to the Scene at the point this DPad is created.
 */
export class DPad extends BaseStick {
    /**
     * @param {Phaser.Scene} scene - A reference to the Scene this stick was created in.
     * @param {number} x - The x coordinate to draw the joystick at. The joystick is centered on this coordinate.
     * @param {number} y - The y coordinate to draw the joystick at. The joystick is centered on this coordinate.
     * @param {number} size - The size of the circular hit area for the DPad. If a falsey value it will use the size of the neutralFrame.
     * @param {string} texture - The key of the texture atlas to be used to render this joystick.
     * @param {string} [neutralFrame='neutral'] - The name of the frame within the texture atlas that contains the 'neutral' state of the dpad. Neutral is the state when the dpad isn't moved at all.
     * @param {string} [upFrame='up'] - The name of the frame within the texture atlas that contains the 'up' state of the dpad.
     * @param {string} [downFrame='down'] - The name of the frame within the texture atlas that contains the 'down' state of the dpad.
     * @param {string} [leftFrame='left'] - The name of the frame within the texture atlas that contains the 'left' state of the dpad.
     * @param {string} [rightFrame='right'] - The name of the frame within the texture atlas that contains the 'right' state of the dpad.
     */
    constructor(
        scene,
        x,
        y,
        size,
        texture,
        neutralFrame = 'neutral',
        upFrame = 'up',
        downFrame = 'down',
        leftFrame = 'left',
        rightFrame = 'right'
    ) {
        super(scene, x, y, size);

        /**
         * The name of the frame within the texture atlas that contains the 'neutral' state of the dpad. Neutral is the state when the dpad isn't moved at all.
         * @type {string}
         */
        this.neutralFrame = neutralFrame;

        /**
         * The name of the frame within the texture atlas that contains the 'up' state of the dpad.
         * @type {string}
         */
        this.upFrame = upFrame;

        /**
         * The name of the frame within the texture atlas that contains the 'down' state of the dpad.
         * @type {string}
         */
        this.downFrame = downFrame;

        /**
         * The name of the frame within the texture atlas that contains the 'left' state of the dpad.
         * @type {string}
         */
        this.leftFrame = leftFrame;

        /**
         * The name of the frame within the texture atlas that contains the 'right' state of the dpad.
         * @type {string}
         */
        this.rightFrame = rightFrame;

        /**
         * @ignore
         */
        this.baseSprite = this.scene.add.sprite(x, y, texture, neutralFrame);

        if (!size) {
            size = this.baseSprite.displayWidth;

            /**
             * @ignore
             */
            this.baseHitArea.radius = size / 2;

            /**
             * @ignore
             */
            this.stickHitArea.radius = size / 2;
        }

        /**
         * The `repeatRate` allows you to set how often the DPad fires the direction events.
         *
         * At the default setting of zero the events will be sent only once and no further events
         * will be sent until the DPad changes direction.
         *
         * By setting `repeatRate` to a value above zero you can control the time delay in milliseconds between each event.
         *
         * For example: `repeatRate = 100` would send the event once every 100ms for as long as
         * the button is held down in the same direction.
         *
         * To disable a repeat rate set the value back to zero again.
         *
         * @type {integer}
         */
        this.repeatRate = 0;

        /**
         * Internal calculation var.
         * @type {number}
         * @private
         */
        this._timeNext = 0;

        /**
         * Internal direction to event name mapping.
         * @private
         * @type {string[]}
         */
        this._directions = [
            '',
            '',
            '',
            '',
            'none',
            'moveup',
            'movedown',
            'moveleft',
            'moveright',
        ];

        /**
         * Internal tracking var.
         * @type {integer}
         * @private
         */
        this._lastDirection = 0;
    }

    /**
     * Processes the up event for this dpad.
     *
     * @private
     * @override
     *
     * @param {Phaser.Input.Pointer} pointer - The Phaser Pointer that triggered the event.
     */
    checkUp(pointer) {
        if (pointer !== this.pointer) {
            return;
        }

        super.checkUp(pointer);

        this.baseSprite.setFrame(this.neutralFrame);

        this._lastDirection = 0;
    }

    /**
     * Processes the movement event for this dpad.
     *
     * @private
     * @override
     * @fires {DPadMoveEvent}
     *
     * @param {Phaser.Input.Pointer} pointer - The Phaser Pointer that triggered the event.
     */
    moveStick(pointer) {
        if (pointer !== this.pointer) {
            return;
        }

        const x = pointer.worldX;
        const y = pointer.worldY;

        if (!this.pointer || (!this.isDown && !this._tracking)) {
            this.direction = Phaser.NONE;
            this.baseSprite.setFrame(this.neutralFrame);

            return;
        }

        const line = this.line;

        line.x2 = x;
        line.y2 = y;

        this.checkArea();

        const lineLength = Phaser.Geom.Line.Length(line);
        const lineAngle = Phaser.Geom.Line.Angle(line);

        if (!this.isDown && lineLength <= this.deadZone) {
            this.direction = Phaser.NONE;
            this.baseSprite.setFrame(this.neutralFrame);

            return;
        }

        if (this._tracking) {
            //  Was tracking, now in the zone so dispatch and follow
            this.setDown();
        }

        const motionLock = this.motionLock;
        const stickHitArea = this.stickHitArea;
        const quadrant = this.quadrant;

        if (lineLength < this.baseHitArea.radius) {
            if (motionLock === CONST.NONE) {
                stickHitArea.setPosition(x, y);
            } else if (motionLock === CONST.HORIZONTAL) {
                stickHitArea.x = x;
            } else if (motionLock === CONST.VERTICAL) {
                stickHitArea.y = y;
            }
        } else {
            //  Let it smoothly rotate around the base limit
            const limitPoint = this.limitPoint;

            Phaser.Geom.Circle.CircumferencePoint(
                this.baseHitArea,
                lineAngle,
                limitPoint
            );

            if (motionLock === CONST.NONE) {
                stickHitArea.setPosition(limitPoint.x, limitPoint.y);
            } else if (motionLock === CONST.HORIZONTAL) {
                stickHitArea.x = limitPoint.x;
            } else if (motionLock === CONST.VERTICAL) {
                stickHitArea.y = limitPoint.y;
            }
        }

        if (quadrant === 1) {
            this.baseSprite.setFrame(this.downFrame);
        } else if (quadrant === 2) {
            this.baseSprite.setFrame(this.leftFrame);
        } else if (quadrant === 3) {
            this.baseSprite.setFrame(this.upFrame);
        } else {
            this.baseSprite.setFrame(this.rightFrame);
        }

        this.emit('move', this, this.x, this.y);
    }

    /**
     * The update callback. This is called automatically by the Virtual Joystick Plugin.
     *
     * @private
     * @override
     * @fires {DPadUpdateEvent}
     * @fires {DPadLeftEvent}
     * @fires {DPadRightEvent}
     * @fires {DPadUpEvent}
     * @fires {DPadDownEvent}
     *
     * @param {integer} time - The current time.
     */
    update(time) {
        if (!this._tracking) {
            this.emit('update', this, this.x, this.y);

            if (this.direction !== Phaser.NONE && this.isDown) {
                if (
                    this.direction !== this._lastDirection ||
                    (this.repeatRate > 0 && time >= this._timeNext)
                ) {
                    this.emit(this._directions[this.direction], this);

                    this._timeNext = time + this.repeatRate;

                    this._lastDirection = this.direction;
                }
            }
        }
    }

    /**
     * The `repeatRate` allows you to set how often the DPad fires the direction events.
     *
     * At the default setting of zero the events will be sent only once and no further events
     * will be sent until the DPad changes direction.
     *
     * By setting `repeatRate` to a value above zero you can control the time delay in milliseconds between each event.
     *
     * For example: `repeatRate = 100` would send the event once every 100ms for as long as
     * the button is held down in the same direction.
     *
     * To disable a repeat rate set the value back to zero again.
     *
     * @param {integer} [rate=0] - The repeat rate.
     *
     * @return {DPad} This joystick instance.
     */
    setRepeatRate(rate = 0) {
        this.repeatRate = rate;

        return this;
    }

    /**
     * Destroys this dpad.
     *
     * Removes all associated listeners and events and calls destroy on the dpad sprite.
     *
     * @override
     */
    destroy() {
        super.destroy();

        this.baseSprite.destroy();

        this.baseSprite = null;
    }

    /**
     * Renders out a debug view of this DPad to the given Graphics and Text objects.
     *
     * It optionally renders the geometry involved in the dpad hit areas and calculation line.
     *
     * It also optionally renders text information relating to the current forces and angles.
     *
     * @override
     * @param {Phaser.GameObjects.Graphics} [graphics] - Renders the geometry involved in the stick hit areas and calculation line to this Graphics object.
     * @param {Phaser.GameObjects.Text} [text] - Renders text information relating to the current forces and angles to this Text object.
     */
    debug(graphics, text) {
        super.debug(graphics);

        if (text) {
            text.setText([
                'X: ' + this.x,
                'Y: ' + this.y,
                'Direction: ' + this._directions[this.direction].substr(4),
                '',
                'Distance: ' + this.distance,
                'Quadrant: ' + this.quadrant,
                'Octant: ' + this.octant,
            ]);
        }
    }

    /**
     * The current x value of the dpad.
     *
     * If the dpad is being held to the left it will return -1. If to the right it will return 1.
     * If either not held at all, or not left or right, it will return 0.
     *
     * @type {number}
     */
    get x() {
        if (this.direction === Phaser.LEFT) {
            return -1;
        } else if (this.direction === Phaser.RIGHT) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * The current y value of the joystick.
     *
     * If the dpad is being held up it will return -1. If down it will return 1.
     * If either not held at all, or not up or down, it will return 0.
     *
     * @type {number}
     */
    get y() {
        if (this.direction === Phaser.UP) {
            return -1;
        } else if (this.direction === Phaser.DOWN) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * The current force being applied to the joystick.
     *
     * For a DPad it is either 0 or 1.
     *
     * @type {number}
     */
    get force() {
        return this.isDown ? 1 : 0;
    }

    /**
     * The current force being applied to the joystick on the horizontal axis.
     *
     * For a DPad it is either -1, 0 or 1.
     *
     * @type {number}
     */
    get forceX() {
        return this.x;
    }

    /**
     * The current force being applied to the joystick on the vertical axis.
     *
     * For a DPad it is either -1, 0 or 1.
     *
     * @type {number}
     */
    get forceY() {
        return this.y;
    }
}

/**
 * The Move event is dispatched whenever the joystick is moved as a result of a device Touch movement event.
 *
 * This event is only dispatched when a touch move event is received, even if the stick is held in a specific direction.
 *
 * If you wish to constantly check the position of the joystick then you should use the Update event instead.
 *
 * Listen to this event from a stick instance:
 *
 * ```javascript
 * const stick = this.pad.addDPad(...);
 * stick.on('move', handler);
 * ```
 *
 * @typedef {Object} DPadMoveEvent
 * @property {DPad} dpad - The DPad that fired the event.
 * @property {integer} forceX - The current force being applied to the joystick on the horizontal axis.
 * @property {integer} forceY - The current force being applied to the joystick on the vertical axis.
 */

/**
 * The Update event is dispatched constantly for as long as the joystick is in a down state.
 *
 * This is a high frequency event so be careful what is bound to it. If there are computationally cheaper ways of
 * reacting to this joysticks movement then you should explore them.
 *
 * Listen to this event from a stick instance:
 *
 * ```javascript
 * const stick = this.pad.addDPad(...);
 * stick.on('update', handler);
 * ```
 *
 * @typedef {Object} DPadUpdateEvent
 * @property {DPad} dpad - The DPad that fired the event.
 * @property {integer} forceX - The current force being applied to the joystick on the horizontal axis.
 * @property {integer} forceY - The current force being applied to the joystick on the vertical axis.
 */

/**
 * This event is dispatched whenever the DPad is pressed left.
 *
 * See the `repeatRate` property to control the frequency of the event.
 *
 * If you wish to constantly check the position of the joystick then you should use the Update event instead.
 *
 * Listen to this event from a stick instance:
 *
 * ```javascript
 * const stick = this.pad.addDPad(...);
 * stick.on('moveleft', handler);
 * ```
 *
 * @typedef {Object} DPadLeftEvent
 * @property {DPad} dpad - The dpad that fired the event.
 */

/**
 * This event is dispatched whenever the DPad is pressed right.
 *
 * See the `repeatRate` property to control the frequency of the event.
 *
 * If you wish to constantly check the position of the joystick then you should use the Update event instead.
 *
 * Listen to this event from a stick instance:
 *
 * ```javascript
 * const stick = this.pad.addDPad(...);
 * stick.on('moveright', handler);
 * ```
 *
 * @typedef {Object} DPadRightEvent
 * @property {DPad} dpad - The dpad that fired the event.
 */

/**
 * This event is dispatched whenever the DPad is pressed down.
 *
 * See the `repeatRate` property to control the frequency of the event.
 *
 * If you wish to constantly check the position of the joystick then you should use the Update event instead.
 *
 * Listen to this event from a stick instance:
 *
 * ```javascript
 * const stick = this.pad.addDPad(...);
 * stick.on('movedown', handler);
 * ```
 *
 * @typedef {Object} DPadDownEvent
 * @property {DPad} dpad - The dpad that fired the event.
 */

/**
 * This event is dispatched whenever the DPad is pressed up.
 *
 * See the `repeatRate` property to control the frequency of the event.
 *
 * If you wish to constantly check the position of the joystick then you should use the Update event instead.
 *
 * Listen to this event from a stick instance:
 *
 * ```javascript
 * const stick = this.pad.addDPad(...);
 * stick.on('moveup', handler);
 * ```
 *
 * @typedef {Object} DPadUpEvent
 * @property {DPad} dpad - The dpad that fired the event.
 */

export default DPad;
