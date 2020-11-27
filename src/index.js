import Phaser from 'phaser';
import { MainScene } from './scenes/MainScene';
import { Plugin as NineSlicePlugin } from 'phaser3-nineslice';
import { DialogScene } from './scenes/DialogScene';
import { JoystickScene } from './scenes/JoystickScene';
import { HUDScene } from './scenes/HUDScene';
import { PreloadScene } from './scenes/PreloadScene';

/**
 * @type { Phaser.Core.Config}
 */
const config = {
    type: Phaser.AUTO,
    parent: 'collision-test',
    width: 800,
    height: 600,
    scene: [PreloadScene, MainScene, JoystickScene, DialogScene, HUDScene],
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
            debug: false,
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
