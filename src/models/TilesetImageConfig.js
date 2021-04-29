/**
 * @class
 */
export class TilesetImageConfig {
    /**
     *
     * @param { string } tilesetName  This is the name of the Tileset that you gave inside the Tiled Software.
     * @param { string } assetName  This is the name of the asset that you gave on the GameAssets file.
     */
    constructor(tilesetName, assetName, width, height, margin, spacing) {
        /**
         * This is the name of the Tileset that you gave inside the Tiled Software.
         * @type { string }
         */
        this.tilesetName = tilesetName;

        /**
         * This is the name of the asset that you gave on the GameAssets file. <a href="https://i.ibb.co/gVYw09v/Screen-Shot-2021-04-08-at-11-54-56.png">Game Asset</a>
         * Another Example of the name <a href="https://i.ibb.co/PczxRMt/Screen-Shot-2021-04-08-at-11-59-38.png">Phaser's Example of Adding Image to Game</a>,
         * Thats the String that you want.
         * @type { string }
         */
        this.assetName = assetName;

        /**
         * The Single Tile Width.
         * @type { number }
         * @default [16]
         */
        this.width = width ? width : 16;

        /**
         * The Single Tile Height.
         * @type { number }
         * @default [16]
         */
        this.height = height ? height : 16;

        /**
         * The margin between tiles.
         * @type { number }
         * @default [1]
         */
        this.margin = margin ? margin : 1;

        /**
         * The spacing between tiles.
         * @type { number }
         * @default [2]
         */
        this.spacing = spacing ? spacing : 2;
    }
}
