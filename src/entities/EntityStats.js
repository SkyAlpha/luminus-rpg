/**
 * This namespace is a base for any entity status.
 * It allows the entity to access
 * @namespace
 */
export const EntityAttributes = {
    /**
     * The entity level.
     * @type { number }
     */
    level: 1,
    /**
     * The Raw base attributes of the entity.
     * @type { object }
     */
    rawAttributes: {
        str: 1, // Strengh
        agi: 1, // Agility
        vit: 1, // Vitality
        dex: 1, // Dexterity
        int: 1, // Inteligence.
    },

    /**
     * Available stat points can be used to add new raw attributes.
     * @type { number }
     */
    availableStatPoints: 0,

    /**
     * The bonus attributes of the entity.
     * @type { object }
     */
    bonus: {
        equipment: [],
        consumable: [],
        extra: [],
    },
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

    /**
     * The critital chance in percentagem.
     * @type { number }
     */
    critical: 0,

    /**
     * The amount of flee that the Entity has.
     * @type { number }
     */
    flee: 1,

    /**
     * The amount of hit that the Entity has.
     * @type { number }
     */
    hit: 1,

    /**
     * The experience points that the player currently has.
     * @type { number }
     */
    experience: 0,

    /**
     * The amount of experience that the player needs to get to the next level.
     * @type { number }
     */
    nextLevelExperience: 50,
};
