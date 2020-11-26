/**
* @author       Richard Davey <rich@photonstorm.com>
* @copyright    2019 Photon Storm Ltd.
* @license      {@link http://choosealicense.com/licenses/no-license/|No License}
*/

import BaseStick from './BaseStick';

/**
 * A `Stick` is a virtual joystick. It belongs to the Virtual Joystick Plugin which is responsible for creating and updating it.
 *
 * Create a new stick by using the `VirtualJoystickPlugin.addStick` method.
 * 
 * It consists of two Sprites: one representing the 'base' of the joystick and the other the 'stick' itself, which is the part
 * that the player grabs hold of and interacts with. As the stick is moved you can read back the force being applied, either globally
 * or on a per axis basis.
 *
 * The Stick can either be on-screen all the time, positioned via the `posX` and `posY` setters. Or you can have it only appear when the
 * player touches the screen by setting `showOnTouch` to true.
 *
 * The Stick sprites are automatically added to the Scene at the point this Stick is created.
 * 
 * Stick force values are analogue, that is they are values between 0 and 1 that vary depending on how the stick
 * is being moved. This allows players to have fine-grained control over your game. If you require just an 'on / off' response you may
 * wish to use the DPad class instead.
 */
export class Stick extends BaseStick
{
    /**
     * @param {Phaser.Scene} scene - A reference to the Scene this stick was created in.
     * @param {number} x - The x coordinate to draw the joystick at. The joystick is centered on this coordinate.
     * @param {number} y - The y coordinate to draw the joystick at. The joystick is centered on this coordinate.
     * @param {number} distance - The distance threshold between the stick and the base. This is how far the stick can be pushed in any direction.
     * @param {string} texture - The key of the texture atlas to be used to render this joystick.
     * @param {string} [baseFrame='base'] - The name of the frame within the joystick texture atlas that contains the 'base' image.
     * @param {string} [stickFrame='stick'] - The name of the frame within the joystick texture atlas that contains the 'stick' image.
     */
    constructor (scene, x, y, distance, texture, baseFrame = 'base', stickFrame = 'stick')
    {
        super(scene, x, y, distance);

        /**
         * The name of the frame within the joystick texture atlas that contains the 'base' image.
         * @type {string} baseFrame
         */
        this.baseFrame = baseFrame;

        /**
         * The name of the frame within the joystick texture atlas that contains the 'stick' image.
         * @type {string} stickFrame
         */
        this.stickFrame = stickFrame;

        /**
         * The Sprite that is used to display the base of the joystick.
         * @type {Phaser.GameObjects.Sprite}
         */
        this.baseSprite = this.scene.add.sprite(x, y, texture, baseFrame);

        /**
         * The Sprite that is used to display the stick or handle of the joystick.
         * @type {Phaser.GameObjects.Sprite}
         */
        this.stickSprite = this.scene.add.sprite(x, y, texture, stickFrame);

        this.stickHitArea.radius = this.stickSprite.width / 2;
    }

    /**
     * Destroys this Stick.
     * 
     * Removes all associated listeners and events and calls destroy on the stick sprites.
     */
    destroy ()
    {
        super.destroy();

        this.stickSprite.destroy();
        this.baseSprite.destroy();

        this.stickSprite = null;
        this.baseSprite = null;
    }
}

/**
 * The Down event is dispatched as soon as the joystick is touched, or clicked when under mouse emulation.
 * If it has a `deadZone` set then it's not dispatched until it has moved beyond the limits of the deadZone.
 * 
 * Listen to this event from a stick instance:
 * 
 * ```javascript
 * const stick = this.pad.addStick(...);
 * stick.on('down', handler);
 * ```
 * 
 * @typedef {Object} DownEvent
 * @property {Stick|HiddenStick|DPad} stick - The stick that fired the event.
 * @property {Phaser.Input.Pointer} pointer - The Phaser Pointer responsible for causing the event.
 */

/**
 * The Up event is dispatched as soon as the joystick is released, having previously been in an `isDown` state.
 * 
 * Listen to this event from a stick instance:
 * 
 * ```javascript
 * const stick = this.pad.addStick(...);
 * stick.on('up', handler);
 * ```
 * 
 * @typedef {Object} UpEvent
 * @property {Stick|HiddenStick|DPad} stick - The stick that fired the event.
 * @property {Phaser.Input.Pointer} pointer - The Phaser Pointer responsible for causing the event.
 */

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
 * const stick = this.pad.addStick(...);
 * stick.on('move', handler);
 * ```
 * 
 * @typedef {Object} StickMoveEvent
 * @property {Stick|HiddenStick} stick - The stick that fired the event.
 * @property {number} force - The current force being applied to the joystick.
 * @property {number} forceX - The current force being applied to the joystick on the horizontal axis.
 * @property {number} forceY - The current force being applied to the joystick on the vertical axis.
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
 * const stick = this.pad.addStick(...);
 * stick.on('update', handler);
 * ```
 * 
 * @typedef {Object} StickUpdateEvent
 * @property {Stick|HiddenStick} stick - The stick that fired the event.
 * @property {number} force - The current force being applied to the joystick.
 * @property {number} forceX - The current force being applied to the joystick on the horizontal axis.
 * @property {number} forceY - The current force being applied to the joystick on the vertical axis.
 */

module.exports = Stick;
