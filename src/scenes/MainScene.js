import Phaser from 'phaser';
import { LuminusWarp } from '../plugins/LuminusWarp';
import { Player } from '../entities/Player';
import { LuminusMovement } from '../plugins/LuminusMovement';
import { LuminusObjectMarker } from '../plugins/LuminusObjectMarker';
import AnimatedTiles from '../plugins/AnimatedTiles';
import { LuminusEnvironmentParticles } from '../plugins/LuminusEnvironmentParticles';
import { LuminusOutlineEffect } from '../plugins/LuminusOutlineEffect';
import { LuminusEnemyZones } from '../plugins/LuminusEnemyZones';
import { Item } from '../entities/Item';

let map;

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

        this.cameras.main.setZoom(2.5);

        map = this.make.tilemap({ key: 'larus' });
        const tileset_overworld = map.addTilesetImage(
            'base',
            'tiles_overworld',
            16,
            16,
            1,
            2
        );
        const inner = map.addTilesetImage('inner', 'inner', 16, 16, 1, 2);
        const collision_tilset = map.addTilesetImage(
            'collision',
            'collision_tiles'
        );

        const base = map.createLayer('base', [inner, tileset_overworld]);
        const overlay = map.createLayer('overlay', [inner, tileset_overworld]);
        const overlay2 = map.createLayer('overlay2', [
            inner,
            tileset_overworld,
        ]);
        const overlay3 = map.createLayer('overlay3', [
            inner,
            tileset_overworld,
        ]);
        const overlay4 = map.createLayer('overlay4', [
            inner,
            tileset_overworld,
        ]);
        this.overplayer_layer = map.createLayer('overplayer', [
            tileset_overworld,
            inner,
        ]);
        const overplayer_layer2 = map.createLayer('overplayer2', [
            tileset_overworld,
            inner,
        ]);
        const collision_layer = map.createLayer('collision', collision_tilset);
        this.overplayer_layer.depth = 99;
        overplayer_layer2.depth = 100;
        // Hides the collision map.
        collision_layer.alpha = 0;

        collision_layer.setCollisionByProperty({ collides: true });

        const spawnPoint = map.findObject(
            'spawn',
            (obj) => obj.name === 'Spawn Point'
        );

        this.player = new Player(this, spawnPoint.x, spawnPoint.y, 'character');

        this.potion = new Item(
            this,
            spawnPoint.x,
            spawnPoint.y + 20,
            'red_potion'
        );

        this.physics.add.collider(this.potion, this.player, (item, player) => {
            // TODO - Player Pickup the item.
            item.consume(player);
        });

        const camera = this.cameras.main;
        camera.startFollow(this.player.container);

        // camera.setBounds(0, 0, map.widthInPixels, map.heightInPixels);

        const phaserWarp = new LuminusWarp(this, this.player, map);
        phaserWarp.createWarps();
        const interactiveMarkers = new LuminusObjectMarker(this, map);
        interactiveMarkers.create();

        // this.cameras.main.disableCull = false;
        // this.cameras.main.setBounds(
        //     0,
        //     0,
        //     map.widthInPixels,
        //     map.heightInPixels
        // );

        // this.scene.launch('JoystickScene', {
        //     player: this.player,
        //     map: map,
        // });

        this.scene.launch('DialogScene', {
            player: this.player,
            map: map,
        });

        this.joystickScene = this.scene.get('JoystickScene');

        this.scene.launch('HUDScene');

        this.sys.animatedTiles.init(map);
        this.particles = new LuminusEnvironmentParticles(this, map);
        this.particles.createParticles('forest');

        this.outlineEffect = new LuminusOutlineEffect(this);

        this.sound.volume = 0.35;
        this.themeSound = this.sound.add('path_to_lake_land', {
            loop: true,
        });
        this.themeSound.play();

        this.enemies = [];

        this.luminusEnemyZones = new LuminusEnemyZones(this, map);
        this.luminusEnemyZones.create();
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
