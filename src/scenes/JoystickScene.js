import Phaser from 'phaser';
import joystick from '../plugins/VirtualJoystick/VirtualJoystickPlugin';
import joystick_atlas_image from '../assets/sprites/joystick-0.png';
import joystick_json from '../assets/sprites/joystick.json';
import { Player } from '../entities/Player';
import { LuminusBattleManager } from '../plugins/LuminusBattleManager';

/**
 * @class
 */
export class JoystickScene extends Phaser.Scene {
	constructor() {
		super({
			key: 'JoystickScene',
		});
		/**
		 * Defines if the on screen controls will be visible.
		 * @type { booelan }
		 */
		this.useOnScreenControls = true;
		/**
		 * Player Sprite.
		 * @type { Player }
		 */
		this.player = null;

		/**
		 * Joystick pad.
		 * @type { VirtualJoystickPlugin }
		 */
		this.stick = null;

		/**
		 * The name of the Button A to make it easy to use it for comparisons.
		 * @type { string }
		 * @default
		 */
		this.buttonAName = 'mobile_ButtonA';

		/**
		 * The name of the Button B to make it easy to use it for comparisons.
		 * @type { string }
		 * @default
		 */
		this.buttonBName = 'mobile_ButtonB';

		/**
		 * Button A
		 * @type { Button }
		 */
		this.buttonA = null;

		/**
		 * Button B
		 * @type { Button }
		 */
		this.buttonB = null;

		/**
		 * Name of the atlas.
		 * @type { string }
		 * @default
		 */
		this.atlasName = 'joystick';

		/**
		 * Checks if it's mobile so it can hide the buttons.
		 * @type { boolean }
		 */
		this.isMobile = false;

		/**
		 * Multiplier of the Stick position. The greater the farther of the bottom left position.
		 * @type { number }
		 * @default
		 */
		this.stickPositionMultiplier = 0.1;

		/**
		 * Multiplier of the Button A horizontally. The greater the farther of the right side of the screen.
		 * @type { number }
		 * @default
		 */
		this.buttonAMultiplierXposition = 0.18;

		/**
		 * Multiplier of the Button A Vertically. The greater the farther of the bottom of the screen.
		 * @type { number }
		 * @default
		 */
		this.buttonAMultiplierYposition = 0.25;

		/**
		 * The game battle manager.
		 * @type { LuminusBattleManager }
		 */
		this.luminusBattleManager = null;

		/**
		 * Just a copy of the actual stick that will move the player arrownd.
		 */
		this.phantomStick = null;
	}

	preload() {
		this.load.scenePlugin('VirtualJoystickPlugin', joystick, 'VirtualJoystickPlugin', 'pad');
		this.load.atlas(this.atlasName, joystick_atlas_image, joystick_json);
	}

	/**
	 *
	 * @param { any } args The initial arguments.
	 */
	init(args) {
		this.player = args.player;
	}

	create() {
		this.input.addPointer(6);
		this.isMobile = !this.sys.game.device.os.desktop ? true : false;
		if (this.isMobile) {
			const position_stick =
				Math.sqrt(this.cameras.main.width ** 2 + this.cameras.main.height ** 2) * this.stickPositionMultiplier;

			this.stick = this.pad.addHiddenStick(120);
			this.phantomStick = this.pad
				.addStick(0, 0, 120, this.atlasName, 'base', 'stick')
				.alignBottomLeft(position_stick);

			this.buttonA = this.pad
				.addButton(0, 120, this.atlasName, 'button0-up', 'button0-down')
				.setName(this.buttonAName);
			this.buttonA.posX = this.cameras.main.width - this.cameras.main.width * this.buttonAMultiplierXposition;
			this.buttonA.posY = this.cameras.main.height - this.cameras.main.height * this.buttonAMultiplierXposition;

			// Sets the button B
			// this.buttonB = this.pad
			//     .addButton(0, 120, this.atlasName, 'button1-up', 'button1-down')
			//     .setName(this.buttonBName)
			//     .alignBottomRight(100);
			// this.buttonB.posX = this.cameras.main.width - 50;
			// this.buttonB.posY = this.cameras.main.height - 250;

			this.events.emit('setStick', this.stick);

			this.input.on('pointerdown', (pointer) => {
				const leftHalfX = this.cameras.main.width / 2;
				if (pointer.x < leftHalfX) {
					this.phantomStick.posX = pointer.x;
					this.phantomStick.posY = pointer.y;
					this.phantomStick.isDown = true;
				} else {
					this.stick.isDown = false;
				}
			});
			this.input.on('pointerup', (pointer) => {
				if (!this.phantomStick.isDown) {
					const position_resized =
						Math.sqrt(this.cameras.main.width ** 2 + this.cameras.main.height ** 2) *
						this.stickPositionMultiplier;
					this.phantomStick.alignBottomLeft(position_resized);
				}
			});

			this.scale.on('resize', (resize) => {
				if (this.stick) {
					const position_resized =
						Math.sqrt(resize.width ** 2 + resize.height ** 2) * this.stickPositionMultiplier;
					this.stick.alignBottomLeft(position_resized);
					if (this.buttonA) {
						this.buttonA.posX =
							this.cameras.main.width - this.cameras.main.width * this.buttonAMultiplierXposition;
						this.buttonA.posY =
							this.cameras.main.height - this.cameras.main.height * this.buttonAMultiplierYposition;
					}
					// Button B not used for now.
					if (this.buttonB) {
						this.buttonB.posX = this.cameras.main.width - 50;
						this.buttonB.posY = this.cameras.main.height - 250;
					}
				}
			});
		}
		this.events.emit('JoystickReady');
		// this.debugText = this.add.text(0, 0);
		this.createButtonActions();
		this.luminusBattleManager = new LuminusBattleManager();
	}

	/**
	 * Creates the button actions Trigger. Will dispatch events to atk, chat, etc.
	 */
	createButtonActions() {
		if (this.buttonA) {
			this.buttonA.on('down', (buttonA) => {
				if (this.player && this.player.active && this.player.canAtack && !this.player.isAtacking) {
					this.luminusBattleManager.atack(this.player);
				}
			});
		}
	}

	update() {
		// if (this.debugText)
		//     this.debugText.setText(
		//         `Pointer 1: ${this.input.pointer1.isDown}, Pointer 2: ${this.input.pointer2.isDown})`
		//     );
		// if (
		//     this.useOnScreenControls &&
		//     this.player &&
		//     this.player.body &&
		//     this.input.pointer1.isDown &&
		//     !this.input.pointer2.isDown
		// ) {
		//     if (
		//         this.stick &&
		//         this.stick.isDown &&
		//         this.player.body.maxSpeed > 0
		//     ) {
		//         this.physics.velocityFromRotation(
		//             this.stick.rotation,
		//             this.stick.force * this.player.speed,
		//             this.player.body.velocity
		//         );
		//     }
		// }
	}
}
