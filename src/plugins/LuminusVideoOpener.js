import Phaser from 'phaser';

/**
 * @class
 */
export class LuminusVideoOpener {
	/**
	 * Gets the video link from the Tile object properties.
	 * @param { Phaser.Scene } scene Scene that this Instance will be a child.
	 */
	constructor(scene) {
		/**
		 * The Phaser Scene that this class will be a child.
		 * @type { Phaser.Scene }
		 */
		this.scene = scene;
		/**
		 * Video id property to search for in the Tiled properties.
		 * @type { string }
		 * @default
		 */
		this.videoIdProperty = 'videoId';
	}

	/**
	 * Searches for a specific property on an array of properties from the Tiled Software.
	 * @param { Array } properties the properties array to check if there is a video link.
	 */
	checkHasVideo(properties) {
		const video = properties.find((p) => p.name === this.videoIdProperty);
		if (video && video.name) {
			this.scene.scene.launch('VideoPlayerScene', {
				player: this.scene.player,
				videoId: video.value,
			});
		}
	}
}
