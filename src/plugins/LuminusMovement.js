import Phaser from 'phaser';
import { LuminusAnimationManager } from './LuminusAnimationManager';

/**
 * @class
 */
export class LuminusMovement {
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
         * @type { Phaser.GameObjects.Sprite }  */
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
        return (
            this.player.body.velocity.x !== 0 ||
            this.player.body.velocity.y !== 0
        );
    }

    /**
     * Checks if there is any cuross key pressed.
     * @returns { boolean }
     */
    isAnyKeyDown() {
        return (
            this.cursors.left.isDown ||
            this.cursors.right.isDown ||
            this.cursors.up.isDown ||
            this.cursors.down.isDown
        );
    }

    move() {
        if (this.scene.input.isActive) {
            // console.log(
            //     new Phaser.Math.Vector2(this.player.body.velocity).angle()
            // );
            // Stop any previous movement from the last frame
            this.player.body.setVelocity(0);
            // Horizontal movement
            if (
                this.cursors.left.isDown ||
                (this.cursors.left.isDown && this.cursors.down.isDown) ||
                (this.cursors.left.isDown && this.cursors.up.isDown)
            ) {
                this.player.body.setVelocityX(-this.player.speed);
                this.player.anims.play('walk-left', true);
            } else if (
                this.cursors.right.isDown ||
                (this.cursors.right.isDown && this.cursors.down.isDown) ||
                (this.cursors.right.isDown && this.cursors.up.isDown)
            ) {
                this.player.anims.play('walk-right', true);
                this.player.body.setVelocityX(this.player.speed);
            }

            // Vertical movement
            if (this.cursors.up.isDown) {
                this.player.body.setVelocityY(-this.player.speed);
                if (!this.cursors.left.isDown && !this.cursors.right.isDown)
                    this.player.anims.play('walk-up', true);
            }
            if (this.cursors.down.isDown) {
                if (!this.cursors.left.isDown && !this.cursors.right.isDown)
                    this.player.anims.play('walk-down', true);
                this.player.body.setVelocityY(this.player.speed);
            }

            // Normalize and scale the velocity so that player can't move faster along a diagonal
            this.player.body.velocity.normalize().scale(this.player.speed);
        } else {
            this.player.body.setVelocityY(0);
            this.player.body.setVelocityX(0);
        }

        if (
            this.stick &&
            this.stick.isDown &&
            this.player.body.maxSpeed > 0 &&
            this.stick.force > 0 &&
            this.scene.input.pointer1.isDown
        ) {
            this.luminusAnimationManager.animateWithAngle(
                'walk',
                this.stick.rotation
            );
            this.scene.physics.velocityFromRotation(
                this.stick.rotation,
                this.stick.force * this.player.speed,
                this.player.body.velocity
            );
        }

        if (!this.isMoving()) {
            const currrentAnimation = this.player.anims.currentAnim.key;
            const idleAnimation = currrentAnimation.replace('walk', 'idle');
            this.player.anims.play(idleAnimation);
        }
    }
}
