import { EntityDrops } from '../../models/EntityDrops';

export const Ogre = [
    // Down
    {
        atlas: 'ogre',
        key: 'ogre-idle-down',
        frameRate: 2,
        prefix: 'ogre/idle-down/ogre',
        start: 0,
        end: 1,
        zeroPad: 2,
        repeat: -1,
    },
    {
        atlas: 'ogre',
        key: 'ogre-atk-down',
        frameRate: 3,
        prefix: 'ogre/atk-down/ogre',
        start: 0,
        end: 2,
        zeroPad: 2,
        repeat: 0,
    },
    {
        atlas: 'ogre',
        key: 'ogre-walk-down',
        frameRate: 8,
        prefix: 'ogre/walk-down/ogre',
        start: 0,
        end: 5,
        zeroPad: 2,
        repeat: -1,
    },
    // Right
    {
        atlas: 'ogre',
        key: 'ogre-idle-right',
        frameRate: 2,
        prefix: 'ogre/idle-right/ogre',
        start: 0,
        end: 1,
        zeroPad: 2,
        repeat: -1,
    },
    {
        atlas: 'ogre',
        key: 'ogre-atk-right',
        frameRate: 3,
        prefix: 'ogre/atk-right/ogre',
        start: 0,
        end: 2,
        zeroPad: 2,
        repeat: 0,
    },
    {
        atlas: 'ogre',
        key: 'ogre-walk-right',
        frameRate: 8,
        prefix: 'ogre/walk-right/ogre',
        start: 0,
        end: 5,
        zeroPad: 2,
        repeat: -1,
    },
    // Up
    {
        atlas: 'ogre',
        key: 'ogre-idle-up',
        frameRate: 2,
        prefix: 'ogre/idle-up/ogre',
        start: 0,
        end: 1,
        zeroPad: 2,
        repeat: -1,
    },
    {
        atlas: 'ogre',
        key: 'ogre-atk-up',
        frameRate: 3,
        prefix: 'ogre/atk-up/ogre',
        start: 0,
        end: 2,
        zeroPad: 2,
        repeat: 0,
    },
    {
        atlas: 'ogre',
        key: 'ogre-walk-up',
        frameRate: 8,
        prefix: 'ogre/walk-up/ogre',
        start: 0,
        end: 4,
        zeroPad: 2,
        repeat: -1,
    },
];

export const OgreConfig = {
    id: 3,
    name: 'Ogre',
    texture: 'ogre',
    baseHealth: 20,
    atack: 8,
    defense: 4,
    speed: 25,
    flee: 3,
    hit: 5,
    exp: 100,
    hit: 5,
    healthBarOffsetX: -5,
    healthBarOffsetY: 17,
    drops: [
        new EntityDrops(
            3, // Treasure Chest
            2 // 1% chance of dropping the item
        ),
        new EntityDrops(
            4, // Mighty Sword
            10 // 5% chance of dropping the item
        ),
    ],
};
