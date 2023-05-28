import Phaser from 'phaser';
import { LuminusSoundManager } from '../plugins/LuminusSoundManager';

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
		 * @default
		 */
		this.backgroundColor = 0x000000;

		/**
		 * Alpha / Opacity of the background
		 * @type { number }
		 * @default
		 */
		this.alpha = 0.5;

		/**
		 * Custom Class from the <a href="https://rexrainbow.github.io/phaser3-rex-notes/docs/site/youtubeplayer/#introduction">rex plugins </a>
		 * this will be responsible for playing the youtube vídeo for us.
		 * @type { YoutubePlayer }
		 */
		this.video = null;

		/**
		 * The Close button image.
		 * @type { Phaser.GameObjects.Image }
		 */
		this.closeButton = null;

		/**
		 * Youtube Video id.
		 * @example
		 * this.videoId = 'LtYhRAQSZlU';
		 *
		 * @type { string }
		 * @default
		 */
		this.videoId = '';

		/**
		 * The sprite name of the close button. Ideally you should already have loaded it on another Phaser.Scene
		 * @type { string }
		 * @default
		 */
		this.closeButtonSpriteName = 'close_button';

		/**
		 * The scale of the close button. Use it to scale your close button to the size you want.
		 * @type { number }
		 * @default
		 */
		this.closeButtonScale = 0.3;

		/**
		 * The horizontal margin of the close button. The button will be placed on the top right corner of the screen.
		 * This margin is based on the right side distance of the screen.
		 * @type { number }
		 * @default
		 */
		this.closeButtonMarginX = 50;

		/**
		 * The horizontal margin of the close button. The button will be placed on the top right corner of the screen.
		 * This margin is based on the top side distance of the screen.
		 * @type { number }
		 * @default
		 */
		this.closeButtonMarginY = 30;

		/**
		 * the Luminus audio manager. Used to stop and resume audios in this Scene.
		 * @type { LuminusSoundManager }
		 */
		this.luminusSoundManager = null;

		/**
		 * The player. Used to stop the movement while he's watching a video.
		 * @type { Player }
		 */
		this.player = null;
	}

	preload() {
		this.luminusSoundManager = new LuminusSoundManager(this);
		this.luminusSoundManager.create();
		this.luminusSoundManager.stopAllAudio();
	}

	create() {
		this.background = this.add.renderTexture(0, 0, this.cameras.main.width, this.cameras.main.height);
		this.background.setScrollFactor(0, 0);
		this.background.fill(this.backgroundColor, this.alpha);
		this.video = this.add.rexYoutubePlayer(
			this.cameras.main.midPoint.x,
			this.cameras.main.midPoint.y,
			this.cameras.main.width - this.closeButtonMarginX * 4,
			this.cameras.main.height - this.closeButtonMarginY * 4,
			{
				videoId: this.videoId,
				controls: true,
				autoPlay: true,
			}
		);
		// youtubePlayer.setOrigin(0, 0);
		this.video.play();
		this.createCloseButton();

		this.scale.on('resize', (size) => {
			this.changeSize(size.width, size.height);
		});
	}

	/**
	 * Object with the videoId
	 * @param { Object } data
	 */
	init(data) {
		this.videoId = data.videoId;
		this.player = data.player;
		if (this.player && this.player.container.body) this.player.container.body.maxSpeed = 0;
	}

	/**
	 * Creates the close button.
	 */
	createCloseButton() {
		if (this.cameras.main !== undefined) {
			this.closeButton = this.add
				.image(
					this.cameras.main.width - this.closeButtonMarginX,
					this.closeButtonMarginY,
					this.closeButtonSpriteName
				)
				.setInteractive()
				.setScale(this.closeButtonScale)
				.setScrollFactor(0, 0)
				.setDepth(50);

			// Closes the Video Scene when the player clicks the Close button.
			this.closeButton.on('pointerdown', (pointer) => {
				// Just to make sure everything works if thereis no player.
				if (this.player && this.player.container.body) this.player.container.body.maxSpeed = this.player.speed;
				this.luminusSoundManager.resumeAllAudio();
				this.scene.stop();
			});
		}
	}

	/**
	 * Recreates the Background and centers the video.
	 * @param { number } width width
	 * @param { number } height height
	 */
	changeSize(width, height) {
		if (this.cameras.main) {
			this.closeButton.destroy();
			this.createCloseButton();
			this.video.x = this.cameras.main.midPoint.x;
			this.video.y = this.cameras.main.midPoint.y;
			this.background.destroy();
			this.background = this.add.renderTexture(0, 0, this.cameras.main.width, this.cameras.main.height);
			this.background.setScrollFactor(0, 0);
			this.background.fill(this.backgroundColor, this.alpha);
		}
	}
}
