import Phaser from 'phaser';
import { LuminusWarp } from '../plugins/LuminusWarp';
import { Player } from '../entities/Player';
import { LuminusMovement } from '../plugins/LuminusMovement';
import { LuminusObjectMarker } from '../plugins/LuminusObjectMarker';
import AnimatedTiles from '../plugins/AnimatedTiles';

let cursors;
let map;

export class MainScene extends Phaser.Scene {
    constructor() {
        super({
            key: 'MainScene',
        });
        this.player = null;
    }

    preload() {
        this.load.scenePlugin('animatedTiles', AnimatedTiles, 'animatedTiles', 'animatedTiles');
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

        const base = map.createDynamicLayer('base', [inner, tileset_overworld]);
        const overlay = map.createDynamicLayer('overlay', [
            inner,
            tileset_overworld,
        ]);
        const overlay2 = map.createDynamicLayer('overlay2', [
            inner,
            tileset_overworld,
        ]);
        const overlay3 = map.createDynamicLayer('overlay3', [
            inner,
            tileset_overworld,
        ]);
        const overlay4 = map.createDynamicLayer('overlay4', [
            inner,
            tileset_overworld,
        ]);
        const overplayer_layer = map.createDynamicLayer('overplayer', [
            tileset_overworld,
            inner,
        ]);
        const collision_layer = map.createDynamicLayer(
            'collision',
            collision_tilset
        );
        overplayer_layer.depth = 99;
        // Hides the collision map.
        collision_layer.alpha = 0;

        collision_layer.setCollisionByProperty({ collides: true });

        const spawnPoint = map.findObject(
            'spawn',
            (obj) => obj.name === 'Spawn Point'
        );

        this.player = new Player(this, spawnPoint.x, spawnPoint.y, 'character');

        this.player.body.setSize(12, 8);
        this.player.body.offset.y = 20;
        this.player.play('idle-down');

        const camera = this.cameras.main;
        camera.startFollow(this.player);

        // camera.setBounds(0, 0, map.widthInPixels, map.heightInPixels);

        this.physics.add.collider(this.player, collision_layer);

        const phaserWarp = new LuminusWarp(this, this.player, map);
        phaserWarp.createWarps();
        const interactiveMarkers = new LuminusObjectMarker(this, map);
        interactiveMarkers.create();

        this.scene.launch('DialogScene');
        this.scene.launch('JoystickScene');
        this.scene.launch('HUDScene');

        // this.cameras.main.disableCull = false;
        // this.cameras.main.setBounds(
        //     0,
        //     0,
        //     map.widthInPixels,
        //     map.heightInPixels
        // );

        this.joystickScene = this.scene.get('JoystickScene');
        this.movement = new LuminusMovement(
            this,
            this.player,
            this.joystickScene
        );

        // Only to give time to the scene to be initialized.
        setTimeout((t) => {
            this.events.emit('setConfiguration', {
                player: this.player,
                map,
            });
        }, 300);

        let themeSound = this.sound.add('path_to_lake_land', {
            loop: true,
        });
        themeSound.play();

        this.sys.animatedTiles.init(map);
    }

    update(time, delta) {
        this.movement.move();
    }
}
