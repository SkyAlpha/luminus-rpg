import Phaser from 'phaser';
import atlas_image from '../assets/sprites/character.png';
import atlas_image_json from '../assets/sprites/character.json';
import { Animations } from '../entities/PlayerAnimations';

export class PreloadScene extends Phaser.Scene {
    constructor() {
        super({
            key: 'PreloadScene',
        });
    }

    preload() {
        this.load.atlas('character', atlas_image, atlas_image_json);
    }

    create() {
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

        this.scene.start('MainScene');
    }
}
