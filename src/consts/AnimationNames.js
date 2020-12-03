/**
 * @class
 */
export class AnimationNames {
    constructor() {
        /**
         * Name of the walk up animation.
         * @type { string }
         * @default
         */
        this.walkUpAnimationName = 'walk-up';

        /**
         * Name of the walk right animation.
         * @type { string }
         * @default
         */
        this.walkRightAnimationName = 'walk-right';

        /**
         * Name of the walk down animation.
         * @type { string }
         * @default
         */
        this.walkDownAnimationName = 'walk-down';

        /**
         * Name of the walk left animation.
         * @type { string }
         * @default
         */
        this.walkLeftAnimationName = 'walk-left';

        /**
         * This is specific for those who are using the joystick.
         *
         * The Luminus animation manager expects the animations to have a prefix. The sufix is automatically added by the LuminusAnimationManager class, like this:
         * prefix: 'walk'
         * sufix: '-right'
         * By default the prefix is just 'walk' and the sufix is the direction that the player animation should play.
         *
         * The luminus animation manager will play the default animation directions
         * 'up', 'right', 'down', 'left'
         *
         * @example
         * 'walk-right'
         *
         *
         * @type { string }
         */
        this.walkPrefixAnimation = 'walk';

        /**
         * This is specific for those who are using the joystick.
         *
         * The Luminus animation manager expects the animations to have a prefix. The sufix is automatically added by the LuminusAnimationManager class, like this:
         * prefix: 'walk'
         * sufix: '-right'
         * By default the prefix is just 'walk' and the sufix is the direction that the player animation should play.
         *
         * The luminus animation manager will play the default animation directions
         * 'up', 'right', 'down', 'left'
         *
         * @example
         * 'walk-right'
         *
         *
         * @type { string }
         */
        this.idlePrefixAnimation = 'idle';
    }
}
