import Phaser from 'phaser';
import { AnimationNames } from '../consts/AnimationNames';

/**
 * @class
 */
export class LuminusAnimationManager extends AnimationNames {
    /**
     * This class is responsible for animating game objects such as Player, Enemy and so on.
     */
    constructor(entity) {
        super();
        /**
         * Entity that will be animated.
         * @type { Phaser.GameObjects.Sprite }
         */
        this.entity = entity;

        /**
         * The last animation that was played.
         * @type { string }
         * @default
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
            this.entity.body.velocity.x !== 0 ||
            this.entity.body.velocity.y !== 0
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
            this.entity.anims.play(animation + this.rightAnimationSufix, true);
        } else if (
            parseFloat(angle).toFixed(2) > -2.33 &&
            parseFloat(angle).toFixed(2) < -0.66
        ) {
            this.entity.anims.play(animation + this.upAnimationSufix, true);
        } else if (
            (parseFloat(angle).toFixed(2) < -2.33 &&
                parseFloat(angle).toFixed(2) >= -3.14) ||
            (parseFloat(angle).toFixed(2) <= 3.14 &&
                parseFloat(angle).toFixed(2) > 2.33)
        ) {
            this.entity.anims.play(animation + this.leftAnimationSufix, true);
        } else if (
            parseFloat(angle).toFixed(2) <= 2.33 &&
            parseFloat(angle).toFixed(2) > 0.66
        ) {
            this.entity.anims.play(animation + this.downAnimationSufix, true);
        }

        this.lastAnimation = this.entity.anims.currentAnim.key;
    }

    /**
     * Checks if the player is moving.
     * @returns { boolean }
     */
    isMoving() {
        return (
            this.entity.body.velocity.x !== 0 ||
            this.entity.body.velocity.y !== 0
        );
    }
}
