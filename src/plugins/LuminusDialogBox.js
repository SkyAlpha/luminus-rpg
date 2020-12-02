import Phaser from 'phaser';
import { NineSlice } from 'phaser3-nineslice';
import { Player } from '../entities/Player';
import { LuminusTypingSoundManager } from './LuminusTypingSoundManager';
import { LuminusVideoOpener } from './LuminusVideoOpener';

/**
 * @class
 */
export class LuminusDialogBox {
    /**
     * This class allows one to create Dialogs.
     * It's possible to set the Action Hotkey, Action button Sprite, Dialog Sprite image,
     * Interaction icon above player.
     * @param { Phaser.Scene } scene Scene Context.
     * @param { Phaser.GameObjects } player Player Game Object.
     */
    constructor(scene, player) {
        /**
         * Scene Context.
         * @type { Phaser.Scene }  */
        this.scene = scene;
        /**
         * player Player Game Object.
         * @type { Player }  */
        this.player = player;

        /**
         * Name of the sprite image that will be the dialog.
         *  @type { string } */
        this.dialogSpriteName = 'dialog';

        /**
         * Name of the Sprite of the button action.
         * @type { string }
         * @default
         * */
        this.actionButtonSpriteName = 'space';

        /**
         * Interaction sprite name.
         * @type { string }
         * @default
         * */
        this.interactionSpriteName = 'chat_bubble_animation';

        /**
         * The name of the animation that the iteraction icon will play.
         * @type { string }
         */
        this.animationIteractionIconName = 'chat_bubble_animation';

        /**
         * Name of the Sprite of the Mobile button action.
         * @type { string }
         * @default
         * */
        this.mobileActionButtonSpriteName = 'buttonA';

        /**
         * Current action button key code.
         * @type { Phaser.Input.Keyboard.KeyCodes } */
        this.actionButtonKeyCode = Phaser.Input.Keyboard.KeyCodes.SPACE;
        /**
         * Dialog height.
         * @type { number }  */
        this.dialogHeight = 150; // Dialog Height
        /**
         * Margin of the dialog. Used to make spaces in the dialog.
         * @type { number }  */
        this.margin = 15;
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
        this.nineSliceOffsets = 23;
        /**
         * Safe area of the scaling areas..
         * @type { number }  */
        this.nineSliceSafeArea = 14;
        /**
         * Sacele of the action button sprite.
         * @type { number }  */
        this.actionSpriteScale = 0.5;
        /**
         * Spelling speed of the text in the dialog box. Bigger is faster.
         * @type { number }  */
        this.dialogSpeed = 100;
        /**
         * Dialog font size.
         * @type { number }  */
        this.fontSize = 20;
        /**
         * Current dialog page.
         * @type { number }  */
        this.currentPage = 0;
        /**
         * Dialog font width.
         * @type { number }  */
        this.fontWidth = this.fontSize - 5;
        /**
         * Maximum number of lines.
         * @type { number }  */
        this.dialogMaxLines = 5;
        /**
         * Space between lines of the dialog text.
         * @type { number }  */
        this.letterSpacing = 0;
        /**
         * Width of the camera view port.
         * @type { number }
         */
        this.cameraWidth = this.scene.cameras.main.displayWidth;
        /**
         * Height of the camera view port.
         * @type { number }
         */
        this.cameraHeight = this.scene.cameras.main.displayHeight;
        /**
         * Max width of the text inside the dialog.
         * @type { number }  */
        this.textWidth = this.cameraWidth - this.margin * 3; // Defines the text Width.
        /**
         * Rather it can show de dialog of not.
         * @type { boolean }  */
        this.canShowDialog = true;
        /**
         * Defines if the player is overlapping the text zone.
         * @type { boolean }  */
        this.isOverlapingChat = false;
        /**
         * Defines if the text is in spelling/typping animation.
         * @type { boolean }  */
        this.isAnimatingText = false;

        /**
         * @type { number }
         */
        this.cameraZoom = this.scene.cameras.main.zoom;

        /**
         * Color of the font.
         * @type { Phaser.Display.Color }
         * @default
         */
        this.fontColor = new Phaser.Display.Color(61, 61, 61, 1);

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

        /**
         * Action Button for general devices.
         * @type { Phaser.GameObjects.Image }
         */
        this.actionButton = null;

        /**
         * The Dialog that will show the text.
         * @type { NineSlice }
         */
        this.dialog = null;

        /**
         * Checks if it's mobile so it can hide the buttons.
         * @type { boolean }
         * @default
         */
        this.isMobile = false;

        /**
         * Controls the has video state. If true it has a video to play.
         * @type { boolean }
         * @default
         */
        this.hasVideo = false;

        /**
         * Class to open the video, if there is a video property defined by the developer.
         * @type { LuminusVideoOpener }
         * @default
         */
        this.luminusVideoOpener = new LuminusVideoOpener(this.scene);

        /**
         * The Typing sound Manager. This will make sounds while typing the letters.
         * @type { LuminusTypingSoundManager }
         */
        this.luminusTypingSoundManager = null;

        /**
         * Array with all properties that come with the Message Box. This will allow us to create videos, and more interactions
         * with the player as we wish.
         * @type { Array }
         */
        this.allProperties = null;

        /**
         * Font family to be used. It has to be included in your Phaser project.
         * @type { string }
         */
        this.fontFamily = 'Monospace, "Press Start 2P"';
    }

    create() {
        this.luminusTypingSoundManager = new LuminusTypingSoundManager(
            this.scene
        );
        this.luminusTypingSoundManager.create();
        // First thing to do is to check if it's mobile.
        this.isMobile = !this.scene.sys.game.device.os.desktop ? true : false;
        this.dialog = this.scene.add.nineslice(
            this.margin,
            this.cameraHeight - this.dialogHeight - this.margin, // this is the starting x/y location
            this.cameraWidth - this.margin * 2,
            this.dialogHeight, // the width and height of your object
            this.dialogSpriteName, // a key to an already loaded image
            this.nineSliceOffsets, // the width and height to offset for a corner slice
            this.nineSliceSafeArea // (optional) pixels to offset when computing the safe usage area
        );
        this.dialog.setScrollFactor(0, 0);
        this.dialog.depth = 99;
        this.dialog.visible = false;

        this.actionButton = this.scene.add
            .image(
                this.cameraWidth - this.margin * 4,
                this.cameraHeight -
                    // this.dialog_height -
                    this.margin * 3,
                this.isMobile
                    ? this.mobileActionButtonSpriteName
                    : this.actionButtonSpriteName
            )
            .setDepth(9999)
            .setScrollFactor(0, 0)
            .setScale(this.actionSpriteScale)
            .setInteractive();
        this.actionButton.visible = false;
        this.actionButton.on('pointerdown', (b) => {
            this.actionButton.clicked = true;
            this.checkButtonDown();
        });

        this.interactionIcon = this.scene.add
            .sprite(
                this.scene.cameras.main.midPoint.x,
                this.scene.cameras.main.midPoint.y -
                    this.player.body.height * 2.5,
                this.interactionSpriteName
            )
            .setDepth(99999)
            .setScale(2);

        this.interactionIcon.play(this.animationIteractionIconName);
        this.interactionIcon.visible = false;

        this.scene.tweenKey = this.scene.add.tween({
            targets: this.actionButton,
            yoyo: true,
            repeat: -1,
            scale: {
                from: this.actionSpriteScale,
                to: this.actionSpriteScale - 0.15,
            },
            duration: 1000,
        });

        this.keyObj = this.scene.input.keyboard.addKey(
            this.actionButtonKeyCode
        );

        this.scene.input.keyboard.on('keydown', (key) => {
            this.checkButtonDown();
        });

        const joystickScene = this.scene.scene.get('JoystickScene');
        if ((joystickScene && joystickScene.buttonA) || joystickScene.buttonB) {
            this.buttonA = joystickScene.buttonA;
            this.buttonB = joystickScene.buttonB;
            if (this.buttonA)
                this.buttonA.on('down', (b) => this.checkButtonDown());
            if (this.buttonB)
                this.buttonB.on('down', (b) => this.checkButtonDown());
        }
    }

    checkButtonDown() {
        if (
            this.isOverlapingChat &&
            (this.keyObj.isDown || this.isMobileButtonPressed()) &&
            !this.dialog.visible
        ) {
            // First time, show the Dialog.
            this.showDialog();
            this.player.body.maxSpeed = 0;
        } else if (
            this.isAnimatingText &&
            (this.keyObj.isDown || this.isMobileButtonPressed())
        ) {
            // Skips the typping animation.
            this.setText(this.pagesMessage[this.currentPage], false);
        } else if (
            !this.isAnimatingText &&
            this.currentPage !== this.pagesNumber - 1 &&
            this.dialog.visible &&
            (this.keyObj.isDown || this.isMobileButtonPressed())
        ) {
            // Has more pages.
            this.currentPage++;
            this.dialog.textMessage.text = '';
            this.setText(this.pagesMessage[this.currentPage], true);
        } else if (
            (this.keyObj.isDown || this.isMobileButtonPressed()) &&
            this.dialog.visible &&
            this.dialog.textMessage &&
            this.dialog.textMessage.active
        ) {
            // Finishes the Dialog. Destroys the text and sets all variables to initial state.
            this.dialog.textMessage.destroy();
            this.luminusVideoOpener.checkHasVideo(this.allProperties);
            this.dialog.visible = false;
            this.canShowDialog = true;
            this.actionButton.visible = false;
            this.interactionIcon.visible = false;
            this.player.body.maxSpeed = this.player.speed;
        }
        this.actionButton.clicked = false;
    }

    /**
     * Checks if the Button A or the Button B is pressed.
     * Returns true if any of those is pressed, otherwise returns false.
     * @returns { boolean }
     */
    isMobileButtonPressed() {
        return (
            (this.buttonA && this.buttonA.isDown) ||
            (this.buttonB && this.buttonB.isDown) ||
            (this.actionButton && this.actionButton.clicked)
        );
    }

    /**
     * Shows the dialog with the message from the zone it's overlaping.
     * Make sure you have only one overlaping zone with the player.
     */
    showDialog() {
        this.currentPage = 0;
        // this.actionButton.visible = false;
        this.dialog.visible = true;
        this.canShowDialog = false;
        const maxLettersPage =
            Math.floor(this.textWidth / this.fontWidth) * this.dialogMaxLines;
        this.pagesNumber = Math.ceil(
            this.dialogMessage.length / maxLettersPage
        );
        this.pagesMessage = [];
        for (let i = 0; i < this.pagesNumber; i++) {
            this.pagesMessage.push(
                this.dialogMessage.substr(i * maxLettersPage, maxLettersPage)
            );
        }

        this.createText();
        // Animates the text
        this.setText(this.pagesMessage[0], true);
    }

    /**
     * Sets the text for the dialog window.
     * @param { string } text The text string to be shown in the dialog.
     * @param { boolean } animate Rather it should animate the text or not. If it's false, it will stop the animation text in process.
     */
    setText(text, animate = false) {
        // Reset the dialog
        this.eventCounter = 0;
        this.animationText = text.split('');
        if (this.timedEvent) this.timedEvent.remove();

        // var tempText = animate ? '' : text;
        // this.setText(tempText);

        if (animate) {
            this.isAnimatingText = true;
            this.timedEvent = this.scene.time.addEvent({
                delay: Math.floor(1000 / this.dialogSpeed),
                callback: this.animateText,
                callbackScope: this,
                loop: true,
            });
        } else {
            if (this.timedEvent) this.timedEvent.remove();
            this.isAnimatingText = false;
            this.dialog.textMessage.text = text;
        }
    }

    /**
     * Slowly displays the text in the window to make it appear annimated
     * */
    animateText() {
        this.eventCounter++;
        this.dialog.textMessage.setText(
            this.dialog.textMessage.text +
                this.animationText[this.eventCounter - 1]
        );
        this.luminusTypingSoundManager.type(
            this.animationText[this.eventCounter - 1]
        );
        // Stops the text animation.
        if (this.eventCounter === this.animationText.length) {
            this.isAnimatingText = false;
            this.timedEvent.remove();
        }
    }

    /**
     * Checks if the player is moving.
     * @returns { boolean }
     */
    isMoving() {
        // If is colliding should always show the trigger button.
        // Pressing space button, should show the chat.
        return (
            this.player.body.velocity.x !== 0 ||
            this.player.body.velocity.y !== 0
        );
    }

    /**
     * Checks if the player is still overlaping the zone.
     * Hides the action button if it's not overlaping the zone.
     */
    checkUpdate() {
        if (
            this.actionButton &&
            this.isMoving() &&
            this.player.body.touching.none &&
            this.isOverlapingChat &&
            !this.dialog.visible
        ) {
            this.actionButton.visible = false;
            this.interactionIcon.visible = false;
            this.isOverlapingChat = false;
        }
    }

    /**
     * Resizes all the elements of the dialog component.
     * @param { number } width new Width.
     * @param { number } height new Height.
     */
    resizeComponents(width, height) {
        if (width !== 0 && height !== 0) {
            this.interactionIcon.setPosition(
                this.scene.cameras.main.midPoint.x,
                height / 2 - this.player.body.height * 2.5
            );

            this.cameraWidth = width;
            this.cameraHeight = height;
            this.textWidth = this.cameraWidth - this.margin * 3;
            this.dialog.x = this.margin;
            this.dialog.y = this.cameraHeight - this.dialogHeight - this.margin; // this is the starting x/y location
            this.dialog.resize(
                this.cameraWidth - this.margin * 2,
                this.dialogHeight
            );

            this.actionButton.x = this.cameraWidth - this.margin * 4;
            this.actionButton.y = this.cameraHeight - this.margin * 3;
            if (this.dialog.textMessage && this.dialog.textMessage.visible) {
                this.dialog.textMessage.y =
                    this.cameraHeight + this.margin / 2 - this.dialogHeight;
                this.dialog.textMessage.setStyle({
                    wordWrap: {
                        width: this.textWidth,
                    },
                    wordWrapUseAdvanced: false,
                    fontSize: this.fontSize,
                    maxLines: this.dialogMaxLines,
                    letterSpacing: this.letterSpacing,
                    fontFamily: this.fontFamily,
                });
            } else {
                this.createText();
            }
        }
    }

    /**
     * Creates the text Game Object
     * @private
     */
    createText() {
        this.dialog.textMessage = this.scene.add
            .text(
                this.margin * 2,
                this.cameraHeight + this.margin / 2 - this.dialogHeight,
                '',
                {
                    wordWrap: {
                        width: this.textWidth,
                    },
                    fontSize: this.fontSize,
                    maxLines: this.dialogMaxLines,
                    letterSpacing: this.letterSpacing,
                    fontFamily: this.fontFamily,
                    color: this.fontColor,
                }
            )
            .setScrollFactor(0, 0)
            .setDepth(99999999999999999)
            .setFixedSize(
                this.cameraWidth - this.margin * 3,
                this.dialogHeight
            );
    }
}
