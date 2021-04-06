import { Player } from '../../entities/Player';

export class LuminusHUDProgressBar {
    constructor(scene, x, y, width, player) {
        /**
         * Scene Context.
         * @type { Phaser.Scene }
         */
        this.scene = scene;

        /**
         * The player that this progressbar will represent.
         * @type { Player }
         */
        this.player = player;

        this.healthbar_background = this.scene.add
            .image(x + width / 2 + 15, y, 'progressbar_background')
            .setOrigin(0, 0.5);

        this.healthbar_sprite = this.scene.add
            .image(x + width / 2 + 20, y, 'green_bar')
            .setOrigin(0, 0.5);

        this.spbar_background = this.scene.add
            .image(x + width / 2 + 15, y + 20, 'progressbar_background')
            .setOrigin(0, 0.5);

        this.spbar_sprite = this.scene.add
            .image(x + width / 2 + 20, y + 20, 'blue_bar')
            .setOrigin(0, 0.5);

        /**
         * The current health points.
         * @type { number }
         */
        this.health = null;

        // Sets the progressbar to the player, on creation.
        this.player.luminusHUDProgressBar = this;
    }

    /**
     * Updates the HUD Health bar.
     */
    updateHealth() {
        const HP_percentage =
            (this.player.health / this.player.baseHealth) * 100;
        console.log(HP_percentage);
        if (HP_percentage > 40) {
            this.healthbar_sprite.setTexture(`green_bar`);
        } else if (HP_percentage >= 20 && HP_percentage <= 40) {
            this.healthbar_sprite.setTexture(`yellow_bar`);
        } else if (HP_percentage < 20) {
            this.healthbar_sprite.setTexture(`red_bar`);
        } else {
            this.healthbar_sprite.visible = false;
            this.healthbar_sprite.active = false;
        }

        this.healthbar_sprite.scaleX = HP_percentage / 100;
    }
}
