export const Rat = [
    // Down
    {
        atlas: 'rat',
        key: 'rat-idle-down',
        frameRate: 1,
        prefix: 'rat/idle-down/rat',
        start: 0,
        end: 3,
        zeroPad: 2,
        repeat: -1,
    },
    {
        atlas: 'rat',
        key: 'rat-atk-down',
        frameRate: 2,
        prefix: 'rat/atk-down/rat',
        start: 0,
        end: 3,
        zeroPad: 2,
        repeat: 0,
    },
    {
        atlas: 'rat',
        key: 'rat-walk-down',
        frameRate: 4,
        prefix: 'rat/walk-down/rat',
        start: 0,
        end: 3,
        zeroPad: 2,
        repeat: -1,
    },

    // Right
    {
        atlas: 'rat',
        key: 'rat-idle-right',
        frameRate: 1,
        prefix: 'rat/idle-right/rat',
        start: 0,
        end: 1,
        zeroPad: 2,
        repeat: -1,
    },
    {
        atlas: 'rat',
        key: 'rat-walk-right',
        frameRate: 4,
        prefix: 'rat/walk-right/rat',
        start: 0,
        end: 2,
        zeroPad: 2,
        repeat: -1,
    },
    {
        atlas: 'rat',
        key: 'rat-atk-right',
        frameRate: 2,
        prefix: 'rat/atk-right/rat',
        start: 0,
        end: 4,
        zeroPad: 2,
        repeat: 0,
    },
    // UP
    {
        atlas: 'rat',
        key: 'rat-idle-up',
        frameRate: 1,
        prefix: 'rat/idle-up/rat',
        start: 0,
        end: 3,
        zeroPad: 2,
        repeat: -1,
    },
    {
        atlas: 'rat',
        key: 'rat-walk-up',
        frameRate: 4,
        prefix: 'rat/walk-up/rat',
        start: 0,
        end: 3,
        zeroPad: 2,
        repeat: -1,
    },
    {
        atlas: 'rat',
        key: 'rat-atk-up',
        frameRate: 2,
        prefix: 'rat/atk-up/rat',
        start: 0,
        end: 3,
        zeroPad: 2,
        repeat: 0,
    },
];

export const RatConfig = {
    id: 1,
    name: 'Rat',
    baseHealth: 10,
    atack: 2,
    defense: 1,
    speed: 25,
    drops: [
        {
            id: 1, // Red Potion
            chance: 100, // 50% chance of dropping the item
        },
    ],
};
