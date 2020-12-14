import { AnimationNames } from '../consts/AnimationNames';
import PhaserJuice from 'phaser3-juice-plugin';
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
         * The name of the SFX of the atack being performed.
         * @type { string [] }
         * @default
         */
        this.atackSoundAnimationNames = ['atack01', 'atack02', 'atack03'];

        /**
         * The name of the SFX of a damage being done.
         * @type { string [] }
         * @default
         */
        this.damageSoundNames = ['damage01', 'damage02', 'damage03'];

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
         * @default
         */
        this.hitboxSpriteName = 'slash';

        /**
         * The pluginthat will make the hit effect to the player and enemy.
         * @type { PhaserJuice }
         */
        this.phaserJuice = null;
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
            this.setHitboxRotation(
                hitbox,
                rotation,
                {
                    x: atacker.x,
                    y:
                        atacker.y -
                        atacker.hitZone.body.height / this.hitboxOffsetDividerY,
                },
                atacker
            );
        } else if (
            atacker.frame.name.includes(this.atackDirectionFrameName.right)
        ) {
            hitbox.body.setOffset(-4, 0);
            const rotation = 0;
            this.setHitboxRotation(
                hitbox,
                rotation,
                { x: atacker.x + atacker.hitZone.body.width, y: atacker.y },
                atacker
            );
        } else if (
            atacker.frame.name.includes(this.atackDirectionFrameName.down)
        ) {
            hitbox.body.setOffset(0, -4);
            const rotation = 1.57;
            this.setHitboxRotation(
                hitbox,
                rotation,
                {
                    x: atacker.x,
                    y:
                        atacker.y +
                        atacker.hitZone.body.height / this.hitboxOffsetDividerY,
                },
                atacker
            );
        } else if (
            atacker.frame.name.includes(this.atackDirectionFrameName.left)
        ) {
            hitbox.body.setOffset(4, 0);
            const rotation = -3.14;
            this.setHitboxRotation(
                hitbox,
                rotation,
                { x: atacker.x - atacker.hitZone.body.width, y: atacker.y },
                atacker
            );
        }
        return hitbox;
    }

    /**
     * Sets position of the sprite for a given rotation. The rotation should match the atack direction that you want.
     * @param { Phaser.Physics.Arcade.Sprite } hitbox The hitbox sprite that will changed
     * @param { number } rotation The rotation in radians
     * @param { Object } position The new position of the
     * @param { Phaser.Physics.Arcade.Sprite } atacker The atacker to get the scene from.
     */
    setHitboxRotation(hitbox, rotation, position, atacker) {
        hitbox.setRotation(rotation);
        hitbox.setPosition(position.x, position.y);
        atacker.scene.physics.velocityFromRotation(
            rotation,
            this.hitboxVelocity,
            hitbox.body.velocity
        );
    }

    /**
     * This method will perform the atack routine, checking for enemies within range.
     * The atacker should have a body in order to stop him from walking as the movement is expected to be done with Velocity.
     * @param { Phaser.Physics.Arcade.Sprite } atacker the atacker.
     */
    atack(atacker) {
        if (atacker.canAtack) {
            this.phaserJuice = new PhaserJuice(
                atacker.scene,
                atacker.scene.plugins
            );
            atacker.isAtacking = true;
            atacker.canAtack = false;
            atacker.walkDust.on = false;
            atacker.body.maxSpeed = 0;
            const currrentAnimation = atacker.anims.currentAnim.key;
            const atackAnimation = currrentAnimation.split('-');
            // Randomizes the name of the atack sound.
            const animationName = this.atackSoundAnimationNames[
                Math.floor(Math.random() * this.atackSoundAnimationNames.length)
            ];
            // Randomizes the name of the damage sound.
            const damageName = this.damageSoundNames[
                Math.floor(Math.random() * this.damageSoundNames.length)
            ];
            const hitBoxSprite = this.createHitBox(atacker);
            hitBoxSprite.anims.play('slash');
            // Animations events have to come before the animation is played, they are triggered propperly.
            atacker.once(
                `animationstart-${this.atkPrefixAnimation}-${atackAnimation[1]}`,
                (start) => {
                    atacker.scene.sound.add(animationName).play();
                }
            );
            let canDamage = true;
            atacker.on(
                `animationupdate-${this.atkPrefixAnimation}-${atackAnimation[1]}`,
                (start) => {
                    atacker.scene.physics.overlap(
                        hitBoxSprite,
                        atacker.scene.enemies,
                        (h, e) => {
                            canDamage = false;
                            this.phaserJuice.add(e).flash();
                            atacker.scene.sound.add(damageName).play();
                            setTimeout((t) => {
                                if (e) {
                                    e.anims.stop();
                                    e.destroy();
                                }
                            }, 400);
                        },
                        (controler) => {
                            return canDamage;
                        }
                    );
                }
            );

            atacker.once(
                `animationcomplete-${this.atkPrefixAnimation}-${atackAnimation[1]}`,
                (done) => {
                    atacker.isAtacking = false;
                    atacker.body.maxSpeed = atacker.speed;
                    atacker.canAtack = true; // Enables the atack once the player finishes the animation
                    canDamage = true;
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