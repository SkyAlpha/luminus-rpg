import { LuminusUtils } from '../utils/LuminusUtils';

/**
 * @class
 */
export class PanelComponent {
    /**
     * Creates a Panel to display invormation on it.
     * @param { Phaser.Scene } scene
     */
    constructor(scene) {
        /**
         * The Phaser Scene that the Panel will be created on.
         * @type { Phaser.Scene }
         */
        this.scene = scene;

        /**
         * The Offset of the Nine Slice background. It's used to protect the background from streching.
         * It will make it responsive in any scale size without losing resolution.
         * @type { number }
         * @default
         */
        this.nineSliceOffset = 10;

        /**
         * The vertical padding between the Background edge and the content.
         * @type { number }
         * @default
         */
        this.verticalBackgroundPadding = 25;

        /**
         * The Padding of the main content to the Top of the Inventory Background.
         * @type { number }
         * @default
         */
        this.backgroundMainContentPaddingTop = 100;

        /**
         * Default font size of the Title Text.
         * @type { number }
         * @default
         */
        this.titleTextFontSize = 13;

        /**
         * The name of the sprite texture of the Inventory Background.
         * @type { string }
         * @default
         */
        this.inventoryBackgroundTexture = 'panel_background';

        /**
         * The name of the sprite texture of the Inventory Title.
         * @type { string }
         */
        this.panelTitleTexture = 'panel_title';

        /**
         * The name of the sprite texture of the Close Button.
         * @type { string }
         * @default
         */
        this.panelCloseTexture = 'close_button';

        /**
         * The name of the panel. AKA Text Title that will be shown on the title panel.
         * @type { string }
         */
        this.panelName = 'Inventory';

        /**
         * The panel background sprite.
         * @type { NineSlice }
         */
        this.panelBackground = null;

        /**
         * The inventory title sprite.
         * @type { Phaser.GameObjects.Image }
         */
        this.panelTitle = null;

        /**
         * The inventory title sprite.
         * @type { Phaser.GameObjects.Image }
         */
        this.panelTitleText = null;

        /**
         * The default font family of the Inventory Text.
         * @type { string }
         * @default
         */
        this.titleFontFamily = "'Press Start 2P'";

        /**
         * The max width of the panel.
         * @type { number }
         */
        this.panelMaxWidth = 512;

        /**
         * The max height of the panel.
         * @type { number }
         */
        this.panelMaxHeight = 512;

        /**
         * The margin between the Screen and the panel.
         * @type { number }
         */
        this.panelScreenMargin = 30;

        this.createBackground();
        this.createTitle();
        this.createCloseButton();
    }

    /**
     * Sets the new Title Text.
     * @param { string } title
     */
    setTitleText(title) {
        this.panelTitleText.setText(title);
    }

    /**
     * Creates the Panel Background Layer.
     */
    createBackground() {
        if (LuminusUtils.isMobile()) {
            this.panelMaxWidth = this.scene.cameras.main.width - this.panelScreenMargin * 4;
            this.panelMaxHeight = this.scene.cameras.main.height - this.panelScreenMargin * 4;
        }
        this.panelBackground = this.scene.add
            .nineslice(
                this.scene.cameras.main.midPoint.x - this.panelMaxWidth / 2,
                this.scene.cameras.main.midPoint.y - this.panelMaxHeight / 2,
                this.panelMaxWidth,
                this.panelMaxHeight, // the width and height of your object
                this.inventoryBackgroundTexture, // a key to an already loaded image
                this.nineSliceOffset, // the width and height to offset for a corner slice
                this.nineSliceOffset // (optional) pixels to offset when computing the safe usage area
            )
            .setScrollFactor(0, 0)
            .setOrigin(0, 0);
    }

    /**
     * Creates the panel Title.
     */
    createTitle() {
        this.panelTitle = this.scene.add
            .image(
                this.panelBackground.x + (this.panelBackground.width * this.panelBackground.scaleX) / 2,
                this.panelBackground.y + 54,
                this.panelTitleTexture
            )
            .setScrollFactor(0, 0)
            .setOrigin(0.5, 0.5);
        this.panelTitleText = this.scene.add
            .text(this.panelTitle.x + 11, this.panelTitle.y + 7, this.panelName, {
                fontSize: this.titleTextFontSize,
                fontFamily: `${this.titleFontFamily}`,
            })
            .setScrollFactor(0, 0)
            .setOrigin(0.5, 0.5);
    }

    /**
     * Creates the close Button.
     */
    createCloseButton() {
        this.closeButton = this.scene.add
            .image(
                this.panelBackground.x +
                    this.panelBackground.width * this.panelBackground.scaleX -
                    this.verticalBackgroundPadding * 1.5,
                this.panelBackground.y + this.verticalBackgroundPadding * 1.5,
                this.panelCloseTexture
            )
            .setInteractive()
            .setOrigin(0.5, 0.5)
            .setScale(0.8);
    }

    destroy() {
        this.panelBackground.destroy();
        this.panelTitle.destroy();
        this.panelTitleText.destroy();
        this.closeButton.destroy();
    }
}
