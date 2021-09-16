import { Item } from '../entities/Item';
import { Player } from '../entities/Player';
import { ConsumableBonus } from '../models/ConsumableBonus';
import { LuminusEntityTextDisplay } from './LuminusEntityTextDisplay';

/**
 * This class is responsible for Manage all the consumable actions.
 * @class
 */
export class LuminusConsumableManager {
    constructor() {}

    /**
     * Checks what kind of item is being used.
     * @param { Item } item the Item that is being used.
     * @param { Player } player The player that will use the item.
     */
    useItem(item, player) {
        const scriptList = item.script.split(';').filter((v) => v);
        if (scriptList.length > 0) {
            scriptList.forEach((script) => {
                const scriptActions = script.split(' ');
                switch (scriptActions[0]) {
                    case 'rec':
                        // console.log('Recover');
                        this.recover(item, scriptActions, player);
                        break;
                    case 'buff':
                        this.buff(item, scriptActions, player);
                        break;

                    default:
                        console.log('This is not a usable item.');
                        break;
                }
            });
        }
    }

    /**
     * Recover something based on the given item script.
     * @param { Item } item the item that will recover the status.
     * @param { string } action The script action that will be performed.
     * @param { Player } player The player that will use the item.
     */
    recover(item, action, player) {
        // Not very Optimized.
        this.luminusEntityTextDisplay = new LuminusEntityTextDisplay(player.scene);

        // TODO - Create an animation to display the usage of a consumable.
        switch (action[1]) {
            case 'hp':
                // console.log(`Recover ${action[2]} HP`);
                player.attributes.health = Math.min(
                    player.attributes.baseHealth,
                    (player.attributes.health += parseInt(action[2]))
                );
                player.healthBar.update(player.attributes.health);
                if (player.luminusHUDProgressBar) player.luminusHUDProgressBar.updateHealth(player.attributes.health);
                this.luminusEntityTextDisplay.displayDamage(action[2], player, false, true);
                player.scene.sound.play(item.useSfx);
                console.log(`Recover ${action[2]} HP`);
                break;
            case 'sp':
                console.log(`Recover ${action[2]} SP`);
                break;

            default:
                break;
        }
    }

    /**
     * Performs a Buff based on the incoming parameters.
     * @param { Item } item the item that will give the buff.
     * @param { string } action The script action that will be performed.
     * @param { Player } player The player that will use the item.
     */
    buff(item, action, player) {
        switch (action[1]) {
            case 'hp':
                // Sets the Health, but doesn't exceed the maximum base health.

                break;
            case 'sp':
                console.log(`Recover ${action[2]} SP`);
                break;
            case 'atk':
                /** @type {ConsumableBonus} */
                const consumableBonus = player.attributes.bonus.consumable.find((consumableItem) => {
                    return consumableItem.uniqueId === item.buffType.id;
                });
                if (consumableBonus) {
                    player.scene.sound.play(item.useSfx);
                    console.log(`Increased ${action[2]} ATK for ${action[3]} seconds`);
                    consumableBonus.timer.reset({
                        callbackScope: this,
                        delay: consumableBonus.time * 1000, // Time to restore the attributes to it's default value.
                        callback: this.changeStats, // Callback
                        args: [player, consumableBonus, -1], // Params
                    });
                } else {
                    // Add the item
                    let bonusStatus = new ConsumableBonus(item.buffType.id, 'atack', action[2], action[3]);
                    this.changeStats(player, bonusStatus);

                    player.scene.sound.play(item.useSfx);
                    console.log(`Increased ${action[2]} ATK for ${action[3]} seconds`);
                    bonusStatus.timer = player.scene.time.addEvent({
                        callbackScope: this,
                        delay: bonusStatus.time * 1000, // Time to restore the attributes to it's default value.
                        callback: this.changeStats, // Callback
                        args: [player, bonusStatus, -1], // Params
                    });
                    player.attributes.bonus.consumable.push(bonusStatus);
                }

                break;

            default:
                break;
        }
    }

    /**
     * Changes the attributes of the player based on the configuration.
     * @param { Player } player The player that will hat it's attributes changed.
     * @param { ConsumableBonus } bonus The bonus that will be applied.
     * @param { number } sign positive or negative sign.
     */
    changeStats(player, bonus, sign = 1) {
        player.attributes[bonus.statBonus] = player.attributes[bonus.statBonus] + bonus.value * sign;
        const index = player.attributes.bonus.consumable.indexOf(bonus);
        if (index != -1) player.attributes.bonus.consumable.splice(index, 1);
    }
}
