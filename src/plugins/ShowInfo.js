import Phaser from 'phaser';

/**
 * @class
 */
export class ShowInfo {
    /**
     * This class allows one to create Dialogs with "Tiled" map editor <a href="https://www.mapeditor.org/">Tiled</a>
     * Using the Objects layer https://doc.mapeditor.org/en/stable/manual/objects/ and open them
     * seemlessly with phaser.
     *
     * You should a game object to check if it overlaps your dialog information.
     *
     * Simply put, It Creates a Dialog to show messages from static objects created with "Tiled".
     * @param {Phaser.Scene} scene Scene Context.
     * @param {Phaser.GameObjects} player Player Game Object.
     * @param {Phaser.Tilemaps.Tilemap} map Tile Map to get the object from.
     */
    constructor(scene, player, map) {
        /**
         * scene Scene Context.
         * @type {Phaser.Scene}  */
        this.scene = scene;
        /**
         * player Player Game Object.
         * @type {Phaser.GameObjects}  */
        this.player = player; // Player to compare overlaps.
        /**
         * Tile Map to get the object from.
         * @type {Phaser.Tilemaps.Tilemap} */
        this.map = map;
        /**
         * Name of the object Layer in the "Tiled" software. <a href="https://www.mapeditor.org/">Tiled</a>
         * Check Tiled Docs to learn more <a href="https://doc.mapeditor.org/en/stable/manual/objects/">Tiled</a>
         * @type {string} */
        this.tiledObjectLayer = 'info';
        /**
         * Name of the sprite image that will be the dialog.
         *  @type {string} */
        this.dialogSpriteName = 'dialog';
        /**
         * Name of the Sprite of the button action.
         * @type {string} */
        this.actionButtonSprite = 'space';
        /**
         * Object Attribute that the you created in the Tiled Software
         * @type {string}  */
        this.messageAttribute = 'message';
        /**
         * Current action button key code.
         * @type {Phaser.Input.Keyboard.KeyCodes} */
        this.actionButtonKeyCode = Phaser.Input.Keyboard.KeyCodes.SPACE;
        /**
         * Dialog height.
         * @type {number}  */
        this.dialog_height = 150; // Dialog Height
        /**
         * Margin of the dialog. Used to make spaces in the dialog.
         * @type {number}  */
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
         * @type {number | number []}  */
        this.nineSliceOffsets = 23;
        /**
         * Safe area of the scaling areas..
         * @type {number}  */
        this.nineSliceSafeArea = 12;
        /**
         * Sacele of the action button sprite.
         * @type {number}  */
        this.actionSpriteScale = 0.5;
        /**
         * Spelling speed of the text in the dialog box.
         * @type {number}  */
        this.dialogSpeed = 200;
        /**
         * Dialog font size.
         * @type {number}  */
        this.fontSize = 20;
        /**
         * Current dialog page.
         * @type {number}  */
        this.currentPage = 0;
        /**
         * Dialog font width.
         * @type {number}  */
        this.fontWidth = this.fontSize - 5;
        /**
         * Maximum number of lines.
         * @type {number}  */
        this.dialogMaxLines = 5;
        /**
         * Space between lines of the dialog text.
         * @type {number}  */
        this.letterSpacing = 0;
        /**
         * Max width of the text inside the dialog.
         * @type {number}  */
        this.textWidth = this.scene.cameras.main.width - this.margin * 3; // Defines the text Width.
        /**
         * Rather it can show de dialog of not.
         * @type {boolean}  */
        this.canShowDialog = true;
        /**
         * Defines if the player is overlapping the text zone.
         * @type {boolean}  */
        this.isOverlapingChat = false;
        /**
         * Defines if the text is in spelling/typping animation.
         * @type {boolean}  */
        this.isAnimatingText = false;
    }

    create() {
        this.dialog = this.scene.add.nineslice(
            this.margin,
            this.scene.cameras.main.height - this.dialog_height - this.margin, // this is the starting x/y location
            this.scene.cameras.main.width - this.margin * 2,
            this.dialog_height, // the width and height of your object
            this.dialogSpriteName, // a key to an already loaded image
            this.nineSliceOffsets, // the width and height to offset for a corner slice
            this.nineSliceSafeArea // (optional) pixels to offset when computing the safe usage area
        );
        this.dialog.setScrollFactor(0, 0);
        this.dialog.depth = 99;
        this.dialog.visible = false;

        this.actionButton = this.scene.add
            .image(
                this.scene.cameras.main.width - this.margin * 4,
                this.scene.cameras.main.height -
                    // this.dialog_height -
                    this.margin * 3,
                this.actionButtonSprite
            )
            .setDepth(9999)
            .setScrollFactor(0, 0)
            .setScale(this.actionSpriteScale);
        this.actionButton.visible = false;

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

        this.dialog.zone = this.scene.add
            .zone(
                this.margin,
                this.scene.cameras.main.height -
                    this.dialog_height -
                    this.margin, // this is the starting x/y location
                this.scene.cameras.main.width - this.margin * 2,
                this.dialog_height
            )
            .setInteractive()
            .setOrigin(0, 0);
        this.dialog.zone.setScrollFactor(0, 0);
        this.dialog.zone.depth = 999;

        this.dialog.zone.on('pointerdown', (pointer) => {
            if (this.dialog.textMessage && this.dialog.textMessage.active) {
                this.dialog.textMessage.destroy();
                this.dialog.visible = false;
                this.canShowDialog = true;
            }
        });
        // Rules to show informations!
        const infoObjects = this.map.getObjectLayer(this.tiledObjectLayer);
        let zones = [];
        infoObjects.objects.forEach((infoObj) => {
            let zone = this.scene.add.zone(
                infoObj.x,
                infoObj.y,
                infoObj.width,
                infoObj.height
            );
            this.scene.physics.add.existing(zone);
            zone.setOrigin(0, 0);
            zone.body.immovable = true;
            zones.push({ ...zone, message: infoObj.properties[0].value });
        });

        /**
         * Checks if the player is overlapping the Tiled map Zone.
         */
        this.scene.physics.add.overlap(
            zones,
            this.player,
            (zone) => {
                this.isOverlapingChat = true;
                this.actionButton.visible = true;
                this.dialogMessage = zone.message.trim();
            },
            (d) => {
                return this.canShowDialog;
            }
        );
        this.keyObj = this.scene.input.keyboard.addKey(
            this.actionButtonKeyCode
        );

        this.scene.input.keyboard.on('keydown', (key) => {
            // if (this.keyObj.isDown) debugger;
            if (
                this.isOverlapingChat &&
                this.keyObj.isDown &&
                !this.dialog.visible
            ) {
                this.showDialog();
            } else if (this.isAnimatingText && this.keyObj.isDown) {
                this.setText(this.pagesMessage[this.currentPage], false);
            } else if (
                !this.isAnimatingText &&
                this.currentPage !== this.pagesNumber - 1 &&
                this.keyObj.isDown
            ) {
                this.currentPage++;
                this.dialog.textMessage.text = '';
                this.setText(this.pagesMessage[this.currentPage], true);
            } else if (
                this.keyObj.isDown &&
                this.dialog.visible &&
                this.dialog.textMessage &&
                this.dialog.textMessage.active
            ) {
                this.dialog.textMessage.destroy();
                this.dialog.visible = false;
                this.canShowDialog = true;
            }
        });
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

        this.dialog.textMessage = this.scene.add
            .text(
                this.margin * 2,
                this.scene.cameras.main.height +
                    this.margin / 2 -
                    this.dialog_height,
                '',
                {
                    wordWrap: {
                        width: this.textWidth,
                    },
                    wordWrapUseAdvanced: false,
                    fontSize: this.fontSize,
                    maxLines: this.dialogMaxLines,
                    letterSpacing: this.letterSpacing,
                    fontFamily: 'Monospace',
                }
            )
            .setScrollFactor(0, 0)
            .setDepth(99999999999999999)
            .setFixedSize(
                this.scene.cameras.main.width - this.margin * 3,
                this.dialog_height
            );
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
            this.isOverlapingChat
        ) {
            this.actionButton.visible = false;
            this.isOverlapingChat = false;
        }
    }
}
