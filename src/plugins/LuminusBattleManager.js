import { AnimationNames } from '../consts/AnimationNames';
import { Player } from '../entities/Player';

/**
 * @class
 */
export class LuminusBattleManager extends AnimationNames {
    /**
     * This class is responsible for managing all the battle in the game.
     */
    constructor() {
        super();
        /**
         * An array of enemies. This will be the
         * @type { Phaser.GameObjects.Sprite []}
         */
        this.enemies = null;
    }

    doDamage(atacker) {}

    /**
     * This method will perform the atack routine, checking for enemies within range
     * @param { Phaser.GameObjects.Sprite } atacker the atacker.
     */
    atack(atacker) {
        if (atacker.canAtack) {
            atacker.isAtacking = true;
            // if (atacker instanceof Player) {
            //     atacker.walkDust.on = false;
            // }
            atacker.walkDust.on = false;
            atacker.body.maxSpeed = 0;
            const currrentAnimation = atacker.anims.currentAnim.key;
            const atackAnimation = currrentAnimation.split('-');
            const animation = atacker.anims.play(
                `${this.atkPrefixAnimation}-${atackAnimation[1]}`,
                true
            );

            animation.once(
                'animationcomplete',
                (done) => {
                    atacker.isAtacking = false;
                    atacker.body.maxSpeed = atacker.speed;
                },
                this
            );
            /**
             * 1 - Animate
             * 2 - Dispatch the Slashes
             * 3 - Check for Slash and enemies collision.
             * 4 - Deal the Damages.
             */
        }
    }
}
