import Phaser from 'phaser';
import tiles from './assets/maps/tilesets/Overworld.png';
import inner from './assets/maps/tilesets/Inner.png';
import collision_tile from './assets/maps/tilesets/collision.png';
import tile_map_json from './assets/maps/larus/larus.json';
import player_image from './assets/sprites/player.png';
import dialog from './assets/sprites/dialog.png';
import space from './assets/sprites/space_key.png';
import { PhaserWarp } from './plugins/PhaserWarp';
import { PhaserTiledInfoBox } from './plugins/PhaserTiledInfoBox';

let player;
let cursors;
const speed = 175;
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

        player = this.add.sprite(spawnPoint.x, spawnPoint.y, 'player');
        this.physics.add.existing(player);
        player.body.maxSpeed = speed;
        const camera = this.cameras.main;
        camera.startFollow(player);

        // camera.setBounds(0, 0, map.widthInPixels, map.heightInPixels);

        this.physics.add.collider(player, collision_layer);

        cursors = this.input.keyboard.createCursorKeys();

        this.cameras.main.setZoom(2);
        const phaserWarp = new PhaserWarp(this, player, map);
        phaserWarp.createWarps();
        this.scene.launch('DialogScene');

        setTimeout((t) => {
            this.events.emit('setConfiguration', { player, map });
        });

        this.notShown = true;

        this.input.on('pointerdown', (pointer) => {
            console.log(this.cameras.main);
        });
    }

    update(time, delta) {
        if (this.input.isActive) {
            // Stop any previous movement from the last frame
            player.body.setVelocity(0);

            // Horizontal movement
            if (cursors.left.isDown) {
                player.body.setVelocityX(-100);
            } else if (cursors.right.isDown) {
                player.body.setVelocityX(100);
            }

            // Vertical movement
            if (cursors.up.isDown) {
                player.body.setVelocityY(-100);
            } else if (cursors.down.isDown) {
                player.body.setVelocityY(100);
            }

            // Normalize and scale the velocity so that player can't move faster along a diagonal
            player.body.velocity.normalize().scale(speed);
        } else {
            player.body.setVelocityY(0);
            player.body.setVelocityX(0);
        }
    }
}
