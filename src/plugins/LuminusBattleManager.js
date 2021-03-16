import { AnimationNames } from '../consts/AnimationNames';
import PhaserJuice from 'phaser3-juice-plugin';
import { Enemy } from '../entities/Enemy';
import { Player } from '../entities/Player';
import Phaser from 'phaser';
import { ENTITIES } from '../consts/Entities';
import { LuminusDamageDisplay } from './LuminusDamageDisplay';

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
         * The name of the variables that the battle scene will look for to do overlaps and deal damage to the Enemy.
         * @type { string }
         * @default
         */
        this.enemiesVariableName = 'enemies';

        /**
         * The name of the variables that the battle scene will look for to do overlaps and deal damage to the Player.
         * @type { string }
         * @default
         */
        this.playerVariableName = 'player';

        /**
         * The name of the SFX of the atack being performed.
         * @type { string[] }
         * @default
         */
        this.atackSoundAnimationNames = ['atack01', 'atack02', 'atack03'];

        /**
         * The name of the SFX of a damage being done.
         * @type { string[] }
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

        /**
         * The atack variation. This number represents a percentage of variation of the damage.
         * The damage can be higher than the base damage, or lower than the base damage.
         * @type { number }
         * @default
         */
        this.variation = 10;

        /**
         * The lifetime of the Enemy Hitbox.
         * This deifnes how long the Hitbox will keep moving towards the enemy.
         * @type { number }
         */
        this.enemyHitboxLifetime = 200;

        /**
         * The name of the Enemy Constructor Class.
         * @type { string }
         * @default
         */
        this.enemyConstructorName = ENTITIES.Enemy;

        /**
         * The name of the Player Constructor Class.
         * @type { string }
         * @default
         */
        this.PlayerConstructorName = ENTITIES.Player;

        /**
         * The LuminusDamageDisplay class, responsible for showing the player the damage dealth to a given Entity / Enemy.
         * @type { LuminusDamageDisplay }
         */
        this.luminusDisplayDamage = null;
    }

    /**
     * This function creates the hitbox. You should be aware that every hitbox will be different based on your game. This
     * template uses a 16x16 hitbox sprite.
     * @param { Phaser.Physics.Arcade.Sprite } atacker The atacker
     */
    createHitBox(atacker) {
        const hitbox = atacker.scene.physics.add.sprite(
            atacker.container.x,
            atacker.container.y,
            this.hitboxSpriteName,
            0
        );

        hitbox.body.debugBodyColor = 0xff00ff;

        hitbox.alpha = 0.3;
        hitbox.depth = 50;
        if (atacker.frame.name.includes(this.atackDirectionFrameName.up)) {
            hitbox.body.setOffset(0, 4);
            const rotation = -1.57;
            this.setHitboxRotation(
                hitbox,
                rotation,
                {
                    x: atacker.container.x,
                    y:
                        atacker.container.y -
                        atacker.hitZone.body.height / this.hitboxOffsetDividerY,
                },
                atacker
            );
        } else if (
            atacker.frame.name.includes(this.atackDirectionFrameName.right) &&
            !atacker.flipX
        ) {
            hitbox.body.setOffset(-4, 0);
            const rotation = 0;
            this.setHitboxRotation(
                hitbox,
                rotation,
                {
                    x: atacker.container.x + atacker.hitZone.body.width,
                    y: atacker.container.y,
                },
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
                    x: atacker.container.x,
                    y:
                        atacker.container.y +
                        atacker.hitZone.body.height / this.hitboxOffsetDividerY,
                },
                atacker
            );
        } else if (
            atacker.frame.name.includes(this.atackDirectionFrameName.left) ||
            atacker.flipX
        ) {
            hitbox.body.setOffset(4, 0);
            const rotation = -3.14;
            this.setHitboxRotation(
                hitbox,
                rotation,
                {
                    x: atacker.container.x - atacker.hitZone.body.width,
                    y: atacker.container.y,
                },
                atacker
            );
        }
        return hitbox;
    }

    /**
     * Sets position of the sprite for a given rotation. The rotation should match the atack direction that you want.
     * @param { Phaser.Physics.Arcade.Sprite } hitbox The hitbox sprite that will be changed.
     * @param { number } rotation The rotation in radians.
     * @param { Object } position The new position of the hitbox.
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
     * Damages the target and manages any dependencies like decreasing the health, killing the target and any other thing needed.
     * @param { Player } atacker Usually the atacker is the player.
     * @param { Enemy } target  Usually the target is the enemy.
     */
    takeDamage(atacker, target) {
        // Randomizes the name of the damage sound.
        const damageName = this.damageSoundNames[
            Math.floor(Math.random() * this.damageSoundNames.length)
        ];
        const damage = this.randomDamage(atacker.atack);
        if (damage - target.defense > 0) {
            if (target.healthBar)
                target.healthBar.decrease(damage - target.defense);
            target.health -= damage - target.defense;
        } else {
            target.health -= 1;
        }
        this.phaserJuice.add(target).flash();
        atacker.scene.sound.add(damageName).play();
        if (target.health <= 0) {
            setTimeout((t) => {
                target.anims.stop();
                target.destroyAll();
            }, 100);
        }

        // Not very Optimized.
        this.luminusDamageDisplay = new LuminusDamageDisplay(target.scene);
        this.luminusDamageDisplay.displayDamage(damage, target);
        /**
         * Makes random damage.
         * Decreses the health based on the target defense.
         * Updates the Health Bar.
         * Kills the target if it reaches the 0 or less hit points.
         */
    }

    /**
     * Generates a random damage to deal to the target.
     * @param { number } damage
     */
    randomDamage(damage) {
        let variationDamage = damage * (this.variation / 100);

        if (Math.random() > 0.5) {
            variationDamage = damage + variationDamage;
        } else {
            variationDamage = damage - variationDamage;
        }

        return Math.floor(variationDamage);
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
            if (atacker.walkDust) atacker.walkDust.on = false;
            atacker.container.body.maxSpeed = 0;
            const texture = atacker.texture.key;
            const currrentAnimation = atacker.anims.currentAnim.key;
            const atackAnimation = currrentAnimation.split('-');
            // Randomizes the name of the atack sound.
            const animationName = this.atackSoundAnimationNames[
                Math.floor(Math.random() * this.atackSoundAnimationNames.length)
            ];

            let hitBoxSprite;
            if (atacker.entityName === this.PlayerConstructorName) {
                hitBoxSprite = this.createHitBox(atacker);
                hitBoxSprite.anims.play(this.hitboxSpriteName);
            }

            // Stores the enemies that where atacked on the current animation.
            let atackedEnemies = [];
            // Destroys the slash atack if the atacker dies.
            atacker.scene.events.on('update', (update) => {
                if (
                    hitBoxSprite &&
                    hitBoxSprite.active &&
                    atacker &&
                    !atacker.active
                ) {
                    hitBoxSprite.destroy();
                }

                if (
                    hitBoxSprite &&
                    hitBoxSprite.active &&
                    atacker &&
                    atacker.active &&
                    atacker.entityName === this.PlayerConstructorName
                ) {
                    atacker.scene.physics.overlap(
                        hitBoxSprite,
                        atacker.scene[this.enemiesVariableName],

                        (h, e) => {
                            this.takeDamage(atacker, e);
                            e.canTakeDamage = false;
                            atacker.canAtack = false;
                            atackedEnemies.push(e);
                        },
                        (h, e) => {
                            return e.canTakeDamage;
                        }
                    );
                } else if (
                    hitBoxSprite &&
                    hitBoxSprite.active &&
                    atacker &&
                    atacker.active &&
                    atacker.entityName === this.enemyConstructorName
                ) {
                    atacker.scene.physics.overlap(
                        hitBoxSprite,
                        atacker.scene[this.playerVariableName].hitZone,
                        (h, e) => {
                            let enemy = atacker.scene[this.playerVariableName];
                            this.takeDamage(atacker, enemy);
                            enemy.canTakeDamage = false;
                            atackedEnemies.push(enemy);
                            atacker.canAtack = false;
                            // if (atacker.anims.getProgress() === 1) {
                            // }
                        },
                        (h, e) => {
                            let enemy = atacker.scene[this.playerVariableName];
                            return enemy.canTakeDamage;
                        }
                    );
                }
            });
            // Animations events have to come before the animation is played, they are triggered propperly.
            atacker.once(Phaser.Animations.Events.ANIMATION_START, (start) => {
                if (
                    start.key ===
                        `${texture}-${this.atkPrefixAnimation}-${atackAnimation[2]}` &&
                    atacker.entityName === this.PlayerConstructorName
                ) {
                    atacker.scene.sound.add(animationName).play();
                }
            });

            atacker.once(
                Phaser.Animations.Events.ANIMATION_COMPLETE,
                (animationState) => {
                    if (
                        animationState.key ===
                        `${texture}-${this.atkPrefixAnimation}-${atackAnimation[2]}`
                    ) {
                        atacker.isAtacking = false;
                        atacker.container.body.maxSpeed = atacker.speed;
                        atacker.canAtack = true; // Enables the atack once the player finishes the animation
                        if (atacker.entityName === this.enemyConstructorName) {
                            hitBoxSprite = this.createHitBox(atacker);
                            hitBoxSprite.anims.play(this.hitboxSpriteName);
                            setTimeout((time) => {
                                this.resetEnemyState(atackedEnemies);
                                hitBoxSprite.destroy();
                            }, this.enemyHitboxLifetime);
                        }

                        if (
                            hitBoxSprite &&
                            hitBoxSprite.active &&
                            atacker.entityName !== this.enemyConstructorName
                        )
                            hitBoxSprite.destroy();

                        this.resetEnemyState(atackedEnemies);
                    }
                },
                this
            );

            atacker.anims.play(
                `${texture}-${this.atkPrefixAnimation}-${atackAnimation[2]}`,
                true
            );
        }
    }

    /**
     * Resets the 'canTakeDamage' state to true.
     * @param { Phaser.Physics.Arcade.Sprite } atackedEnemies
     */
    resetEnemyState(atackedEnemies) {
        if (atackedEnemies && atackedEnemies.length) {
            atackedEnemies.forEach((e) => {
                e.canTakeDamage = true;
            });
        }
    }
}
