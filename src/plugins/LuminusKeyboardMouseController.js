import Phaser from 'phaser';
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
    }

    /**
     * Created all logic for keyboard and mouse.
     */
    create() {
        this.scene.input.mouse.disableContextMenu();
        this.luminusBattleManager = new LuminusBattleManager();
        this.scene.input.on('pointerdown', (pointer) => {
            if (pointer.leftButtonDown()) {
                this.luminusBattleManager.atack(this.player);
            }
        });

        this.scene.input.keyboard.on('keydown', (keydown) => {
            if (keydown.keyCode === 32) {
                this.luminusBattleManager.atack(this.player);
            }
        });
    }
}
