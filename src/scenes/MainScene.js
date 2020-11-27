import Phaser from 'phaser';
import tiles from '../assets/maps/tilesets/Overworld.png';
import inner from '../assets/maps/tilesets/Inner.png';
import collision_tile from '../assets/maps/tilesets/collision.png';
import player_image from '../assets/sprites/player.png';
import dialog from '../assets/sprites/dialog_paper.png';
import space from '../assets/sprites/space_key.png';
import buttonA from '../assets/sprites/buttonA.png';
import question_mark from '../assets/sprites/question_mark.png';
import tile_map_json from '../assets/maps/larus/larus.json';
import { PhaserWarp } from '../plugins/PhaserWarp';
import { Player } from '../entities/Player';
import { PhaserMovement } from '../plugins/PhaserMovement';

let player;
let cursors;
let map;

export class MainScene extends Phaser.Scene {
    constructor() {
        super({
            key: 'MainScene',
        });
    }

    preload() {
        this.load.image('player', player_image);
        this.load.image('dialog', dialog);
        this.load.image('space', space);
        this.load.image('buttonA', buttonA);
        this.load.image('question_mark', question_mark);
        this.load.image('tiles', tiles);
        this.load.image('collision_tiles', collision_tile);
        this.load.image('inner', inner);

        this.load.tilemapTiledJSON('larus', tile_map_json);
        this.load.css('nescss', 'node_modules/nes.css/css/nes.min.css');
        this.load.script(
            'webfont',
            'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js'
        );
    }

    create() {
        this.cameras.main.setZoom(2.5);

        WebFont.load({
            google: {
                families: ['Press Start 2P'],
            },
            active: function () {},
        });
        map = this.make.tilemap({ key: 'larus' });
        const tileset = map.addTilesetImage('base', 'tiles', 16, 16, 0, 0);
        const inner = map.addTilesetImage('inner', 'inner', 16, 16, 0, 0);
        const collision_tilset = map.addTilesetImage(
            'collision',
            'collision_tiles'
        );

        const base = map.createStaticLayer('base', [tileset, inner]);
        const overlay = map.createStaticLayer('overlay', [tileset, inner]);
        const overlay2 = map.createStaticLayer('overlay2', [tileset, inner]);
        const overlay3 = map.createStaticLayer('overlay3', [tileset, inner]);
        const overplayer_layer = map.createStaticLayer('overplayer', [
            tileset,
            inner,
        ]);
        const collision_layer = map.createStaticLayer(
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

        player = new Player(this, spawnPoint.x, spawnPoint.y, 'player');

        const camera = this.cameras.main;
        camera.startFollow(player);

        // camera.setBounds(0, 0, map.widthInPixels, map.heightInPixels);

        this.physics.add.collider(player, collision_layer);

        const phaserWarp = new PhaserWarp(this, player, map);
        phaserWarp.createWarps();
        this.scene.launch('DialogScene');
        this.scene.launch('JoystickScene');

        this.joystickScene = this.scene.get('JoystickScene');
        this.movement = new PhaserMovement(this, player, this.joystickScene);

        // Only to give time to the scene to be initialized.
        setTimeout((t) => {
            this.events.emit('setConfiguration', {
                player,
                map,
            });
        }, 300);
    }

    update(time, delta) {
        this.movement.move();
    }
}
