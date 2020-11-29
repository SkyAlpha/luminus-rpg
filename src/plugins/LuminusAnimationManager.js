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
        if (
            parseFloat(angle).toFixed(2) > -0.66 &&
            parseFloat(angle).toFixed(2) < 0.66
        ) {
            this.player.anims.play(animation + '-right', true);
        } else if (
            parseFloat(angle).toFixed(2) > -2.33 &&
            parseFloat(angle).toFixed(2) < -0.66
        ) {
            this.player.anims.play(animation + '-up', true);
        } else if (
            (parseFloat(angle).toFixed(2) < -2.33 &&
                parseFloat(angle).toFixed(2) >= -3.14) ||
            (parseFloat(angle).toFixed(2) <= 3.14 &&
                parseFloat(angle).toFixed(2) > 2.33)
        ) {
            this.player.anims.play(animation + '-left', true);
        } else if (
            parseFloat(angle).toFixed(2) <= 2.33 &&
            parseFloat(angle).toFixed(2) > 0.66
        ) {
            this.player.anims.play(animation + '-down', true);
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
