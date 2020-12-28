import Phaser from 'phaser';
import { AnimationNames } from '../consts/AnimationNames';
import { LuminusAnimationManager } from './LuminusAnimationManager';
import { LuminusBattleManager } from './LuminusBattleManager';

/**
 * @class
 */
export class LuminusGamePadController extends AnimationNames {
    /**
     * This class is ment to control the player when a game controler is available.
     * this will only work if the player presses a button on the controler.
     * @param { Phaser.Scene } scene the scene which the player has to control the player.
     * @param { PLayer } player the player object
     */
    constructor(scene, player) {
        super(null);
        /**
         * The phasaer scene that the gamepad will use to make update controls.
         * @type { Phaser.Scene }
         */
        this.scene = scene;

        /**
         * The player that the controler will send inputs.
         * @type { Player }
         */
        this.player = player;

        /**
         * The luminus animation manager.
         * @type { LuminusAnimationManager }
         */
        this.luminusAnimationManager = new LuminusAnimationManager(this.player);

        /**
         * The gamepad that will control the player. The default value is null.
         * @type { Phaser.Input.Gamepad.Gamepad }
         * @default
         */
        this.gamepad = null;

        /**
         * The Luminus Battle Manager.
         * @type { LuminusBattleManager }
         */
        this.luminusBattleManager = null;
    }

    /**
     * Inicializes the PLugin.
     */
    create() {
        this.luminusBattleManager = new LuminusBattleManager();
        this.scene.input.gamepad.on(
            'connected',
            (pad, button, index) => {
                console.log('GamePad Connected');
                if (!this.gamepad) {
                    this.gamepad = pad;
                }
            },
            this
        );

        this.scene.input.gamepad.on('down', (pad) => {
            if (!this.gamepad) {
                this.gamepad = pad;
            }
            if (pad.A) {
                this.luminusBattleManager.atack(this.player);
            }
        });
    }

    /**
     * Performs the movement action to the player using the GamePad.
     */
    sendInputs() {
        if (this.gamepad) {
            if (
                this.gamepad.left ||
                (this.gamepad.left && this.gamepad.down) ||
                (this.gamepad.left && this.gamepad.up)
            ) {
                this.player.body.setVelocityX(-this.player.speed);
                this.player.anims.play(this.walkLeftAnimationName, true);
            } else if (
                this.gamepad.right ||
                (this.gamepad.right && this.gamepad.down) ||
                (this.gamepad.right && this.gamepad.up)
            ) {
                this.player.anims.play(this.walkRightAnimationName, true);
                this.player.body.setVelocityX(this.player.speed);
            }

            if (this.gamepad.up) {
                this.player.body.setVelocityY(-this.player.speed);
                if (!this.gamepad.left && !this.gamepad.right)
                    this.player.anims.play(this.walkUpAnimationName, true);
            } else if (this.gamepad.down) {
                this.player.body.setVelocityY(this.player.speed);
                if (!this.gamepad.left && !this.gamepad.right)
                    this.player.anims.play(this.walkDownAnimationName, true);
            }

            if (
                (this.gamepad.leftStick.x !== 0 ||
                    this.gamepad.leftStick.y !== 0) &&
                this.player.body.maxSpeed > 0
            ) {
                this.luminusAnimationManager.animateWithAngle(
                    this.walkPrefixAnimation,
                    Phaser.Math.Angle.Wrap(this.gamepad.leftStick.angle())
                );
                this.scene.physics.velocityFromRotation(
                    this.gamepad.leftStick.angle(),
                    this.player.speed,
                    this.player.body.velocity
                );
            }

            this.player.body.velocity.normalize().scale(this.player.speed);
        }
    }
}
