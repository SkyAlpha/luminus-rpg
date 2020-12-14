import Phaser from 'phaser';

export class Enemy extends Phaser.Physics.Arcade.Sprite {
    /**
     * The Phaser Scene that this Enemy is a child.
     * @param { Phaser.Scene } scene
     */
    constructor(scene, x, y, texture) {
        super(scene, x, y, texture);

        /**
         * The phaser scene that this Enemy is a child of.
         * @type { Phaser.Scene }
         */
        this.scene = scene;

        this.scene.add.existing(this);
        this.scene.physics.add.existing(this);
        this.body.setSize(this.body.width, this.body.height);
        this.body.immovable = true;
    }
}
