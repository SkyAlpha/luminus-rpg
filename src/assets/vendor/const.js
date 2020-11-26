let CONST = {

    /**
    * Used by the motionLock method. Defines full freedom of movement.
    * @constant
    * @type {integer}
    */
    NONE: 0,

    /**
    * Used by the motionLock method. Defines movement locked to the horizontal axis only.
    * @constant
    * @type {integer}
    */
    HORIZONTAL: 1,

    /**
    * Used by the motionLock method. Defines movement locked to the vertical axis only.
    * @constant
    * @type {integer}
    */
    VERTICAL: 2,

    /**
    * Used by Button.shape. Defines the hit area geometry shape being used is a Circle.
    * @constant
    * @type {integer}
    */
    CIRC_BUTTON: 3,

    /**
    * Used by Button.shape. Defines the hit area geometry shape being used is a Rectangle.
    * @constant
    * @type {integer}
    */
    RECT_BUTTON: 4

}

module.exports = CONST;
