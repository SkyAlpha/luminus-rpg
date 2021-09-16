import { Bat } from './enemies/bat';
import { Ogre } from './enemies/ogre';
import { Rat } from './enemies/rat';
import { Player } from './player/Player';

export const Animations = [
    ...Bat,
    ...Rat,
    ...Ogre,
    ...Player,

    // Chat iteraction box.
    {
        atlas: 'chat_bubble_animation',
        key: 'chat_bubble_animation',
        frameRate: 3,
        prefix: 'chat_box_',
        start: 1,
        end: 4,
        zeroPad: 2,
        repeat: -1,
    },
];
