import { BUFF_TYPES } from './BuffTypes';
import { ITEM_TYPE } from './ItemTypes';

/**
 * @example
 * The 'script' works like this:
 * ACTION, WHAT, AMOUNT
 * ACTION: rec -> recover
 * WHAT: hp -> health
 * AMOUNT: 50
 * Will translate to -> Recover 50 HP.
 * Then the transpiles will take care to recover the HP.
 */
export const DB_SEED_ITEMS = [
    {
        id: 1,
        name: 'Red Potion',
        type: ITEM_TYPE.USABLE,
        buffType: 0, // Means you can use as many as you want. No restrictions.
        description: 'A small potion that recovers 2 Health Points [HP].',
        script: 'rec hp 2;',
        texture: 'red_potion',
        sfx: 'heal',
        stackable: true,
        inventoryScale: 1.7, // How much should the item scale when the inventory is opened.
    },
    {
        id: 2,
        name: 'Atack Potion',
        type: ITEM_TYPE.USABLE,
        buffType: BUFF_TYPES.ATK01,
        description: 'A small potion that increases the ATACK by 5 for 60 seconds.',
        script: 'buff atk 5 60;',
        texture: 'atk_potion',
        sfx: 'heal',
        stackable: true,
        inventoryScale: 1.7, // How much should the item scale when the inventory is opened.
    },
];
