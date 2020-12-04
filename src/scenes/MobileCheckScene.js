import Phaser from 'phaser';

export class MobileCheckScene extends Phaser.Scene {
    constructor() {
        super({
            key: 'MobileCheckScene',
        });

        /**
         * The landscape image to induce the player to rotate the phone.
         * @type { Phaser.GameObjects.Image }
         */
        this.landscapeImage = null;

        /**
         * The Name of the texture / Sprite that will be presented.
         * @type { string }
         */
        this.landscapeImageName = 'landscape_mobile';

        /**
         * The text that will display the tip to the player.
         * @type { Phaser.GameObjects.Text }
         */
        this.helpText = null;

        /**
         * The text that will be displayed when the user phone is not in landscape mode and is not in Full Screen mode.
         * @type { string }
         * @default
         */
        this.textOrientationFullscreen =
            'Please, rotate your device to Landscape and touch the screen to enable Full Screen mode.';

        /**
         * The text that will be displayed when the user phone is not in landscape mode and is already on Full Screen.
         * @type { string }
         * @default
         */
        this.textOrientation =
            'Please, rotate your device to landscape to have a better experience.';

        /**
         * The text that will be displayed when the user phone is not on Full Screen mode, but it on landscape mode..
         * @type { string }
         * @default
         */
        this.textFullscreen =
            'Please, touch the screen to enable Full Screen mode.';

        /**
         * The text size to display the help text.
         * @type { string }
         * @default
         */
        this.fontSize = '20px';

        /**
         * the font family of the helpo text.
         * @type { string }
         * @default
         */
        this.fontFamily = "'Press Start 2P'";

        /**
         * Show if the device is mobile or not.
         * @type { boolean }
         */
        this.isMobile = null;

        /**
         * Tells the update if the checks are finished so it can change the player to the next Scene.
         * @type { boolean }
         */
        this.finishedChecks = false;

        /**
         * The next scene which the player will be moved to.
         * @type { string }
         */
        this.nextScene = 'IntroScene';
    }

    create() {
        this.isMobile = !this.sys.game.device.os.desktop ? true : false;

        if (!this.isMobile) {
            this.goNextScene();
        }
        this.landscapeImage = this.add.image(
            this.cameras.main.width / 2,
            this.cameras.main.height / 2,
            this.landscapeImageName
        );

        this.helpText = this.add.text(
            this.cameras.main.width / 2,
            this.cameras.main.height / 2 - this.landscapeImage.height / 2 - 50,
            this.textOrientationFullscreen,
            {
                wordWrap: {
                    width: this.cameras.main.width - 50,
                },
                wordWrapUseAdvanced: false,
                fontSize: this.fontSize,
                fontFamily: this.fontFamily,
            }
        );

        this.helpText.setOrigin(0.5, 0.5);

        this.tweens.add({
            targets: this.landscapeImage,
            angle: { from: 0, to: 90 },
            duration: 2000,
            yoyo: true,
            loop: -1,
            delay: 500,
            completeDelay: 500,
        });

        this.input.once('pointerup', (pointer) => {
            this.scale.startFullscreen();
        });

        this.scale.on('resize', (size) => {
            if (this.scene.isVisible()) {
                this.landscapeImage.setPosition(
                    size.width / 2,
                    size.height / 2
                );
                this.helpText.setPosition(
                    size.width / 2,
                    size.height / 2 - this.landscapeImage.height / 2 - 50
                );
            }
        });
    }

    /**
     * Moves the player to the next Scene and stops the current Scene.
     */
    goNextScene() {
        this.scene.launch(this.nextScene).launch();
        this.scene.stop(this.scene.key);
    }

    update() {
        if (!this.scale.isLandscape && !this.scale.isFullscreen) {
            this.finishedChecks = false;
            this.landscapeImage.alpha = 1;
            this.helpText.setText(this.textOrientationFullscreen);
        } else if (!this.scale.isLandscape && this.scale.isFullscreen) {
            this.finishedChecks = false;
            this.landscapeImage.alpha = 1;
            this.helpText.setText(this.textOrientation);
        } else if (this.scale.isLandscape && !this.scale.isFullscreen) {
            this.finishedChecks = false;
            this.landscapeImage.alpha = 0;
            this.helpText.setText(this.textFullscreen);
        } else if (!this.finishedChecks) {
            this.finishedChecks = true;
            this.goNextScene();
        }
        this.helpText.setWordWrapWidth(this.cameras.main.width - 50);
    }
}
