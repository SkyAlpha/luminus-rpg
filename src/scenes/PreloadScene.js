import Phaser from 'phaser';

import { Animations } from '../consts/Animations';
import {
    AtlasConfig,
    Images,
    LuminusAudios,
    TilemapConfig,
} from '../consts/GameAssets';

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
        this.load.script(
            'webfont',
            'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js'
        );

        // Sound
        LuminusAudios.forEach((value) => {
            this.load.audio(value.name, value.audio);
        });

        // Atlas
        AtlasConfig.forEach((value) => {
            this.load.atlas(value.name, value.image, value.json);
        });

        // Custom CSS
        // this.load.css('nescss', nesCss);

        let progressBar = this.add.graphics();
        let progressBox = this.add.graphics();
        const width = this.cameras.main.width;
        const height = this.cameras.main.height;
        progressBox.fillStyle(0x222222, 0.8);
        progressBox.fillRect(10, height / 2 + 30, width - 30, 50);

        let loadingText = this.make.text({
            x: width / 2,
            y: height / 2 - 50,
            text: 'Loading...',
            style: {
                font: '20px monospace',
                fill: '#ffffff',
            },
        });
        loadingText.setOrigin(0.5, 0.5);

        let percentText = this.make.text({
            x: width / 2,
            y: height / 2 - 5,
            text: '0%',
            style: {
                font: '18px monospace',
                fill: '#ffffff',
            },
        });
        percentText.setOrigin(0.5, 0.5);
        this.load.on('progress', function (value) {
            percentText.setText(parseInt(value * 100) + '%');
            progressBar.clear();
            progressBar.fillStyle(0xffffff, 1);
            progressBar.fillRect(20, height / 2 + 40, (width - 50) * value, 30);
        });

        this.load.on('complete', function () {
            progressBar.destroy();
            progressBox.destroy();
            loadingText.destroy();
            percentText.destroy();
        });
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
        // Web Fonts
        WebFont.load({
            google: {
                families: ['Press Start 2P'],
            },
            active: () => {
                // this.scene.start('MobileCheckScene');
                // this.scene.start('IntroScene');
                // this.scene.start('DungeonScene');
                this.scene.start('MainScene');
            },
        });
    }
}
