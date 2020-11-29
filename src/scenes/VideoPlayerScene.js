import Phaser from 'phaser';

/**
 * @class
 */
export class VideoPlayerScene extends Phaser.Scene {
    /**
     * Creates a scene to play videos.
     */
    constructor() {
        super({
            key: 'VideoPlayerScene',
        });
        /**
         * Render texture that will be the background.
         * @type { Phaser.GameObjects.RenderTexture }
         */
        this.background = null;

        /**
         * Background color.
         * @type { Phaser.Display.Color }
         */
        this.backgroundColor = 0x000000;

        /**
         * Alpha / Opacity of the background
         * @type { number }
         */
        this.alpha = 0.5;

        /**
         * Custom Class from the <a href="https://rexrainbow.github.io/phaser3-rex-notes/docs/site/youtubeplayer/#introduction">rex plugins </a>
         * this will be responsible for playing the youtube vídeo for us.
         * @type { YoutubePlayer }
         */
        this.video = null;
    }

    preload() {
        this.load.plugin(
            'rexyoutubeplayerplugin',
            'https://raw.githubusercontent.com/rexrainbow/phaser3-rex-notes/master/dist/rexyoutubeplayerplugin.min.js',
            true
        );
    }

    create() {
        this.background = this.add.renderTexture(
            0,
            0,
            this.cameras.main.width,
            this.cameras.main.height
        );
        this.background.setScrollFactor(0, 0);
        this.background.fill(this.backgroundColor, this.alpha);

        this.video = this.add.rexYoutubePlayer(
            this.cameras.main.midPoint.x,
            this.cameras.main.midPoint.y,
            200,
            200,
            {
                videoId: 'LtYhRAQSZlU',
                controls: false,
                autoPlay: true,
            }
        );
        // youtubePlayer.setOrigin(0, 0);
        this.video.play();
        this.scale.on('resize', (size) => {
            console.log('size', size);
            this.changeSize(size.width, size.height);
        });
    }

    /**
     * Recreates the Background and centers the video.
     * @param { number } width width
     * @param { number } height height
     */
    changeSize(width, height) {
        this.video.x = this.cameras.main.midPoint.x;
        this.video.y = this.cameras.main.midPoint.y;
        this.background.destroy();
        this.background = this.add.renderTexture(
            0,
            0,
            this.cameras.main.width,
            this.cameras.main.height
        );
        this.background.setScrollFactor(0, 0);
        this.background.fill(this.backgroundColor, this.alpha);
    }
}
