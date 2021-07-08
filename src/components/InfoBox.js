import { NineSlice } from 'phaser3-nineslice';

export class InfoBox {
    constructor(scene, x, y, width, height, config = { name: '', description: '' }) {
        /**
         * The phaser scene that this infobox belongs.
         * @type { Phaser.Scene}
         */
        this.scene = scene;

        /**
         * @type { NineSlice }
         */
        this.backgroundSprite = null;

        /**
         * The name displayed on the info box.
         * @type { Phaser.GameObjects.Text }
         */
        this.name = null;
        /**
         * The description displayed on the info box.
         * @type { Phaser.GameObjects.Text }
         */
        this.description = null;

        this.x = x;
        this.y = y;
        this.panelMaxWidth = width;
        this.panelMaxHeight = height;
        this.backgroundTexture = 'infobox_background';
        this.config = config;
        /**
         * Default font size of the Title Text.
         * @type { number }
         * @default
         */
        this.titleTextFontSize = 10;
        /**
         * The default font family of the Inventory Text.
         * @type { string }
         * @default
         */
        this.titleFontFamily = "'Press Start 2P'";

        /**
         * The Offset of the Nine Slice background. It's used to protect the background from streching.
         * It will make it responsive in any scale size without losing resolution.
         * @type { number }
         * @default
         */
        this.nineSliceOffset = 10;

        this.createBackground();
        this.createInformation();
    }

    createBackground() {
        this.backgroundSprite = this.scene.add
            .nineslice(
                this.x,
                this.y,
                this.panelMaxWidth,
                this.panelMaxHeight, // the width and height of your object
                this.backgroundTexture, // a key to an already loaded image
                this.nineSliceOffset, // the width and height to offset for a corner slice
                this.nineSliceOffset // (optional) pixels to offset when computing the safe usage area
            )
            .setScrollFactor(0, 0)
            .setOrigin(0, 0);
        this.backgroundSprite.alpha = 0.7;
    }

    createInformation() {
        const baseX = this.backgroundSprite.x + 15;
        const baseY = this.backgroundSprite.y + 15;
        const wrap = this.backgroundSprite.width - 15;
        this.name = this.scene.add.text(baseX, baseY, this.config.name, {
            fontSize: this.titleTextFontSize,
            fontFamily: `${this.titleFontFamily}`,
            wordWrap: { width: wrap },
        });
        this.name.setOrigin(0, 0.5);
        this.name.setScrollFactor(0, 0);
        this.description = this.scene.add.text(baseX, this.name.y + this.name.height + 10, this.config.description, {
            fontSize: this.titleTextFontSize,
            fontFamily: `${this.titleFontFamily}`,
            wordWrap: { width: wrap },
        });
        this.description.setScrollFactor(0, 0);
    }
}
