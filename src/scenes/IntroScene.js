import Phaser from 'phaser';

/**
 * @class
 */
export class IntroScene extends Phaser.Scene {
    /**
     * This scene is responsible for presenting the introduction of the Game.
     */
    constructor() {
        super({
            key: 'IntroScene',
        });

        /**
         * @type { Phaser.Tweens.Timeline }
         */
        this.timeline = null;

        /**
         * The mid center of the screen in the horizontal position;
         * @type { number }
         */
        this.centerX = null;

        /**
         * The mid center of the screen in the vertical position;
         * @type { number }
         */
        this.centerY = null;

        /**
         * The phaser logo image.
         * @type { Phaser.GameObjects.Image }
         */
        this.logo_phaser = null;

        /**
         * The text that will show along side the phaser Logo.
         * @type { Phaser.GameObjects.Text }
         */
        this.logo_phaser_text = null;

        /**
         * The partibles that will spawn on the phaser logo.
         * @type { Phaser.GameObjects.Particles }
         */
        this.particles_logo = null;

        /**
         * The Studio image game object to display.
         * @type { Phaser.GameObjects.Image }
         */
        this.studioImage = null;

        /**
         * The text game object to display with the game studio.
         * @type { Phaser.GameObjects.Text }
         */
        this.studioText = null;

        /**
         * The font size of the text above the logo.
         * @type { number }
         * @default
         */
        this.logoTextFontSize = 35;

        /**
         * The phaser logo Sprite / Texture name
         * @type { string }
         */
        this.phaserLogoSpriteName = 'logo_phaser';

        /**
         * The Phaser logo text.
         * @type { string }
         * @default
         */
        this.phaserLogoText = 'Proudly created with';

        /**
         * The phaser logo text.
         * @type { string }
         * @default
         */
        this.logoPhaserFontFamily = "'Press Start 2P'";

        /**
         * The Luminus logo sprite / texture name
         * @type { string }
         * @default
         */
        this.luminusLogo = 'luminus_candle';

        /**
         * The Luminus logo Text.
         * @type { string }
         */
        this.luminusLogoText = 'Luminus Game Studio';

        /**
         * Particles Sprite / Texture name.
         * @type { string }
         */
        this.particlesSpriteName = 'flares';

        /**
         * The Luminus Logo font Family.
         * @type { strin }
         */
        this.luminusLogoFontFamily = "'Press Start 2P'";

        /**
         * The font size of the text above the luminus logo.
         * @type { number }
         * @default
         */
        this.luminusLogoFontSize = '25px';

        /**
         * Returns if the device is mobile
         * @type { string }
         * @default
         */
        this.isMobile = null;
    }

    create() {
        this.isMobile = !this.sys.game.device.os.desktop ? true : false;
        this.centerX = this.scale.width / 2;
        this.centerY = this.scale.height / 2;
        this.timeline = this.tweens.createTimeline();

        // LOGO Part.
        this.createPhaserLogo();
        this.createLuminusLogo();
        this.timeline.play();
        this.timeline.on('complete', (done) => {
            this.scene.launch('MainScene');
            this.scene.stop();
        });

        // this.input.on('pointerdown', (pointer) => {
        //     this.timeline.destroy();
        //     this.scene.launch('MainScene');
        // });

        this.scale.on('resize', (size) => {
            // console.log(size);
            if (this.scene.isVisible()) {
                this.resizeAll(size);
            }
        });
    }

    /**
     *
     * @param { Size } size new size of the game.
     */
    resizeAll(size) {
        this.centerX = size.width / 2;
        this.centerY = size.height / 2;
        this.logo_phaser.setPosition(this.centerX, this.centerY);
        this.logo_phaser_text.setPosition(
            this.centerX,
            this.centerY - this.logo_phaser.height / 2 - this.mobileMargin()
        );
        this.studioImage.setPosition(this.centerX, this.centerY);
        this.studioText.setPosition(
            this.centerX,
            this.centerY - this.studioImage.height / 2 - this.mobileMargin()
        );
    }

    mobileMargin() {
        return this.isMobile == true ? 30 : 60;
    }

    /**
     * Creates the Phaser logo to present with the the particles.
     */
    createPhaserLogo() {
        this.logo_phaser = this.add.image(
            this.centerX,
            this.centerY,
            this.phaserLogoSpriteName
        );
        this.logo_phaser.alpha = 0;

        if (this.scale.height / this.logo_phaser.height > 0.7) {
            this.logo_phaser.setScale(0.5);
        }

        this.logo_phaser_text = this.add.text(
            this.centerX,
            this.centerY -
                (this.logo_phaser.height * this.logo_phaser.scaleY) / 2 -
                this.mobileMargin(),
            this.phaserLogoText,
            {
                wordWrap: {
                    width: this.cameras.main.width - 50,
                },
                fontFamily: this.logoPhaserFontFamily,
                fontSize: `${this.logoTextFontSize * this.logo_phaser.scale}px`,
            }
        );
        this.logo_phaser_text.setOrigin(0.5, 0.5);
        this.logo_phaser_text.alpha = 0;

        var textures = this.textures;

        let origin = this.logo_phaser.getTopLeft();
        let pixel;
        let logoSource = {
            getRandomPoint: (vec) => {
                do {
                    let x = Phaser.Math.Between(
                        0,
                        this.logo_phaser.width * this.logo_phaser.scaleX - 1
                    );
                    let y = Phaser.Math.Between(
                        0,
                        this.logo_phaser.height * this.logo_phaser.scaleY - 1
                    );
                    pixel = textures.getPixel(x, y, this.phaserLogoSpriteName);
                    return vec.setTo(x + origin.x, y + origin.y);
                } while (pixel.alpha < 255);
            },
        };

        this.particles_logo = this.add.particles(this.particlesSpriteName, {
            x: 0,
            y: 0,
            lifespan: 1000,
            gravityY: 10,
            scale: { start: 0, end: 0.25, ease: 'Quad.easeOut' },
            alpha: { start: 1, end: 0, ease: 'Quad.easeIn' },
            blendMode: 'ADD',
            emitZone: { type: 'random', source: logoSource },
        });

        this.timeline.add({
            targets: [
                this.logo_phaser,
                this.logo_phaser_text,
                this.particles_logo,
            ],
            alpha: { from: 0, to: 1 },
            duration: 2000,
            yoyo: true,
            onComplete: (done) => {
                this.particles_logo.destroy();
            },
        });
    }

    createLuminusLogo() {
        this.studioImage = this.add.image(
            this.centerX,
            this.centerY,
            this.luminusLogo
        );
        this.studioImage.alpha = 0;

        this.studioText = this.add.text(
            this.centerX,
            this.centerY - this.studioImage.height / 2 - 60,
            this.luminusLogoText,
            {
                fontFamily: this.luminusLogoFontFamily,
                fontSize: this.luminusLogoFontSize,
            }
        );
        this.studioText.setOrigin(0.5, 0.5);
        this.studioText.alpha = 0;

        this.timeline.add({
            targets: [this.studioImage, this.studioText],
            alpha: { from: 0, to: 1 },
            duration: 2000,
            yoyo: true,
            onComplete: (done) => {
                // particles.destroy();
            },
        });
    }
}
