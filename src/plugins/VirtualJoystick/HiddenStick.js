/**
 * @author       Richard Davey <rich@photonstorm.com>
 * @copyright    2019 Photon Storm Ltd.
 * @license      {@link http://choosealicense.com/licenses/no-license/|No License}
 */

import BaseStick from './BaseStick';

/**
 * A `HiddenStick` is a virtual joystick with no on-screen visuals.
 * It belongs to the Virtual Joystick Plugin which is responsible for creating and updating it.
 *
 * Create a new stick by using the `VirtualJoystickPlugin.addHiddenStick` method.
 *
 * The Stick is active the moment you touch the screen, no matter where you touch it.
 * As such, changing the position, alpha, visible or scale of this stick has no impact.
 *
 * Stick force values are analogue, that is they are values between 0 and 1 that vary depending on how the stick
 * is being moved. This allows players to have fine-grained control over your game. If you require just an 'on / off' response you may
 * wish to use the DPad class instead.
 */
export default class HiddenStick extends BaseStick {
	/**
	 * @param {Phaser.Scene} scene - A reference to the Scene this stick was created in.
	 * @param {number} distance - The distance threshold between the stick and the base. This is how far the stick can be pushed in any direction.
	 */
	constructor(scene, distance) {
		super(scene, 0, 0, distance);

		this._showOnTouch = true;
	}

	/**
	 * Setting this property has no effect for a HiddenStick.
	 *
	 * @type {boolean}
	 */
	set showOnTouch(value) {
		//  NOOP
	}
}
