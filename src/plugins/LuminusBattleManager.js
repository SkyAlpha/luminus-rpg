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

        /**
         * The name of the animations of atack
         * @type { string [] }
         * @default
         */
        this.atackSoundAnimationNames = ['atack01', 'atack02', 'atack03'];

        /**
         * The name of the default
         * @type { object }
         * @default
         */
        this.atackDirectionFrameName = {
            up: 'up',
            right: 'right',
            down: 'down',
            left: 'left',
        };

        /**
         * The velocity that the hitbox will assume as soon as it's created.
         * @type { number }
         * @default
         */
        this.hitboxVelocity = 10;

        /**
         * This is the amount that the hitbox will be farther from the player. The greater the closer, for it's dividing the body height of the atacker
         * @example
         * const offset = atacker.hitZone.body.height / this.hitboxOffsetDividerY;
         * @type { number }
         * @default
         */
        this.hitboxOffsetDividerY = 1.5;

        /**
         * This is how much the hitbox atack body should be offset from it's original position.
         * @type { number }
         * @default
         */
        this.hitboxOffsetBody = 4;

        /**
         * The name of the hitbox Sprite.
         * @type { string }
         */
        this.hitboxSpriteName = 'slash';
    }

    /**
     * This function creates the hitbox. You should be aware that every hitbox will be different based on your game. This
     * template uses a 16x16 hitbox sprite.
     * @param { Phaser.Physics.Arcade.Sprite } atacker The atacker
     */
    createHitBox(atacker) {
        const hitbox = atacker.scene.physics.add.sprite(
            atacker.x,
            atacker.y,
            this.hitboxSpriteName,
            0
        );

        hitbox.alpha = 0.4;
        hitbox.depth = 50;
        if (atacker.frame.name.includes(this.atackDirectionFrameName.up)) {
            hitbox.body.setOffset(0, 4);
            const rotation = -1.57;
            hitbox.setRotation(rotation);
            hitbox.setPosition(
                atacker.x,
                atacker.y -
                    atacker.hitZone.body.height / this.hitboxOffsetDividerY
            );
            atacker.scene.physics.velocityFromRotation(
                rotation,
                this.hitboxVelocity,
                hitbox.body.velocity
            );
        } else if (
            atacker.frame.name.includes(this.atackDirectionFrameName.right)
        ) {
            hitbox.body.setOffset(-4, 0);
            const rotation = 0;
            hitbox.setRotation(rotation);
            hitbox.setPosition(
                atacker.x + atacker.hitZone.body.width,
                atacker.y
            );
            atacker.scene.physics.velocityFromRotation(
                rotation,
                this.hitboxVelocity,
                hitbox.body.velocity
            );
        } else if (
            atacker.frame.name.includes(this.atackDirectionFrameName.down)
        ) {
            hitbox.body.setOffset(0, -4);
            const rotation = 1.57;
            hitbox.setRotation(rotation);
            hitbox.setPosition(
                atacker.x,
                atacker.y +
                    atacker.hitZone.body.height / this.hitboxOffsetDividerY
            );
            atacker.scene.physics.velocityFromRotation(
                rotation,
                this.hitboxVelocity,
                hitbox.body.velocity
            );
        } else if (
            atacker.frame.name.includes(this.atackDirectionFrameName.left)
        ) {
            hitbox.body.setOffset(4, 0);
            const rotation = -3.14;
            hitbox.setRotation(rotation);
            hitbox.setPosition(
                atacker.x - atacker.hitZone.body.width,
                atacker.y
            );
            atacker.scene.physics.velocityFromRotation(
                rotation,
                this.hitboxVelocity,
                hitbox.body.velocity
            );
        }
        return hitbox;
    }

    /**
     * This method will perform the atack routine, checking for enemies within range.
     * The atacker should have a body in order to stop him from walking as the movement is expected to be done with Velocity.
     * @param { Phaser.Physics.Arcade.Sprite } atacker the atacker.
     */
    atack(atacker) {
        if (atacker.canAtack) {
            atacker.isAtacking = true;
            atacker.canAtack = false;
            atacker.walkDust.on = false;
            atacker.body.maxSpeed = 0;
            const currrentAnimation = atacker.anims.currentAnim.key;
            const atackAnimation = currrentAnimation.split('-');
            const animationName = this.atackSoundAnimationNames[
                Math.floor(Math.random() * this.atackSoundAnimationNames.length)
            ];
            const hitBoxSprite = this.createHitBox(atacker);
            hitBoxSprite.anims.play('slash');
            // const slashAnimation = atacker.scene.physics.add.sprite()
            // Animations events have to come before the animation is played, they are triggered propperly.
            atacker.once(
                `animationstart-${this.atkPrefixAnimation}-${atackAnimation[1]}`,
                (start) => {
                    console.log('Animation Start');
                    atacker.scene.sound.add(animationName).play();
                }
            );

            atacker.once(
                `animationcomplete-${this.atkPrefixAnimation}-${atackAnimation[1]}`,
                (done) => {
                    console.log('Animation Complete');
                    atacker.isAtacking = false;
                    atacker.body.maxSpeed = atacker.speed;
                    atacker.canAtack = true; // Enables the atack once the player finishes the animation
                    hitBoxSprite.destroy();
                },
                this
            );

            atacker.anims.play(
                `${this.atkPrefixAnimation}-${atackAnimation[1]}`,
                true
            );

            /**
             * - Animate. OK
             * - Add Sound When Atacking. OK
             * - Dispatch the Slashes.
             * - Check for Slash and enemies collision.
             * - Deal the Damages.
             */
        }
    }
}
