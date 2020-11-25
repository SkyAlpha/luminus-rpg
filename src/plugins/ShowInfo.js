import Phaser from 'phaser';

export class ShowInfo {
    /**
     * This class allows one to create Dialogs with "Tiled" map editor https://www.mapeditor.org/
     * Using the Objects layer https://doc.mapeditor.org/en/stable/manual/objects/ and open them
     * seemlessly with phaser.
     *
     * You should a game object to check if it overlaps your dialog information.
     *
     * Simply put, It Creates a Dialog to show messages from static objects created with "Tiled".
     * @param {Phaser.Scene} scene // Scene Context.
     * @param {Phaser.GameObjects} player // Player Game Object.
     * @param {Phaser.Tilemaps.Tilemap} map Tile Map to get the object from.
     */
    constructor(scene, player, map) {
        this.scene = scene;
        this.player = player; // Player to compare overlaps.
        this.map = map;
        this.tiledObjectLayer = 'info';
        this.dialogSpriteName = 'dialog';
        this.actionButtonSprite = 'space';
        /** @type {Phaser.Input.Keyboard.KeyCodes} */
        this.actionButtonKeyCode = Phaser.Input.Keyboard.KeyCodes.SPACE;
        this.dialog_height = 150; // Dialog Height
        this.margin_dialog = 15; // Margin to border.
        this.nineSliceOffsets = 23;
        this.nineSliceSafeArea = 12;
        this.actionSpriteScale = 0.5;
        this.dialogSpeed = 200;
        this.fontSize = 20;
        this.dialogMaxLines = 5;
        this.textWidth = this.scene.cameras.main.width - this.margin_dialog * 3; // Defines the text Width.
        this.canShowDialog = true;
        this.isOverlapingChat = false;
        this.isAnimatingText = false;
    }

    create() {
        // Rules to show informations!
        const infoObjects = this.map.getObjectLayer(this.tiledObjectLayer);

        this.dlg = this.scene.add.nineslice(
            this.margin_dialog,
            this.scene.cameras.main.height -
                this.dialog_height -
                this.margin_dialog, // this is the starting x/y location
            this.scene.cameras.main.width - this.margin_dialog * 2,
            this.dialog_height, // the width and height of your object
            this.dialogSpriteName, // a key to an already loaded image
            this.nineSliceOffsets, // the width and height to offset for a corner slice
            this.nineSliceSafeArea // (optional) pixels to offset when computing the safe usage area
        );
        this.dlg.setScrollFactor(0, 0);
        this.dlg.depth = 99;
        this.dlg.visible = false;

        this.actionButton = this.scene.add
            .image(
                this.scene.cameras.main.width - this.margin_dialog * 3,
                this.scene.cameras.main.height -
                    // this.dialog_height -
                    this.margin_dialog * 3,
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
            scale: { from: this.actionSpriteScale, to: 0.4 },
            duration: 1000,
        });

        this.dlg.zone = this.scene.add
            .zone(
                this.margin_dialog,
                this.scene.cameras.main.height -
                    this.dialog_height -
                    this.margin_dialog, // this is the starting x/y location
                this.scene.cameras.main.width - this.margin_dialog * 2,
                this.dialog_height
            )
            .setInteractive()
            .setOrigin(0, 0);
        this.dlg.zone.setScrollFactor(0, 0);
        this.dlg.zone.depth = 999;

        this.dlg.zone.on('pointerdown', (pointer) => {
            if (this.dlg.textMessage && this.dlg.textMessage.active) {
                console.log(this.dlg.textMessage.active);
                this.dlg.textMessage.destroy();
                this.dlg.visible = false;

                this.canShowDialog = true;
                console.log(this.player.body.checkCollision);
            }
        });

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
                this.dialogMessage = zone.message;
            },
            (d) => {
                return this.canShowDialog;
            }
        );
        this.keyObj = this.scene.input.keyboard.addKey(
            this.actionButtonKeyCode
        );

        this.scene.input.keyboard.on('keydown', (key) => {
            if (
                this.isOverlapingChat &&
                this.keyObj.isDown &&
                !this.dlg.visible
            ) {
                this.showDialog();
            } else if (this.isAnimatingText && this.keyObj.isDown) {
                this.setText(this.dialogMessage, false);
            } else if (
                this.keyObj.isDown &&
                this.dlg.visible &&
                this.dlg.textMessage &&
                this.dlg.textMessage.active
            ) {
                this.dlg.textMessage.destroy();
                this.dlg.visible = false;
                this.canShowDialog = true;
            }
        });
    }

    /**
     * Shows the dialog with the message from the zone it's overlaping.
     * Make sure you have only one overlaping zone with the player.
     */
    showDialog() {
        this.actionButton.visible = false;
        this.dlg.visible = true;
        this.canShowDialog = false;
        console.log(Math.floor(this.textWidth / this.fontSize));
        console.log(
            Math.floor(this.textWidth / this.fontSize) * this.dialogMaxLines
        );

        this.dlg.textMessage = this.scene.add
            .text(
                this.margin_dialog * 2,
                this.scene.cameras.main.height +
                    this.margin_dialog / 2 -
                    this.dialog_height,
                '',
                {
                    wordWrap: {
                        width: this.textWidth,
                    },
                    fontSize: this.fontSize,
                    maxLines: this.dialogMaxLines,
                }
            )
            .setScrollFactor(0, 0)
            .setDepth(99999999999999999)
            .setFixedSize(
                this.scene.cameras.main.width - this.margin_dialog * 3,
                this.dialog_height
            );
        // Animates the text
        this.setText(this.dialogMessage, true);
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
            this.dlg.textMessage.text = text;
        }
    }

    /**
     * Slowly displays the text in the window to make it appear annimated
     * */
    animateText() {
        this.eventCounter++;
        this.dlg.textMessage.setText(
            this.dlg.textMessage.text +
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
