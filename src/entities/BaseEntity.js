/**
 * @namespace
 */
export const BaseEntity = {
    /**
     * Controls if the entity is atacking.
     * @type { boolean }
     * @default
     */
    isAtacking: false,

    /**
     * Controls if the player can atack.
     * @type { boolean }
     */
    canAtack: true,

    /**
     * This variable controls when the atack hitbox will appear.
     * @type { boolean }
     */
    showHitBox: false,

    /**
     * The perception range of the entity. Usualy the field of view. For enemies it should be used to atack the player onde it's inside the perception radius.
     * @type { number }
     */
    perceptionRange: 75,
};
