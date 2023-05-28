import Phaser from 'phaser';
import { AttributeSceneName } from '../scenes/AttributeScene';
import { InventorySceneName } from '../scenes/InventoryScene';
import { SceneToggleWatcher } from '../scenes/watchers/SceneToggleWatcher';
import { LuminusBattleManager } from './LuminusBattleManager';

/**
 * @class
 */
export class LuminusKeyboardMouseController {
	/**
	 * This class is responsible for managing all keyboard and mouse inputs.
	 * This class should be imported only once in your Scene, and should not be active in multiple scenes, so you can better manage the player inputs.
	 * @param { Phaser.Scene } scene The Scene which this class is a child.
	 * @param { Phaser.Physics.Arcade.Sprite } player The player to manage the input.
	 */
	constructor(scene, player) {
		/**
		 * The scene.
		 * @type { Phaser.Scene }
		 */
		this.scene = scene;

		/**
		 * The Player that will receive the inputs and interactions.
		 * @type { Phaser.Physics.Arcade.Sprite }
		 */
		this.player = player;

		/**
		 * The Luminus Battle Manager.
		 * @type { LuminusBattleManager }
		 */
		this.luminusBattleManager = null;

		/**
		 * The name of the inventory Scene. It should match the Scene name so the player is able to open the inventory.
		 * @type { string }
		 * @default
		 */
		this.inventorySceneName = InventorySceneName;

		/**
		 * The name of the Attribute Management/Info Scene.
		 * @type { string }
		 * @default
		 */
		this.attributeSceneName = AttributeSceneName;
	}

	/**
	 * Created all logic for keyboard and mouse.
	 */
	create() {
		const isMobile = !this.scene.sys.game.device.os.desktop ? true : false;
		this.scene.input.mouse.disableContextMenu();
		this.luminusBattleManager = new LuminusBattleManager();
		this.scene.input.on('pointerdown', (pointer) => {
			if (pointer.leftButtonDown() && !isMobile && this.player && this.player.active) {
				this.luminusBattleManager.atack(this.player);
			}
		});

		this.scene.input.keyboard.on('keydown', (keydown) => {
			if (keydown.keyCode === 32 && this.player && this.player.active) {
				this.luminusBattleManager.atack(this.player);
			}
			if (keydown.keyCode === 73 && this.player && this.player.active) {
				SceneToggleWatcher.toggleScene(this.scene, this.inventorySceneName, this.player);
			}
			if (keydown.keyCode === 85 && this.player && this.player.active) {
				SceneToggleWatcher.toggleScene(this.scene, this.attributeSceneName, this.player);
			}
		});
	}
}
