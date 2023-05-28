import { PlayerConfig } from '../consts/player/Player';
import { Player } from '../entities/Player';
import { TilesetImageConfig } from '../models/TilesetImageConfig';

/**
 * @class
 */
export class LuminusMapCreator {
	/**
	 * This class is responsible for creating the map with all it's Layers
	 * @param { Phaser.Scene } scene The Parent Phaser Scene.
	 */
	constructor(scene) {
		/**
		 * The Parent Phaser Scene.
		 * @type { Phaser.Scene }
		 */
		this.scene = scene;

		/**
		 * @type { string }
		 * @default
		 */
		this.mapName = 'larus';

		/**
		 * The name of the LAYER Property that will make it change the Depth of the layer.
		 * @type { string }
		 * @default
		 */
		this.depthProperty = 'depth';

		/**
		 * The name of the LAYER Property that will make the layer collide.
		 * @type { string }
		 * @default
		 */
		this.collisionPropperty = 'collides';

		/**
		 * The Object Layer Name defined to create the Spawn point of the player.
		 * @type { string }
		 * @default
		 */
		this.spawnObjectLayer = 'spawn';

		/**
		 * The name of the Point Object in the Spawn layer that will define the Spawn point of the player.
		 * @type { string }
		 * @default
		 */
		this.spawnObjectPoint = 'Spawn Point';

		/**
		 * The player texture that will be used to create the Player Sprite in case the Spawn point is defined.
		 * @type { string }
		 */
		this.playerTexture = PlayerConfig.texture;

		/**
		 * The Collision Layer Opacity. Set it to more than zero if you want to see it.
		 * @type { number }
		 * @default
		 */
		this.collisionLayerAlpha = 0;

		/**
		 * The Tilemap itself
		 * @type { Phaser.Tilemaps.Tilemap }
		 */
		this.map = null;

		/**
		 * The Tilemap Layer that has the collision Propperty.
		 * @type { Phaser.Tilemaps.TilemapLayer }
		 */
		this.collisionLayer = null;

		/**
		 * An array with the Tileset Images configuration.
		 * @type { Array.<TilesetImageConfig> }
		 */
		this.tilesetImages = [
			new TilesetImageConfig('base', 'tiles_overworld'),
			new TilesetImageConfig('inner', 'inner'),
			new TilesetImageConfig('collision', 'collision_tiles'),
		];
	}

	create() {
		this.map = this.scene.make.tilemap({ key: this.mapName });
		this.tilesetImages.forEach((tilesetImage) => {
			this.map.addTilesetImage(
				tilesetImage.tilesetName,
				tilesetImage.assetName,
				tilesetImage.width,
				tilesetImage.height,
				tilesetImage.margin,
				tilesetImage.spacing
			);
		});

		this.map.layers.forEach((layer) => {
			let currentLayer = this.map.createLayer(layer.name, this.map.tilesets);
			const depth = layer.properties.find((f) => f.name === this.depthProperty);
			if (depth) {
				currentLayer.depth = depth.value;
			}
			const collides = layer.properties.find((f) => f.name === this.collisionPropperty);

			// If you want to see the Collision layer the alpha should be higher than zero.
			if (collides && collides.value) {
				currentLayer.alpha = this.collisionLayerAlpha;

				currentLayer.setCollisionByProperty({ collides: true });
				this.collisionLayer = currentLayer;
			}
		});

		const spawnPoint = this.map.findObject(this.spawnObjectLayer, (obj) => obj.name === this.spawnObjectPoint);
		if (spawnPoint) {
			this.scene[PlayerConfig.variableName] = new Player(
				this.scene,
				spawnPoint.x,
				spawnPoint.y,
				PlayerConfig.texture
			);
		}

		if (this.collisionLayer) {
			this.scene.physics.add.collider(this.scene[PlayerConfig.variableName].container, this.collisionLayer);
		}
	}
}
