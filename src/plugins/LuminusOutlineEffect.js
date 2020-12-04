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
    }

    createLayer() {
        this.effectLayer = this.scene.add
            .rexOutlineEffectLayer({
                knockout: true,
                outlineColor: 0xff0000,
                thickness: 1,
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
