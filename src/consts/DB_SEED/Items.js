import { ITEM_TYPE } from './ItemTypes';

/**
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
        description: 'A small potion that recovers some Health Points [HP].',
        script: 'rec hp 5',
    },
];
