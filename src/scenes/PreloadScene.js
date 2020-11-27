import Phaser from 'phaser';
import atlas_image from '../assets/sprites/character.png';
import atlas_image_json from '../assets/sprites/character.json';

export class PreloadScene extends Phaser.Scene {
    constructor() {
        super({
            key: 'PreloadScene',
        });
    }

    preload() {
        this.load.atlas(
            'character',
            'src/assets/sprites/character.png',
            'src/assets/sprites/character.json'
        );
    }

    create() {
        this.anims.create({
            key: 'idle-down',
            frameRate: 4,
            frames: this.anims.generateFrameNames('character', {
                prefix: 'idle-down/idle-down',
                // suffix: '.png',
                start: 0,
                end: 0,
                zeroPad: 1,
            }),
            repeat: -1,
        });

        this.scene.start('MainScene');
    }
}
