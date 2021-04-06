/**
 * The entity drops configuration object.
 * @class
 */
export class EntityDrops {
    /**
     *
     * @param { number } id The ID of the Item on the DB or Seed.
     * @param { number } chance The chance of dropping the item.
     */
    constructor(id, chance) {
        /**
         * The ID of the Item on the DB or Seed.
         * @type { number }
         */
        this.id = id;
        /**
         * The chance of an item to be dropped in percentage.
         * @type { number }
         */
        this.chance = chance;
    }
}
