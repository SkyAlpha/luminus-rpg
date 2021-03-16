import Phaser from 'phaser';
import { ENTITIES } from '../consts/Entities';

/**
 * @class
 */
export class LuminusDamageDisplay {
    /**
     * This class is responsible for displaying the damage that an entity receives.
     * @param {Phaser.Scene} scene Scene Context.
     */
    constructor(scene) {
        /**
         * Scene Context.
         * @type { Phaser.Scene }
         */
        this.scene = scene;

        /**
         * The font size of the text.
         * @type { string }
         */
        this.fontSize = '12px';

        /**
         * Font family to be used. It has to be included in your Phaser project.
         * @type { string }
         * @default
         */
        this.fontFamily = '"Press Start 2P"';

        /**
         * Color of the font.
         * @type { Phaser.Display.Color }
         * @default
         */
        this.fontColor = `white`;
        // this.fontColor = new Phaser.Display.Color(255, 255, 255, 1);

        /**
         * Space between lines of the dialog text.
         * @type { number }
         * @default
         *  */
        this.letterSpacing = 0;
    }

    /**
     * Displays the damage dealth to a given game entity.
     * @param {number} damage The damage number that should be displayed
     * @param { Phaser.Physics.Arcade.Sprite } target The sprite that the damage should be displayed on.
     */
    displayDamage(damage, target, isCritical = false, isHealing = false) {
        const position = {
            x: target.container.x,
            y: target.container.y - 10,
        };

        if (target.entityName === ENTITIES.Player) {
            this.fontColor = `yellow`;
        }

        if (isCritical) {
            this.fontColor = `red`;
        }

        if (isHealing) {
            this.fontColor = `green`;
        }

        let damageSprite = this.scene.add.text(position.x, position.y, damage, {
            fontSize: this.fontSize,
            letterSpacing: this.letterSpacing,
            fontFamily: this.fontFamily,
            color: this.fontColor,
        });
        damageSprite.setOrigin(0.5, 1);

        damageSprite.setScale(0.4);

        let tween = this.scene.add.tween({
            targets: damageSprite,
            y: position.y - 5,
            alpha: 0,
            duration: 1000,
            onComplete: (t) => {
                damageSprite.destroy();
            },
        });
    }
}
