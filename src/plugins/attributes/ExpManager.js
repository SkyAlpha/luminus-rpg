import { Enemy } from '../../entities/Enemy';
import { Player } from '../../entities/Player';
import { LuminusEntityTextDisplay } from '../LuminusEntityTextDisplay';

export class ExpManager {
    /**
     * Adds exp to the player entity
     * @param { Player | Enemy } entity the entity that should level up.
     * @param { number } exp amount of exp received by the player.
     * @param { number } extraExp extra exp, used for recursive call of the method.
     */
    static addExp(entity, exp, extraExp = 0) {
        entity.attributes.experience += exp + extraExp;
        let excedingExp = 0;
        if (entity.attributes.nextLevelExperience <= entity.attributes.experience) {
            excedingExp = entity.attributes.experience - entity.attributes.nextLevelExperience;
            this.levelUpEntity(entity);
            if (excedingExp > 0) this.addExp(entity, 0, excedingExp);
        }
    }

    /**
     * Adds a level or more to the entity.
     * @param { Player | Enemy} entity
     */
    static levelUpEntity(entity) {
        entity.attributes.level += 1;
        entity.attributes.availableStatPoints += 2;
        entity.attributes.experience = 0;
        entity.attributes.baseHealth += 10;
        entity.attributes.nextLevelExperience += 100 * entity.attributes.level;
        if (entity.healthBar) {
            entity.healthBar.full = entity.attributes.baseHealth;
            entity.healthBar.update(entity.attributes.health);
        }
        // Add next level experience.
        this.levelUpEffects(entity);
    }

    /**
     * Displays the level up effects.
     * @param { Player | Enemy} entity
     */
    static levelUpEffects(entity) {
        entity.scene.sound.play('level_up');
        this.displayText = new LuminusEntityTextDisplay(entity.scene);
        this.displayText.displayDamage('LEVEL UP!!', entity);

        // let particles = entity.scene.add.particles('flares');

        // particles.createEmitter({
        //     frame: ['white', 'blue'],
        //     follow: entity.container,
        //     followOffset: {
        //         y: -entity.hitZone.body.height / 1.3,
        //     },
        //     lifespan: 3000,
        //     speed: 20,
        //     angle: { min: 0, max: 360 },
        //     gravityY: 10,
        //     alpha: { start: 1, end: 0 },
        //     bounds: {
        //         x: entity.container.x - 50,
        //         y: entity.container.y - entity.hitZone.body.height - 50,
        //         w: 100,
        //         h: 100,
        //     },
        //     scale: { start: 0.01, end: 0 },
        //     quantity: 2,
        //     blendMode: 'ADD',
        // });

        // setTimeout((t) => {
        //     particles.destroy();
        // }, 1000);
    }
}
