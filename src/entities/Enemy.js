import Phaser from 'phaser';
import { LuminusHealthBar } from '../plugins/LuminusHealthBar';
import { BaseEntity } from './BaseEntity';
import { EntityStatus } from './EntityStatus';

export class Enemy extends Phaser.Physics.Arcade.Sprite {
    /**
     * The Phaser Scene that this Enemy is a child.
     * @param { Phaser.Scene } scene the parent scene of this enemy.
     * @extends BaseEntity
     * @extends EntityStatus
     */
    constructor(scene, x, y, texture) {
        super(scene, x, y, texture);
        Object.assign(this, BaseEntity);
        Object.assign(this, EntityStatus);

        /**
         * The phaser scene that this Enemy is a child of.
         * @type { Phaser.Scene }
         */
        this.scene = scene;

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

        this.container = new Phaser.GameObjects.Container(this.scene, x, y, [
            this,
            this.healthBar,
        ]);

        this.scene.add.existing(this.container);

        const idleAnimation = texture
            ? `${texture}-idle-down`
            : `bat-idle-down`;
        this.anims.play(idleAnimation);
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
