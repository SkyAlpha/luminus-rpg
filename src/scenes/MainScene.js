import Phaser from 'phaser';
import { LuminusWarp } from '../plugins/LuminusWarp';
import { LuminusObjectMarker } from '../plugins/LuminusObjectMarker';
import AnimatedTiles from '../plugins/AnimatedTiles';
import { LuminusEnvironmentParticles } from '../plugins/LuminusEnvironmentParticles';
import { LuminusOutlineEffect } from '../plugins/LuminusOutlineEffect';
import { LuminusEnemyZones } from '../plugins/LuminusEnemyZones';
import { LuminusMapCreator } from '../plugins/LuminusMapCreator';
import { Item } from '../entities/Item';

export class MainScene extends Phaser.Scene {
    constructor() {
        super({
            key: 'MainScene',
        });
        this.player = null;
    }

    preload() {
        this.load.scenePlugin(
            'animatedTiles',
            AnimatedTiles,
            'animatedTiles',
            'animatedTiles'
        );
    }

    create() {
        // if (
        //     !this.scale.isFullscreen && !this.sys.game.device.os.desktop
        //         ? true
        //         : false
        // ) {
        //     this.scale.startFullscreen();
        // }

        this.cameras.main.setZoom(3.5);

        this.mapCreator = new LuminusMapCreator(this);
        this.mapCreator.create();

        const camera = this.cameras.main;
        camera.startFollow(this.player.container);

        const luminusWarp = new LuminusWarp(
            this,
            this.player,
            this.mapCreator.map
        );
        luminusWarp.createWarps();
        const interactiveMarkers = new LuminusObjectMarker(
            this,
            this.mapCreator.map
        );
        interactiveMarkers.create();

        this.scene.launch('DialogScene', {
            player: this.player,
            map: this.mapCreator.map,
            scene: this,
        });

        this.joystickScene = this.scene.get('JoystickScene');

        this.scene.launch('HUDScene', { player: this.player });

        this.sys.animatedTiles.init(this.mapCreator.map);
        this.particles = new LuminusEnvironmentParticles(
            this,
            this.mapCreator.map
        );
        this.particles.create();

        // this.outlineEffect = new LuminusOutlineEffect(this);

        this.sound.volume = 0.35;
        this.themeSound = this.sound.add('path_to_lake_land', {
            loop: true,
        });
        this.themeSound.play();

        this.enemies = [];

        this.luminusEnemyZones = new LuminusEnemyZones(
            this,
            this.mapCreator.map
        );
        this.luminusEnemyZones.create();

        new Item(
            this,
            this.player.container.x,
            this.player.container.y - 30,
            1
        );
    }

    /**
     * Stops all scene music.
     */
    stopSceneMusic() {
        this.themeSound.stop();
    }

    update(time, delta) {
        // this.outlineEffect.removeEffect(this.player.container);
        // this.physics.overlap(
        //     this.player,
        //     this.overplayer_layer,
        //     () => {
        //         this.outlineEffect.applyEffect(this.player.container);
        //     },
        //     (hitZone, tile) => tile.index > -1
        // );
    }
}
