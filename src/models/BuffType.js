/**
 * A buff Type configuration Model.
 * @class
 */
export class BuffType {
    /**
     * Creates a Buff Type.
     * @param { number } id The unique ID of the Buff Type.
     * @param { string } name The name of the Item Type.
     */
    constructor(id, name) {
        /**
         * The unique ID of the Buff Type.
         * @type { number }
         */
        this.id = id;

        /**
         * The name of the buff Type.
         * @type { string }
         */
        this.name = name;
    }
}
