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
         */
        this.currentMatrixRow = 0;

        /**
         * The current matrix column position.
         * @type { number }
         * @default
         */
        this.currentMatrixCol = 0;

        /**
         * This is the current element that is selected.
         * @type { function }
         */
        this.currentElementAction = null;

        this.scene.input.on(
            'pointerup',
            /**
             *
             * @param { Phaser.Input.Pointer } pointer
             */
            (pointer) => {
                if (pointer.rightButtonReleased()) {
                    this.moveDown();
                }
                if (pointer.leftButtonReleased()) {
                    this.moveUp();
                }
            }
        );

        this.scene.input.keyboard.on('keydown', (keyboard) => {
            console.log(this.currentElementAction);
            if (keyboard.keyCode === 13)
                this.executeFunctionByName(
                    this.currentElementAction.action,
                    this.currentElementAction.context,
                    this.currentElementAction.args
                );
        });
    }

    /**
     * Returns the right element. If there is none, then loops to the first one of the line.
     * @returns { Phaser.GameObjects }
     */
    moveRight() {
        this.hasNoLineData();
        this.removeSelection(this.currentElementAction.element);
        this.currentMatrixCol++;
        let currentPosition = this.interfaceElements[this.currentLinePosition][
            this.currentMatrixRow
        ][this.currentMatrixCol];
        if (currentPosition) {
            this.currentElementAction = currentPosition;
        } else {
            this.currentElementAction = this.interfaceElements[
                this.currentLinePosition
            ][this.currentMatrixRow][0];
        }
        this.updateHighlightedElement(this.currentElementAction.element);
    }

    /**
     * Returns the left element. If there is none, then loops to the last one.
     * @returns { Phaser.GameObjects }
     */
    moveLeft() {
        this.hasNoLineData();
        this.removeSelection(this.currentElementAction.element);
        this.currentMatrixCol--;
        let currentPosition = this.interfaceElements[this.currentLinePosition][
            this.currentMatrixRow
        ][this.currentMatrixCol];
        if (currentPosition) {
            this.currentElementAction = currentPosition;
        } else {
            this.currentElementAction = this.interfaceElements[
                this.currentLinePosition
            ][this.currentMatrixRow][
                this.interfaceElements[this.currentLinePosition].length - 1
            ];
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

        this.removeSelection(this.currentElementAction.element);
        if (changeMatrixRow) this.currentMatrixRow++;
        if (
            !this.interfaceElements[this.currentLinePosition][
                this.currentMatrixRow
            ]
        ) {
            this.currentLinePosition++;
            this.currentMatrixRow--;
            let canMove = this.hasNoLineData();
            if (canMove) {
                this.currentLinePosition--;
                this.updateHighlightedElement(
                    this.currentElementAction.element
                );
                return;
            }
            this.moveDown(false);
        }
        if (
            !this.interfaceElements[this.currentLinePosition][
                this.currentMatrixRow
            ]
        ) {
            this.currentMatrixRow =
                this.interfaceElements[this.currentLinePosition].length - 1;
        }
        let currentPosition = this.interfaceElements[this.currentLinePosition][
            this.currentMatrixRow
        ][this.currentMatrixCol];

        if (currentPosition) {
            this.currentElementAction = currentPosition;
        } else if (
            this.interfaceElements[this.currentLinePosition][
                this.currentMatrixRow
            ] &&
            !this.interfaceElements[this.currentLinePosition][
                this.currentMatrixRow
            ][this.currentMatrixCol]
        ) {
            this.currentElementAction = this.interfaceElements[
                this.currentLinePosition
            ][this.currentMatrixRow][
                this.interfaceElements[this.currentLinePosition][
                    this.currentMatrixRow
                ].length - 1
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

        this.removeSelection(this.currentElementAction.element);
        if (changeMatrixRow) this.currentMatrixRow--;
        if (
            !this.interfaceElements[this.currentLinePosition][
                this.currentMatrixRow
            ]
        ) {
            this.currentLinePosition--;
            this.currentMatrixRow++;
            let canMove = this.hasNoLineData();
            if (canMove) {
                this.currentLinePosition++;
                this.updateHighlightedElement(
                    this.currentElementAction.element
                );
                return;
            }
            this.moveDown(false);
        }
        if (
            !this.interfaceElements[this.currentLinePosition][
                this.currentMatrixRow
            ]
        ) {
            this.currentMatrixRow =
                this.interfaceElements[this.currentLinePosition].length - 1;
        }
        let currentPosition = this.interfaceElements[this.currentLinePosition][
            this.currentMatrixRow
        ][this.currentMatrixCol];

        if (currentPosition) {
            this.currentElementAction = currentPosition;
        } else if (
            this.interfaceElements[this.currentLinePosition][
                this.currentMatrixRow
            ] &&
            !this.interfaceElements[this.currentLinePosition][
                this.currentMatrixRow
            ][this.currentMatrixCol]
        ) {
            this.currentElementAction = this.interfaceElements[
                this.currentLinePosition
            ][this.currentMatrixRow][
                this.interfaceElements[this.currentLinePosition][
                    this.currentMatrixRow
                ].length - 1
            ];
        }
        this.updateHighlightedElement(this.currentElementAction.element);
    }

    updateHighlightedElement(element) {
        element.tint = 0xff00ff;
    }

    removeSelection(element) {
        element.tint = 0xffffff;
    }

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

    executeFunctionByName(functionName, context, args) {
        var args = Array.prototype.slice.call(arguments, 2);
        var namespaces = functionName.split('.');
        var func = namespaces.pop();
        for (var i = 0; i < namespaces.length; i++) {
            context = context[namespaces[i]];
        }
        return context[func].apply(context, args);
    }
}
