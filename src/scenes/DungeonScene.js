import Phaser from 'phaser';
import { LuminusMovement } from '../plugins/LuminusMovement';
import { Player } from '../entities/Player';
import { LuminusDungeonGenerator } from '../plugins/LuminusDungeonGenerator';
import { LuminusKeyboardMouseController } from '../plugins/LuminusKeyboardMouseController';

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

        this.cameras.main.startFollow(this.player);
        this.cameras.main.setZoom(2.5);
        // camera.setBounds(
        //     0,
        //     0,
        //     this.dungeon.map.widthInPixels,
        //     this.dungeon.map.heightInPixels
        // );

        this.physics.add.collider(this.player, this.dungeon.groundLayer);
        this.scene.launch('DialogScene', {
            player: this.player,
            map: this.dungeon.map,
        });

        this.scene.launch('HUDScene');

        var spriteBounds = Phaser.Geom.Rectangle.Inflate(
            Phaser.Geom.Rectangle.Clone(
                this.add.rectangle(
                    this.dungeon.map.widthInPixels / 2,
                    this.dungeon.map.heightInPixels / 2,
                    250,
                    250
                )
            ),
            0,
            0
        );

        this.enemies = [];
        for (let i = 0; i < 10; i++) {
            const pos = Phaser.Geom.Rectangle.Random(spriteBounds);
            const enemy = this.physics.add.sprite(pos.x, pos.y, 'bat');
            enemy.anims.play('bat-idle-down');
            enemy.body.setSize(enemy.body.width, enemy.body.height);
            enemy.body.immovable = true;
            this.enemies.push(enemy);
        }

        this.physics.add.collider(this.player, this.enemies);

        this.sound.volume = 0.2;
    }

    update() {}
}
