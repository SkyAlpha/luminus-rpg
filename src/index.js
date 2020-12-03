import Phaser from 'phaser';
import { MainScene } from './scenes/MainScene';
import { Plugin as NineSlicePlugin } from 'phaser3-nineslice';
import { DialogScene } from './scenes/DialogScene';
import { JoystickScene } from './scenes/JoystickScene';
import { HUDScene } from './scenes/HUDScene';
import { PreloadScene } from './scenes/PreloadScene';
import { VideoPlayerScene } from './scenes/VideoPlayerScene';
import { IntroScene } from './scenes/IntroScene';
import { SettingScene } from './scenes/SettingScene';
/**
 * @type { Phaser.Core.Config}
 */
const config = {
    type: Phaser.AUTO,
    parent: 'luminus-rpg',
    width: 800,
    height: 600,
    scene: [
        PreloadScene,
        IntroScene,
        MainScene,
        JoystickScene,
        DialogScene,
        HUDScene,
        SettingScene,
        VideoPlayerScene,
    ],
    inputTouch: true,
    input: {
        gamepad: true,
    },
    inputKeyboard: true,
    scaleMode: Phaser.Scale.RESIZE,
    autoCenter: Phaser.Scale.CENTER_BOTH,
    plugins: {
        global: [NineSlicePlugin.DefaultCfg],
    },
    dom: {
        createContainer: true,
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
