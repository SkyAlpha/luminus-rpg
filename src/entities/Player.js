import Phaser, { Game, GameObjects } from 'phaser';
import { AttributesManager } from '../plugins/attributes/AttributesManager';
import { ENTITIES } from '../consts/Entities';
import { LuminusHUDProgressBar } from '../plugins/HUD/LuminusHUDProgressBar';
import { LuminusHealthBar } from '../plugins/LuminusHealthBar';
import { LuminusKeyboardMouseController } from '../plugins/LuminusKeyboardMouseController';
import { LuminusMovement } from '../plugins/LuminusMovement';
import { BaseEntity } from './BaseEntity';
import { EntityAttributes } from './EntityAttributes';

/**
 * @class
 * @extends Phaser.Physics.Arcade.Sprite
 * {@link https://photonstorm.github.io/phaser3-docs/Phaser.Physics.Arcade.Sprite.html| Docs}
 * @extends BaseEntity
 * @extends EntityStatus
 */
export class Player extends Phaser.Physics.Arcade.Sprite {
    constructor(scene, x, y, texture, map) {
        super(scene, 0, 0, texture);

        // Has to call this method, so the animations work propperly.
        this.addToUpdateList();

        // Here are all classes that this Player Extends.
        Object.assign(this, BaseEntity);
        /**
         * The entity attributes.
         * @type { EntityAttributes }
         */
        this.attributes = {};
        Object.assign(this.attributes, EntityAttributes);

        /**
         * The Attributes Manager.
         * @type { AttributesManager }
         */
        this.attributesManager = new AttributesManager(this.scene, this);

        /**
         * The name of the Entity. It's used for differenciation of the entityes.
         * @type { string }
         */
        this.entityName = ENTITIES.Player;

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
        this.bodyOffsetY = 2;

        // TODO - Should get the player's items when he starts the game.
        /**
         * An Array with the Item ID's and the number of that specific Item that the player has.
         * @type { object }
         */
        this.items = [];

        /**
         * The zone that will interact as a hitzone.
         * @type { Phaser.GameObjects.Zone }
         */
        this.hitZone = this.scene.add.zone(0, 0, this.width, this.height);

        // TODO - Change the offsets to a JSON file or DataBase so it's not HardCoded.
        /**
         * The Health Bar.
         * @type { LuminusHealthBar }
         */
        this.healthBar = new LuminusHealthBar(
            this.scene,
            0,
            0,
            this.width * 2,
            this.attributes.baseHealth,
            this.width / 2.2,
            -(this.height / 2)
        );

        /**
         * @type { LuminusHUDProgressBar }
         */
        this.luminusHUDProgressBar = null;

        /**
         * The particle name of the Sprite / Texture to be used for the the dust movement.
         * @type { string }
         * @default
         */
        this.dustParticleName = 'walk_dust';

        this.setDepth(1);

        /**
         * The class responsible for managing Keyboard and Mouse inputs.
         * @type { LuminusKeyboardMouseController }
         */
        this.luminusKeyboardMouseController = new LuminusKeyboardMouseController(this.scene, this);
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
        this.luminusMovement = new LuminusMovement(this.scene, this, this.joystickScene);

        this.play('character-idle-down');

        /**
         * The container that holds the player game objects.
         * @type { Phaser.GameObjects.Container }
         */
        this.container = new Phaser.GameObjects.Container(this.scene, x, y, [this, this.healthBar, this.hitZone]);

        // Initializes the physics.
        this.setPhysics();
        /**
         * The dust particles that the entity will emit when it moves.
         * @type { Phaser.GameObjects.Particles }
         */
        this.walkDust = this.scene.add
            .particles(this.dustParticleName)
            .setDepth(0)
            .createEmitter({
                follow: this.container,
                speed: 2,
                scale: { start: 0.1, end: 0.25 },
                frequency: 300,
                quantity: 20,
                lifespan: 1000,
                rotate: { min: 0, max: 360 },
                alpha: { start: 1, end: 0 },
                followOffset: {
                    y: 10,
                },
            });

        this.walkDust.on = false;
        // All the dependencies that need to be inside the update game loop.
        this.scene.events.on('update', this.onUpdate, this);
        this.walkDust.x;
    }

    /**
     * The default pre update method from the Sprite Game Object.
     */
    preUpdate(time, delta) {
        super.preUpdate(time, delta);
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
        // this.scene.add.existing(this);
        this.scene.physics.add.existing(this);
        this.body.setSize(this.bodyWidth, this.bodyHeight);
        this.body.offset.y = this.height / 1.8;
        this.body.maxSpeed = this.speed;

        this.scene.add.existing(this.container);
        this.scene.physics.add.existing(this.container);
        this.container.body.setSize(this.bodyWidth, this.bodyHeight);
        this.container.body.offset.y = this.bodyOffsetY;
        this.container.body.offset.x = -(this.bodyWidth / 2);
        this.container.body.maxSpeed = this.speed;

        this.scene.physics.add.existing(this.hitZone);
        this.hitZone.body.setSize(this.hitZoneWidth, this.hitZoneHeigth);

        // Debug color lines.
        this.container.body.debugBodyColor = 0xffffff;
        this.body.debugBodyColor = 0xffff00;
    }

    /**
     * Destroys all the sprite dependencies.
     */
    destroyAll() {
        this.container.destroy();
        this.destroy();
    }

    /**
     * Updates all dependencies that are required by the game.
     * You should put any updates that require movement iteraction here.
     */
    updateMovementDependencies() {
        // if (this.hitZone) {
        //     this.hitZone.x = this.x;
        //     this.hitZone.y = this.y;
        // }
    }
}
