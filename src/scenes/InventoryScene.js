import Phaser from 'phaser';
import { NineSlice } from 'phaser3-nineslice';
import { Item } from '../entities/Item';
import { Player } from '../entities/Player';

export class InventoryScene extends Phaser.Scene {
    constructor() {
        super({
            key: 'InventoryScene',
        });

        /**
         * The player that will have it's inventoro opened.
         * @type { Player }
         */
        this.player = null;

        /**
         * The name of the sprite texture of the Inventory Title.
         * @type { string }
         */
        this.inventoryTitleTexture = 'inventory_title';

        /**
         * The name of the sprite texture of the Inventory Background.
         * @type { string }
         * @default
         */
        this.inventoryBackgroundTexture = 'inventory_background';

        /**
         * The name of the sprite texture of the Inventory Slot.
         * @type { string }
         * @default
         */
        this.inventorySlotTexture = 'inventory_slot';

        /**
         * The name of the sprite texture of the Close Button.
         * @type { string }
         * @default
         */
        this.inventoryCloseTexture = 'close_button';

        /**
         * The Offset of the Nine Slice background. It's used to protect the background from streching.
         * It will make it responsive in any scale size without losing resolution.
         * @type { number }
         * @default
         */
        this.nineSliceOffset = 10;

        /**
         * The inventory background sprite.
         * @type { NineSlice }
         */
        this.inventoryBackground = null;

        /**
         * The inventory title sprite.
         * @type { Phaser.GameObjects.Image }
         */
        this.inventoryTitle = null;

        /**
         * The inventory title sprite.
         * @type { Phaser.GameObjects.Image }
         */
        this.inventoryTitleText = null;

        /**
         * The inventory slots sprite.
         * @type { NineSlice[] }
         */
        this.inventorySlots = null;

        /**
         * The Close button image.
         * @type { Phaser.GameObjects.Image }
         */
        this.closeButton = null;

        /**
         * The slots and its content.
         * @type { Array }
         */
        this.slots = [];

        /**
         * The screen padding of the inventory when it's Mobile.
         * @type { number }
         * @default
         */
        this.screenPaddingMobile = 15;

        /**
         * The padding between the Background edge and the Slots.
         * @type { number }
         * @default
         */
        this.backgroundSlotPadding = 25;

        /**
         * The Padding of the Slots to the Top of the Inventory Background.
         * @type { number }
         * @default
         */
        this.backgroundSlotPaddingTop = 100;

        /**
         * The Padding of the Slots to the Bottom of the Inventory Background.
         * @type { number }
         * @default
         */
        this.backgroundSlotPaddingBottom = 20;

        /**
         * The margin between inventory slots.
         * @type { numbe }
         * @default
         */
        this.slotMargin = 10;

        /**
         * The size of the Slot. Width and Height.
         * @type { number }
         * @default
         */
        this.slotSize = 53;

        /**
         * Default font size of the Title Text.
         * @type { number }
         * @default
         */
        this.titleTextFontSize = 13;

        /**
         * The default font family of the Inventory Text.
         * @type { string }
         * @default
         */
        this.titleFontFamily = "'Press Start 2P'";
    }

    create() {
        this.createBackground();
        this.createTitle();
        this.createSlots();
        this.createCloseButton();
        this.createItems();

        this.scale.on('resize', (resize) => {
            this.resizeAll(resize);
        });
    }

    /**
     * Creates the Background Layer.
     */
    createBackground() {
        this.inventoryBackground = this.add
            .nineslice(
                this.cameras.main.midPoint.x - 512 / 2,
                this.cameras.main.midPoint.y - 512 / 2,
                512,
                512, // the width and height of your object
                this.inventoryBackgroundTexture, // a key to an already loaded image
                this.nineSliceOffset, // the width and height to offset for a corner slice
                this.nineSliceOffset // (optional) pixels to offset when computing the safe usage area
            )
            .setScrollFactor(0, 0)
            .setOrigin(0, 0);
    }

    /**
     * Creates the close Button.
     */
    createCloseButton() {
        this.closeButton = this.add
            .image(
                this.inventoryBackground.x +
                    this.inventoryBackground.width *
                        this.inventoryBackground.scaleX -
                    this.backgroundSlotPadding * 1.5,
                this.inventoryBackground.y + this.backgroundSlotPadding * 1.5,
                this.inventoryCloseTexture
            )
            .setInteractive()
            .setOrigin(0.5, 0.5)
            .setScale(0.8);

        this.closeButton.on('pointerup', (pointer) => {
            this.scene.stop();
        });
    }

    /**
     * Creates the inventory Title.
     */
    createTitle() {
        this.inventoryTitle = this.add
            .image(
                this.inventoryBackground.x +
                    (this.inventoryBackground.width *
                        this.inventoryBackground.scaleX) /
                        2,
                this.inventoryBackground.y + 54,
                this.inventoryTitleTexture
            )
            .setScrollFactor(0, 0)
            .setOrigin(0.5, 0.5);
        this.inventoryTitleText = this.add
            .text(
                this.inventoryTitle.x + 11,
                this.inventoryTitle.y + 7,
                'Inventory',
                {
                    fontSize: this.titleTextFontSize,
                    fontFamily: `${this.titleFontFamily}`,
                }
            )
            .setScrollFactor(0, 0)
            .setOrigin(0.5, 0.5);
    }

    /**
     * Creates the inventory Slots.
     */
    createSlots() {
        // The available space for the slots to be drawn.
        let slotsWorkingWidth = Math.abs(
            this.backgroundSlotPadding * 2 -
                this.inventoryBackground.width * this.inventoryBackground.scaleX
        );

        // Max number of Slots taking in count the Available space, Slot Size and Margin.
        let slotsNumberHorizontal = Math.floor(
            slotsWorkingWidth / (this.slotSize + this.slotMargin)
        );

        const padding = Math.ceil(
            (this.inventoryBackground.width * this.inventoryBackground.scaleX -
                slotsNumberHorizontal * (this.slotSize + this.slotMargin)) /
                2
        );

        let slotsWorkingHeight = Math.abs(
            this.inventoryBackground.height * this.inventoryBackground.scaleY -
                this.backgroundSlotPaddingTop -
                this.backgroundSlotPaddingBottom
        );

        // Max number of Slots taking in count the Available space, Slot Size and Margin.
        let slotsNumberVertical = Math.floor(
            slotsWorkingHeight / (this.slotSize + this.slotMargin)
        );

        console.log(slotsWorkingHeight, slotsNumberVertical);

        for (let row = 0; row < slotsNumberVertical; row++) {
            for (let col = 0; col < slotsNumberHorizontal; col++) {
                let slot = this.add
                    .image(
                        this.inventoryBackground.x +
                            (this.slotSize + this.slotMargin) * col +
                            padding +
                            this.slotMargin / 2,
                        this.inventoryBackground.y +
                            (this.slotSize + this.slotMargin) * row +
                            this.backgroundSlotPaddingTop,
                        this.inventorySlotTexture
                    )
                    .setScrollFactor(0, 0)
                    .setOrigin(0, 0);
                this.slots.push(slot);
            }
        }
    }

    /**
     * Loops through the Player's items and Adds it to the inventory Slots
     */
    createItems() {
        let slotIndex = 0;
        for (let i = 0; i < this.player.items.length; i++) {
            let slot = this.slots[slotIndex];
            let playerItem = this.player.items[i];
            if (playerItem && playerItem.id) {
                let text;
                let item = new Item(
                    this,
                    slot.x + slot.width / 2,
                    slot.y + slot.height / 2 - 7,
                    null,
                    playerItem.id
                );
                if (item.stackable) {
                    item.setInteractive();
                    item.on('pointerup', (pointer) => {
                        item.consume(this.player);
                        playerItem.count--;
                        if (playerItem.count <= 0) {
                            item.destroy();
                            delete this.player.items[i];
                            text.setText('');
                            // TODO - Rearange the items.
                        } else {
                            text.setText(playerItem.count);
                        }
                    });
                    item.setScale(item.inventoryScale);
                } else {
                    for (
                        let noStackCount = 0;
                        noStackCount < playerItem.count;
                        noStackCount++
                    ) {
                        // TODO - Create the logic for Equipments.
                    }
                }

                text = this.add
                    .text(
                        item.x,
                        item.y + 10 + (item.height * item.scaleY) / 2,
                        playerItem.count
                    )
                    .setOrigin(0.5, 0.5);
            }
        }
    }

    /**
     *
     * @param { any } args The initial arguments.
     */
    init(args) {
        this.player = args.player;
    }

    update() {}

    /**
     * Resizes everything
     * @param { Size } size the new size.
     */
    resizeAll(size) {
        if (this.cameras && this.cameras.main) {
            this.inventoryBackground.setPosition(
                this.cameras.main.midPoint.x - 512 / 2,
                this.cameras.main.midPoint.y - 512 / 2
            );

            this.inventoryTitle.setPosition(
                this.inventoryBackground.x + this.inventoryBackground.width / 2,
                this.inventoryBackground.y + 54
            );
        }
    }
}
