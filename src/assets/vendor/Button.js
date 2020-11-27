/**
 * @author       Richard Davey <rich@photonstorm.com>
 * @copyright    2019 Photon Storm Ltd.
 * @license      {@link http://choosealicense.com/licenses/no-license/|No License}
 */

import CONST from './const';
import EventEmitter from 'eventemitter3';

/**
 * A `Button` is a virtual button. It belongs to the Virtual Joystick Plugin which is responsible for creating and updating it.
 *
 * Create a new button by using the `VirtualJoystickPlugin.addButton` method.
 *
 * It consists of one sprite with two frames. One frame depicts the button as it's held down, the other when up.
 *
 * The Button is digital, i.e. it is either 'on or off'. It doesn't have a pressure or force associated with it.
 *
 * The Button sprites are automatically added to the Scene at the point this Button is created.
 */
export class Button extends EventEmitter {
    /**
     * @param {Phaser.Scene} scene - A reference to the Scene this stick was created in.
     * @param {integer} shape - The shape of the buttons hit area. Either `VirtualJoystickPlugin.CIRC_BUTTON` or `VirtualJoystickPlugin.RECT_BUTTON`.
     * @param {number} x - The x coordinate to draw the button at. The button is centered on this coordinate.
     * @param {number} y - The y coordinate to draw the button at. The button is centered on this coordinate.
     * @param {string} texture - The key of the texture atlas to be used to render this button.
     * @param {string} upFrame - The name of the frame within the button texture atlas to be used when the button is in an 'up' state.
     * @param {string} downFrame - The name of the frame within the button texture atlas to be used when the button is in a 'down' state.
     */
    constructor(scene, shape, x, y, texture, upFrame, downFrame) {
        super();

        /**
         * A reference to the Scene this stick was created in.
         * @type {Phaser.Scene}
         */
        this.scene = scene;

        /**
         * The name of the frame within the button texture atlas to be used when the button is in an 'up' state.
         * @type {string}
         */
        this.upFrame = upFrame;

        /**
         * The name of the frame within the button texture atlas to be used when the button is in a 'down' state.
         * @type {string}
         */
        this.downFrame = downFrame;

        /**
         * The Sprite that is used to display this button.
         * @type {Phaser.GameObjects.Sprite}
         */
        this.sprite = this.scene.add.sprite(x, y, texture, upFrame);

        /**
         * Internal button shape var.
         * @type {number}
         * @private
         */
        this._shape = shape;

        /**
         * The hit area of the button in which input events will be detected.
         * @type {Phaser.Geom.Circle|Phaser.Geom.Rectangle} hitArea
         */
        if (shape === CONST.CIRC_BUTTON) {
            this.hitArea = new Phaser.Geom.Circle(
                this.sprite.x,
                this.sprite.y,
                this.sprite.width / 2
            );
        } else if (shape === CONST.RECT_BUTTON) {
            this.hitArea = new Phaser.Geom.Rectangle(
                this.sprite.x - this.sprite.width / 2,
                this.sprite.y - this.sprite.height / 2,
                this.sprite.width,
                this.sprite.height
            );
        }

        /**
         * A reference to the Input Pointer being used to update this button.
         * @type {Phaser.Input.Pointer}
         */
        this.pointer = null;

        /**
         * Should this button process or dispatch any events? Set to `false` to disable it.
         * @type {boolean}
         */
        this.enabled = true;

        /**
         * The current down state of this button. A button is determined as being down if it has been pressed.
         * @type {boolean}
         */
        this.isDown = false;

        /**
         * The current up state of this button. A button is determined as being up if it is not being pressed.
         * @type {boolean}
         */
        this.isUp = true;

        /**
         * The time when the button last entered an `isDown` state.
         * @type {integer}
         */
        this.timeDown = 0;

        /**
         * The time when the button last entered an `isUp` state.
         * @type {integer}
         */
        this.timeUp = 0;

        /**
         * A name for this Button. This property is never used by Phaser, so you are free to set it to whatever
         * your game requires.
         * @type {string}
         */
        this.name = '';

        /**
         * The current time, as set by the plugin each frame.
         * @type {integer}
         */
        this.currentTime = 0;

        /**
         * The `repeatRate` allows you to set how often this button fires the `ButtonDownEvent`.
         *
         * At the default setting of zero the onDown event will be sent only once and no further events
         * will be sent until the button is released and pressed again.
         *
         * By setting `repeatRate` to a value above zero you can control the time delay in milliseconds between each event.
         *
         * For example: `button.repeatRate = 100` would send the event once every 100ms for as long as the button is held down.
         *
         * To disable a repeat rate set the value back to zero again.
         *
         * @type {integer}
         */
        this.repeatRate = 0;

        /**
         * The key that is bound to this button. Pressing it activates the button the same way as clicking does.
         * It is set via `Button.addKey`.
         *
         * @type {?Phaser.Input.Keyboard.Key}
         */
        this.key = null;

        /**
         * Internal calculation var.
         * @type {number}
         * @private
         */
        this._timeNext = 0;

        /**
         * Internal calculation var.
         * @type {number}
         * @private
         */
        this._scale = 1;

        const input = this.scene.sys.input;

        input.on('pointerdown', this.checkDown, this);
        input.on('pointerup', this.checkUp, this);
    }

    /**
     * You can bind a Keyboard key to this button, so that when the key is pressed the button is activated.
     *
     * Obviously you only want to do this on desktop browsers, but it allows you to minimize your code quantity.
     *
     * When the Key is pressed the Button.onDown event is dispatched.
     *
     * The given argument can be either an existing Key object, a string, such as `A` or `SPACE`, or a key code value.
     *
     * If a Key object is given, and one already exists matching the same key code, the existing one is replaced with the new one.
     *
     * @param {(Phaser.Input.Keyboard.Key|string|integer)} key - Either a Key object, a string, such as `A` or `SPACE`, or a key code value.
     *
     * @return {Phaser.Input.Keyboard.Key} The newly created Key object, or a reference to it if it already existed in the keys array.
     */
    addKey(key) {
        const input = this.scene.sys.input;

        if (input.keyboard) {
            if (this.key) {
                this.key.off('down', this.keyDown, this);
                this.key.off('up', this.keyUp, this);

                input.keyboard.removeKey(this.key);

                this.key = null;
            }

            this.key = input.keyboard.addKey(key);

            this.key.on('down', this.keyDown, this);
            this.key.on('up', this.keyUp, this);
        }

        return this.key;
    }

    /**
     * The Key.onDown callback. Processes the down event for this button.
     *
     * @private
     * @fires {ButtonDownEvent}
     */
    keyDown() {
        if (!this.isDown) {
            this.sprite.setFrame(this.downFrame);

            this.isDown = true;
            this.isUp = false;
            this.timeDown = this.key.timeDown;
            this.timeUp = 0;
            this._timeNext = this.timeDown + this.repeatRate;

            this.emit('down', this, this.key);
        }
    }

    /**
     * The Key.onUp callback. Processes the down event for this button.
     *
     * @private
     * @fires {ButtonUpEvent}
     */
    keyUp() {
        if (this.isDown) {
            this.sprite.setFrame(this.upFrame);

            this.isDown = false;
            this.isUp = true;

            this.timeUp = this.key.timeUp;

            this.emit('up', this, this.key, this.duration);
        }
    }

    /**
     * The Input.onDown callback. Processes the down event for this button.
     *
     * @private
     * @fires {ButtonDownEvent}
     *
     * @param {Phaser.Input.Pointer} pointer - The Phaser Pointer that triggered the event.
     */
    checkDown(pointer) {
        if (
            this.enabled &&
            this.isUp &&
            this.hitArea.contains(pointer.worldX, pointer.worldY)
        ) {
            this.pointer = pointer;

            this.sprite.setFrame(this.downFrame);

            this.isDown = true;
            this.isUp = false;

            this.timeDown = pointer.time;
            this.timeUp = 0;
            this._timeNext = this.timeDown + this.repeatRate;

            this.emit('down', this, pointer);
        }
    }

    /**
     * The Input.onUp callback. Processes the up event for this button.
     *
     * @private
     * @fires {ButtonUpEvent}
     *
     * @param {Phaser.Input.Pointer} pointer - The Phaser Pointer that triggered the event.
     */
    checkUp(pointer) {
        if (pointer === this.pointer) {
            this.pointer = null;
            this.sprite.setFrame(this.upFrame);

            this.isDown = false;
            this.isUp = true;

            this.timeUp = pointer.time;

            this.emit('up', this, pointer, this.duration);
        }
    }

    /**
     * The update callback. This is called automatically by the Virtual Joystick Plugin.
     *
     * @private
     * @fires {ButtonDownEvent}
     *
     * @param {integer} time - The current time.
     */
    update(time) {
        this.currentTime = time;

        if (this.repeatRate > 0 && this.isDown && time >= this._timeNext) {
            this.emit('down', this, this.pointer);

            this._timeNext = time + this.repeatRate;
        }
    }

    /**
     * Visually aligns the button to the bottom left of the game view.
     * The optional spacing parameter allows you to add a border between the edge of the game and the button.
     *
     * @param {number} [spacing=0] - The spacing to apply between the edge of the game and the button.
     *
     * @return {Button} This button instance.
     */
    alignBottomLeft(spacing = 0) {
        const w = this.sprite.width / 2 + spacing;
        const h = this.sprite.height / 2 + spacing;

        this.posX = w;
        this.posY = this.scene.sys.scale.height - h;

        return this;
    }

    /**
     * Visually aligns the button to the bottom right of the game view.
     * The optional spacing parameter allows you to add a border between the edge of the game and the button.
     *
     * @param {number} [spacing=0] - The spacing to apply between the edge of the game and the button.
     *
     * @return {Button} This button instance.
     */
    alignBottomRight(spacing = 0) {
        const w = this.sprite.width / 2 + spacing;
        const h = this.sprite.height / 2 + spacing;

        this.posX = this.scene.sys.scale.width - w;
        this.posY = this.scene.sys.scale.height - h;

        return this;
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
     * @return {Button} This button instance.
     */
    setRepeatRate(rate = 0) {
        this.repeatRate = rate;

        return this;
    }

    /**
     * Sets a name for this Button.
     *
     * @param {string} [name] - The name for this button.
     *
     * @return {Button} This button instance.
     */
    setName(name = '') {
        this.name = name;

        return this;
    }

    /**
     * Destroys this Button.
     *
     * Removes all associated listeners and events and calls destroy on the button sprite.
     */
    destroy() {
        const input = this.scene.sys.input;

        input.off('pointerdown', this.checkDown, this);
        input.off('pointerup', this.checkUp, this);

        this.sprite.destroy();

        if (this.key) {
            this.key.off('down', this.keyDown, this);
            this.key.off('up', this.keyUp, this);

            input.keyboard.removeKey(this.key);

            this.key.destroy();

            this.key = null;
        }

        this.removeAllListeners();

        this.hitArea = null;
        this.pointer = null;
        this.scene = null;
    }

    /**
     * The x coordinate the button is rendered at. Value should be given in pixel coordinates based on game dimensions.
     * Use this to change the position of the button on-screen. Value can even be tweened to display or hide the button in interesting ways.
     *
     * @type {number}
     */
    get posX() {
        return this.sprite.x;
    }

    /**
     * The x coordinate the button is rendered at. Value should be given in pixel coordinates based on game dimensions.
     * Use this to change the position of the button on-screen. Value can even be tweened to display or hide the button in interesting ways.
     *
     * @type {number}
     */
    set posX(x) {
        this.sprite.x = x;
        this.hitArea.x =
            this._shape === CONST.CIRC_BUTTON ? x : x - this.sprite.width / 2;
    }

    /**
     * The y coordinate the button is rendered at. Value should be given in pixel coordinates based on game dimensions.
     * Use this to change the position of the button on-screen. Value can even be tweened to display or hide the button in interesting ways.
     *
     * @type {number}
     */
    get posY() {
        return this.sprite.y;
    }

    /**
     * The y coordinate the button is rendered at. Value should be given in pixel coordinates based on game dimensions.
     * Use this to change the position of the button on-screen. Value can even be tweened to display or hide the button in interesting ways.
     *
     * @type {number}
     */
    set posY(y) {
        this.sprite.y = y;
        this.hitArea.y =
            this._shape === CONST.CIRC_BUTTON ? y : y - this.sprite.height / 2;
    }

    /**
     * The alpha value of the Button.
     *
     * @type {number}
     */
    get alpha() {
        return this.sprite.alpha;
    }

    /**
     * The alpha value of the Button.
     *
     * Adjusting this value changes the alpha property of button sprite.
     *
     * @type {number}
     */
    set alpha(value) {
        this.sprite.alpha = value;
    }

    /**
     * The visible state of the Button.
     *
     * Adjusting this value changes the visible property of the button sprite.
     *
     * Note that this button will carry on processing and dispatching events even when not visible.
     * If you wish to disable the button from processing events see `Button.enabled`.
     *
     * @type {number}
     */
    get visible() {
        return this.sprite.visible;
    }

    /**
     * The visible state of the Button.
     *
     * Adjusting this value changes the visible property of the button sprite.
     *
     * Note that this button will carry on processing and dispatching events even when not visible.
     * If you wish to disable the button from processing events see `Button.enabled`.
     *
     * @type {number}
     */
    set visible(value) {
        this.sprite.visible = value;
    }

    /**
     * The scale of the Button. The scale is applied evenly to both the x and y axis of the Button.
     * You cannot specify a different scale per axis.
     *
     * @type {number}
     */
    get scale() {
        return this._scale;
    }

    /**
     * The scale of the Button. The scale is applied evenly to both the x and y axis of the Button.
     * You cannot specify a different scale per axis.
     *
     * Adjusting this value changes the scale of the button sprite and recalculates the hit area.
     *
     * @type {number}
     */
    set scale(value) {
        this.sprite.setScale(value);

        if (this._shape === CONST.CIRC_BUTTON) {
            this.hitArea.setTo(this.sprite.x, this.sprite.y, this.sprite.width);
        } else {
            this.hitArea.setTo(
                this.sprite.x,
                this.sprite.y,
                this.sprite.width,
                this.sprite.height
            );
        }

        this._scale = value;
    }

    /**
     * The duration in milliseconds that the Button has been held down for.
     *
     * If the button is not currently in an `onDown` state it returns the duration the button was previously held down for.
     *
     * If the button is in an `onDown` state it returns the current duration in ms.
     *
     * @type {integer}
     */
    get duration() {
        if (this.isUp) {
            return this.timeUp - this.timeDown;
        } else {
            return this.currentTime - this.timeDown;
        }
    }
}

/**
 * The ButtonDown event is dispatched as soon as the button is touched, or clicked when under mouse emulation.
 *
 * If you have added a Key to this button via `addKey` and that is pressed, the event will send the Key as the second
 * parameter instead of a Pointer object.
 *
 * Listen to this event from a button instance:
 *
 * ```javascript
 * const button = this.pad.addButton(...);
 * button.on('down', handler);
 * ```
 *
 * @typedef {Object} ButtonDownEvent
 * @property {Button} button
 * @property {Phaser.Input.Pointer|Phaser.Input.Keyboard.Key} source
 */

/**
 * The ButtonUp event is dispatched as soon as the button is released.
 *
 * If you have added a Key to this button via `addKey`, and that was released, the event will send the Key as the second
 * parameter instead of a Pointer object.
 *
 * It will also send the duration in milliseconds that the button was held down for prior to release.
 *
 * Listen to this event from a button instance:
 *
 * ```javascript
 * const button = this.pad.addButton(...);
 * button.on('up', handler);
 * ```
 *
 * @typedef {Object} ButtonUpEvent
 * @property {Button} button
 * @property {Phaser.Input.Pointer|Phaser.Input.Keyboard.Key} source
 * @property {integer} duration
 */

export default Button;
