import Phaser from 'phaser';

/**
 * @class
 */
export class LuminusEnemyZones {
    /**
     * Sets a zone to create enemies within that Range.
     * @param { Phaser.Scene } scene Parent Scene.
     * @param { Phaser.Tilemaps.DynamicTilemapLayer | Phaser.Tilemaps.StaticTilemapLayer} map Tile Map to get the zones from.
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
         * The name of the object layer defined on the Tiled Map Editor.
         * @type { string }
         * @default
         */
        this.tiledObjectLayer = 'enemies';

        /**
         * Array of zones that will be created after it's
         * @type { Phaser.GameObjects.Zone [] }
         * @default
         */
        this.zones = [];

        /**
         * Defines if the class should create the enemies in the creation method.
         * @type { boolean }
         * @default
         */
        this.createFromProperties = true;

        /**
         * The propertie name that the game will look for the number of enemies. This is defined in the Tiled Software.
         * @type { string }
         * @default
         */
        this.numberPropertyName = 'number';
    }

    /**
     * Creates all enemy zones.
     */
    create() {
        const objectZones = this.map.getObjectLayer(this.tiledObjectLayer);
        if (
            objectZones &&
            objectZones.objects &&
            objectZones.objects.length > 0
        ) {
            objectZones.objects.forEach((infoObj) => {
                let zone = this.scene.add.zone(
                    infoObj.x,
                    infoObj.y,
                    infoObj.width,
                    infoObj.height
                );
                var spriteBounds = Phaser.Geom.Rectangle.Inflate(
                    Phaser.Geom.Rectangle.Clone(zone),
                    0,
                    0
                );
                if (this.createFromProperties && infoObj.properties) {
                    const number = infoObj.properties.find(
                        (f) => f.name === this.numberPropertyName
                    ).value;
                    for (let i = 0; i < number; i++) {
                        const pos = Phaser.Geom.Rectangle.Random(spriteBounds);
                        const enemy = this.scene.physics.add.sprite(
                            pos.x,
                            pos.y,
                            'bat'
                        );
                        enemy.anims.play('bat-idle-down');
                        enemy.body.setSize(enemy.body.width, enemy.body.height);
                        enemy.body.immovable = true;
                        this.scene.enemies.push(enemy);
                    }
                }
                this.zones.push(zone);
            });
        }
    }
}
