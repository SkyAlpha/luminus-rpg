import tiles from '../assets/maps/tilesets/Overworld.png';
import inner from '../assets/maps/tilesets/Inner.png';
import collision_tile from '../assets/maps/tilesets/collision.png';
import player_image from '../assets/sprites/player.png';
import dialog from '../assets/sprites/dialog_paper.png';
import space from '../assets/sprites/space_key.png';
import buttonA from '../assets/sprites/buttonA.png';
import question_mark from '../assets/sprites/question_mark.png';
import spread from '../assets/sprites/spread.png';
import maximize from '../assets/sprites/maximize.png';
import close from '../assets/sprites/close.png';
import tile_map_json from '../assets/maps/larus/larus.json';
import Phaser from 'phaser';
import { PhaserWarp } from '../plugins/PhaserWarp';
import { Player } from '../entities/Player';
import { LuminusMovement } from '../plugins/LuminusMovement';
import { ObjectInteractionMarker } from '../plugins/ObjectInteractionMarker';

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
        this.load.image('player', player_image);
        this.load.image('dialog', dialog);
        this.load.image('space', space);
        this.load.image('buttonA', buttonA);
        this.load.image('question_mark', question_mark);
        this.load.image('spread', spread);
        this.load.image('maximize', maximize);
        this.load.image('close_button', close);
        this.load.image('tiles', tiles);
        this.load.image('collision_tiles', collision_tile);
        this.load.image('inner', inner);

        this.load.tilemapTiledJSON('larus', tile_map_json);
        // this.load.css('nescss', 'node_modules/nes.css/css/nes.min.css');
        this.load.script(
            'webfont',
            'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js'
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

        // WebFont.load({
        //     google: {
        //         families: ['Press Start 2P'],
        //     },
        //     active: function () {},
        // });
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

        const phaserWarp = new PhaserWarp(this, this.player, map);
        phaserWarp.createWarps();
        const interactiveMarkers = new ObjectInteractionMarker(this, map);
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
