import Phaser from 'phaser';
import { Player } from '../entities/Player';
import { LuminusHUDProgressBar } from '../plugins/HUD/LuminusHUDProgressBar';
import { LuminusHealthBar } from '../plugins/LuminusHealthBar';

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
         * The Player game Object.
         * @type { Player }
         */
        this.player = null;

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

        /**
         * The name of the Inventory Scene.
         * @type { string }
         * @default
         */
        this.inventorySceneName = 'InventoryScene';

        /**
         * The Image that indicates the HP of the Player.
         * @type { Phaser.GameObjects.Image }
         */
        this.hp_hud = null;

        /**
         * The Health bar that will display the player's current HP
         * @type { LuminusHealthBar }
         */
        this.health_bar = null;
    }

    init(args) {
        this.player = args.player;
    }

    /**
     * Phaser default create scene.
     */
    create() {
        this.hp_hud = this.add.image(25, 25, 'hp_hud_2x');

        this.sp_hud = this.add.image(25, 45, 'sp_hud_2x');

        this.health_bar = new LuminusHUDProgressBar(
            this,
            this.hp_hud.x,
            this.hp_hud.y,
            this.hp_hud.width,
            this.player
        );

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

        // Launches Inventory Scene.s
        this.inventoryIcon.on('pointerup', (pointer) => {
            if (!this.scene.isVisible(this.inventorySceneName)) {
                this.scene.launch(this.inventorySceneName, {
                    player: this.player,
                });
            } else {
                this.scene.stop(this.inventorySceneName);
            }
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
        // All Scenes have to be stopped before they are called to launch.
        this.scene.stop(this.inventorySceneName);
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

        this.inventoryIcon.setPosition(
            this.cameras.main.width - this.inventorySpriteOffsetX,
            this.inventorySpriteOffsetY
        );
    }
}
