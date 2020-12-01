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
    }

    /**
     * Creates the Phaser logo to present with the the particles.
     */
    createPhaserLogo() {
        const logo_phaser = this.add.image(
            this.centerX,
            this.centerY,
            'logo_phaser'
        );
        logo_phaser.alpha = 0;

        const logo_phaser_text = this.add.text(
            this.centerX,
            this.centerY - logo_phaser.height / 2 - 60,
            'Proudly created with',
            {
                fontFamily: "'Press Start 2P'",
                fontSize: '35px',
            }
        );
        logo_phaser_text.setOrigin(0.5, 0.5);
        logo_phaser_text.alpha = 0;

        var textures = this.textures;

        let origin = logo_phaser.getTopLeft();
        let pixel;
        let logoSource = {
            getRandomPoint: (vec) => {
                do {
                    let x = Phaser.Math.Between(0, logo_phaser.width - 1);
                    let y = Phaser.Math.Between(0, logo_phaser.height - 1);
                    pixel = textures.getPixel(x, y, 'logo_phaser');
                    return vec.setTo(x + origin.x, y + origin.y);
                } while (pixel.alpha < 255);
            },
        };

        let particles = this.add.particles('flares');

        particles.createEmitter({
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
            targets: [logo_phaser, logo_phaser_text, particles],
            alpha: { from: 0, to: 1 },
            duration: 2000,
            yoyo: true,
            onComplete: (done) => {
                particles.destroy();
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
