import Phaser from 'phaser';

import { Animations } from '../consts/Animations';
import { ASEPRITE_CONFIG, AtlasConfig, Images, LuminusAudios, TilemapConfig } from '../consts/GameAssets';

// import nesCss from 'node_modules/nes.css/css/nes.min.css';

/**
 * @class
 */
export class PreloadScene extends Phaser.Scene {
    /**
     * This Scene is responsible for loading all game assets of the game.
     * While it is loading, it will present a progressbar with the loading progress.
     */
    constructor() {
        super({
            key: 'PreloadScene',
        });

        /**
         * The Progress Bar that will be updated with the current loading value.
         * @type { Phaser.GameObjects.Graphics }
         */
        this.progressBar = null;

        /**
         * The Background of the Progress Bar.
         * @type { Phaser.GameObjects.Graphics }
         */
        this.progressBox = null;

        /**
         * The curretn camera Width.
         * @type { numnber }
         */
        this.cameraWidth = 0;

        /**
         * The current camera Height.
         * @type { number }
         */
        this.cameraHeight = 0;

        /**
         * The loading text.
         * @type { Phaser.GameObjects.Text }
         */
        this.loadingText = null;

        /**
         * The percentage text.
         * @type { Phaser.GameObjects.Text }
         */
        this.percentText = null;

        /**
         * The current progress value.
         * @type { number }
         */
        this.currentValue = 0;

        /**
         * The Progressbar (background / box) tarting X position.
         * @type { number }
         */
        this.boxStartingX = 10;

        /**
         * The progressbar (background / box) height.
         * @type { number }
         */
        this.boxHeight = 50;
        /**
         * The progressbar (background / box) padding.
         * @type { number }
         */
        this.boxPadding = 30;

        /**
         * The progress (background / box) margin from the text.
         * @type { number }
         */
        this.boxMargin = 30;

        /**
         * The progress bar height.
         * @type { number }
         */
        this.barHeight = 30;

        /**
         * The progressbar starting X position.
         * @type { number }
         */
        this.barStartingX = 20;

        /**
         * The progressbar margin from the text.
         * @type { number }
         */
        this.barMargin = 40;
    }

    preload() {
        // Images
        Images.forEach((values) => {
            this.load.image(values.name, values.image);
        });

        // Tilemap
        TilemapConfig.forEach((value) => {
            this.load.tilemapTiledJSON(value.name, value.json);
        });

        // Scripts
        this.load.script('webfont', 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js');

        // Sound
        LuminusAudios.forEach((value) => {
            this.load.audio(value.name, value.audio);
        });

        // Atlas
        AtlasConfig.forEach((value) => {
            this.load.atlas(value.name, value.image, value.json);
        });

        ASEPRITE_CONFIG.forEach((aseprite) => {
            this.load.aseprite(aseprite.name, aseprite.image, aseprite.json);
        });

        // Custom CSS
        // this.load.css('nescss', nesCss);
        this.progressBar = this.add.graphics();
        this.progressBox = this.add.graphics();
        this.cameraWidth = this.cameras.main.width;
        this.cameraHeight = this.cameras.main.height;

        this.progressBox.fillStyle(0x222222, 0.8);
        this.progressBox.fillRect(
            this.boxStartingX,
            this.cameraHeight / 2 + this.boxMargin,
            this.cameraWidth - this.boxPadding,
            this.boxHeight
        );

        this.loadingText = this.make.text({
            x: this.cameraWidth / 2,
            y: this.cameraHeight / 2 - this.boxHeight,
            text: 'Loading...',
            style: {
                font: '20px monospace',
                fill: '#ffffff',
            },
        });
        this.loadingText.setOrigin(0.5, 0.5);

        this.percentText = this.make.text({
            x: this.cameraWidth / 2,
            y: this.cameraHeight / 2 - 5,
            text: '0%',
            style: {
                font: '18px monospace',
                fill: '#ffffff',
            },
        });
        this.percentText.setOrigin(0.5, 0.5);
        this.load.on('progress', (value) => {
            this.currentValue = value;
            this.percentText.setText(parseInt(value * 100) + '%');
            this.progressBar.clear();
            this.progressBar.fillStyle(0xffffff, 1);
            this.progressBar.fillRect(
                this.barStartingX,
                this.cameraHeight / 2 + this.barMargin,
                (this.cameraWidth - this.boxHeight) * value,
                this.barHeight
            );
        });

        this.load.on('complete', () => {
            this.progressBar.destroy();
            this.progressBox.destroy();
            this.loadingText.destroy();
            this.percentText.destroy();
        });
        this.scale.on('resize', (size) => {
            this.resize(size);
        });
    }

    resize(size) {
        if (size) {
            this.cameraWidth = size.width;
            this.cameraHeight = size.height;

            this.loadingText.setPosition(this.cameraWidth / 2, this.cameraHeight / 2 - this.boxHeight);
            this.percentText.setPosition(this.cameraWidth / 2, this.cameraHeight / 2 - 5);

            this.progressBox.clear();
            this.progressBox.fillStyle(0x222222, 0.8);
            this.progressBox.fillRect(
                this.boxStartingX,
                this.cameraHeight / 2 + this.boxMargin,
                this.cameraWidth - this.boxPadding,
                this.boxHeight
            );
            this.progressBar.clear();
            this.progressBar.fillStyle(0xffffff, 1);
            this.progressBar.fillRect(
                this.barStartingX,
                this.cameraHeight / 2 + this.barMargin,
                (this.cameraWidth - this.boxHeight) * this.currentValue,
                this.barHeight
            );
        }
    }

    create() {
        // setTimeout((t) => {
        //     this.scale.startFullscreen();
        // }, 200);
        // setTimeout((t) => {
        //     console.log(
        //         document.getElementById('luminus-rpg'),
        //         document.getElementById('luminus-rpg').click()
        //     );
        //     this.scale.startFullscreen();
        // }, 2000);
        Animations.forEach((animation) => {
            this.anims.create({
                key: animation.key,
                frameRate: animation.frameRate,
                frames: this.anims.generateFrameNames(animation.atlas, {
                    prefix: animation.prefix,
                    start: animation.start,
                    end: animation.end,
                    zeroPad: animation.zeroPad,
                }),
                repeat: animation.repeat,
            });
        });
        ASEPRITE_CONFIG.forEach((aseprite) => {
            this.anims.createFromAseprite(aseprite.name);
        });
        // Web Fonts
        WebFont.load({
            google: {
                families: ['Press Start 2P'],
            },
            active: () => {
                // this.scene.start('MobileCheckScene');
                // this.scene.start('IntroScene');
                // this.scene.start('DungeonScene');
                // this.scene.start('MainScene');
                this.scene.start('MainMenuScene');
                // this.scene.start('TutorialScene');
            },
        });
    }
}
