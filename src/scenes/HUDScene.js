import Phaser from 'phaser';

/**
 * Scene for HUD Creation. It contains all the HUD of the game.
 * @class
 */
export class HUDScene extends Phaser.Scene {
    constructor() {
        super({
            key: 'HUDScene',
        });

        /**
         * Maximize image/sprite name.
         * @type { string }
         */
        this.maximizeSpriteName = 'maximize';

        /**
         * Maximize image/sprite offset X;
         * @type { number }
         */
        this.maximizeSpriteOffsetX = 50;

        /**
         * Maximize image/sprite offset y;
         * @type { number }
         */
        this.maximizeSpriteOffsetY = 50;

        /**
         * The maximixe Image that will change the resolution.
         * @type { Phaser.GameObjects.Image }
         */
        this.maximize = null;
    }

    create() {
        this.maximize = this.add
            .image(
                this.cameras.main.width - this.maximizeSpriteOffsetX,
                this.maximizeSpriteOffsetY,
                this.maximizeSpriteName
            )
            .setInteractive();

        this.maximize.on('pointerdown', (pointer) => {
            if (this.scale.isFullscreen) {
                this.scale.stopFullscreen();
            } else {
                this.scale.startFullscreen();
            }
        });

        this.scale.on('resize', (resize) => {
            this.maximize.setPosition(
                this.cameras.main.width - this.maximizeSpriteOffsetX,
                this.maximizeSpriteOffsetY
            );
        });
    }
}
