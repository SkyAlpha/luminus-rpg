import { EntityDrops } from '../../models/EntityDrops';

export const Bat = [
    // Down
    {
        atlas: 'bat',
        key: 'bat-idle-down',
        frameRate: 8,
        prefix: 'bat/idle-down/bat',
        start: 0,
        end: 4,
        zeroPad: 2,
        repeat: -1,
    },
    {
        atlas: 'bat',
        key: 'bat-atk-down',
        frameRate: 5,
        prefix: 'bat/atk-down/bat',
        start: 0,
        end: 4,
        zeroPad: 2,
        repeat: 0,
    },
    {
        atlas: 'bat',
        key: 'bat-walk-down',
        frameRate: 8,
        prefix: 'bat/walk-down/bat',
        start: 0,
        end: 4,
        zeroPad: 2,
        repeat: -1,
    },
    // Right
    {
        atlas: 'bat',
        key: 'bat-idle-right',
        frameRate: 8,
        prefix: 'bat/idle-right/bat',
        start: 0,
        end: 4,
        zeroPad: 2,
        repeat: -1,
    },
    {
        atlas: 'bat',
        key: 'bat-atk-right',
        frameRate: 5,
        prefix: 'bat/atk-right/bat',
        start: 0,
        end: 4,
        zeroPad: 2,
        repeat: 0,
    },
    {
        atlas: 'bat',
        key: 'bat-walk-right',
        frameRate: 8,
        prefix: 'bat/walk-right/bat',
        start: 0,
        end: 4,
        zeroPad: 2,
        repeat: -1,
    },
    // Up
    {
        atlas: 'bat',
        key: 'bat-idle-up',
        frameRate: 8,
        prefix: 'bat/idle-up/bat',
        start: 0,
        end: 4,
        zeroPad: 2,
        repeat: -1,
    },
    {
        atlas: 'bat',
        key: 'bat-atk-up',
        frameRate: 5,
        prefix: 'bat/atk-up/bat',
        start: 0,
        end: 4,
        zeroPad: 2,
        repeat: 0,
    },
    {
        atlas: 'bat',
        key: 'bat-walk-up',
        frameRate: 8,
        prefix: 'bat/walk-up/bat',
        start: 0,
        end: 4,
        zeroPad: 2,
        repeat: -1,
    },
];

export const BatConfig = {
    id: 2,
    name: 'Bat',
    baseHealth: 10,
    atack: 7,
    defense: 1,
    speed: 30,
    flee: 3,
    hit: 5,
    exp: 50,
    hit: 5,
    drops: [
        new EntityDrops(
            1, // Red Potion
            50 // 50% chance of dropping the item
        ),
        new EntityDrops(
            2, // black Potion
            5 // 5% chance of dropping the item
        ),
        new EntityDrops(
            3, // Treasure Chest
            2 // 1% chance of dropping the item
        ),
    ],
};
