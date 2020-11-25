import Phaser from 'phaser';
import tiles from './assets/maps/Overworld.png';
import collision_tile from './assets/maps/collision.png';
import tile_map_json from './assets/maps/larus.json';
import player_image from './assets/sprites/player.png';
import dialog from './assets/sprites/dialog.png';
import space from './assets/sprites/space_key.png';
import { PhaserWarp } from './plugins/PhaserWarp';
import { PhaserTiledInfoBox } from './plugins/PhaserTiledInfoBox';

let player;
let cursors;
const speed = 175;

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
        const map = this.make.tilemap({ key: 'larus' });
        const tileset = map.addTilesetImage('base', 'tiles', 16, 16, 0, 0);
        const collision_tilset = map.addTilesetImage(
            'collision',
            'collision_tiles'
        );

        const base = map.createStaticLayer('base', tileset);
        const overlay = map.createStaticLayer('overlay', tileset);
        const collision_layer = map.createStaticLayer(
            'collision',
            collision_tilset
        );
        const overplayer_layer = map.createStaticLayer(
            'overplayer',
            tileset,
            0,
            0
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

        const phaserWarp = new PhaserWarp(this, player, map);
        phaserWarp.createWarps();
        /**
         * @type {PhaserTiledInfoBox}
         */
        this.phaserTiledInfoBox = new PhaserTiledInfoBox(this, player, map);
        this.phaserTiledInfoBox.create();
    }

    update(time, delta) {
        this.phaserTiledInfoBox.phaserDialogBox.checkUpdate();
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
