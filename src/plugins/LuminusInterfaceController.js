import { LuminusOutlineEffect } from './LuminusOutlineEffect';

/**
 * @class
 */
export class LuminusInterfaceController {
    constructor(scene) {
        /**
         * The parent scene.
         * @type { Phaser.Scene }
         */
        this.scene = scene;
        /**
         * An Array with the interactible elements of the interface.
         * @type { Array }
         * @default
         */
        this.interfaceElements = [];

        /**
         * The current line that the cursor is.
         * @type { number }
         * @default
         */
        this.currentLinePosition = 0;

        /**
         * The current Matrix row position.
         * @type { nmber }
         * @default
         */
        this.currentMatrixRow = 0;

        /**
         * The current matrix column position.
         * @type { number }
         * @default
         */
        this.currentMatrixCol = 0;

        /**
         * When moving up the menu, it should store the last menu position for better experience.
         * @type { object }
         */
        this.menuHistory = [];

        /**
         * This is the current element that is selected.
         * @type { any }
         * @default
         */
        this.currentElementAction = null;

        /**
         * This will trigger the Back or close function.
         * @type { any }
         * @default
         */
        this.closeAction = null;

        /**
         * The navigation sound effect. You should change it to match the action the player will perform.
         * @type { string }
         * @default
         */
        this.navigationSound = 'menu_navigation';

        /**
         * The outline effect that will be used on the element.
         * @type { LuminusOutlineEffect }
         */
        this.outlineEffect = new LuminusOutlineEffect(this.scene);

        /**
         * The Gamepad used to perform actions on the UI Scene.
         * @type { Phaser.Input.Gamepad }
         */
        this.pad = this.scene.input.gamepad.pad1;

        // this.scene.input.on(
        //     'pointerdown',
        //     /**
        //      *
        //      * @param { Phaser.Input.Pointer } pointer
        //      */
        //     (pointer, gameObjects) => {
        //         let object = gameObjects[0];
        //         if (pointer.wasTouch && object && object.item) {
        //             console.log(object.action);
        //             this.currentElementAction = {
        //                 element: object,
        //                 action: 'useItem',
        //                 context: this,
        //                 args: object,
        //             };
        //             this.updateHighlightedElement(
        //                 this.currentElementAction.element
        //             );
        //         }
        //     }
        // );

        this.scene.input.gamepad.on('connected', (pad) => {
            this.pad = this.scene.input.gamepad.pad1;
            this.setGamepadRules();
        });

        this.setGamepadRules();

        this.scene.input.keyboard.on('keydown', (keyboard) => {
            if (keyboard.keyCode === 27) {
                this.close();
            }
            if (keyboard.keyCode === 37) {
                this.moveLeft();
            }
            if (keyboard.keyCode === 39) {
                this.moveRight();
            }
            if (keyboard.keyCode === 38) {
                this.moveUp();
            }
            if (keyboard.keyCode === 40) {
                this.moveDown();
            }
            if (keyboard.keyCode === 13)
                this.executeFunctionByName(
                    this.currentElementAction.action,
                    this.currentElementAction.context,
                    this.currentElementAction.args
                );
        });
    }

    /**
     * Sets the gamepad control rules for the interface.
     */
    setGamepadRules() {
        if (this.pad) {
            let difference = 0;
            this.scene.events.on('update', (time, delta) => {
                if (difference === 0 || Math.abs(time - difference) > 75) {
                    difference = time;
                    if (this.pad.axes[0].getValue() === 1) {
                        this.moveRight();
                    } else if (this.pad.axes[0].getValue() === -1) {
                        this.moveLeft();
                    } else if (this.pad.axes[1].getValue() === -1) {
                        this.moveUp();
                    } else if (this.pad.axes[1].getValue() === 1) {
                        this.moveDown();
                    }
                }
            });
            this.pad.on('down', (pad) => {
                if (this.pad.down) {
                    this.moveDown();
                }
                if (this.pad.up) {
                    this.moveUp();
                }
                if (this.pad.right) {
                    this.moveRight();
                }
                if (this.pad.left) {
                    this.moveLeft();
                }

                if (this.pad.B) {
                    this.close();
                }

                if (this.pad.A) {
                    this.executeFunctionByName(
                        this.currentElementAction.action,
                        this.currentElementAction.context,
                        this.currentElementAction.args
                    );
                }
            });
        }
    }

    /**
     * Clears all the interactionItems
     */
    clearItems() {
        this.interfaceElements.flat();
        this.interfaceElements = [];
    }

    menuHistoryAdd() {
        this.menuHistory.push({
            currentLinePosition: this.currentLinePosition,
            currentMatrixRow: this.currentMatrixRow,
            currentMatrixCol: this.currentMatrixCol,
            currentElementAction: this.currentElementAction,
            closeAction: this.closeAction,
        });
    }

    menuHistoryRetrieve() {
        let history = this.menuHistory[this.menuHistory.length - 1];
        this.removeCurrentSelectionHighlight(this.currentElementAction.element);
        this.currentElementAction = history.currentElementAction;
        this.currentLinePosition = history.currentLinePosition;
        this.currentMatrixRow = history.currentMatrixRow;
        this.currentMatrixCol = history.currentMatrixCol;
        this.closeAction = history.closeAction;
        this.updateHighlightedElement(this.currentElementAction.element);
        delete this.menuHistory[this.menuHistory.length - 1];
    }

    /**
     * Removes the current selectionhighlight.
     */
    removeCurrentSelectionHighlight() {
        this.removeSelection(this.currentElementAction.element);
    }

    /**
     * This function will execute the Close / Back child function.
     */
    close() {
        this.outlineEffect.outlinePostFxPlugin.destroy();
        this.executeFunctionByName(this.closeAction.action, this.closeAction.context, this.closeAction.args);
    }

    // /**
    //  * Sets the current highlight element and removes the previous one.
    //  * @param { any } element
    //  */
    // setCurrentElement(element) {
    //     this.removeCurrentSelectionHighlight(this.currentElementAction);
    //     this.updateHighlightedElement(element.element);
    //     this.currentElementAction = element;
    // }

    /**
     * Moves the cursor to the right.
     */
    moveRight() {
        let hasError = this.hasNoLineData();
        if (hasError) {
            return;
        }
        this.removeSelection(this.currentElementAction.element);
        this.scene.sound.play(this.navigationSound);
        this.currentMatrixCol++;
        let currentPosition =
            this.interfaceElements[this.currentLinePosition][this.currentMatrixRow][this.currentMatrixCol];
        if (currentPosition) {
            this.currentElementAction = currentPosition;
        } else {
            this.currentMatrixCol = 0;
            this.currentElementAction = this.interfaceElements[this.currentLinePosition][this.currentMatrixRow][0];
        }
        this.updateHighlightedElement(this.currentElementAction.element);
    }

    /**
     * Moves the cursor to the left.
     */
    moveLeft() {
        let hasError = this.hasNoLineData();
        if (hasError) {
            return;
        }
        this.scene.sound.play(this.navigationSound);
        this.removeSelection(this.currentElementAction.element);
        this.currentMatrixCol--;
        let currentPosition =
            this.interfaceElements[this.currentLinePosition][this.currentMatrixRow][this.currentMatrixCol];
        if (currentPosition) {
            this.currentElementAction = currentPosition;
        } else {
            let position;
            if (this.interfaceElements[this.currentLinePosition].length === 1) {
                position = 0;
            } else {
                position = this.interfaceElements[this.currentLinePosition].length;
            }
            this.currentElementAction =
                this.interfaceElements[this.currentLinePosition][this.currentMatrixRow][position];
            this.currentMatrixCol = position;
        }
        this.updateHighlightedElement(this.currentElementAction.element);
    }

    /**
     * Moves the cursor down.
     */
    moveDown(changeMatrixRow = true) {
        let hasError = this.hasNoLineData();
        if (hasError) {
            return;
        }
        this.scene.sound.play(this.navigationSound);
        this.removeSelection(this.currentElementAction.element);
        if (changeMatrixRow) this.currentMatrixRow++;
        if (!this.interfaceElements[this.currentLinePosition][this.currentMatrixRow]) {
            this.currentLinePosition++;
            this.currentMatrixRow--;
            let canMove = this.hasNoLineData();
            if (canMove) {
                this.currentLinePosition--;
                this.updateHighlightedElement(this.currentElementAction.element);
                return;
            }
            this.moveDown(false);
        }
        if (!this.interfaceElements[this.currentLinePosition][this.currentMatrixRow]) {
            this.currentMatrixRow = this.interfaceElements[this.currentLinePosition].length - 1;
        }
        let currentPosition =
            this.interfaceElements[this.currentLinePosition][this.currentMatrixRow][this.currentMatrixCol];

        if (currentPosition) {
            this.currentElementAction = currentPosition;
        } else if (
            this.interfaceElements[this.currentLinePosition][this.currentMatrixRow] &&
            !this.interfaceElements[this.currentLinePosition][this.currentMatrixRow][this.currentMatrixCol]
        ) {
            this.currentElementAction =
                this.interfaceElements[this.currentLinePosition][this.currentMatrixRow][
                    this.interfaceElements[this.currentLinePosition][this.currentMatrixRow].length - 1
                ];
        }
        this.updateHighlightedElement(this.currentElementAction.element);
    }

    /**
     * Moves the cursor up.
     */
    moveUp(changeMatrixRow = true) {
        let hasError = this.hasNoLineData();
        if (hasError) {
            return;
        }
        this.scene.sound.play(this.navigationSound);
        this.removeSelection(this.currentElementAction.element);
        if (changeMatrixRow) this.currentMatrixRow--;
        if (!this.interfaceElements[this.currentLinePosition][this.currentMatrixRow]) {
            this.currentLinePosition--;
            this.currentMatrixRow++;
            let canMove = this.hasNoLineData();
            if (canMove) {
                this.currentLinePosition++;
                this.updateHighlightedElement(this.currentElementAction.element);
                return;
            }
            this.moveUp(false);
        }
        if (!this.interfaceElements[this.currentLinePosition][this.currentMatrixRow]) {
            this.currentMatrixRow = this.interfaceElements[this.currentLinePosition].length - 1;
        }
        let currentPosition =
            this.interfaceElements[this.currentLinePosition][this.currentMatrixRow][this.currentMatrixCol];

        if (currentPosition) {
            this.currentElementAction = currentPosition;
        } else if (
            this.interfaceElements[this.currentLinePosition][this.currentMatrixRow] &&
            !this.interfaceElements[this.currentLinePosition][this.currentMatrixRow][this.currentMatrixCol]
        ) {
            this.currentElementAction =
                this.interfaceElements[this.currentLinePosition][this.currentMatrixRow][
                    this.interfaceElements[this.currentLinePosition][this.currentMatrixRow].length - 1
                ];
        }
        this.updateHighlightedElement(this.currentElementAction.element);
    }

    /**
     * Sets the outline effect to the current selected element.
     * @param { Phaser.GameObjects.Sprite } element
     */
    updateHighlightedElement(element) {
        // element.tint = 0xff00ff;
        if (this.scene && this.scene.sys && element) this.outlineEffect.applyEffect(element);
    }

    /**
     * Removes the outline effect to the previously selected element.
     * @param { Phaser.GameObjects.Sprite } element
     */
    removeSelection(element) {
        // element.tint = 0xffffff;
        if (this.scene && this.scene.sys && element) this.outlineEffect.removeEffect(element);
    }

    /**
     * Checks if there is no Line data available.
     * @returns { boolean }
     */
    hasNoLineData() {
        if (!this.interfaceElements[this.currentLinePosition]) {
            console.error(
                `This Element line is not available. Check if this line has items, or if the line exists at all.`
            );
            return true;
        } else {
            return false;
        }
    }

    /**
     * Executes the function on the correct Context.
     * @param { string } functionName
     * @param { this } context
     * @param { any } args
     * @returns { function }
     */
    executeFunctionByName(functionName, context, args) {
        if (functionName) {
            var args = Array.prototype.slice.call(arguments, 2);
            var namespaces = functionName.split('.');
            var func = namespaces.pop();
            for (var i = 0; i < namespaces.length; i++) {
                context = context[namespaces[i]];
            }
            return context[func].apply(context, args);
        } else {
            return null;
        }
    }
}
