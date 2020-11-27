import Phaser from 'phaser';
import joystick from '../assets/vendor/VirtualJoystickPlugin';
import joystick_atlas_image from '../assets/sprites/joystick-0.png';
import joystick_json from '../assets/sprites/joystick.json';
import { Player } from '../entities/Player';

export class JoystickScene extends Phaser.Scene {
    constructor() {
        super({
            key: 'JoystickScene',
        });
        /**
         * Defines if the on screen controls will be visible.
         * @type { booelan }
         */
        this.useOnScreenControls = true;
        /**
         * Player Sprite.
         * @type { Player }
         */
        this.player = null;

        /**
         * Joystick pad.
         * @type { VirtualJoystickPlugin }
         */
        this.stick = null;

        /**
         * Button A
         * @type { Button }
         */
        this.buttonA = null;

        /**
         * Button B
         * @type { Button }
         */
        this.buttonB = null;
    }

    preload() {
        this.load.scenePlugin(
            'VirtualJoystickPlugin',
            joystick,
            'VirtualJoystickPlugin',
            'pad'
        );
        this.load.atlas('joystick', joystick_atlas_image, joystick_json);
    }

    create() {
        this.mainScene = this.scene.get('MainScene');

        this.stick = this.pad
            .addStick(0, 0, 120, 'joystick', 'base', 'stick')
            .alignBottomLeft(100);
        this.buttonA = this.pad
            .addButton(0, 120, 'joystick', 'button0-up', 'button0-down')
            .setName('mobile_ButtonA');
        this.buttonA.posX = this.cameras.main.width - 150;
        this.buttonA.posY = this.cameras.main.height - 250;

        // Sets the button B
        this.buttonB = this.pad
            .addButton(0, 120, 'joystick', 'button1-up', 'button1-down')
            .setName('mobile_ButtonB')
            .alignBottomRight(100);
        this.buttonB.posX = this.cameras.main.width - 50;
        this.buttonB.posY = this.cameras.main.height - 250;

        this.mainScene.events.on(
            'setConfiguration',
            (args) => {
                this.player = args.player;
                this.events.emit('setStick', this.stick);
            },
            this
        );

        // this.scale.on('resize', (resize) => {
        //     if (this.stick) {
        //         this.stick = this.pad
        //             .addStick(20, 20, 120, 'joystick', 'base', 'stick')
        //             .alignBottomLeft(32);
        //     }
        // });
    }

    update() {
        if (this.useOnScreenControls && this.player && this.player.body) {
            if (
                this.stick &&
                this.stick.isDown &&
                this.player.body.maxSpeed > 0
            ) {
                this.physics.velocityFromRotation(
                    this.stick.rotation,
                    this.stick.force * this.player.speed,
                    this.player.body.velocity
                );
            }
        }
    }
}
