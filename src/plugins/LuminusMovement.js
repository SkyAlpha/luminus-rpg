import Phaser from 'phaser';
import { AnimationNames } from '../consts/AnimationNames';
import { LuminusAnimationManager } from './LuminusAnimationManager';
import { LuminusGamePadController } from './LuminusGamePadController';

/**
 * @class
 */
export class LuminusMovement extends AnimationNames {
	/**
	 * Creates cursors to move the player in the given direction.
	 * @param { Phaser.Scene } scene Phaser Scene.
	 * @param { Phaser.Physics.Arcade.Sprite } player the player that the cursors will move.
	 * @param { Phaser.Scene } joystickScene
	 */
	constructor(scene, player, joystickScene) {
		super(null);
		/**
		 * Scene Context.
		 * @type { Phaser.Scene }  */
		this.scene = scene;

		/**
		 * player Player Game Object.
		 * @type { Phaser.Physics.Arcade.Sprite }  */
		this.player = player;

		/**
		 * Keyboard cursors that will control the character.
		 * @type { any }
		 */
		this.cursors = this.scene.input.keyboard.createCursorKeys();

		/**
		 * Virtual joystick plugin
		 * @type { VirtualJoystickPlugin }
		 * @default
		 */
		this.stick = null;

		/**
		 * The JoystickScene. If it's available, use the joystick to move the Player.
		 * @type { Phaser.Scene }
		 */
		this.joystickScene = joystickScene;

		/**
		 * The luminus animation manager.
		 * @type { LuminusAnimationManager }
		 */
		this.luminusAnimationManager = new LuminusAnimationManager(this.player);

		this.luminusGamepadController = new LuminusGamePadController(this.scene, this.player);

		this.luminusGamepadController.create();

		if (this.joystickScene) {
			this.joystickScene.events.on('setStick', (payload) => {
				this.stick = payload; // Sets the Stick pad for movement.
			});
		}

		this.scene.input.on('keydown', (down) => {
			console.log('down');
		});

		this.scene.input.addPointer(3);
	}

	/**
	 * Checks if the player is moving.
	 * @returns { boolean }
	 */
	isMoving() {
		return this.player.container.body.velocity.x !== 0 || this.player.container.body.velocity.y !== 0;
	}

	/**
	 * Checks if there is any cuross key pressed.
	 * @returns { boolean }
	 */
	isAnyKeyDown() {
		return (
			this.cursors.left.isDown || this.cursors.right.isDown || this.cursors.up.isDown || this.cursors.down.isDown
		);
	}

	move() {
		if (this.player && this.player.container && this.player.container.body && this.player.canMove) {
			this.player.container.body.setVelocity(0);
			if (!this.player.isAtacking) {
				const texture = this.player.texture.key;
				if (this.scene.input.isActive) {
					// Stop any previous movement from the last frame

					// Horizontal movement
					if (
						this.cursors.left.isDown ||
						(this.cursors.left.isDown && this.cursors.down.isDown) ||
						(this.cursors.left.isDown && this.cursors.up.isDown && this.player.container.body.maxSpeed > 0)
					) {
						this.player.container.body.setVelocityX(-this.player.speed);
						this.player.anims.play(texture + '-' + this.walkLeftAnimationName, true);
					} else if (
						this.cursors.right.isDown ||
						(this.cursors.right.isDown && this.cursors.down.isDown) ||
						(this.cursors.right.isDown && this.cursors.up.isDown && this.player.container.body.maxSpeed > 0)
					) {
						this.player.anims.play(texture + '-' + this.walkRightAnimationName, true);
						this.player.container.body.setVelocityX(this.player.speed);
					}

					// Vertical movement
					if (this.cursors.up.isDown && this.player.container.body.maxSpeed > 0) {
						this.player.container.body.setVelocityY(-this.player.speed);
						if (!this.cursors.left.isDown && !this.cursors.right.isDown)
							this.player.anims.play(texture + '-' + this.walkUpAnimationName, true);
					}
					if (this.cursors.down.isDown && this.player.container.body.maxSpeed > 0) {
						if (!this.cursors.left.isDown && !this.cursors.right.isDown)
							this.player.anims.play(texture + '-' + this.walkDownAnimationName, true);
						this.player.container.body.setVelocityY(this.player.speed);
					}

					// Normalize and scale the velocity so that player can't move faster along a diagonal
					this.player.container.body.velocity.normalize().scale(this.player.speed);
				} else {
					// Stops the movement if there is no pressed key.
					this.player.container.body.setVelocityY(0);
					this.player.container.body.setVelocityX(0);
				}

				if (
					this.stick &&
					this.stick.isDown &&
					this.player.container.body.maxSpeed > 0 &&
					this.stick.force > 0 &&
					this.scene.input.pointer1.isDown &&
					this.player.container.body.maxSpeed > 0
				) {
					const texture = this.player.texture.key;
					this.luminusAnimationManager.animateWithAngle(
						`${texture}-${this.walkPrefixAnimation}`,
						this.stick.rotation
					);
					this.scene.physics.velocityFromRotation(
						this.stick.rotation,
						this.stick.force * this.player.speed,
						this.player.container.body.velocity
					);
				}
				this.luminusGamepadController.sendInputs();

				if (!this.isMoving()) {
					this.luminusAnimationManager.setIdleAnimation();
					if (this.player.walkDust) this.player.walkDust.on = false;
				} else {
					if (this.player.walkDust) this.player.walkDust.on = true;
				}
			}
		} else {
			if (this.player && this.player.walkDust) this.player.walkDust.on = false;
			if (this.player && this.player.container && this.player.container.body) {
				this.player.container.body.setVelocity(0);
				this.luminusAnimationManager.setIdleAnimation();
			}
		}
	}
}
