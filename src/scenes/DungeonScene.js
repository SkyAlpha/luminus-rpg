import Phaser from 'phaser';
import { LuminusMovement } from '../plugins/LuminusMovement';
import { Player } from '../entities/Player';
import { LuminusDungeonGenerator } from '../plugins/LuminusDungeonGenerator';

export class DungeonScene extends Phaser.Scene {
    constructor() {
        super({
            key: 'DungeonScene',
        });
    }

    create() {
        this.dungeon = new LuminusDungeonGenerator(this);
        this.dungeon.create();

        this.player = new Player(
            this,
            this.dungeon.map.widthInPixels / 2,
            this.dungeon.map.heightInPixels / 2,
            'character'
        );

        this.player.play('idle-down');

        this.cameras.main.startFollow(this.player);
        // this.cameras.main.setZoom(2.5);
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
        this.scene.launch('JoystickScene', {
            player: this.player,
            map: this.dungeon.map,
        });
        this.scene.launch('HUDScene');
        this.joystickScene = this.scene.get('JoystickScene');
        this.movement = new LuminusMovement(
            this,
            this.player,
            this.joystickScene
        );
    }

    update() {
        this.movement.move();
    }
}
