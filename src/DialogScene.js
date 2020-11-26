import Phaser from 'phaser';
import { PhaserTiledInfoBox } from './plugins/PhaserTiledInfoBox';

export class DialogScene extends Phaser.Scene {
    constructor() {
        super({
            key: 'DialogScene',
        });
        /**
         * Player game object.
         * @type { Phaser.GameObjects }
         */
        this.player = null;

        /**
         * Tile Map to get the object from.
         * @type {Phaser.Tilemaps.Tilemap} */
        this.map = null;
    }

    create() {
        this.mainScene = this.scene.get('MainScene');

        this.mainScene.events.on(
            'setConfiguration',
            (args) => {
                console.log('aosdjfoaisfdj');
                this.player = args.player;
                this.map = args.map;
                /**
                 * @type {PhaserTiledInfoBox}
                 */
                this.phaserTiledInfoBox = new PhaserTiledInfoBox(
                    this.mainScene,
                    this.player,
                    this.map,
                    this
                );
                this.phaserTiledInfoBox.create();
            },
            this
        );
    }

    update() {
        if (this.phaserTiledInfoBox)
            this.phaserTiledInfoBox.phaserDialogBox.checkUpdate();
    }
}
