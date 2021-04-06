import Phaser from 'phaser';
import { ENTITIES } from '../consts/Entities';

/**
 * This class is responsible for displaying the damage that an entity receives.
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
         * @default
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

        /**
         * Color of the font when an Enemy hits the Player.
         * @type { Phaser.Display.Color }
         * @default
         */
        this.enemyDamageColor = `yellow`;

        /**
         * Color of the font when it's a critial hit.
         * @type { Phaser.Display.Color }
         * @default
         */
        this.criticalDamageColor = `red`;

        /**
         * Color of the font when it's healing.
         * @type { Phaser.Display.Color }
         * @default
         */
        this.heallingColor = 'green';

        /**
         * The amount of pixels that the font will move in the Y-Axis
         * @type { number }
         * @default
         */
        this.fontVerticalMovement = 5;

        /**
         * The amount of time that the vertical movement will take to finish.
         * @type { number }
         * @default
         */
        this.verticalMovementDuration = 1000;

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
            this.fontColor = this.enemyDamageColor;
        }

        if (isCritical) {
            this.fontColor = this.criticalDamageColor;
        }

        if (isHealing) {
            this.fontColor = this.heallingColor;
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
            y: position.y - this.fontVerticalMovement,
            alpha: 0,
            duration: this.verticalMovementDuration,
            onComplete: (t) => {
                damageSprite.destroy();
            },
        });
    }
}
