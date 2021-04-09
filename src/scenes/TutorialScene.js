import { TilesetImageConfig } from '../models/TilesetImageConfig';
import { LuminusMapCreator } from '../plugins/LuminusMapCreator';

export class TutorialScene extends Phaser.Scene {
    constructor() {
        super({
            key: 'TutorialScene',
        });
    }

    create() {
        let map = new LuminusMapCreator(this);
        map.mapName = 'tutorial';
        map.tilesetImages = [
            new TilesetImageConfig(
                'tutorial_tileset_extruded',
                'tutorial_tileset'
            ),
        ];
        map.create();
        this.cameras.main.startFollow(this.player.container);
        this.cameras.main.setZoom(2.5);
    }
}
