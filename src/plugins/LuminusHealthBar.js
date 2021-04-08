import Phaser from 'phaser';
/**
 * @class
 */
export class LuminusHealthBar extends Phaser.GameObjects.Sprite {
    /**
     * Created a Dynamic health bar.
     * @param { Phaser.Scene } scene The Phaser Scene that the health bar will be displayed.
     * @param { number } x X-Axis Positon.
     * @param { number } y Y-Axis Position.
     * @param { number } width Width of the sprite.
     * @param { number } health Max Health of the entity.
     * @param { number } offX X-Axis Offset.
     * @param { number } offY Y-Axis offset.
     */
    constructor(scene, x, y, width, health, offX = 0, offY = 0) {
        super(scene, x, y, 'health');

        /**
         * The height of the health bar.
         * @type { number }
         * @default
         */
        this.height = 3;
        /**
         * Current Health of the entity.
         * @type { number }
         */
        this.health = health;

        /**
         * The Maximum Health of the entity.
         * @type { number }
         */
        this.full = health;

        /**
         * X-Axis Offset.
         * @type { number }
         */
        this.offX = offX;

        /**
         * Y-Axis offset.
         * @type { number }
         */
        this.offY = offY;

        /**
         * The size / width of the health bar.
         * @type { number }
         */
        this.size = width * 0.43;

        /**
         * X-Axis Positon.
         * @type { number }
         */
        this.x = x - offX;
        /**
         * Y-Axis Position.
         * @type { number }
         */
        this.y = y - offY;
        /**
         * The Alpha / Opacity of the healthbar.
         * @type { number }
         * @default
         */
        this.alpha = 0.8;
        this.setOrigin(0, 0);
        this.setDepth(2);

        scene.add.existing(this);
        this.draw();
    }

    /**
     *
     * @param { number } dano Damage to deal in the entity.
     * @returns { number } returns true if the health is zero or less.
     */
    decrease(dano) {
        this.health -= dano;

        if (this.health <= 0) {
            this.health = 0;
        }
        this.draw();
        return this.health <= 0;
    }

    /**
     * Updated the Health Points of the entity.
     * @param { number } hp The new HP
     */
    update(hp) {
        this.health = hp;
        this.draw();
    }

    /**
     * Changes the color of the Health bar based on the current entity's health.
     */
    draw() {
        var d = (this.health * 100) / this.full / 100;
        var x = (this.health / this.full) * 100;

        let color = this.rgbToHex(
            (x > 50 ? 1 - (2 * (x - 50)) / 100.0 : 1.0) * 255,
            (x > 50 ? 1.0 : (2 * x) / 100.0) * 255,
            0
        );

        this.tint = color;
        this.scaleX = (d * this.size) / this.width;
    }

    /**
     * Gets the correct color, based on the red and green values, so the bar goes from Green (Full health) to RED (Low Health).
     * @param { number } r red value.
     * @param { number } g green value.
     * @returns { string } The new RGB Value
     */
    rgbToHex(r, g) {
        return '0x' + ((1 << 24) + (r << 16) + (g << 8)).toString(16).slice(1);
    }
}
