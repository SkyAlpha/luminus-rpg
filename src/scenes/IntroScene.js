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

        var textures = this.textures;

        let origin = logo_phaser.getTopLeft();
        console.log(origin);
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
        });
        this.timeline.play();
        this.timeline.on('complete', (done) => {
            particles.destroy();
            this.scene.launch('MainScene');
        });

        this.input.on('pointerdown', (pointer) => {});
    }
}
