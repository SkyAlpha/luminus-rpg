import Phaser from 'phaser';
import { v4 as uuidv4 } from 'uuid';
import { DB_SEED_ITEMS } from '../consts/DB_SEED/Items';
import { LuminusConsumableManager } from '../plugins/LuminusConsumableManager';

/**
 * This class is the core of an Item. Here you can configure all aspects of it.
 * @class
 */
export class Item extends Phaser.Physics.Arcade.Sprite {
    constructor(scene, x, y, texture, id) {
        super(scene, x, y, texture);
        /**
         * Scene Context.
         * @type { Phaser.Scene }
         */
        this.scene = scene;

        /**
         * The unique id of an Item.
         * @type { string }
         * @default
         */
        this.id = uuidv4();

        // TODO - Gets all configurations and Sets it to the Item.
        const itemConfig = DB_SEED_ITEMS.find((i) => i.texture === texture);

        /**
         * The common ID Between items. This is also used for stackable items.
         * @type { string }
         */
        this.commonId = itemConfig.id;

        /**
         * The name of the item.
         * @type { string }
         * @default
         */
        this.name = itemConfig.name;

        /**
         * The item type.
         * @type { Enumerator }
         * @default
         */
        this.type = itemConfig.type;

        /**
         * The description of the item.
         * @type { string }
         * @default
         */
        this.description = itemConfig.description;

        /**
         * This is the script of the item. Performs healing, buffs, etc.
         * TODO - Update with the how to create Scripts.
         * @type { string }
         * @default
         */
        this.script = itemConfig.script;

        /**
         * The Sound effect that will be played when the item is used.
         * @type { string }
         */
        this.useSfx = itemConfig.sfx;

        // Adds to the Scene.
        this.scene.add.existing(this);
        this.scene.physics.add.existing(this);

        /**
         * The Class responsible for managing consumable items.
         * @type { LuminusConsumableManager }
         */
        this.luminusConsumableManager = new LuminusConsumableManager();
    }

    // TODO - Change to on click event so the player can use the potion from the inventory.
    consume(player) {
        this.luminusConsumableManager.useItem(this, player);
    }
}
