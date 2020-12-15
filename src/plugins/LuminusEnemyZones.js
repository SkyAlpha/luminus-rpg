import Phaser from 'phaser';
import { Enemy } from '../entities/Enemy';

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
         * @type { Phaser.GameObjects.Zone[] }
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

        /**
         * The texture that will be applyed to the enemy.
         * @type { string }
         * @default
         */
        this.texturePropertyName = 'texture';
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
                    let number = infoObj.properties.find(
                        (f) => f.name === this.numberPropertyName
                    );

                    if (number) {
                        number = number.value;
                    }

                    let texture = infoObj.properties.find(
                        (f) => f.name === this.texturePropertyName
                    );

                    if (texture) {
                        texture = texture.value;
                    }
                    for (let i = 0; i < number; i++) {
                        const pos = Phaser.Geom.Rectangle.Random(spriteBounds);
                        const enemy = new Enemy(
                            this.scene,
                            pos.x,
                            pos.y,
                            texture ? texture : 'bat'
                        );
                        const idleAnimation = texture
                            ? `${texture}-idle-down`
                            : `bat-idle-down`;
                        enemy.anims.play(idleAnimation);
                        enemy.body.setSize(enemy.width, enemy.height);
                        this.scene.enemies.push(enemy);
                    }
                }
                this.zones.push(zone);
            });
        }
    }
}
