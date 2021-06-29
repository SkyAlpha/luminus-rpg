/**
 * This is a Model Class of the Consumable Bonus.
 * @class
 */
export class ConsumableBonus {
    constructor(id, statBonus, value, time) {
        /**
         * The Unique ID
         * @type { number }
         */
        this.uniqueId = id;
        /**
         * The stat bonus string, this is the name of the Entity Status Variable.
         * @type { string }
         */
        this.statBonus = statBonus;
        /**
         * The value of bonus change.
         * @type { number }
         */
        this.value = value;
        /**
         * The time that the bonus will remain active.
         * @type { number }
         */
        this.time = time;

        /**
         * The time event that will remove the bonus.
         * @type { Phaser.Time.TimerEvent }
         */
        this.timer = null;
    }
}
