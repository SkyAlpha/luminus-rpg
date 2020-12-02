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

        /**
         * Defines the hitzone width.
         * @type { number }
         */
        this.hitZoneWidth = 12;

        /**
         * Defines the hitzone height.
         * @type { number }
         */
        this.hitZoneHeigth = 21;

        /**
         * Defines the body width. This will be used to check for collisions while moving.
         * @type { number }
         */
        this.bodyWidth = 12;

        /**
         * Defines the body width. This will be used to check for collisions while moving.
         * @type { number }
         */
        this.bodyHeight = 8;

        /**
         * Checks the body offset Y. Should be changed acconrdinglly to your sprite size.
         * @type { number }
         */
        this.bodyOffsetY = 20;

        /**
         * The zone that will interact as a hitzone.
         * @type { Phaser.GameObjects.Zone }
         */
        this.hitZone = this.scene.add.zone(
            this.x,
            this.y,
            this.width,
            this.height
        );

        // Initializes the physics.
        this.setPhysics();
    }

    /**
     * Initializes the physics
     */
    setPhysics() {
        this.scene.add.existing(this);
        this.scene.physics.add.existing(this);
        this.body.setSize(this.bodyWidth, this.bodyHeight);
        this.body.offset.y = this.bodyOffsetY;
        this.body.maxSpeed = this.speed;

        this.scene.physics.add.existing(this.hitZone);
        this.hitZone.body.setSize(this.hitZoneWidth, this.hitZoneHeigth);
    }

    /**
     * Updates all dependencies that are required by the game.
     * You should put any updates that require movement iteraction here.
     */
    updateMovementDependencies() {
        if (this.hitZone) {
            this.hitZone.x = this.x;
            this.hitZone.y = this.y;
        }
    }
}
