import Phaser from 'phaser';
import { LuminusWarp } from '../plugins/LuminusWarp';
import { Player } from '../entities/Player';
import { LuminusMovement } from '../plugins/LuminusMovement';
import { LuminusObjectMarker } from '../plugins/LuminusObjectMarker';

let cursors;
let map;

export class MainScene extends Phaser.Scene {
    constructor() {
        super({
            key: 'MainScene',
        });
        this.player = null;
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
        const tileset = map.addTilesetImage('base', 'tiles', 16, 16, 0, 0);
        const inner = map.addTilesetImage('inner', 'inner', 16, 16, 0, 0);
        const collision_tilset = map.addTilesetImage(
            'collision',
            'collision_tiles'
        );

        const base = map.createDynamicLayer('base', [tileset, inner]);
        const overlay = map.createDynamicLayer('overlay', [tileset, inner]);
        const overlay2 = map.createDynamicLayer('overlay2', [tileset, inner]);
        const overlay3 = map.createDynamicLayer('overlay3', [tileset, inner]);
        const overlay4 = map.createDynamicLayer('overlay4', [tileset, inner]);
        const overplayer_layer = map.createDynamicLayer('overplayer', [
            tileset,
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

        this.player.body.setSize(12, 16);
        // player.body.offset.y = 20;
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
    }

    update(time, delta) {
        this.movement.move();
    }
}
