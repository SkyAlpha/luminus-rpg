/**
 * The Item type.
 * @class
 */
export class ItemType {
    /**
     * Creates an Item Type.
     * @param { number } id The unique ID of the Item Type.
     * @param { string } name The name of the Item Type.
     */
    constructor(id, name) {
        /**
         * The unique ID of the Item Type.
         * @type { number }
         */
        this.id = id;

        /**
         * The name of the item Type.
         * @type { string }
         */
        this.name = name;
    }
}
