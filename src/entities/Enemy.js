import Phaser from 'phaser';
import { AnimationNames } from '../consts/AnimationNames';
import { LuminusAnimationManager } from '../plugins/LuminusAnimationManager';
import { LuminusHealthBar } from '../plugins/LuminusHealthBar';
import { BaseEntity } from './BaseEntity';
import { EntityStatus } from './EntityStatus';
import { Player } from './Player';
import uniqid from 'uniqid';
import { LuminusBattleManager } from '../plugins/LuminusBattleManager';
import { ENTITIES } from '../consts/Entities';
import { LuminusDropSystem } from '../plugins/LuminusDropSystem';
import { EnemiesSeedConfig } from '../consts/enemies/EnemiesSeedConfig';

/**
 * @class
 * The enemy class.
 * @param { Phaser.Scene } scene the parent scene of this enemy.
 * @extends BaseEntity
 * @extends EntityStatus
 * @extends AnimationNames
 * @extends LuminusDropSystem
 */
export class Enemy extends Phaser.Physics.Arcade.Sprite {
    constructor(scene, x, y, texture, id) {
        super(scene, 0, 0, texture);
        // TODO - Should get the config from the DB.
        const enemyConfig = EnemiesSeedConfig.find((c) => c.id === id);
        Object.assign(this, BaseEntity);
        Object.assign(this, EntityStatus);
        Object.assign(this, new AnimationNames());

        /**
         * The name of the Entity. It's used for differenciation of the entityes.
         * @type { string }
         */
        this.entityName = ENTITIES.Enemy;

        /**
         * The phaser scene that this Enemy is a child of.
         * @type { Phaser.Scene }
         */
        this.scene = scene;

        /**
         * the unique ID of the enemy.
         * @type { string }
         */
        this.id = uniqid();

        /**
         * the Base ID of the item in the Seed Config..
         * @type { string }
         */
        this.commonId = enemyConfig.id;

        /**
         * The Base Health of the Enemy.
         * @type { number }
         */
        this.baseHealth = enemyConfig.baseHealth;

        /**
         * The Atack of the Enemy.
         * @type { number }
         */
        this.atack = enemyConfig.atack;

        /**
         * The defense of the Enemy.
         * @type { number }
         */
        this.defense = enemyConfig.defense;

        /**
         * The enemy movement speed in pixels per second.
         * @type { number }
         */
        this.speed = enemyConfig.speed;

        /**
         * An Array with the Item ID and Drop chance in percentage
         * @type { Array }
         */
        this.drops = enemyConfig.drops;

        /**
         * The luminus animation manager.
         * @type { LuminusAnimationManager }
         */
        this.luminusAnimationManager = new LuminusAnimationManager(this);

        this.luminusBattleManager = new LuminusBattleManager();

        /**
         * The zone that will interact as a hitzone.
         * @type { Phaser.GameObjects.Zone }
         */
        this.hitZone = this.scene.add.zone(0, 0, this.width, this.height);
        this.scene.physics.add.existing(this.hitZone);

        // TODO - Change the offsets to a JSON file or DataBase so it's not HardCoded.
        this.healthBar = new LuminusHealthBar(
            this.scene,
            0,
            0,
            this.width,
            this.health,
            this.width / 4,
            -this.height * 1.3
        );

        this.x = 0;
        this.y = 0;

        this.scene.add.existing(this);
        this.scene.physics.add.existing(this);
        this.body.setSize(this.body.width, this.body.height);
        this.body.immovable = true;

        /**
         * A container that holds the objects that should be moved together.
         * @type { Phaser.GameObjects.Container }
         */
        this.container = new Phaser.GameObjects.Container(this.scene, x, y, [
            this,
            this.healthBar,
            this.hitZone,
        ]);

        this.scene.add.existing(this.container);
        this.scene.physics.add.existing(this.container);

        const idleDown = `${this.idlePrefixAnimation}${this.downAnimationSufix}`;
        const idleAnimation = texture
            ? `${texture}-${idleDown}`
            : `bat-${idleDown}`;

        this.anims.play(idleAnimation);
        // All the dependencies that need to be inside the update game loop.
        this.scene.events.on('update', this.onUpdate, this);
        Object.assign(this, new LuminusDropSystem(scene, this, enemyConfig));
    }

    /**
     * This method is called every game loop. Anything that depends on it (update game loop method) should be put in here.
     */
    onUpdate() {
        if (this && this.body) {
            this.checkPlayerInRange();
        }
    }

    /**
     * Checks if the player is in range. If it is, then move the enemy towards him.
     */
    checkPlayerInRange() {
        let inRange = false;
        let enemiesInRange = this.scene.physics.overlapCirc(
            this.container.x,
            this.container.y,
            this.perceptionRange
        );
        for (let target of enemiesInRange) {
            if (
                target &&
                target.gameObject &&
                target.gameObject.entityName === ENTITIES.Player
            ) {
                // console.log('Player');
                let overlaps = false;
                this.scene.physics.overlap(
                    target.gameObject.hitZone,
                    this,
                    (t, enemy) => {
                        overlaps = true;
                        this.stopMovement();
                        if (this.canAtack)
                            this.luminusBattleManager.atack(this);
                    }
                );

                inRange = true;
                // Moves only if it's not overlaped. It prevents some Weird behaviors to happen.
                if (!overlaps && !this.isAtacking) {
                    this.scene.physics.moveToObject(
                        this.container,
                        target.gameObject.container,
                        this.speed
                    );

                    const angle = Math.atan2(
                        this.container.body.velocity.y,
                        this.container.body.velocity.x
                    );

                    this.scene.physics.velocityFromAngle(angle, this.speed);
                    this.luminusAnimationManager.animateWithAngle(
                        `${this.texture.key}-${this.walkPrefixAnimation}`,
                        angle
                    );
                    this.changeBodySize(this.width, this.height);
                }

                // console.log(this.container.body.velocity);
            }
        }
        if (!inRange) {
            this.stopMovement();
        }
    }

    /**
     * Stops all movement of the entity.
     */
    stopMovement() {
        this.container.body.setAcceleration(0, 0);
        this.container.body.setVelocity(0, 0);
        this.luminusAnimationManager.setIdleAnimation();
        this.changeBodySize(this.width, this.height);
    }

    /**
     * Changes the Sprite and Container Body sizes.
     * @param { number } width The new body width of the sprite.
     * @param { number } height The new body height of the sprite.
     */
    changeBodySize(width, height) {
        this.body.setSize(width, height);
        this.hitZone.body.setSize(width, height);
        this.container.body.setSize(width, height);
        this.container.body.setOffset(-(width / 2), -(height / 2));
    }

    /**
     * Destroys all the sprite dependencies.
     */
    destroyAll() {
        this.healthBar.destroy();
        this.container.destroy();
        this.destroy();
    }
}
