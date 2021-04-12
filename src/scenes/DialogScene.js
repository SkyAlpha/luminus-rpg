import Phaser from 'phaser';
import { LuminusTiledInfoBox } from '../plugins/LuminusTiledInfoBox';

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
         * @type { Phaser.Tilemaps.Tilemap } */
        this.map = null;
    }

    /**
     *
     * @param { any } args The arguments object.
     */
    init(args) {
        this.player = args.player;
        this.map = args.map;
        this.mainScene = args.scene;
    }

    create() {
        /**
         * @type { LuminusTiledInfoBox }
         */
        this.luminusTiledInfoBox = new LuminusTiledInfoBox(
            this.mainScene,
            this.player,
            this.map,
            this
        );
        this.luminusTiledInfoBox.create();

        this.scale.on('resize', (resize) => {
            if (
                this.luminusTiledInfoBox &&
                this.luminusTiledInfoBox.luminusDialogBox
            ) {
                this.luminusTiledInfoBox.luminusDialogBox.resizeComponents(
                    resize.width,
                    resize.height
                );
            }
        });

        this.input.on('pointerdown', (pointer) => {
            // console.log(this.cameras.main);
        });
    }

    update() {
        if (this.luminusTiledInfoBox)
            this.luminusTiledInfoBox.luminusDialogBox.checkUpdate();
    }
}
