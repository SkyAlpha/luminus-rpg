import Phaser from 'phaser';

/**
 * @class
 */
export class LuminusAnimationManager {
    /**
     * This class is responsible for animation the objects.
     */
    constructor(player) {
        /**
         * Player that will be animated.
         * @type { Phaser.GameObjects.Sprite }
         */
        this.player = player;

        /**
         * the last animation that was played.
         * @type { string }
         */
        this.lastAnimation = '';
    }

    /**
     *
     * @param { string } animation
     */
    isSameAnimation(animation) {
        return !currrentAnimation.includes(animation);
    }

    /**
     * animates the given object on a specific direction.
     */
    animate(animation) {}

    /**
     * Checks if the player is moving.
     * @returns { boolean }
     */
    isMoving() {
        // If is colliding should always show the trigger button.
        // Pressing space button, should show the chat.
        return (
            this.player.body.velocity.x !== 0 ||
            this.player.body.velocity.y !== 0
        );
    }

    /**
     * animates the given object on a specific direction.
     * @param { number } animation animation prefix like.
     * @param { number } angle angle of the rotation of the joystick in radians.
     * "walk", "atack".
     * It must be defined in your configuration file, and or spriting software of your choice.
     */
    animateWithAngle(animation, angle) {
        const currrentAnimation = this.player.anims.currentAnim.key;
        if (parseFloat(angle).toFixed(2) == -1.57) {
            this.player.anims.play(animation + '-up', true);
        }
        if (
            parseFloat(angle).toFixed(2) < -1.57 &&
            parseFloat(angle).toFixed(2) > -3.14
        ) {
            this.player.anims.play(animation + '-left', true);
        }
        // Right
        if (
            parseFloat(angle).toFixed(2) <= -0.01 &&
            parseFloat(angle).toFixed(2) > -1.57
        ) {
            this.player.anims.play(animation + '-right', true);
        }
        if (angle == 0) {
            this.player.anims.play(animation + '-right', true);
        }

        // Down
        if (
            parseFloat(angle).toFixed(2) > 0 &&
            parseFloat(angle).toFixed(2) < 1.57
        ) {
            this.player.anims.play(animation + '-down', true);
        }
        if (parseFloat(angle).toFixed(2) == 1.57) {
            this.player.anims.play(animation + '-down', true);
        }

        // Left
        if (
            parseFloat(angle).toFixed(2) > 1.57 &&
            parseFloat(angle).toFixed(2) < 3.14
        ) {
            this.player.anims.play(animation + '-left', true);
        }
        if (parseFloat(angle).toFixed(2) == 3.14) {
            this.player.anims.play(animation + '-left', true);
        }

        this.lastAnimation = this.player.anims.currentAnim.key;
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
}
