import { Player } from '../entities/Player';

class LuminusInventoty {
    constructor(player) {
        /**
         * The player that will have its inventory managed.
         * @type { Player }
         */
        this.player = player;

        // TODO - Get the items of this player from DataBase.

        /**
         * @type { Array }
         */
        this.items = [
            {
                item: 1,
                count: 2,
            },
        ];
    }
}
