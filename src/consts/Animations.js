import { Bat } from './enemies/bat';
import { Rat } from './enemies/rat';
import { Player } from './player/Player';

export const Animations = [
    ...Bat,
    ...Rat,
    ...Player,

    // Chat iteraction box.
    {
        atlas: 'chat_bubble_animation',
        key: 'chat_bubble_animation',
        frameRate: 3,
        prefix: 'chat_box_',
        start: 0,
        end: 4,
        zeroPad: 2,
        repeat: -1,
    },
];
