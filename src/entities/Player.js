import Phaser from 'phaser';

export class Player extends Phaser.GameObjects.Sprite {
    constructor(scene, x, y, texture) {
        super(scene, x, y, texture);
        /**
         * scene Scene Context.
         * @type { Phaser.Scene }  */
        this.scene = scene;
        /**
         * Maximum speed to be used for the player.
         * @type { number }
         */
        this.speed = 35;

        this.scene.add.existing(this);
        this.scene.physics.add.existing(this);
        this.body.maxSpeed = this.speed;
    }
}
