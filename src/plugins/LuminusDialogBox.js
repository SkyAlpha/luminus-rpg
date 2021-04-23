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
     * @param { Phaser.Physics.Arcade.Sprite } player Player Game Object.
     */
    constructor(scene, player) {
        /**
         * Scene Context.
         * @type { Phaser.Scene }  */
        this.scene = scene;
        /**
         * Player Game Object.
         * @type { Player }  */
        this.player = player;

        /**
         * Name of the sprite image that will be the dialog.
         *  @type { string }
         * @default
         * */
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
         * @default
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
         * @type { Phaser.Input.Keyboard.KeyCodes }
         * @default
         *  */
        this.actionButtonKeyCode = Phaser.Input.Keyboard.KeyCodes.SPACE;
        /**
         * Dialog height.
         * @type { number }
         * @default
         *   */
        this.dialogHeight = 150; // Dialog Height
        /**
         * Margin of the dialog. Used to make spaces in the dialog.
         * @type { number }
         * @default
         *   */
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
         * @type { number | Array<number> }
         * @default
         *   */
        this.nineSliceOffsets = 23;
        /**
         * Safe area of the scaling areas..
         * @type { number }
         * @default
         *   */
        this.nineSliceSafeArea = 14;
        /**
         * Sacele of the action button sprite.
         * @type { number }
         * @default
         *   */
        this.actionSpriteScale = 0.5;
        /**
         * Spelling speed of the text in the dialog box. Bigger is faster.
         * @type { number }
         * @default
         *  */
        this.dialogSpeed = 20;
        /**
         * Dialog font size.
         * @type { number }
         * @default
         *  */
        this.fontSize = 20;
        /**
         * Current dialog page.
         * @type { number }
         * @default
         *  */
        this.currentPage = 0;
        /**
         * Dialog font width.
         * @type { number }
         * @default
         *   */
        this.fontWidth = this.fontSize - 5;
        /**
         * Maximum number of lines.
         * @type { number }
         * @default
         *  */
        this.dialogMaxLines = 3;
        /**
         * Space between lines of the dialog text.
         * @type { number }
         * @default
         *  */
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
         * @type { boolean }
         * @default
         *  */
        this.canShowDialog = true;
        /**
         * Defines if the player is overlapping the text zone.
         * @type { boolean }
         * @default
         *  */
        this.isOverlapingChat = false;
        /**
         * Defines if the text is in spelling/typping animation.
         * @type { boolean }
         * @default
         *  */
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
         * @default
         */
        this.buttonA = null;

        /**
         * Button B
         * @type { Button }
         * @default
         */
        this.buttonB = null;

        /**
         * Action Button for general devices.
         * @type { Phaser.GameObjects.Image }
         * @default
         */
        this.actionButton = null;

        /**
         * The Dialog that will show the text.
         * @type { NineSlice }
         * @default
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
         * @default
         */
        this.luminusTypingSoundManager = null;

        /**
         * Array with all properties that come with the Message Box. This will allow us to create videos, and more interactions
         * with the player as we wish.
         * @type { Array }
         * @default
         */
        this.allProperties = null;

        /**
         * If you are using the LuminusGamePadController this variable will be created with the gamepad that is being used.
         * But only if it's connected.
         * @type { Phaser.Input.Gamepad }
         * @default
         */
        this.gamepad = null;

        /**
         * Font family to be used. It has to be included in your Phaser project.
         * @type { string }
         * @default
         */
        this.fontFamily = 'Monospace, "Press Start 2P"';

        /**
         * The Current Chat Configuration that is being displayed.
         */
        this.currentChat = null;

        /**
         * This variable controls if the chat will be shown from an NPC or any other Chat Income for example.
         * @type { boolean }
         */
        this.showRandomChat = false;

        /**
         * The text object that displays the right side entity on the dialog.
         * @type { Phaser.GameObjects.Text}
         */
        this.rightNameText = null;

        /**
         * The right side Portrait image.
         * @type { Phaser.GameObjects.Image }
         */
        this.rightPortraitImage = null;

        /**
         * The text object that displays the left side entity on the dialog.
         * @type { Phaser.GameObjects.Text}
         */
        this.leftNameText = null;

        /**
         * The left side Portrait image.
         * @type { Phaser.GameObjects.Image }
         */
        this.leftPortraitImage = null;
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
                    this.player.container.body.height * 2.5,
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
            if (key.keyCode === 32) this.checkButtonDown();
        });

        const joystickScene = this.scene.scene.get('JoystickScene');
        joystickScene.events.on('JoystickReady', (done) => {
            if (
                (joystickScene && joystickScene.buttonA) ||
                joystickScene.buttonB
            ) {
                this.buttonA = joystickScene.buttonA;
                this.buttonB = joystickScene.buttonB;
                if (this.buttonA)
                    this.buttonA.on('down', (b) => this.checkButtonDown());
                if (this.buttonB)
                    this.buttonB.on('down', (b) => this.checkButtonDown());
            }
        });

        this.leftPortraitImage = this.scene.add.image(
            this.dialog.x + this.dialog.scaleX * 100,
            this.dialog.y - this.dialog.scaleY * 60,
            ''
        );
        this.leftPortraitImage.visible = false;

        this.leftName = 'Game Master';
        this.leftNameText = this.scene.add
            .text(
                this.dialog.x + this.margin,
                this.dialog.y + this.dialog.scaleY * 20,
                ` ${this.leftName}: `,
                {
                    fontSize: this.fontSize,
                    letterSpacing: this.letterSpacing,
                    fontFamily: this.fontFamily,
                    color: 'white',
                    backgroundColor: 'black',
                }
            )
            .setScrollFactor(0, 0)
            .setDepth(99999999999999999);
        this.leftNameText.visible = false;

        this.rightPortraitImage = this.scene.add.image(
            this.dialog.x + this.dialog.width * this.dialog.scaleX - 100,
            this.dialog.y - this.dialog.scaleY * 60,
            ''
        );
        this.rightPortraitImage.flipX = true;
        this.rightPortraitImage.visible = false;

        this.rightNameText = this.scene.add
            .text(
                this.dialog.x +
                    this.dialog.width * this.dialog.scaleX -
                    this.margin,
                this.dialog.y + this.dialog.scaleY * 20,
                ``,
                {
                    fontSize: this.fontSize,
                    letterSpacing: this.letterSpacing,
                    fontFamily: this.fontFamily,
                    color: 'white',
                    backgroundColor: 'black',
                }
            )
            .setScrollFactor(0, 0)
            .setDepth(99999999999999999)
            .setOrigin(1, 0);
        this.rightNameText.visible = false;

        this.scene.input.gamepad.on('connected', (pad) => {
            this.gamepad = pad;
            this.actionButton.setTexture(this.mobileActionButtonSpriteName);
        });
        this.scene.input.gamepad.on('down', (pad) => {
            this.gamepad = pad;
            this.checkButtonDown();
        });
    }

    /**
     * Checks what Speaker should have the highlight. Highlights the current Speaker, and makes the secondary speaker alpha lower.
     */
    checkSpeaker() {
        this.leftNameText.alpha = 0.5;
        this.leftPortraitImage.alpha = 0.5;
        this.rightNameText.alpha = 0.5;
        this.rightPortraitImage.alpha = 0.5;
        if (this.currentChat.left) {
            if (this.currentChat.leftName) {
                this.leftNameText.visible = true;
                this.leftNameText.setText(` ${this.currentChat.leftName}: `);
            } else {
                this.leftNameText.visible = false;
            }
            if (this.currentChat.leftPortraitName) {
                this.leftPortraitImage.visible = true;
                this.leftPortraitImage.setTexture(
                    this.currentChat.leftPortraitName
                );
            } else {
                this.leftPortraitImage.visible = false;
            }
            this.leftNameText.alpha = 1;
            this.leftPortraitImage.alpha = 1;
        }
        if (this.currentChat.right) {
            this.rightNameText.setText(` ${this.currentChat.rightName}: `);
            this.rightPortraitImage.setTexture(
                this.currentChat.rightPortraitName
            );
            this.rightNameText.visible = true;
            this.rightPortraitImage.visible = true;
            this.rightNameText.alpha = 1;
            this.rightPortraitImage.alpha = 1;
        }
        if (this.currentChat.leftExit) this.exitFromScene('left');
        if (this.currentChat.rightExit) this.exitFromScene('right');
    }

    exitFromScene(orientation) {
        if (orientation === 'right') {
            this.scene.tweens.add({
                targets: this.rightPortraitImage,
                x: this.rightPortraitImage.x + 500,
                duration: 1000,
                onStart: () => {
                    this.rightNameText.visible = false;
                },
                onComplete: () => {
                    this.rightPortraitImage.visible = false;
                    this.rightPortraitImage.x = this.rightPortraitImage.x - 500;
                },
            });
        }
        if (orientation === 'left') {
            this.scene.tweens.add({
                targets: this.leftPortraitImage,
                x: this.leftPortraitImage.x - 500,
                duration: 1000,
                onStart: () => {
                    this.leftNameText.visible = false;
                },
                onComplete: () => {
                    this.leftPortraitImage.visible = false;
                    this.leftPortraitImage.x = this.leftPortraitImage.x + 500;
                },
            });
        }
    }

    /**
     * Checks what to do when the player presses the action button.
     */
    checkButtonDown() {
        if (
            (this.isOverlapingChat || this.showRandomChat) &&
            this.checkButtonsPressed() &&
            !this.dialog.visible
        ) {
            // First time, show the Dialog.
            this.currentChat = this.chat[0];
            this.currentChat.index = 0;
            this.dialogMessage = this.currentChat.message;
            this.checkSpeaker();
            this.showDialog();
            this.player.container.body.maxSpeed = 0;
        } else if (this.isAnimatingText && this.checkButtonsPressed()) {
            // Skips the typping animation.
            this.setText(this.pagesMessage[this.currentPage], false);
        } else if (
            !this.isAnimatingText &&
            this.currentPage !== this.pagesNumber - 1 &&
            this.dialog.visible &&
            this.checkButtonsPressed()
        ) {
            // Has more pages.
            this.currentPage++;
            this.dialog.textMessage.text = '';
            this.setText(this.pagesMessage[this.currentPage], true);
        } else if (
            this.currentChat &&
            this.currentChat.index < this.chat.length - 1
        ) {
            let index = this.currentChat.index;
            this.currentChat = this.chat[index + 1];
            this.currentChat.index = index + 1;
            this.checkSpeaker();
            this.dialogMessage = this.currentChat.message;
            this.pagesMessage = [];
            this.setText('', false);
            this.showDialog(false);
        } else if (
            this.checkButtonsPressed() &&
            this.dialog.visible &&
            this.dialog.textMessage &&
            this.dialog.textMessage.active
        ) {
            // Finishes the Dialog. Destroys the text and sets all variables to initial state.
            this.dialog.textMessage.destroy();
            this.luminusVideoOpener.checkHasVideo(this.allProperties);
            this.dialog.visible = false;
            // this.exitFromScene('left');
            this.leftPortraitImage.visible = false;
            this.leftNameText.visible = false;
            this.rightPortraitImage.visible = false;
            this.rightNameText.visible = false;
            // this.exitFromScene('right');
            this.canShowDialog = true;
            this.actionButton.visible = false;
            this.interactionIcon.visible = false;
            this.player.container.body.maxSpeed = this.player.speed;
        }
        this.actionButton.clicked = false;
    }

    /**
     * Checks if any action buttons is pressed.
     * Is it Keyboard / Mobile / GamePad.
     */
    checkButtonsPressed() {
        return (
            this.keyObj.isDown ||
            this.isMobileButtonPressed() ||
            (this.gamepad && this.gamepad.A)
        );
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
    showDialog(createText = true) {
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
        let lettersOffset = 0;
        for (let i = 0; i < this.pagesNumber; i++) {
            let localText = this.dialogMessage.substr(
                i * maxLettersPage - lettersOffset,
                maxLettersPage
            );

            let localMaxLength = localText.length;
            // Check for whole letter so it doesn't break final words.
            let ready = true;
            if (this.pagesNumber !== i + 1) {
                for (let i = localText.length - 1; i === 0 || ready; i--) {
                    if (localText[i] === '' || localText[i] === ' ') {
                        ready = false;
                        localMaxLength = i;
                        break;
                    }
                    lettersOffset++;
                }
            }
            let offset = 0;
            if (i != 0) {
                offset = lettersOffset;
            }
            this.pagesMessage.push(
                this.dialogMessage.substr(
                    i * maxLettersPage - offset,
                    localMaxLength
                )
            );
        }
        if (createText) this.createText();
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
        if (
            this.player &&
            this.player.container &&
            this.player.container.body
        ) {
            // If is colliding should always show the trigger button.
            // Pressing space button, should show the chat.
            return (
                this.player.container.body.velocity.x !== 0 ||
                this.player.container.body.velocity.y !== 0
            );
        }
    }

    /**
     * Checks if the player is still overlaping the zone.
     * Hides the action button if it's not overlaping the zone.
     */
    checkUpdate() {
        if (
            this.actionButton &&
            this.isMoving() &&
            this.player.container.body.touching.none &&
            this.isOverlapingChat &&
            !this.dialog.visible
        ) {
            this.actionButton.visible = false;
            this.interactionIcon.visible = false;
            this.isOverlapingChat = false;
            this.player.canAtack = true;
        }
    }

    /**
     * Resizes all the elements of the dialog component.
     * @param { number } width new Width.
     * @param { number } height new Height.
     */
    resizeComponents(width, height) {
        if (width !== 0 && height !== 0 && this.player && this.player.active) {
            this.interactionIcon.setPosition(
                width / 2,
                height / 2 - this.player.container.body.height * 2.5
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

            this.leftPortraitImage.setPosition(
                this.dialog.x + this.dialog.scaleX * 100,
                this.dialog.y - this.dialog.scaleY * 60
            );
            this.leftNameText.setPosition(
                this.dialog.x + this.margin,
                this.dialog.y + this.dialog.scaleY * 20
            );

            this.rightPortraitImage.setPosition(
                this.dialog.x + this.dialog.width * this.dialog.scaleX - 100,
                this.dialog.y - this.dialog.scaleY * 60
            );
            this.rightNameText.setPosition(
                this.dialog.x +
                    this.dialog.width * this.dialog.scaleX -
                    this.margin,
                this.dialog.y + this.dialog.scaleY * 20
            );
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
                this.cameraHeight + this.margin * 2.5 - this.dialogHeight,
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
