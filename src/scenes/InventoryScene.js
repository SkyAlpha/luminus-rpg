import Phaser from 'phaser';
import { NineSlice } from 'phaser3-nineslice';
import { InfoBox } from '../components/InfoBox';
import { PanelComponent } from '../components/PanelComponent';
import { Item } from '../entities/Item';
import { Player } from '../entities/Player';
import { LuminusInterfaceController } from '../plugins/LuminusInterfaceController';
import { LuminusUtils } from '../utils/LuminusUtils';
export const InventorySceneName = 'InventoryScene';

/**
 * @class
 */
export class InventoryScene extends Phaser.Scene {
    constructor() {
        super({
            key: InventorySceneName,
        });

        /**
         * The player that will have it's inventoro opened.
         * @type { Player }
         */
        this.player = null;

        /**
         * The name of the sprite texture of the Inventory Slot.
         * @type { string }
         * @default
         */
        this.inventorySlotTexture = 'inventory_slot';

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
         * The space separate for legend height.
         * @type { number }
         */
        this.legendHeight = 50;

        /**
         * The default font family of the Inventory Text.
         * @type { string }
         * @default
         */
        this.titleFontFamily = "'Press Start 2P'";

        /**
         * The close and open sound of the inventory.
         * @type { string }
         * @default
         */
        this.inventoryOpenClose = 'inventory_cloth';

        /**
         * The name of the texture of the action button legend for desktop.
         * @type { string }
         */
        this.actionButtonSpriteNameDesktop = 'enter_keyboard_key';
        /**
         * The name of the texture of the action button legend for console.
         * @type { string }
         */
        this.actionButtonSpriteNameConsole = 'buttonA';

        /**
         * The name of the texture of the back button legend for desktop.
         * @type { string }
         */
        this.backButtonDesktopSpriteName = 'esc_keyboard_key';

        /**
         * The name of the texture of the back button legend for console.
         * @type { string }
         */
        this.backButtonLegendConsole = 'buttonB';

        /**
         * The name of the texture of the description button legend for desktop.
         * @type { string }
         */
        this.descriptionButtonLegendDesktop = 'h_keyboard_key';

        /**
         * The name of the texture of the description button legend for console.
         * @type { string }
         */
        this.descriptionButtonLegendConsole = 'buttonY';

        /**
         * The class that will control the interface.
         * @type { LuminusInterfaceController }
         */
        this.luminusInterfaceController = null;

        this.isReset = false;

        /**
         * @type { LuminusInterfaceController }
         */
        this.cachedInterfaceControler = null;

        /**
         * The information box for
         * @type { InfoBox }
         */
        this.helpPanel = null;

        /**
         * The back button sprite.
         * @type { Phaser.GameObjects.Sprite }
         */
        this.backButtonLegend = null;
    }

    create() {
        // Prevent that the panel is open.
        this.destroyHelpPanel();
        this.luminusInterfaceController = new LuminusInterfaceController(this);
        this.panelComponent = new PanelComponent(this);
        this.inventoryBackground = this.panelComponent.panelBackground;
        this.inventoryTitle = this.panelComponent.panelTitle;
        this.inventoryTitleText = this.panelComponent.panelTitleText;
        this.createSlots();
        this.createCloseButton();
        this.createItems();
        if (!LuminusUtils.isMobile() || (LuminusUtils.isMobile() && this.input.gamepad.pad1))
            this.createLegendSection();
        if (this.input.gamepad.pad1) {
            this.registerGamepad();
            this.setGamepadTextures();
        }

        this.input.gamepad.on('connected', (pad) => {
            this.registerGamepad();
            this.setGamepadTextures();
        });
        this.input.gamepad.on('disconnected', (pad) => {
            this.backButtonLegend.setTexture(this.backButtonDesktopSpriteName);
        });

        if (!this.isReset) this.sound.play(this.inventoryOpenClose);
        this.scale.on('resize', (resize) => {
            this.resizeAll(resize);
        });

        if (this.cachedInterfaceControler) {
            this.luminusInterfaceController.recoverPositionFromPrevious(this.cachedInterfaceControler);
        }

        this.registerKeyboardShortcuts();
    }

    registerKeyboardShortcuts() {
        this.input.keyboard.on('keydown', (key) => {
            if (key.keyCode === 72) {
                this.toggleInfoBox();
            }
        });
    }
    /**
     * Registers the gamepad inputs.
     */
    registerGamepad() {
        this.input.gamepad.pad1.on('down', (pad) => {
            if (pad === 3) {
                this.toggleInfoBox();
            }
        });
    }

    /**
     * Toggles info / description box of the item.
     */
    toggleInfoBox() {
        if (!this.helpPanel) {
            const slot = this.luminusInterfaceController.currentElementAction.element;
            if (slot.item) {
                this.createInfoBox(slot);
            }
        } else {
            this.destroyHelpPanel();
        }
    }

    createInfoBox(slot) {
        this.helpPanel = new InfoBox(this, slot.x + slot.width / 2, slot.y + slot.height / 2, 200, 200, {
            name: slot.item.name,
            description: slot.item.description,
        });
    }

    /**
     * Sets the GamePad Textures.
     * If the gamepad is connected, it should use the gamepad textures.
     */
    setGamepadTextures() {
        if (this && this.sys && this.backButtonLegend) this.backButtonLegend.setTexture(this.backButtonLegendConsole);
        if (this && this.sys && this.actionButtonLegend)
            this.actionButtonLegend.setTexture(this.actionButtonSpriteNameConsole);
        if (this && this.sys && this.descriptionButtonLegend)
            this.descriptionButtonLegend.setTexture(this.descriptionButtonLegendConsole);
    }

    /**
     * Creates the close Button.
     */
    createCloseButton() {
        this.closeButton = this.panelComponent.closeButton;

        this.closeButton.on('pointerup', (pointer) => {
            this.stopScene();
        });

        this.luminusInterfaceController.interfaceElements[0] = [];
        this.luminusInterfaceController.interfaceElements[0][0] = [];
        let firstAction = {
            element: this.closeButton,
            action: 'stopScene',
            context: this,
            args: 'InventoryScene',
        };
        this.luminusInterfaceController.closeAction = firstAction;
        this.luminusInterfaceController.interfaceElements[0][0].push(firstAction);
    }

    stopScene() {
        this.sound.play(this.inventoryOpenClose);
        this.player.canMove = true;
        this.player.canAtack = true;
        this.scene.stop();
    }

    /**
     * Destroys all the Slots and its dependencies.
     */
    destroySlots() {
        if (this.slots.length > 0) {
            this.slots.forEach((slot) => {
                if (slot.item) {
                    slot.item.destroy();
                    slot.text.destroy();
                }
                slot.destroy();
            });
        }
        this.slots = [];
    }

    /**
     * Creates the inventory Slots.
     */
    createSlots() {
        // Checks if there is any already created slots. If there is, it should destroy them bofore creating new ones.
        this.destroySlots();
        // The available space for the slots to be drawn.
        let slotsWorkingWidth = Math.abs(
            this.backgroundSlotPadding * 2 - this.inventoryBackground.width * this.inventoryBackground.scaleX
        );

        // Max number of Slots taking in count the Available space, Slot Size and Margin.
        let slotsNumberHorizontal = Math.floor(slotsWorkingWidth / (this.slotSize + this.slotMargin));

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

        if (!LuminusUtils.isMobile() || (LuminusUtils.isMobile() && this.input.gamepad.pad1))
            slotsWorkingHeight = slotsWorkingHeight - this.legendHeight; // Pixels for Legends.

        // Max number of Slots taking in count the Available space, Slot Size and Margin.
        let slotsNumberVertical = Math.floor(slotsWorkingHeight / (this.slotSize + this.slotMargin));

        // Creates the seccond line
        this.luminusInterfaceController.interfaceElements[1] = [];
        for (let row = 0; row < slotsNumberVertical; row++) {
            this.luminusInterfaceController.interfaceElements[1][row] = [];
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

                let element = {
                    element: slot,
                    action: 'useItem',
                    context: this,
                    args: slot,
                };
                this.luminusInterfaceController.interfaceElements[1][row].push(element);

                if (row === 0 && col === 0) {
                    this.luminusInterfaceController.currentElementAction = element;
                    if (!LuminusUtils.isMobile() || (LuminusUtils.isMobile() && this.input.gamepad.pad1))
                        this.luminusInterfaceController.updateHighlightedElement(element.element);
                    this.luminusInterfaceController.currentLinePosition = 1;
                }
            }
        }
    }

    /**
     * When resizing, it should change the position of the slots acordingly.
     */
    setPositionSlotsItems() {
        // The available space for the slots to be drawn.
        let slotsWorkingWidth = Math.abs(
            this.backgroundSlotPadding * 2 - this.inventoryBackground.width * this.inventoryBackground.scaleX
        );

        // Max number of Slots taking in count the Available space, Slot Size and Margin.
        let slotsNumberHorizontal = Math.floor(slotsWorkingWidth / (this.slotSize + this.slotMargin));

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
        let slotsNumberVertical = Math.floor(slotsWorkingHeight / (this.slotSize + this.slotMargin));

        let count = 0;
        for (let row = 0; row < slotsNumberVertical; row++) {
            for (let col = 0; col < slotsNumberHorizontal; col++) {
                let slot = this.slots[count];
                if (slot) {
                    slot.setPosition(
                        this.inventoryBackground.x +
                            (this.slotSize + this.slotMargin) * col +
                            padding +
                            this.slotMargin / 2,
                        this.inventoryBackground.y +
                            (this.slotSize + this.slotMargin) * row +
                            this.backgroundSlotPaddingTop
                    );
                    if (slot.item) {
                        let item = slot.item;
                        slot.item.setPosition(slot.x + slot.width / 2, slot.y + slot.height / 2 - 7);
                        slot.text.setPosition(item.x, item.y + 10 + (item.height * item.scaleY) / 2);
                    }
                    count++;
                }
            }
        }
    }

    /**
     * Clears all slots items before creating them again.
     */
    // clearSlots() {
    //     this.slots.forEach((slot) => {
    //         if (slot.item) slot.item.destroy();
    //         if (slot.text) slot.text.destroy();
    //     });
    // }

    /**
     * Loops through the Player's items and Adds it to the inventory Slots
     */
    createItems() {
        // this.clearSlots();
        let slotIndex = 0;
        let time = 0;
        for (let i = 0; i < this.player.items.length; i++) {
            let slot = this.slots[slotIndex];
            slotIndex++;
            if (this.player.items[i] && this.player.items[i].id) {
                let text;
                let item = new Item(
                    this,
                    slot.x + slot.width / 2,
                    slot.y + slot.height / 2 - 7,
                    this.player.items[i].id
                );
                text = this.add
                    .text(item.x, item.y + 15 + (item.height * item.scaleY) / 2, this.player.items[i].count)
                    .setOrigin(0.5, 0.5);
                // Sets the slot item;
                slot.item = item;
                // Sets the Text.
                slot.text = text;
                slot.playerItemIndex = i;
                if (item.stackable) {
                    slot.setInteractive();
                    slot.on('pointerover', (pointer) => {
                        if (!this.helpPanel && !this.input.gamepad.pad1) {
                            this.createInfoBox(slot);
                        }
                    });
                    slot.on('pointerout', (pointer) => {
                        if (this.helpPanel && !this.input.gamepad.pad1) {
                            this.destroyHelpPanel();
                        }
                    });
                    slot.on('pointerup', (pointer) => {
                        // IF it is mobile or controller is connected, Show the information box.
                        let element = {
                            element: slot,
                            action: 'useItem',
                            context: this,
                            args: slot,
                        };
                        this.luminusInterfaceController.currentElementAction = element;
                        if (time === 0) {
                            time = pointer.upTime;
                            return;
                        }
                        let elapsed = Math.abs(time - pointer.upTime);
                        if (elapsed < 350) {
                            this.useItem(slot);
                            time = 0;
                        } else {
                            time = 0;
                        }
                    });
                    item.setScale(item.inventoryScale);
                } else {
                    for (let noStackCount = 0; noStackCount < this.player.items[i].count; noStackCount++) {
                        // TODO - Create the logic for Equipments.
                    }
                }
            }
        }
    }

    destroyHelpPanel() {
        if (this.helpPanel) {
            this.helpPanel.backgroundSprite.destroy();
            this.helpPanel.name.destroy();
            this.helpPanel.description.destroy();
            this.helpPanel = null;
        }
    }

    createLegendSection() {
        this.actionButtonLegend = this.add.sprite(
            this.inventoryBackground.x + this.backgroundSlotPadding + this.slotMargin,
            this.inventoryBackground.y + this.inventoryBackground.height - this.legendHeight,
            this.actionButtonSpriteNameDesktop
        );
        this.actionButtonLegend.setOrigin(0, 0.5);
        this.actionButtonLegend.setDisplaySize(35, 35);

        this.actionButtonLegend.text = this.add.text(
            this.actionButtonLegend.x +
                this.actionButtonLegend.width * this.actionButtonLegend.scaleX +
                this.slotMargin,
            this.actionButtonLegend.y,
            'Use/Action'
        );

        this.actionButtonLegend.text.setOrigin(0, 0.5);

        //////
        this.descriptionButtonLegend = this.add.sprite(
            this.actionButtonLegend.text.x +
                this.actionButtonLegend.text.width * this.actionButtonLegend.text.scaleX +
                this.slotMargin,
            this.actionButtonLegend.text.y,
            this.descriptionButtonLegendDesktop
        );
        this.descriptionButtonLegend.setOrigin(0, 0.5);
        this.descriptionButtonLegend.setDisplaySize(35, 35);

        this.descriptionButtonLegend.text = this.add.text(
            this.descriptionButtonLegend.x +
                this.descriptionButtonLegend.width * this.descriptionButtonLegend.scaleX +
                this.slotMargin,
            this.descriptionButtonLegend.y,
            'Show Info'
        );
        this.descriptionButtonLegend.text.setOrigin(0, 0.5);
        ////

        this.backButtonLegend = this.add.sprite(
            this.descriptionButtonLegend.text.x +
                this.descriptionButtonLegend.text.width * this.descriptionButtonLegend.text.scaleX +
                this.slotMargin,
            this.descriptionButtonLegend.text.y,
            this.backButtonDesktopSpriteName
        );
        this.backButtonLegend.setOrigin(0, 0.5);
        this.backButtonLegend.setDisplaySize(35, 35);

        this.backButtonLegend.text = this.add.text(
            this.backButtonLegend.x + this.backButtonLegend.width * this.backButtonLegend.scaleX + this.slotMargin,
            this.backButtonLegend.y,
            'Back'
        );
        this.backButtonLegend.text.setOrigin(0, 0.5);

        if (this.input.gamepad.pad1) this.setGamepadTextures();
    }

    useItem(slot) {
        if (slot && slot.item) {
            let item = slot.item;
            let text = slot.text;
            let i = slot.playerItemIndex;
            slot.item.consume(this.player);
            if (this.player.items[i]) {
                this.player.items[i].count--;
                if (this.player.items[i].count <= 0) {
                    slot.item.destroy();
                    // this.luminusInterfaceController.currentElementAction.action = null;
                    this.player.items.splice(i, 1);
                    text.setText('');
                    text.destroy();
                    this.scene.restart({
                        player: this.player,
                        isReset: true,
                        interfaceControler: this.luminusInterfaceController,
                    });
                    // TODO - Rearange the items.
                } else {
                    text.setText(this.player.items[i].count);
                }
            }
        }
    }

    /**
     *
     * @param { any } args The initial arguments.
     */
    init(args) {
        this.player = args.player;
        this.player.canMove = false;
        this.player.canAtack = false;
        if (args.isReset) {
            this.isReset = true;
            this.cachedInterfaceControler = args.interfaceControler;
        }
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

            this.inventoryTitleText.setPosition(this.inventoryTitle.x + 11, this.inventoryTitle.y + 7);

            this.closeButton.setPosition(
                this.inventoryBackground.x +
                    this.inventoryBackground.width * this.inventoryBackground.scaleX -
                    this.backgroundSlotPadding * 1.5,
                this.inventoryBackground.y + this.backgroundSlotPadding * 1.5
            );
            if (this.actionButtonLegend)
                this.actionButtonLegend.setPosition(
                    this.inventoryBackground.x + this.backgroundSlotPadding + this.slotMargin,
                    this.inventoryBackground.y + this.inventoryBackground.height - this.legendHeight
                );

            if (this.actionButtonLegend.text)
                this.actionButtonLegend.text.setPosition(
                    this.actionButtonLegend.x +
                        this.actionButtonLegend.width * this.actionButtonLegend.scaleX +
                        this.slotMargin,
                    this.actionButtonLegend.y
                );
            if (this.descriptionButtonLegend)
                this.descriptionButtonLegend.setPosition(
                    this.actionButtonLegend.text.x +
                        this.actionButtonLegend.text.width * this.actionButtonLegend.text.scaleX +
                        this.slotMargin,
                    this.actionButtonLegend.text.y
                );
            if (this.descriptionButtonLegend.text)
                this.descriptionButtonLegend.text.setPosition(
                    this.descriptionButtonLegend.x +
                        this.descriptionButtonLegend.width * this.descriptionButtonLegend.scaleX +
                        this.slotMargin,
                    this.descriptionButtonLegend.y
                );

            if (this.backButtonLegend)
                this.backButtonLegend.setPosition(
                    this.descriptionButtonLegend.text.x +
                        this.descriptionButtonLegend.text.width * this.descriptionButtonLegend.text.scaleX +
                        this.slotMargin,
                    this.descriptionButtonLegend.text.y
                );
            if (this.backButtonLegend.text)
                this.backButtonLegend.text.setPosition(
                    this.backButtonLegend.x +
                        this.backButtonLegend.width * this.backButtonLegend.scaleX +
                        this.slotMargin,
                    this.backButtonLegend.y
                );

            this.setPositionSlotsItems();
        }
    }
}
