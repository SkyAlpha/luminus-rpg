import Phaser from 'phaser';
import { MainScene } from './MainScene';
import { Plugin as NineSlicePlugin } from 'phaser3-nineslice';

const config = {
    type: Phaser.AUTO,
    parent: 'collision-test',
    width: 800,
    height: 600,
    scene: [MainScene],
    plugins: {
        global: [NineSlicePlugin.DefaultCfg],
    },
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
