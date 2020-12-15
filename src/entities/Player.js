import Phaser from 'phaser';
import { LuminusKeyboardMouseController } from '../plugins/LuminusKeyboardMouseController';
import { LuminusMovement } from '../plugins/LuminusMovement';
import { BaseEntity } from './BaseEntity';

/**
 * @class
 * @extends Phaser.GameObjects.Sprite
 * {@link https://photonstorm.github.io/phaser3-docs/Phaser.GameObjects.Sprite.html| Docs}
 * @extends BaseEntity
 */
export class Player extends Phaser.GameObjects.Sprite {
    constructor(scene, x, y, texture, map) {
        super(scene, x, y, texture);

        Object.assign(this, BaseEntity);

        /**
         * scene Scene Context.
         * @type { Phaser.Scene }  */
        this.scene = scene;

        /**
         * Maximum speed to be used for the player.
         * @type { number }
         * @default
         */
        this.speed = 70;

        /**
         * Defines the hitzone width.
         * @type { number }
         * @default
         */
        this.hitZoneWidth = 12;

        /**
         * Defines the hitzone height.
         * @type { number }
         * @default
         */
        this.hitZoneHeigth = 21;

        /**
         * Defines the body width. This will be used to check for collisions while moving.
         * @type { number }
         * @default
         */
        this.bodyWidth = 12;

        /**
         * Defines the body width. This will be used to check for collisions while moving.
         * @type { number }
         * @default
         */
        this.bodyHeight = 8;

        /**
         * Checks the body offset Y. Should be changed acconrdinglly to your sprite size.
         * @type { number }
         * @default
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

        /**
         * The particle name of the Sprite / Texture to be used for the the dust movement.
         * @type { string }
         * @default
         */
        this.dustParticleName = 'walk_dust';

        // /**
        //  * The dust particles that the entity will emit when it moves.
        //  * @type { Phaser.GameObjects.Particles }
        //  */
        this.walkDust = this.scene.add
            .particles(this.dustParticleName)
            .setDepth(0)
            .createEmitter({
                follow: this,
                speed: 2,
                scale: { start: 0.1, end: 0.25 },
                frequency: 300,
                quantity: 20,
                lifespan: 1000,
                rotate: { min: 0, max: 360 },
                alpha: { start: 1, end: 0.2 },
                followOffset: {
                    y: 10,
                },
            });

        this.setDepth(1);
        this.walkDust.on = false;

        /**
         * The class responsible for managing Keyboard and Mouse inputs.
         * @type { LuminusKeyboardMouseController }
         */
        this.luminusKeyboardMouseController = new LuminusKeyboardMouseController(
            this.scene,
            this
        );
        this.luminusKeyboardMouseController.create();

        this.scene.scene.launch('JoystickScene', {
            player: this,
            map: map,
        });

        /**
         * The Joystick Scene.
         * @type { JoystickScene }
         */
        this.joystickScene = this.scene.scene.get('JoystickScene');

        /**
         * This object is responsible for moving the entity.
         * @type { LuminusMovement }
         */
        this.luminusMovement = new LuminusMovement(
            this.scene,
            this,
            this.joystickScene
        );

        this.play('idle-down');

        // All the dependencies that need to be inside the update game loop.
        this.scene.events.on('update', this.onUpdate, this);
    }

    /**
     * This method is called every game loop. Anything that depends on it (update game loop method) should be put in here.
     */
    onUpdate() {
        this.updateMovementDependencies();
        if (this.luminusMovement) this.luminusMovement.move();
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
