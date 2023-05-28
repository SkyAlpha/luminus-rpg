import Phaser from 'phaser';
import OutlinePostFx from 'phaser3-rex-plugins/plugins/outlinepipeline.js';
/**
 * @class
 */
export class LuminusOutlineEffect {
	/**
	 * Creates an outline effect to a given object.
	 * @param { Phaser.Scene } scene
	 */
	constructor(scene) {
		/**
		 * The scene in which the outline will be applyed.
		 * @type { Phaser.Scene }
		 */
		this.scene = scene;

		/**
		 * The post processing layer that will present the outline effect.
		 * @type { RexOutlineEffectLayer }
		 */
		this.effectLayer = null;

		/**
		 * the color of the outline.
		 * @type { Phaser.Display.Color }
		 * @default
		 */
		this.outlineColor = 0xff0000;

		/**
		 * The outline Thickness. The bigger the number, the bigger the thickness.
		 * @type { number }
		 */
		this.outlineThickness = 3;

		this.outlinePostFxPlugin = this.scene.plugins.get('rexOutlinePipeline');
	}

	/**
	 * Applies the effect to a Game Object.
	 * @param { Phaser.Physics.Arcade.Sprite } object
	 */
	applyEffect(object) {
		if (object && object.scene && object.scene.sys) {
			object.setPostPipeline(OutlinePostFx);
			var pipelineInstance = this.outlinePostFxPlugin.get(object)[0];
			pipelineInstance.setOutlineColor(this.outlineColor);
			pipelineInstance.thickness = this.outlineThickness;
		}
	}

	/**
	 * Removes the effect to a given Game Object.
	 * @param { Phaser.Physics.Arcade.Sprite } object
	 */
	removeEffect(object) {
		if (object && object.scene && object.scene.sys) {
			object.removePostPipeline(OutlinePostFx);
		}
	}
}
