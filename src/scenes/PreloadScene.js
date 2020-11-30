import Phaser from 'phaser';
import atlas_image from '../assets/sprites/character.png';
import atlas_image_json from '../assets/sprites/character.json';
import space_sound_key from '../assets/sound/typing/space_sound.mp3';
import typing_key_01 from '../assets/sound/typing/typing_key_01.mp3';
import typing_key_02 from '../assets/sound/typing/typing_key_02.mp3';
import typing_key_03 from '../assets/sound/typing/typing_key_03.mp3';
import typing_key_04 from '../assets/sound/typing/typing_key_04.mp3';
import typing_key_05 from '../assets/sound/typing/typing_key_05.mp3';
import { Animations } from '../entities/PlayerAnimations';

export class PreloadScene extends Phaser.Scene {
    constructor() {
        super({
            key: 'PreloadScene',
        });
    }

    preload() {
        // Sound
        this.load.audio('space_sound', space_sound_key);
        this.load.audio('typing_key_01', typing_key_01);
        this.load.audio('typing_key_02', typing_key_02);
        this.load.audio('typing_key_03', typing_key_03);
        this.load.audio('typing_key_04', typing_key_04);
        this.load.audio('typing_key_05', typing_key_05);

        // Atlas
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
