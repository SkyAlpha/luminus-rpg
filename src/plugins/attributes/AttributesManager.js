import { ATTRIBUTES_CONST } from '../../consts/AttributesConst';
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
        this.statsCopy = lodash.cloneDeep(this.entity.attributes);

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
     * Calculates all attributes of the entity.
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
        if (this.statsCopy.level != this.entity.attributes.level) {
            this.statsCopy.level = this.entity.attributes.level;
            this.leveledUp = true;
        }
    }

    /**
     * Calculates the Health every tick.
     */
    calculateHealth() {
        this.entity.attributes.baseHealth =
            this.statsCopy.baseHealth + this.entity.attributes.level * 10 + this.entity.attributes.rawStats.vit * 3;
        if (this.entity.healthBar) {
            this.entity.healthBar.full = this.entity.attributes.baseHealth;
            this.entity.healthBar.health = this.entity.attributes.baseHealth;
            this.entity.healthBar.draw();
        }
        if (this.firstTime || this.leveledUp) {
            this.entity.attributes.health = this.entity.attributes.baseHealth;
            if (this.entity.luminusHUDProgressBar) this.entity.luminusHUDProgressBar.updateHealth();
            console.log('Full Life:', this.entity.attributes.baseHealth);
        }
    }
    /**
     * Calculates defense every tick.
     */
    calculateDefense() {
        if (this.firstTime) {
            this.entity.attributes.defense = this.statsCopy.defense + this.entity.attributes.rawStats.vit;
            console.log('Defense:', this.entity.attributes.defense);
        }
    }
    /**
     * Calculates Atack every Tick.
     */
    calculateAtack() {
        if (this.firstTime || this.leveledUp) {
            const multiplicator = Math.floor(this.entity.attributes.rawStats.str / ATTRIBUTES_CONST.ATK.DIVIDER);
            const atackBonus = multiplicator * ATTRIBUTES_CONST.ATK.BONUS_MULTIPLIER; // For every 10 of str you get 5 extra atack points.
            const level_multiplier = Math.floor(this.entity.attributes.level / ATTRIBUTES_CONST.ATK.DIVIDER);
            const level_atack_bonus = level_multiplier * ATTRIBUTES_CONST.ATK.BONUS_LEVEL_MULTIPLIER;
            this.entity.attributes.atack =
                this.statsCopy.atack + this.entity.attributes.rawStats.str + atackBonus + level_atack_bonus;
            console.log('Atack:', this.entity.attributes.atack);
        }
    }
    /**
     * Calculates Speed every tick.
     */
    calculateSpeed() {
        // TODO - This should be updated with items and consumables.
        // if (this.firstTime) {
        //     this.entity.attributes.speed = this.statsCopy.speed + this.entity.attributes.rawStats.agi;
        //     console.log('Speed:', this.entity.attributes.speed);
        // }
    }
    /**
     * Calculates Critical every Tick.
     */
    calculateCritical() {
        if (this.firstTime) {
            this.entity.attributes.critical = this.statsCopy.critical + this.entity.attributes.rawStats.agi;
            console.log('Critical:', this.entity.attributes.critical);
        }
    }
    /**
     * Calculates Flee every tick.
     */
    calculateFlee() {
        if (this.firstTime) {
            this.entity.attributes.flee = this.statsCopy.flee + this.entity.attributes.rawStats.agi;
            console.log('Flee:', this.entity.attributes.flee);
        }
    }

    /**
     * Calculates Hit every tick.
     */
    calculateHit() {
        if (this.firstTime) {
            this.entity.attributes.hit = this.statsCopy.hit + this.entity.attributes.rawStats.dex;
            console.log('Hit:', this.entity.attributes.hit);
        }
    }
}
