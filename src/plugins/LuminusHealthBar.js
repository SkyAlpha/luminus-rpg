import Phaser from 'phaser';
/**
 * @class
 */
export class LuminusHealthBar extends Phaser.GameObjects.Sprite {
    /**
     *
     * @param {*} scene
     * @param {*} x
     * @param {*} y
     * @param {*} width
     * @param {*} health
     * @param {*} offX
     * @param {*} offY
     */
    constructor(scene, x, y, width, health, offX = 0, offY = 0) {
        super(scene, x, y, 'health');

        // this.width = width;
        this.height = 3;

        this.health = health;
        this.full = health;
        this.offX = offX;
        this.offY = offY;
        this.size = width * 0.43;
        this.x = x - offX;
        this.y = y - offY;
        this.alpha = 0.8;
        this.setOrigin(0, 0);
        this.setDepth(2);

        scene.add.existing(this);
        this.draw();
    }

    createTimeline() {
        this.timelineMovement = this.scene.tweens.createTimeline();
    }

    playTimeline() {
        this.timelineMovement.play();
    }

    stopTimeline() {
        this.timelineMovement.stop();
    }

    timelineAdd(x, y, duration = 350) {
        this.timelineMovement.add({
            targets: this,
            x: x,
            y: y,
            duration: duration,
        });
    }

    decrease(dano) {
        this.health -= dano;

        if (this.health <= 0) {
            this.health = 0;
        }
        this.draw();
        return this.health === 0;
    }

    /**
     * Updated the Health Points of the entity.
     * @param { number } hp The new HP
     */
    update(hp) {
        this.health = hp;
        this.draw();
    }

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

        // Clears the Graphic and Redraws.

        // this.clear();
        // this.lineStyle(3, color, 0.5);
        // this.beginPath();
        // this.moveTo(0 - this.offX, 0 - this.offY);
        // this.lineTo(d * this.size - this.offX, 0 - this.offY);
        // // this.lineStyle(1, color, 1); // Debug line
        // this.closePath();
        // this.strokePath();
    }

    rgbToHex(r, g) {
        return '0x' + ((1 << 24) + (r << 16) + (g << 8)).toString(16).slice(1);
    }
}
