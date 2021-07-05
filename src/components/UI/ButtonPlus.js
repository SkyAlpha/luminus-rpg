import { LuminusUtils } from '../../utils/LuminusUtils';

export class ButtonPlus extends Phaser.GameObjects.Sprite {
    constructor(scene, x, y, action, args) {
        super(scene, x, y, 'plus_small_button');

        /**
         * @type { Phaser.Scene }
         */
        this.scene = scene;

        this.scene.add.existing(this);
        this.setInteractive();
        this.on('pointerdown', (pointer) => {
            LuminusUtils.executeFunctionByName(action, scene, args);
            this.play({ key: 'touch_button_plus' }).once(
                Phaser.Animations.Events.ANIMATION_COMPLETE,
                (animationState) => {
                    if (animationState.key === `touch_button_plus`) {
                        this.play('init_button_plus');
                    }
                }
            );
        });
    }
}
