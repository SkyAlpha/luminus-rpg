import { CHATS } from '../consts/DB_SEED/Chats';
import { Player } from '../entities/Player';
import { LuminusDialogBox } from './LuminusDialogBox';

/**
 * @class
 */
export class LuminusTiledInfoBox {
	/**
	 * This class allows one to create Dialogs with "Tiled" map editor <a href="https://www.mapeditor.org/">Tiled</a>
	 * Using the Objects layer https://doc.mapeditor.org/en/stable/manual/objects/ and open them seamlessly with phaser.
	 *
	 * You should add a game object to check if it overlaps your dialog information.
	 *
	 * Simply put, It Creates a Dialog to show messages from static objects created with "Tiled".
	 * @param {Phaser.Scene} scene Scene Context.
	 * @param {Phaser.GameObjects} player Player Game Object.
	 * @param {Phaser.Tilemaps.Tilemap} map Tile Map to get the object from.
	 * @param {Phaser.Scene} uiScene the User interface Scene. Usually this is an overlay Scene, so the game objects don be affected by the game zoom and don't lose quality on Scale.
	 */
	constructor(scene, player, map, uiScene) {
		/**
		 * Tile Map to get the object from.
		 * @type {Phaser.Tilemaps.Tilemap} */
		this.map = map;
		/**
		 * Scene Context.
		 * @type { Phaser.Scene }  */
		this.scene = scene;

		/**
		 * Dialog Scene to create the dialog.
		 * @type { Phaser.Scene }  */
		this.uiScene = uiScene;
		/**
		 * player Player Game Object.
		 * @type { Player }  */
		this.player = player;
		/**
		 * The Dialog box that will show de text from Tiled.
		 * @type { LuminusDialogBox }
		 */
		this.luminusDialogBox = new LuminusDialogBox(this.uiScene, this.player);
		/**
		 * Name of the object Layer in the "Tiled" software. <a href="https://www.mapeditor.org/">Tiled</a>
		 * Check Tiled Docs to learn more <a href="https://doc.mapeditor.org/en/stable/manual/objects/">Tiled</a>
		 * @type {string}
		 * @default
		 * */
		this.tiledObjectLayer = 'info';

		/**
		 * Object Attribute that the you created in the Tiled Software to define your messages.
		 * @type {string}
		 * @default
		 * */
		this.messageAttribute = 'messageID';
	}

	/**
	 * Creates the zones to make it possible to show the message.
	 */
	create() {
		// Creates the dialog information.
		this.luminusDialogBox.create();
		// Rules to show informations!
		const infoObjects = this.map.getObjectLayer(this.tiledObjectLayer);
		let zones = [];
		if (infoObjects && infoObjects.objects) {
			infoObjects.objects.forEach((infoObj) => {
				let zone = this.scene.add.zone(infoObj.x, infoObj.y, infoObj.width, infoObj.height);
				let obj = infoObj.properties.find((f) => f.name === this.messageAttribute);
				if (!obj) {
					return;
				}
				let messageID = obj.value;
				let chat = CHATS.find((c) => c.id == messageID);
				this.scene.physics.add.existing(zone);
				zone.setOrigin(0, 0);
				zone.body.immovable = true;
				zones.push({
					...zone,
					chat: chat.chat,
					properties: infoObj.properties,
				});
			});
		}

		/**
		 * Checks if the player is overlapping the Tiled map Zone.
		 */
		this.scene.physics.add.overlap(
			zones,
			this.player.hitZone,
			(zone) => {
				this.luminusDialogBox.allProperties = zone.properties;
				this.luminusDialogBox.isOverlapingChat = true;
				this.luminusDialogBox.actionButton.visible = true;
				this.luminusDialogBox.interactionIcon.visible = true;
				this.luminusDialogBox.chat = zone.chat;
				this.player.canAtack = false;
			},
			(d) => {
				return this.luminusDialogBox.canShowDialog;
			}
		);
	}
}
