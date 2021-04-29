import Phaser from 'phaser';

/**
 * @class
 */
export class LuminusFogWarManager {
    /**
     *
     * @param { Phaser.Scene } scene The scene in which this fog will be put upon.
     * @param { Phaser.Tilemaps.DynamicTilemapLayer } map That map to cover with the fog of war.
     * @param { Phaser.Physics.Arcade.Sprite } player The player that will reveal the map with the mask.
     */
    constructor(scene, map, player) {
        /**
         * The Phaser Scene
         * @type { Phaser.Scene }
         */
        this.scene = scene;

        /**
         * The map where the class will get the zone to emit the particles.
         * @type { Phaser.Tilemaps.Tilemap }
         */
        this.map = map;

        /**
         * The player that will reveal the fog of war of the map.
         * @type { Phaser.Physics.Arcade.Sprite }
         */
        this.player = player;

        /**
         * This is the fog of war it self. This will be the texture to be used to make the cool
         * effect of fog of war.
         * @type { Phaser.GameObjects.RenderTexture }
         */
        this.renderTexture = null;

        /**
         * This is the black layer where it's not explored. This will be the texture to be used to make the cool
         * effect of fog of war.
         * @type { Phaser.GameObjects.RenderTexture }
         */
        this.noVisionRT = null;

        /**
         * The mask image to update the fog.
         * @type { Phaser.GameObjects.Image }
         */
        this.imageMask = null;

        /**
         * The BitMap Mask to follow the player.
         * @type { Phaser.Display.Masks.BitmapMask }
         */
        this.mask = null;

        /**
         * The name of the mask texture.
         * @type { string }
         * @default
         */
        this.maskTextureName = 'fog_mask';
    }

    /**
     * Creates the fog of War for a given map.
     */
    createFog() {
        const width = this.map.widthInPixels;
        const height = this.map.heightInPixels;

        // make a RenderTexture that is the size of the screen
        this.renderTexture = this.scene.make.renderTexture(
            {
                x: 0,
                y: 0,
                width: width,
                height: height,
            },
            true
        );
        // make a RenderTexture that is the size of the screen
        // This RT is the One that Blocks the User Vision.
        this.noVisionRT = this.scene.make.renderTexture(
            {
                x: 0,
                y: 0,
                width: width,
                height: height,
            },
            true
        );

        // fill it with black
        this.renderTexture.fill(0x000000, 0.7);
        this.noVisionRT.fill(0x000000, 1);

        // draw the floorLayer into it
        // this.rt.draw(this.shadow);

        // set a dark blue tint
        this.renderTexture.setTint(0x0a2948);
        this.noVisionRT.setTint(0x0a2948);

        this.renderTexture.depth = 99999999999999999999999999;
        this.noVisionRT.depth = 99999999999999999999999999;

        this.imageMask = this.scene.add.image(
            this.player.container.x,
            this.player.container.y,
            this.maskTextureName
        );
        this.imageMask.scale = 1.5;
        this.imageMask.visible = false;

        // this.renderTexture.mask.invertAlpha = true;
    }

    /**
     * Updates the fog of war.
     */
    updateFog() {
        this.renderTexture.clear();
        this.renderTexture.fill(0x000000, 0.7);
        this.renderTexture.setTint(0x0a2948);
        if (this.player && this.imageMask) {
            this.imageMask.x = this.player.container.x;
            this.imageMask.y = this.player.container.y;
            this.noVisionRT.erase(this.imageMask);
            this.renderTexture.erase(this.imageMask);
            this.renderTexture.erase(this.imageMask);
            this.renderTexture.erase(this.imageMask);
            this.renderTexture.erase(this.imageMask);
        }
    }
}
