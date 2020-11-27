import Phaser from 'phaser';

export class ObjectInteractionMarker {
    /**
     * Displays a marker on interactive objects.
     * @param { Phaser.Scene } scene Parent Scene.
     * @param {Phaser.Tilemaps.Tilemap} map Tile Map to get the markers from.
     */
    constructor(scene, map) {
        /**
         * scene Scene Context.
         * @type { Phaser.Scene }  */
        this.scene = scene;
        /**
         * Tile Map to get the object from.
         * @type {Phaser.Tilemaps.Tilemap} */
        this.map = map;

        /**
         * Marker name.
         * @type { string }
         */
        this.tiledObjectLayer = 'markers';

        /**
         * Interaction indicator Sprite name.
         * @type { string }
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
