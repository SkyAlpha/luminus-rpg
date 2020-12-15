import Phaser from 'phaser';
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
        this.outlineThickness = 1;
    }

    /**
     * Creates the layer that the outline will be put on.
     */
    createLayer() {
        this.effectLayer = this.scene.add
            .rexOutlineEffectLayer({
                knockout: true,
                outlineColor: this.outlineColor,
                thickness: this.outlineThickness,
            })
            .setDepth(99999);
    }

    /**
     * Applies the effect to a Game Object.
     * @param { Phaser.GameObjects } object
     */
    applyEffect(object) {
        this.effectLayer.add(object);
    }

    /**
     * Removes the effect to a given Game Object.
     * @param { Phaser.GameObjects } object
     */
    removeEffect(object) {
        this.effectLayer.remove(object);
    }

    /**
     * Clears the effect from everyone.
     */
    clear() {
        this.effectLayer.clear();
    }
}
