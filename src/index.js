import Phaser from 'phaser';
import { MainScene } from './scenes/MainScene';
import { Plugin as NineSlicePlugin } from 'phaser3-nineslice';
import { DialogScene } from './scenes/DialogScene';
import { JoystickScene } from './scenes/JoystickScene';

/**
 * @type { Phaser.Core.Config}
 */
const config = {
    type: Phaser.AUTO,
    parent: 'collision-test',
    width: 192,
    height: 108,
    scene: [MainScene, JoystickScene, DialogScene],
    scaleMode: Phaser.Scale.RESIZE,
    plugins: {
        global: [NineSlicePlugin.DefaultCfg],
    },
    pixelArt: false,
    physics: {
        default: 'arcade',
        arcade: {
            gravity: { y: 0 }, // Top down game, so no gravity
            checkCollision: false,
            debug: true,
            debugShowBody: true,
            debugShowStaticBody: true,
            debugShowVelocity: true,
            debugVelocityColor: 0xffff00,
            debugBodyColor: 0x0000ff,
            debugStaticBodyColor: 0xffffff,
        },
    },
};

const game = new Phaser.Game(config);
