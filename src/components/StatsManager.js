import { Enemy } from '../entities/Enemy';
import { Player } from '../entities/Player';

/**
 * The Class responsible for managing the status of and entity.
 * @class
 */
export class StatsManager {
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
    }

    /**
     * Calculates all stats of the entity.
     */
    calculateStats() {
        this.calculateHealth();
        this.calculateDefense();
        this.calculateAtack();
        this.calculateSpeed();
        this.calculateCritical();
        this.calculateFlee();
        this.calculateHit();
    }

    calculateHealth() {
        this.entity.stats.baseHealth = this.entity.stats.level * 10;
    }
    calculateDefense() {}
    calculateAtack() {}
    calculateSpeed() {}
    calculateCritical() {}
    calculateFlee() {}
    calculateHit() {}
}
