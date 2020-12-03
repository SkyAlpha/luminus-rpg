import Phaser from 'phaser';
import { LuminusSoundManager } from '../plugins/LuminusSoundManager';
import { NineSlice } from 'phaser3-nineslice';

/**
 * @constant
 * @default
 */
const COLOR_PRIMARY = 0x4e342e;
/**
 * @constant
 * @default
 */
const COLOR_LIGHT = 0x7b5e57;
/**
 * @constant
 * @default
 */
const COLOR_DARK = 0x260e04;

/**
 * @class
 */
export class SettingScene extends Phaser.Scene {
    /**
     * This is the scene responsible for rendering the Settings of the game. All the settings UI Must be inside of this scene.
     */
    constructor() {
        super({
            key: 'SettingsScene',
        });

        /**
         * The sound manager class.
         * @type { LuminusSoundManager }
         */
        this.luminusSoundManager = null;

        /**
         * The margin used in this scene.
         * @type { number }
         * @default
         */
        this.margin = 10;

        /**
         * The starting X position of the dialog.
         * @type { number }
         * @default
         */
        this.dialogXPosition = this.margin;

        /**
         * The starting Y position of the dialog.
         * @type { number }
         * @default
         */
        this.dialogYPosition = 75;

        /**
         * The offset from the bottom or Bottom Margin of the dialog, relative to the screen.
         * @type { number }
         * @default
         */
        this.dialogBottomOffset = 120;

        /**
         * Width and Height of the corner Slice.
         * @example
         * this.nineSliceOffsets = 25;
         * // Or
         * this.nineSliceOffsets = [10, 15, 5, 5];
         *
         * // Array Length	Use	Explanation
         * // 1	[ topRightBottomLeft ]	The first (only) element is used as the value for all four sides
         * // 2	[ topBottom, leftRight ]	The first element is used for the top and bottom, the second element is used as the for the left and right
         * // 3	[ top, rightLeft, bottom ]	The first element is used for the top, second is used for the right and left, and the third element is used for the bottom
         * // 4	[ top, right, bottom, left ]	Each element is assigned to a specific side
         * @type { number | Array<number> }  */
        this.nineSliceOffsets = 60;
        /**
         * Safe area of the scaling areas..
         * @type { number }  */
        this.nineSliceSafeArea = 32;

        /**
         * The margin of the settings header relative to the top of the dialog.
         * @type { number }
         * @default
         */
        this.settingHeaderMarginTop = 115;

        /**
         * The Text used as Header for the settings dialog.
         * @type { string }
         * @default
         */
        this.settingHeaderText = 'Settings';

        /**
         * The font size of the Settings Header.
         * @type { string }
         * @default
         */
        this.settingHeaderFontSize = '18px';

        /**
         * The default font family of the Setting Header.
         * @type { string }
         * @default
         */
        this.settingHeaderFontFamily = "'Press Start 2P'";

        /**
         * Offset of the close button to the right margin of the dialog.
         * @type { number }
         * @default
         */
        this.closeButtonOffsetX = 60;

        /**
         * the name of the texture / sprite of the close button.
         * @type { string }
         * @default
         */
        this.closeButtonSpriteName = 'close_button';

        /**
         * The scale of the close button.
         * @type { number }
         * @default
         */
        this.closeButtonScale = 0.3;

        /**
         * The slider width.
         * @type { number }
         */
        this.sliderWidth = 100;

        /**
         * The slider height.
         * @type { number }
         */
        this.sliderHeight = 20;

        /**
         * The name of the texture of the Background for the Setting Scene.
         * @type { string }
         * @default
         */
        this.settingBackgroundSpriteName = 'settings_background';
    }

    preload() {
        this.load.scenePlugin({
            key: 'rexuiplugin',
            url:
                'https://raw.githubusercontent.com/rexrainbow/phaser3-rex-notes/master/dist/rexuiplugin.min.js',
            sceneKey: 'rexUI',
        });
    }

    create() {
        this.luminusSoundManager = new LuminusSoundManager(this);
        this.luminusSoundManager.create();

        this.dialog = this.add
            .nineslice(
                this.dialogXPosition,
                this.dialogYPosition,
                this.cameras.main.width - this.margin * 2,
                this.cameras.main.height - this.dialogBottomOffset, // the width and height of your object
                this.settingBackgroundSpriteName, // a key to an already loaded image
                this.nineSliceOffsets, // the width and height to offset for a corner slice
                this.nineSliceSafeArea // (optional) pixels to offset when computing the safe usage area
            )
            .setScrollFactor(0, 0)
            .setOrigin(0, 0);
        this.createAudioSlider();

        this.settingHeader = this.add
            .text(
                (this.cameras.main.width - this.margin * 2) / 2,
                this.settingHeaderMarginTop,
                this.settingHeaderText,
                {
                    fontSize: this.settingHeaderFontSize,
                    fontFamily: `${this.settingHeaderFontFamily}`,
                }
            )
            .setOrigin(0.5, 0.5);
        this.closeButton = this.add
            .image(
                this.cameras.main.width - this.closeButtonOffsetX,
                this.settingHeader.y,
                this.closeButtonSpriteName
            )
            .setInteractive()
            .setScale(this.closeButtonScale)
            .setScrollFactor(0, 0)
            .setDepth(50);

        this.closeButton.on('pointerdown', (pointer) => {
            this.scene.stop();
        });

        this.scale.on('resize', (size) => {
            if (this.cameras && this.cameras.main) {
                this.dialog.resize(
                    this.cameras.main.width - this.margin * 2,
                    this.cameras.main.height - this.dialogYPosition
                );
                this.settingHeader.setPosition(
                    (this.cameras.main.width - this.margin * 2) / 2,
                    this.settingHeaderMarginTop
                );
                this.closeButton.setPosition(
                    this.cameras.main.width - this.closeButtonOffsetX,
                    this.settingHeader.y
                );
            }
        });
    }

    /**
     * Creates the audio slider.
     */
    createAudioSlider() {
        this.textAudioSlider = this.add.text(
            this.dialog.x + this.margin * 3,
            this.dialog.y + this.margin * 10,
            `Audio:`,
            {
                fontSize: '11px',
                fontFamily: "'Press Start 2P'",
            }
        );
        this.slider = this.rexUI.add
            .slider({
                x: this.textAudioSlider.x + this.margin * 12,
                y: this.textAudioSlider.y - 5,
                width: this.sliderWidth,
                height: this.sliderHeight,
                orientation: 'x',
                value: this.luminusSoundManager.getVolume(),

                track: this.rexUI.add.roundRectangle(0, 0, 0, 0, 6, COLOR_DARK),
                thumb: this.rexUI.add.roundRectangle(
                    0,
                    0,
                    0,
                    0,
                    10,
                    COLOR_LIGHT
                ),

                valuechangeCallback: (value) => {
                    this.textAudioSlider.text = `Audio: ${
                        value.toFixed(1) * 100
                    }`;
                    this.luminusSoundManager.setVolume(value);
                },
                space: {
                    top: 4,
                    bottom: 4,
                },
                input: 'drag', // 'drag'|'click'
            })
            .setOrigin(0, 0)
            .layout();
        this.slider.setScrollFactor(0, 0);
    }
}