import Phaser from 'phaser';
import { AnimationNames } from '../consts/AnimationNames';
import { LuminusAnimationManager } from '../plugins/LuminusAnimationManager';
import { LuminusHealthBar } from '../plugins/LuminusHealthBar';
import { BaseEntity } from './BaseEntity';
import { EntityStatus } from './EntityStatus';
import { Player } from './Player';

export class Enemy extends Phaser.Physics.Arcade.Sprite {
    /**
     * The Phaser Scene that this Enemy is a child.
     * @param { Phaser.Scene } scene the parent scene of this enemy.
     * @extends BaseEntity
     * @extends EntityStatus
     * @extends AnimationNames
     */
    constructor(scene, x, y, texture) {
        super(scene, x, y, texture);
        Object.assign(this, BaseEntity);
        Object.assign(this, EntityStatus);
        Object.assign(this, new AnimationNames());

        /**
         * The phaser scene that this Enemy is a child of.
         * @type { Phaser.Scene }
         */
        this.scene = scene;

        /**
         * The luminus animation manager.
         * @type { LuminusAnimationManager }
         */
        this.luminusAnimationManager = new LuminusAnimationManager(this);

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
        ]);

        this.scene.add.existing(this.container);
        this.scene.physics.add.existing(this.container);

        const idleAnimation = texture
            ? `${texture}-idle-down`
            : `bat-idle-down`;

        this.anims.play(idleAnimation);
        // All the dependencies that need to be inside the update game loop.
        this.scene.events.on('update', this.onUpdate, this);
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
        const angle = Math.atan2(
            this.container.body.velocity.y,
            this.container.body.velocity.x
        );
        for (let target of enemiesInRange) {
            if (target.gameObject.constructor.name === 'Player') {
                let overlaps = false;
                this.scene.physics.overlap(
                    target.gameObject.hitZone,
                    this,
                    (t, enemy) => {
                        overlaps = true;
                        this.stopMovement();
                    }
                );
                inRange = true;
                // Moves only if it's not overlaped. It prevents some Weird behaviors to happen.
                if (!overlaps) {
                    this.scene.physics.moveToObject(
                        this.container,
                        target.gameObject,
                        30
                    );
                    this.luminusAnimationManager.animateWithAngle(
                        this.texture.key + '-' + this.walkPrefixAnimation,
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
