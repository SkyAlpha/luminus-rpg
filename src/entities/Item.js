import Phaser from 'phaser';
import { v4 as uuidv4 } from 'uuid';
import { DB_SEED_ITEMS } from '../consts/DB_SEED/Items';
import { PlayerConfig } from '../consts/player/Player';
import { LuminusConsumableManager } from '../plugins/LuminusConsumableManager';
import { Player } from './Player';

/**
 * This class is the core of an Item. Here you can configure all aspects of it.
 * @class
 */
export class Item extends Phaser.Physics.Arcade.Sprite {
    constructor(scene, x, y, id) {
        const itemConfig = DB_SEED_ITEMS.find((i) => i.id === id);
        super(scene, x, y, itemConfig.texture);
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
         * Controls if an Item if Stackable.
         * @type { boolean }
         */
        this.stackable = itemConfig.stackable;

        /**
         * This is used to scale the item in the Inventory system.
         * @type { number }
         */
        this.inventoryScale = itemConfig.inventoryScale;

        /**
         * The Sound effect that will be played when the item is used.
         * @type { string }
         */
        this.useSfx = itemConfig.sfx;

        // Adds to the Scene.
        this.scene.add.existing(this);
        this.scene.physics.add.existing(this);

        /**
         * The name of the player variable in the Scene that the player is gaming.
         * @type { string }
         */
        this.scenePlayerVariableName = PlayerConfig.variableName;

        /**
         * The Class responsible for managing consumable items.
         * @type { LuminusConsumableManager }
         */
        this.luminusConsumableManager = new LuminusConsumableManager();

        this.pickItemLogic();
    }

    /**
     * Picks up an item when collides with it.
     */
    pickItemLogic() {
        // Prevents the Player from getting more than one item.
        let canCollide = true;
        this.scene.physics.add.collider(
            this,
            this.scene[this.scenePlayerVariableName],
            /**
             * @param { Item } item the Item that is being picked up.
             * @param { Player } player The player that is picking the item up.
             */
            (item, player) => {
                canCollide = false;
                // Plays the sound of picking up Items.
                this.scene.sound.play('get_items');
                // TODO - Player Pickup the item.
                this.scene.tweens.add({
                    targets: item,
                    props: {
                        x: player.container.x,
                        y: player.container.y,
                        scale: 0.2,
                    },
                    onComplete: (tween) => {
                        if (tween.totalProgress === 1) item.addInventory(player);
                    },
                    ease: 'Quad',
                    duration: 350,
                });
            },
            () => canCollide
        );
    }

    /**
     * Adds an Item to the player's inventory.
     * @param { Player } player
     */
    addInventory(player) {
        let hasItem = false;
        player.items.map((item) => {
            if (this.commonId === item.id) {
                hasItem = true;
                item.count++;
            }
        });
        if (!hasItem) {
            player.items.push({
                id: this.commonId,
                count: 1,
            });
        }
        // Destroy the item that the player has just picked up.
        this.destroy();
    }

    // TODO - Change to on click event so the player can use the potion from the inventory.
    consume(player) {
        this.luminusConsumableManager.useItem(this, player);
    }
}
