export const PlayerConfig = {
    texture: 'character',
};

export const Player = [
    {
        atlas: PlayerConfig.texture,
        key: `${PlayerConfig.texture}-idle-down`,
        frameRate: 4,
        prefix: 'idle-down/idle-down',
        start: 0,
        end: 0,
        zeroPad: 2,
        repeat: -1,
    },
    {
        atlas: PlayerConfig.texture,
        key: `${PlayerConfig.texture}-idle-right`,
        frameRate: 4,
        prefix: 'idle-right/idle-right',
        start: 0,
        end: 0,
        zeroPad: 2,
        repeat: -1,
    },
    {
        atlas: PlayerConfig.texture,
        key: `${PlayerConfig.texture}-idle-left`,
        frameRate: 4,
        prefix: 'idle-left/idle-left',
        start: 0,
        end: 0,
        zeroPad: 2,
        repeat: -1,
    },
    {
        atlas: PlayerConfig.texture,
        key: `${PlayerConfig.texture}-idle-up`,
        frameRate: 4,
        prefix: 'idle-up/idle-up',
        start: 0,
        end: 0,
        zeroPad: 2,
        repeat: -1,
    },
    {
        atlas: PlayerConfig.texture,
        key: `${PlayerConfig.texture}-walk-down`,
        frameRate: 4,
        prefix: 'walk-down/character-down',
        start: 0,
        end: 3,
        zeroPad: 2,
        repeat: -1,
    },
    {
        atlas: PlayerConfig.texture,
        key: `${PlayerConfig.texture}-walk-right`,
        frameRate: 4,
        prefix: 'walk-right/character-right',
        start: 0,
        end: 3,
        zeroPad: 2,
        repeat: -1,
    },
    {
        atlas: PlayerConfig.texture,
        key: `${PlayerConfig.texture}-walk-left`,
        frameRate: 4,
        prefix: 'walk-left/character-left',
        start: 0,
        end: 3,
        zeroPad: 2,
        repeat: -1,
    },
    {
        atlas: PlayerConfig.texture,
        key: `${PlayerConfig.texture}-walk-up`,
        frameRate: 4,
        prefix: 'walk-up/character-up',
        start: 0,
        end: 3,
        zeroPad: 2,
        repeat: -1,
    },
    {
        atlas: PlayerConfig.texture,
        key: `${PlayerConfig.texture}-atk-up`,
        frameRate: 8,
        prefix: 'atk-up/atk-up',
        start: 0,
        end: 3,
        zeroPad: 2,
        repeat: 0,
    },
    {
        atlas: PlayerConfig.texture,
        key: `${PlayerConfig.texture}-atk-right`,
        frameRate: 8,
        prefix: 'atk-right/atk-right',
        start: 0,
        end: 3,
        zeroPad: 2,
        repeat: 0,
    },
    {
        atlas: PlayerConfig.texture,
        key: `${PlayerConfig.texture}-atk-down`,
        frameRate: 10,
        prefix: 'atk-down/atk-down',
        start: 0,
        end: 3,
        zeroPad: 2,
        repeat: 0,
    },
    {
        atlas: PlayerConfig.texture,
        key: `${PlayerConfig.texture}-atk-left`,
        frameRate: 8,
        prefix: 'atk-left/atk-left',
        start: 0,
        end: 3,
        zeroPad: 2,
        repeat: 0,
    },

    // Slash atack animation
    {
        atlas: 'slash',
        key: 'slash',
        frameRate: 16,
        prefix: 'slash/slash',
        start: 1,
        end: 4,
        zeroPad: 2,
        repeat: 0,
    },
];
