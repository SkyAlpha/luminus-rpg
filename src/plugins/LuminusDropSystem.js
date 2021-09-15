import { EnemiesSeedConfig } from '../consts/enemies/EnemiesSeedConfig';
import { Item } from '../entities/Item';
import { PlayerDrops } from '../models/EntityDrops';

/**
 * This class is responsible for dropping items from a given entity.
 * @class
 */
export class LuminusDropSystem {
    constructor(scene, entity) {
        /**
         * The game scene that the player is playing.
         * @type { Phaser.Scene }
         */
        this.scene = scene;

        /**
         * The id of the entity that will drop something.
         * @type { number }
         */
        this.entityId = entity.id;

        /**
         * The Entity that will drop the items.
         * @type { Phaser.GameObjects.Sprite }
         */
        this.entity = entity;

        /**
         * The items that the entity will drop.
         * @type { Array.< PlayerDrops > }
         */
        this.drops = entity.drops;

        /**
         * Drops the items from an entity.
         */
        this.dropItems = () => {
            let zone = this.scene.add.zone(this.entity.container.x, this.entity.container.y, 16, 16);
            var spriteBounds = Phaser.Geom.Rectangle.Inflate(Phaser.Geom.Rectangle.Clone(zone), 0, 0);

            this.drops.forEach((drop) => {
                const chance = Math.random() * 100;
                if (drop.chance - chance >= 0 || drop.chance === 100) {
                    const pos = Phaser.Geom.Rectangle.Random(spriteBounds);
                    let item = new Item(this.scene, pos.x, pos.y - 20, drop.id);
                    this.scene.tweens.add({
                        targets: item,
                        props: {
                            y: {
                                value: item.y - 4,
                            },
                        },
                        duration: 2000,
                        loop: -1,
                        yoyo: true,
                    });
                }
            });
        };
    }
}
