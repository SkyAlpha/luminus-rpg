import Phaser from 'phaser';

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
        this.id = id;

        // Gets all configurations and Sets it to the Item.

        /**
         * The name of the item.
         * @type { string }
         * @default
         */
        this.name = null;

        /**
         * The item type.
         * @type { Enumerator }
         * @default
         */
        this.type = null;

        /**
         * The description of the item.
         * @type { string }
         * @default
         */
        this.description = null;
    }
}
