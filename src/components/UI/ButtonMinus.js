import { LuminusUtils } from '../../utils/LuminusUtils';

export class ButtonMinus extends Phaser.GameObjects.Sprite {
    constructor(scene, x, y, action, args) {
        super(scene, x, y, 'minus_small_button');

        /**
         * @type { Phaser.Scene }
         */
        this.scene = scene;

        this.scene.add.existing(this);
        this.setInteractive();
        this.on('pointerdown', (pointer) => {
            LuminusUtils.executeFunctionByName(action, scene, args);
            this.play({ key: 'touch_button_minus' }).once(
                Phaser.Animations.Events.ANIMATION_COMPLETE,
                (animationState) => {
                    if (animationState.key === `touch_button_minus`) {
                        this.play('init_button_minus');
                    }
                }
            );
        });
    }
}
