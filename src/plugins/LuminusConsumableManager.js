import { Item } from '../entities/Item';
import { Player } from '../entities/Player';
import { LuminusDamageDisplay } from './LuminusDamageDisplay';

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
                        console.log('Recover');
                        this.recover(item, scriptActions, player);
                        break;
                    case 'buff':
                        console.log('Buff');
                        break;

                    default:
                        console.log('This is not a usable item.');
                        break;
                }
            });
        }
    }

    /**
     * Recover something
     * * @param { Item } item the item that will recover the status.
     * @param { string } action The script action that will be performed.
     * @param { Player } player The player that will use the item.
     */
    recover(item, action, player) {
        // Not very Optimized.
        this.luminusDamageDisplay = new LuminusDamageDisplay(player.scene);

        // TODO - Create an animation to display the usage of a consumable.
        switch (action[1]) {
            case 'hp':
                // console.log(`Recover ${action[2]} HP`);
                player.health = Math.min(
                    player.baseHealth,
                    (player.health += parseInt(action[2]))
                );
                player.healthBar.update(player.health);
                if (player.luminusHUDProgressBar)
                    player.luminusHUDProgressBar.updateHealth(player.health);
                this.luminusDamageDisplay.displayDamage(
                    action[2],
                    player,
                    false,
                    true
                );
                player.scene.sound.play(item.useSfx);
                break;
            case 'sp':
                console.log(`Recover ${action[2]} SP`);
                break;

            default:
                break;
        }
    }

    /**
     * Performa a Buff based on the incoming parameters.
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

            default:
                break;
        }
    }
}
