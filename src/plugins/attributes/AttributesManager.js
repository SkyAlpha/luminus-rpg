import { STATS_CONST } from '../../consts/Stats';
import { Enemy } from '../../entities/Enemy';
import { Player } from '../../entities/Player';
import lodash from 'lodash';

/**
 * The Class responsible for managing the status of and entity.
 * @class
 */
export class AttributesManager {
    /**
     * The Class responsible for managing the status of and entity.
     * @param { Phaser.Scene } scene The Phaser Scene.
     * @param { Player | Enemy } entity The Entity that will have it's statuses calculated.
     */
    constructor(scene, entity) {
        /**
         * The Phaser Scene of the Status Manager.
         * @type { Phaser.Scene }
         */
        this.scene = scene;

        /**
         * The entity that will have it's statusses changed by this manager..
         * @type { Player | Enemy}
         */
        this.entity = entity;

        /**
         * A copy of the entity
         * @type { EntityStats }
         */
        this.statsCopy = lodash.cloneDeep(this.entity.stats);

        /**
         * Is this the first time the loop is called?
         * @type { boolean }
         */
        this.firstTime = true;

        /**
         * Controls if the player has leveled up.
         * @type { number }
         */
        this.leveledUp = false;

        this.calculateStats();

        this.scene.events.on('update', this.calculateStats, this);
    }

    /**
     * Calculates all stats of the entity.
     */
    calculateStats() {
        this.checkLevelChange();
        this.calculateHealth();
        this.calculateDefense();
        this.calculateAtack();
        this.calculateSpeed();
        this.calculateCritical();
        this.calculateFlee();
        this.calculateHit();

        this.firstTime = false;
        this.leveledUp = false;
    }

    /**
     * If the level changed, it means that the player has leveled up.
     * Then it should update the core attributes.
     */
    checkLevelChange() {
        if (this.statsCopy.level != this.entity.stats.level) {
            this.statsCopy.level = this.entity.stats.level;
            this.leveledUp = true;
        }
    }

    /**
     * Calculates the Health every tick.
     */
    calculateHealth() {
        this.entity.stats.baseHealth =
            this.statsCopy.baseHealth + this.entity.stats.level * 10 + this.entity.stats.rawStats.vit * 3;
        if (this.entity.healthBar) {
            this.entity.healthBar.full = this.entity.stats.baseHealth;
            this.entity.healthBar.health = this.entity.stats.baseHealth;
            this.entity.healthBar.draw();
        }
        if (this.firstTime || this.leveledUp) {
            this.entity.stats.health = this.entity.stats.baseHealth;
            if (this.entity.luminusHUDProgressBar) this.entity.luminusHUDProgressBar.updateHealth();
            console.log('Full Life:', this.entity.stats.baseHealth);
        }
    }
    /**
     * Calculates defense every tick.
     */
    calculateDefense() {
        if (this.firstTime) {
            this.entity.stats.defense = this.statsCopy.defense + this.entity.stats.rawStats.vit;
            console.log('Defense:', this.entity.stats.defense);
        }
    }
    /**
     * Calculates Atack every Tick.
     */
    calculateAtack() {
        if (this.firstTime || this.leveledUp) {
            const multiplicator = Math.floor(this.entity.stats.rawStats.str / STATS_CONST.ATK.DIVIDER);
            const atackBonus = multiplicator * STATS_CONST.ATK.BONUS_MULTIPLIER; // For every 10 of str you get 5 extra atack points.
            const level_multiplier = Math.floor(this.entity.stats.level / STATS_CONST.ATK.DIVIDER);
            const level_atack_bonus = level_multiplier * STATS_CONST.ATK.BONUS_LEVEL_MULTIPLIER;
            this.entity.stats.atack =
                this.statsCopy.atack + this.entity.stats.rawStats.str + atackBonus + level_atack_bonus;
            console.log('Atack:', this.entity.stats.atack);
        }
    }
    /**
     * Calculates Speed every tick.
     */
    calculateSpeed() {
        // TODO - This should be updated with items and consumables.
        // if (this.firstTime) {
        //     this.entity.stats.speed = this.statsCopy.speed + this.entity.stats.rawStats.agi;
        //     console.log('Speed:', this.entity.stats.speed);
        // }
    }
    /**
     * Calculates Critical every Tick.
     */
    calculateCritical() {
        if (this.firstTime) {
            this.entity.stats.critical = this.statsCopy.critical + this.entity.stats.rawStats.agi;
            console.log('Critical:', this.entity.stats.critical);
        }
    }
    /**
     * Calculates Flee every tick.
     */
    calculateFlee() {
        if (this.firstTime) {
            this.entity.stats.flee = this.statsCopy.flee + this.entity.stats.rawStats.agi;
            console.log('Flee:', this.entity.stats.flee);
        }
    }

    /**
     * Calculates Hit every tick.
     */
    calculateHit() {
        if (this.firstTime) {
            this.entity.stats.hit = this.statsCopy.hit + this.entity.stats.rawStats.dex;
            console.log('Hit:', this.entity.stats.hit);
        }
    }
}
