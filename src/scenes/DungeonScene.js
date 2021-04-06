import Phaser from 'phaser';
import { LuminusMovement } from '../plugins/LuminusMovement';
import { Player } from '../entities/Player';
import { LuminusDungeonGenerator } from '../plugins/LuminusDungeonGenerator';
import { LuminusFogWarManager } from '../plugins/LuminusFogWarManager';
import { Enemy } from '../entities/Enemy';

export class DungeonScene extends Phaser.Scene {
    constructor() {
        super({
            key: 'DungeonScene',
        });
    }

    /**
     * Creates the Dungeon Scene
     */
    create() {
        this.dungeon = new LuminusDungeonGenerator(this);
        this.dungeon.create();

        this.player = new Player(
            this,
            this.dungeon.map.widthInPixels / 2,
            this.dungeon.map.heightInPixels / 2,
            'character',
            this.dungeon.map
        );

        this.cameras.main.startFollow(this.player.container);
        this.cameras.main.setZoom(2.5);
        // camera.setBounds(
        //     0,
        //     0,
        //     this.dungeon.map.widthInPixels,
        //     this.dungeon.map.heightInPixels
        // );

        this.physics.add.collider(
            this.player.container,
            this.dungeon.groundLayer
        );
        // if (!this.scene.isActive('JoystickScene')) {
        //     this.scene.launch('JoystickScene', {
        //         player: this.player,
        //         map: this.dungeon.map,
        //     });
        // }
        this.scene.launch('DialogScene', {
            player: this.player,
            map: this.dungeon.map,
        });

        this.scene.launch('HUDScene', { player: this.player });
        this.enemies = [];
        this.dungeon.dungeon.rooms.forEach((room) => {
            var spriteBounds = Phaser.Geom.Rectangle.Inflate(
                Phaser.Geom.Rectangle.Clone(
                    this.add.rectangle(
                        (room.x + 1) * this.dungeon.tileWidth,
                        (room.y + 1) * this.dungeon.tileWidth,
                        (room.width - 3) * this.dungeon.tileWidth,
                        (room.height - 3) * this.dungeon.tileWidth
                    )
                ),
                0,
                0
            );
            for (let i = 0; i < 5; i++) {
                const pos = Phaser.Geom.Rectangle.Random(spriteBounds);
                const enemy = new Enemy(this, pos.x, pos.y, 'bat', 2);
                this.enemies.push(enemy);
            }
        });

        this.physics.add.collider(this.player.container, this.enemies);

        this.sound.volume = 0.4;

        this.themeSong = this.sound.add('dark_theme', {
            loop: true,
        });
        this.themeSong.play();

        this.ambientSound = this.sound.add('dungeon_ambient', {
            volume: 1,
            loop: true,
        });
        this.ambientSound.play();

        this.fog = new LuminusFogWarManager(
            this,
            this.dungeon.map,
            this.player
        );
        this.fog.createFog();
    }

    update() {
        this.fog.updateFog();
    }
}
