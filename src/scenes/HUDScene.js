import Phaser from 'phaser';
import { LuminusSoundManager } from '../plugins/LuminusSoundManager';

/**
 * Scene for HUD Creation. It contains all the HUD of the game.
 * @class
 */
export class HUDScene extends Phaser.Scene {
    constructor() {
        super({
            key: 'HUDScene',
        });

        /**
         * Maximize image/sprite name.
         * @type { string }
         * @default
         */
        this.maximizeSpriteName = 'maximize';

        /**
         * Maximize image/sprite offset X;
         * @type { number }
         * @default
         */
        this.maximizeSpriteOffsetX = 50;

        /**
         * Maximize image/sprite offset y;
         * @type { number }
         * @default
         */
        this.maximizeSpriteOffsetY = 50;

        /**
         * Settings image/sprite name.
         * @type { string }
         * @default
         */
        this.settingsSpriteName = 'cog_settings';

        /**
         * Maximize image/sprite offset X;
         * @type { number }
         * @default
         */
        this.settingsSpriteOffsetX = 100;

        /**
         * Maximize image/sprite offset y;
         * @type { number }
         * @default
         */
        this.settingsSpriteOffsetY = 50;

        /**
         * Inventory image/sprite name.
         * @type { string }
         * @default
         */
        this.inventorySpriteName = 'inventory_box';

        /**
         * Inventory image/sprite offset X;
         * @type { number }
         * @default
         */
        this.inventorySpriteOffsetX = 150;

        /**
         * Inventory image/sprite offset y;
         * @type { number }
         * @default
         */
        this.inventorySpriteOffsetY = 50;

        /**
         * The default Scale of the inventory icon.
         * @type { number }
         * @default
         */
        this.inventorySpriteScale = 1;

        /**
         * The maximixe Image that will change the resolution.
         * @type { Phaser.GameObjects.Image }
         * @default
         */
        this.maximize = null;
        /**
         * The Settings Image that will change the resolution.
         * @type { Phaser.GameObjects.Image }
         * @default
         */
        this.settingsIcon = null;
        /**
         * The Inventory Image that will open the inventory.
         * @type { Phaser.GameObjects.Image }
         * @default
         */
        this.inventoryIcon = null;

        /**
         * The name of the Settings Scene.
         * @type { string }
         * @default
         */
        this.settingSceneName = 'SettingScene';
    }

    /**
     * Phaser default create scene.
     */
    create() {
        this.maximize = this.add
            .image(
                this.cameras.main.width - this.maximizeSpriteOffsetX,
                this.maximizeSpriteOffsetY,
                this.maximizeSpriteName
            )
            .setInteractive();

        this.settingsIcon = this.add
            .image(
                this.cameras.main.width - this.settingsSpriteOffsetX,
                this.settingsSpriteOffsetY,
                this.settingsSpriteName
            )
            .setInteractive();

        this.inventoryIcon = this.add
            .image(
                this.cameras.main.width - this.inventorySpriteOffsetX,
                this.inventorySpriteOffsetY,
                this.inventorySpriteName
            )
            .setInteractive()
            .setScale(this.inventorySpriteScale);

        this.maximize.on('pointerup', (pointer) => {
            this.scale.toggleFullscreen();
        });

        this.inventoryIcon.on('pointerup', (pointer) => {
            console.log('Open Inventory');
        });

        // Launch the settings Scene.
        this.settingsIcon.on('pointerdown', (pointer) => {
            if (!this.scene.isVisible(this.settingSceneName)) {
                this.scene.launch(this.settingSceneName);
            } else {
                this.scene.stop(this.settingSceneName);
            }
        });

        this.scale.on('resize', (resize) => {
            this.resizeAll(resize);
        });
        this.scene.stop(this.settingSceneName);
    }

    /**
     * Resizes everything
     * @param { Size } size the new size.
     */
    resizeAll(size) {
        this.maximize.setPosition(
            this.cameras.main.width - this.maximizeSpriteOffsetX,
            this.maximizeSpriteOffsetY
        );

        this.settingsIcon.setPosition(
            this.cameras.main.width - this.settingsSpriteOffsetX,
            this.settingsSpriteOffsetY
        );
    }
}
