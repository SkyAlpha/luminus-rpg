import Phaser from 'phaser';

/**
 * @class
 */
export class PhaserMovement {
    /**
     * Creates cursors to move the player.
     * @param { Phaser.Scene } scene Phaser Scene.
     * @param { Phaser.GameObjects } player the player that the cursors will move.
     * @param { Phaser.Scene } joystickScene
     */
    constructor(scene, player, joystickScene) {
        /**
         * scene Scene Context.
         * @type { Phaser.Scene }  */
        this.scene = scene;

        /**
         * player Player Game Object.
         * @type { Phaser.GameObjects }  */
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

        if (this.joystickScene) {
            this.joystickScene.events.on('setStick', (payload) => {
                this.stick = payload; // Sets the Stick pad for movement.
            });
        }
    }

    move() {
        if (this.scene.input.isActive) {
            // Stop any previous movement from the last frame
            this.player.body.setVelocity(0);
            // Horizontal movement
            if (this.cursors.left.isDown) {
                this.player.body.setVelocityX(-this.player.speed);
            } else if (this.cursors.right.isDown) {
                this.player.body.setVelocityX(this.player.speed);
            }

            // Vertical movement
            if (this.cursors.up.isDown) {
                this.player.body.setVelocityY(-this.player.speed);
            } else if (this.cursors.down.isDown) {
                this.player.body.setVelocityY(this.player.speed);
            }

            // Normalize and scale the velocity so that player can't move faster along a diagonal
            this.player.body.velocity.normalize().scale(this.player.speed);
        } else {
            this.player.body.setVelocityY(0);
            this.player.body.setVelocityX(0);
        }
        if (this.stick && this.stick.isDown && this.player.body.maxSpeed > 0) {
            this.scene.physics.velocityFromRotation(
                this.stick.rotation,
                this.stick.force * this.player.speed,
                this.player.body.velocity
            );
        }
    }
}
