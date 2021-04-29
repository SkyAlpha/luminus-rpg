/**
 * This namespace is a base for any entity status.
 * It allows the entity to access
 * @namespace
 */
export const EntityStatus = {
    /**
     * The Current health points of an entity.
     * @type { number }
     * @default
     */
    health: 10,

    /**
     * The Initial health points of an entity.
     * @type { number }
     * @default
     */
    baseHealth: 10,

    /**
     * The atack points of an entity
     * @type { number }
     * @default
     */
    atack: 4,

    /**
     * The defense points of an entity.
     * @type { number }
     * @default
     */
    defense: 1,

    /**
     * The entity movement speed. The greater the faster.
     * @type { number }
     * @default
     */
    speed: 50,
};
