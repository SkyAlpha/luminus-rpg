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
        name: 'Dark Potion',
        type: ITEM_TYPE.USABLE,
        buffType: BUFF_TYPES.ATK01,
        description: `They say this potion is only for those who have a strong heart, for those who drunk it became elves. (Increases the ATACK by 5 points for 60 seconds.)`,
        script: 'buff atk 5 60;',
        texture: 'atk_potion',
        sfx: 'heal',
        stackable: true,
        inventoryScale: 1.7, // How much should the item scale when the inventory is opened.
    },
    {
        id: 3,
        name: 'Treasure',
        type: ITEM_TYPE.USABLE,
        buffType: BUFF_TYPES.ATK01,
        description: `The treasure of the mighty, legend says that those who opened this box, became the most powerfull warriors of all time. (Increases the ATACK by 50 points for 120 seconds.)`,
        script: 'buff atk 50 120;',
        texture: 'treasure_chest',
        sfx: 'heal',
        stackable: true,
        inventoryScale: 1.7, // How much should the item scale when the inventory is opened.
    },
];
