import Phaser from 'phaser';

/**
 * @class
 */
export class ObjectInteractionMarker {
    /**
     * Displays a marker on interactive objects.
     * @param { Phaser.Scene } scene Parent Scene.
     * @param { Phaser.Tilemaps.DynamicTilemapLayer | Phaser.Tilemaps.StaticTilemapLayer} map Tile Map to get the markers from.
     */
    constructor(scene, map) {
        /**
         * Scene Context where it will create the markers.
         * @type { Phaser.Scene }  */
        this.scene = scene;
        /**
         * Tile Map to get the object from.
         * @type {Phaser.Tilemaps.Tilemap} */
        this.map = map;

        /**
         * Marker name.
         * @type { string }
         * @default
         */
        this.tiledObjectLayer = 'markers';

        /**
         * Interaction indicator Sprite name.
         * @type { string }
         * @default
         */
        this.markerSpriteName = 'question_mark';
    }

    create() {
        const infoObjects = this.map.getObjectLayer(this.tiledObjectLayer);
        infoObjects.objects.forEach((infoObj) => {
            this.scene.add.image(infoObj.x, infoObj.y, this.markerSpriteName);
        });
    }
}
