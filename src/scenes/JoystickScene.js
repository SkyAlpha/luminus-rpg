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

        this.mainScene.events.on(
            'setConfiguration',
            (args) => {
                this.player = args.player;
                this.mainScene;
                console.log(args);
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
