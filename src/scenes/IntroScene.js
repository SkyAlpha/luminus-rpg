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
    }

    create() {
        this.centerX = this.cameras.main.midPoint.x;
        this.centerY = this.cameras.main.midPoint.y;
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
            this.resizeAll(size);
        });
    }

    /**
     *
     * @param { Size } size new size of the game.
     */
    resizeAll(size) {
        // this.centerX = this.cameras.main.midPoint.x;
        // this.centerY = this.cameras.main.midPoint.y;
        // this.logo_phaser.setPosition(this.centerX, this.centerY);
        // this.logo_phaser_text.setPosition(
        //     this.centerX,
        //     this.centerY - this.logo_phaser.height / 2 - 60
        // );
    }

    /**
     * Creates the Phaser logo to present with the the particles.
     */
    createPhaserLogo() {
        this.logo_phaser = this.add.image(
            this.centerX,
            this.centerY,
            'logo_phaser'
        );
        this.logo_phaser.alpha = 0;

        this.logo_phaser_text = this.add.text(
            this.centerX,
            this.centerY - this.logo_phaser.height / 2 - 60,
            'Proudly created with',
            {
                fontFamily: "'Press Start 2P'",
                fontSize: '35px',
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
                    let x = Phaser.Math.Between(0, this.logo_phaser.width - 1);
                    let y = Phaser.Math.Between(0, this.logo_phaser.height - 1);
                    pixel = textures.getPixel(x, y, 'logo_phaser');
                    return vec.setTo(x + origin.x, y + origin.y);
                } while (pixel.alpha < 255);
            },
        };

        this.particles_logo = this.add.particles('flares');

        this.particles_logo.createEmitter({
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
        const luminus_candle = this.add.image(
            this.centerX,
            this.centerY,
            'luminus_candle'
        );
        luminus_candle.alpha = 0;

        const logo_candle_text = this.add.text(
            this.centerX,
            this.centerY - luminus_candle.height / 2 - 60,
            'Luminus Game Studio',
            {
                fontFamily: "'Press Start 2P'",
                fontSize: '25px',
            }
        );
        logo_candle_text.setOrigin(0.5, 0.5);
        logo_candle_text.alpha = 0;

        this.timeline.add({
            targets: [luminus_candle, logo_candle_text],
            alpha: { from: 0, to: 1 },
            duration: 2000,
            yoyo: true,
            onComplete: (done) => {
                // particles.destroy();
            },
        });
    }
}
