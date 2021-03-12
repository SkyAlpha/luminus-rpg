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
import OutlinePostFx from 'phaser3-rex-plugins/plugins/outlinepipeline.js';
import OutlinePipelinePlugin from 'phaser3-rex-plugins/plugins/outlinepipeline-plugin.js';
import YoutubePlayerPlugin from 'phaser3-rex-plugins/plugins/youtubeplayer-plugin.js';
import UIPlugin from 'phaser3-rex-plugins/templates/ui/ui-plugin.js';
import { MobileCheckScene } from './scenes/MobileCheckScene';
import { DungeonScene } from './scenes/DungeonScene';
/**
 * @type { Phaser.Core.Config}
 */
const config = {
    type: Phaser.WEBGL,
    parent: 'luminus-rpg-parent',
    canvas: document.getElementById('luminus-rpg'),
    width: 800,
    height: 600,
    scene: [
        PreloadScene,
        IntroScene,
        MainScene,
        DungeonScene,
        MobileCheckScene,

        // UI Scenes should be loaded after the game Scenes.
        JoystickScene,
        DialogScene,
        HUDScene,
        SettingScene,
        VideoPlayerScene,
    ],
    input: {
        gamepad: true,
        touch: true,
    },
    inputKeyboard: true,
    scaleMode: Phaser.Scale.RESIZE,
    autoCenter: Phaser.Scale.CENTER_BOTH,
    pipeline: [OutlinePostFx],
    plugins: {
        scene: [
            {
                key: 'rexUI',
                plugin: UIPlugin,
                mapping: 'rexUI',
            },
        ],
        global: [
            NineSlicePlugin.DefaultCfg,
            {
                key: 'rexOutlinePipeline',
                plugin: OutlinePipelinePlugin,
                start: true,
            },
            {
                key: 'rexYoutubePlayer',
                plugin: YoutubePlayerPlugin,
                start: true,
            },
        ],
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
