import { Player } from '../../entities/Player';

/**
 * This class is responsible for Creating gthe HP and SP Bars on the HUD system.
 * @class
 */
export class LuminusHUDProgressBar {
    /**
     *
     * @param { Phaser.Scene } scene
     * @param { number } x X Position on the Screen that will be the reference for HP and SP to be created. All following positions will come from references from this ones.
     * @param { number } y y Position on the Screen that will be the reference for HP and SP to be created. All following positions will come from references from this ones.
     * @param { number } width The width of the Bars.
     * @param { Player } player The player that will have it's statuses shown.
     */
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

        /**
         * The asset name of the green health bar.
         * @type { string }
         * @default
         */
        this.greenBarSpriteName = `green_bar`;

        /**
         * The asset name of the yellow health bar.
         * @default
         * @type { string }
         */
        this.yellowBarSpriteName = `yellow_bar`;

        /**
         * The asset name of the red health bar.
         * @type { string }
         * @default
         */
        this.redBarSpriteName = `red_bar`;

        /**
         * The asset name of the blue sp bar.
         * @default
         * @type { string }
         */
        this.blueBarSpriteName = 'blue_bar';

        /**
         * The asset name of the blue exp bar.
         * @default
         * @type { string }
         */
        this.expBlueBarSpriteName = 'exp_blue_bar';

        /**
         * The asset name of the background of Health and SP Bars.
         * @type { string }
         * @default
         */
        this.progressBarBackgroundSpriteName = 'progressbar_background';

        this.healthbar_background = this.scene.add
            .image(x + width / 2 + 15, y, this.progressBarBackgroundSpriteName)
            .setOrigin(0, 0.5);

        this.healthbar_sprite = this.scene.add.image(x + width / 2 + 20, y, this.greenBarSpriteName).setOrigin(0, 0.5);

        this.spbar_background = this.scene.add
            .image(x + width / 2 + 15, y + 20, this.progressBarBackgroundSpriteName)
            .setOrigin(0, 0.5);

        this.spbar_sprite = this.scene.add.image(x + width / 2 + 20, y + 20, this.blueBarSpriteName).setOrigin(0, 0.5);

        this.expbar_background = this.scene.add
            .image(x - 10, y + 40, this.progressBarBackgroundSpriteName)
            .setOrigin(0, 0.5);
        this.expbar_background.setDisplaySize(
            this.expbar_background.width + width / 2 + 25,
            this.expbar_background.height
        );
        this.expbar_sprite = this.scene.add.image(x - 5, y + 40, this.expBlueBarSpriteName).setOrigin(0, 0.5);
        this.expbar_sprite.widthExtended = (this.expbar_background.width - 8) * this.expbar_background.scaleX;
        this.expbar_sprite.setDisplaySize(
            (this.expbar_background.width - 8) * this.expbar_background.scaleX,
            this.expbar_sprite.height
        );

        /**
         * The current health points.
         * @type { number }
         */
        this.health = null;

        // Sets the progressbar to the player, on creation.
        this.player.luminusHUDProgressBar = this;

        this.player.scene.events.on('update', this.updateHud, this);
    }

    /**
     * Updates the HUD Health bar based on the current player's Health.
     */
    updateHealth() {
        const HP_percentage = (this.player.attributes.health / this.player.attributes.baseHealth) * 100;
        if (HP_percentage > 40) {
            this.healthbar_sprite.setTexture(this.greenBarSpriteName);
        } else if (HP_percentage >= 20 && HP_percentage <= 40) {
            this.healthbar_sprite.setTexture(this.yellowBarSpriteName);
        } else if (HP_percentage < 20) {
            this.healthbar_sprite.setTexture(this.redBarSpriteName);
        } else {
            this.healthbar_sprite.visible = false;
            this.healthbar_sprite.active = false;
        }

        this.healthbar_sprite.scaleX = HP_percentage / 100;
    }

    updateHud() {
        this.updateExp();
    }

    /**
     * Updates the current Exp of the player.s
     */
    updateExp() {
        const exp_percentage = (this.player.attributes.experience / this.player.attributes.nextLevelExperience) * 100;
        this.expbar_sprite.setDisplaySize(
            this.expbar_sprite.widthExtended * (exp_percentage / 100),
            this.expbar_sprite.height
        );
    }
}
