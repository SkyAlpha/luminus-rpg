// modules are defined as an array
// [ module function, map of requires ]
//
// map of requires is short require name -> numeric require
//
// anything defined in a previous bundle is accessed via the
// orig method which is the require for previous bundles
parcelRequire = (function (modules, cache, entry, globalName) {
  // Save the require from previous bundle to this closure if any
  var previousRequire = typeof parcelRequire === 'function' && parcelRequire;
  var nodeRequire = typeof require === 'function' && require;

  function newRequire(name, jumped) {
    if (!cache[name]) {
      if (!modules[name]) {
        // if we cannot find the module within our internal map or
        // cache jump to the current global require ie. the last bundle
        // that was added to the page.
        var currentRequire = typeof parcelRequire === 'function' && parcelRequire;
        if (!jumped && currentRequire) {
          return currentRequire(name, true);
        }

        // If there are other bundles on this page the require from the
        // previous one is saved to 'previousRequire'. Repeat this as
        // many times as there are bundles until the module is found or
        // we exhaust the require chain.
        if (previousRequire) {
          return previousRequire(name, true);
        }

        // Try the node require function if it exists.
        if (nodeRequire && typeof name === 'string') {
          return nodeRequire(name);
        }

        var err = new Error('Cannot find module \'' + name + '\'');
        err.code = 'MODULE_NOT_FOUND';
        throw err;
      }

      localRequire.resolve = resolve;
      localRequire.cache = {};

      var module = cache[name] = new newRequire.Module(name);

      modules[name][0].call(module.exports, localRequire, module, module.exports, this);
    }

    return cache[name].exports;

    function localRequire(x){
      return newRequire(localRequire.resolve(x));
    }

    function resolve(x){
      return modules[name][1][x] || x;
    }
  }

  function Module(moduleName) {
    this.id = moduleName;
    this.bundle = newRequire;
    this.exports = {};
  }

  newRequire.isParcelRequire = true;
  newRequire.Module = Module;
  newRequire.modules = modules;
  newRequire.cache = cache;
  newRequire.parent = previousRequire;
  newRequire.register = function (id, exports) {
    modules[id] = [function (require, module) {
      module.exports = exports;
    }, {}];
  };

  var error;
  for (var i = 0; i < entry.length; i++) {
    try {
      newRequire(entry[i]);
    } catch (e) {
      // Save first error but execute all entries
      if (!error) {
        error = e;
      }
    }
  }

  if (entry.length) {
    // Expose entry point to Node, AMD or browser globals
    // Based on https://github.com/ForbesLindesay/umd/blob/master/template.js
    var mainExports = newRequire(entry[entry.length - 1]);

    // CommonJS
    if (typeof exports === "object" && typeof module !== "undefined") {
      module.exports = mainExports;

    // RequireJS
    } else if (typeof define === "function" && define.amd) {
     define(function () {
       return mainExports;
     });

    // <script>
    } else if (globalName) {
      this[globalName] = mainExports;
    }
  }

  // Override the current require with this new one
  parcelRequire = newRequire;

  if (error) {
    // throw error from earlier, _after updating parcelRequire_
    throw error;
  }

  return newRequire;
})({"f08c":[function(require,module,exports) {
var CONST = {
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
};
module.exports = CONST;
},{}],"JJlS":[function(require,module,exports) {
'use strict';

var has = Object.prototype.hasOwnProperty
  , prefix = '~';

/**
 * Constructor to create a storage for our `EE` objects.
 * An `Events` instance is a plain object whose properties are event names.
 *
 * @constructor
 * @private
 */
function Events() {}

//
// We try to not inherit from `Object.prototype`. In some engines creating an
// instance in this way is faster than calling `Object.create(null)` directly.
// If `Object.create(null)` is not supported we prefix the event names with a
// character to make sure that the built-in object properties are not
// overridden or used as an attack vector.
//
if (Object.create) {
  Events.prototype = Object.create(null);

  //
  // This hack is needed because the `__proto__` property is still inherited in
  // some old browsers like Android 4, iPhone 5.1, Opera 11 and Safari 5.
  //
  if (!new Events().__proto__) prefix = false;
}

/**
 * Representation of a single event listener.
 *
 * @param {Function} fn The listener function.
 * @param {*} context The context to invoke the listener with.
 * @param {Boolean} [once=false] Specify if the listener is a one-time listener.
 * @constructor
 * @private
 */
function EE(fn, context, once) {
  this.fn = fn;
  this.context = context;
  this.once = once || false;
}

/**
 * Add a listener for a given event.
 *
 * @param {EventEmitter} emitter Reference to the `EventEmitter` instance.
 * @param {(String|Symbol)} event The event name.
 * @param {Function} fn The listener function.
 * @param {*} context The context to invoke the listener with.
 * @param {Boolean} once Specify if the listener is a one-time listener.
 * @returns {EventEmitter}
 * @private
 */
function addListener(emitter, event, fn, context, once) {
  if (typeof fn !== 'function') {
    throw new TypeError('The listener must be a function');
  }

  var listener = new EE(fn, context || emitter, once)
    , evt = prefix ? prefix + event : event;

  if (!emitter._events[evt]) emitter._events[evt] = listener, emitter._eventsCount++;
  else if (!emitter._events[evt].fn) emitter._events[evt].push(listener);
  else emitter._events[evt] = [emitter._events[evt], listener];

  return emitter;
}

/**
 * Clear event by name.
 *
 * @param {EventEmitter} emitter Reference to the `EventEmitter` instance.
 * @param {(String|Symbol)} evt The Event name.
 * @private
 */
function clearEvent(emitter, evt) {
  if (--emitter._eventsCount === 0) emitter._events = new Events();
  else delete emitter._events[evt];
}

/**
 * Minimal `EventEmitter` interface that is molded against the Node.js
 * `EventEmitter` interface.
 *
 * @constructor
 * @public
 */
function EventEmitter() {
  this._events = new Events();
  this._eventsCount = 0;
}

/**
 * Return an array listing the events for which the emitter has registered
 * listeners.
 *
 * @returns {Array}
 * @public
 */
EventEmitter.prototype.eventNames = function eventNames() {
  var names = []
    , events
    , name;

  if (this._eventsCount === 0) return names;

  for (name in (events = this._events)) {
    if (has.call(events, name)) names.push(prefix ? name.slice(1) : name);
  }

  if (Object.getOwnPropertySymbols) {
    return names.concat(Object.getOwnPropertySymbols(events));
  }

  return names;
};

/**
 * Return the listeners registered for a given event.
 *
 * @param {(String|Symbol)} event The event name.
 * @returns {Array} The registered listeners.
 * @public
 */
EventEmitter.prototype.listeners = function listeners(event) {
  var evt = prefix ? prefix + event : event
    , handlers = this._events[evt];

  if (!handlers) return [];
  if (handlers.fn) return [handlers.fn];

  for (var i = 0, l = handlers.length, ee = new Array(l); i < l; i++) {
    ee[i] = handlers[i].fn;
  }

  return ee;
};

/**
 * Return the number of listeners listening to a given event.
 *
 * @param {(String|Symbol)} event The event name.
 * @returns {Number} The number of listeners.
 * @public
 */
EventEmitter.prototype.listenerCount = function listenerCount(event) {
  var evt = prefix ? prefix + event : event
    , listeners = this._events[evt];

  if (!listeners) return 0;
  if (listeners.fn) return 1;
  return listeners.length;
};

/**
 * Calls each of the listeners registered for a given event.
 *
 * @param {(String|Symbol)} event The event name.
 * @returns {Boolean} `true` if the event had listeners, else `false`.
 * @public
 */
EventEmitter.prototype.emit = function emit(event, a1, a2, a3, a4, a5) {
  var evt = prefix ? prefix + event : event;

  if (!this._events[evt]) return false;

  var listeners = this._events[evt]
    , len = arguments.length
    , args
    , i;

  if (listeners.fn) {
    if (listeners.once) this.removeListener(event, listeners.fn, undefined, true);

    switch (len) {
      case 1: return listeners.fn.call(listeners.context), true;
      case 2: return listeners.fn.call(listeners.context, a1), true;
      case 3: return listeners.fn.call(listeners.context, a1, a2), true;
      case 4: return listeners.fn.call(listeners.context, a1, a2, a3), true;
      case 5: return listeners.fn.call(listeners.context, a1, a2, a3, a4), true;
      case 6: return listeners.fn.call(listeners.context, a1, a2, a3, a4, a5), true;
    }

    for (i = 1, args = new Array(len -1); i < len; i++) {
      args[i - 1] = arguments[i];
    }

    listeners.fn.apply(listeners.context, args);
  } else {
    var length = listeners.length
      , j;

    for (i = 0; i < length; i++) {
      if (listeners[i].once) this.removeListener(event, listeners[i].fn, undefined, true);

      switch (len) {
        case 1: listeners[i].fn.call(listeners[i].context); break;
        case 2: listeners[i].fn.call(listeners[i].context, a1); break;
        case 3: listeners[i].fn.call(listeners[i].context, a1, a2); break;
        case 4: listeners[i].fn.call(listeners[i].context, a1, a2, a3); break;
        default:
          if (!args) for (j = 1, args = new Array(len -1); j < len; j++) {
            args[j - 1] = arguments[j];
          }

          listeners[i].fn.apply(listeners[i].context, args);
      }
    }
  }

  return true;
};

/**
 * Add a listener for a given event.
 *
 * @param {(String|Symbol)} event The event name.
 * @param {Function} fn The listener function.
 * @param {*} [context=this] The context to invoke the listener with.
 * @returns {EventEmitter} `this`.
 * @public
 */
EventEmitter.prototype.on = function on(event, fn, context) {
  return addListener(this, event, fn, context, false);
};

/**
 * Add a one-time listener for a given event.
 *
 * @param {(String|Symbol)} event The event name.
 * @param {Function} fn The listener function.
 * @param {*} [context=this] The context to invoke the listener with.
 * @returns {EventEmitter} `this`.
 * @public
 */
EventEmitter.prototype.once = function once(event, fn, context) {
  return addListener(this, event, fn, context, true);
};

/**
 * Remove the listeners of a given event.
 *
 * @param {(String|Symbol)} event The event name.
 * @param {Function} fn Only remove the listeners that match this function.
 * @param {*} context Only remove the listeners that have this context.
 * @param {Boolean} once Only remove one-time listeners.
 * @returns {EventEmitter} `this`.
 * @public
 */
EventEmitter.prototype.removeListener = function removeListener(event, fn, context, once) {
  var evt = prefix ? prefix + event : event;

  if (!this._events[evt]) return this;
  if (!fn) {
    clearEvent(this, evt);
    return this;
  }

  var listeners = this._events[evt];

  if (listeners.fn) {
    if (
      listeners.fn === fn &&
      (!once || listeners.once) &&
      (!context || listeners.context === context)
    ) {
      clearEvent(this, evt);
    }
  } else {
    for (var i = 0, events = [], length = listeners.length; i < length; i++) {
      if (
        listeners[i].fn !== fn ||
        (once && !listeners[i].once) ||
        (context && listeners[i].context !== context)
      ) {
        events.push(listeners[i]);
      }
    }

    //
    // Reset the array, or remove it completely if we have no more listeners.
    //
    if (events.length) this._events[evt] = events.length === 1 ? events[0] : events;
    else clearEvent(this, evt);
  }

  return this;
};

/**
 * Remove all listeners, or those of the specified event.
 *
 * @param {(String|Symbol)} [event] The event name.
 * @returns {EventEmitter} `this`.
 * @public
 */
EventEmitter.prototype.removeAllListeners = function removeAllListeners(event) {
  var evt;

  if (event) {
    evt = prefix ? prefix + event : event;
    if (this._events[evt]) clearEvent(this, evt);
  } else {
    this._events = new Events();
    this._eventsCount = 0;
  }

  return this;
};

//
// Alias methods names because people roll like that.
//
EventEmitter.prototype.off = EventEmitter.prototype.removeListener;
EventEmitter.prototype.addListener = EventEmitter.prototype.on;

//
// Expose the prefix.
//
EventEmitter.prefixed = prefix;

//
// Allow `EventEmitter` to be imported as module namespace.
//
EventEmitter.EventEmitter = EventEmitter;

//
// Expose the module.
//
if ('undefined' !== typeof module) {
  module.exports = EventEmitter;
}

},{}],"rYfP":[function(require,module,exports) {
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.Button = void 0;

var _const = _interopRequireDefault(require("./const"));

var _eventemitter = _interopRequireDefault(require("eventemitter3"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

/**
 * A `Button` is a virtual button. It belongs to the Virtual Joystick Plugin which is responsible for creating and updating it.
 *
 * Create a new button by using the `VirtualJoystickPlugin.addButton` method.
 * 
 * It consists of one sprite with two frames. One frame depicts the button as it's held down, the other when up.
 *
 * The Button is digital, i.e. it is either 'on or off'. It doesn't have a pressure or force associated with it.
 * 
 * The Button sprites are automatically added to the Scene at the point this Button is created.
 */
var Button = /*#__PURE__*/function (_EventEmitter) {
  _inherits(Button, _EventEmitter);

  var _super = _createSuper(Button);

  /**
   * @param {Phaser.Scene} scene - A reference to the Scene this stick was created in.
   * @param {integer} shape - The shape of the buttons hit area. Either `VirtualJoystickPlugin.CIRC_BUTTON` or `VirtualJoystickPlugin.RECT_BUTTON`.
   * @param {number} x - The x coordinate to draw the button at. The button is centered on this coordinate.
   * @param {number} y - The y coordinate to draw the button at. The button is centered on this coordinate.
   * @param {string} texture - The key of the texture atlas to be used to render this button.
   * @param {string} upFrame - The name of the frame within the button texture atlas to be used when the button is in an 'up' state.
   * @param {string} downFrame - The name of the frame within the button texture atlas to be used when the button is in a 'down' state.
   */
  function Button(scene, shape, x, y, texture, upFrame, downFrame) {
    var _this;

    _classCallCheck(this, Button);

    _this = _super.call(this);
    /**
     * A reference to the Scene this stick was created in.
     * @type {Phaser.Scene}
     */

    _this.scene = scene;
    /**
     * The name of the frame within the button texture atlas to be used when the button is in an 'up' state.
     * @type {string}
     */

    _this.upFrame = upFrame;
    /**
     * The name of the frame within the button texture atlas to be used when the button is in a 'down' state.
     * @type {string}
     */

    _this.downFrame = downFrame;
    /**
     * The Sprite that is used to display this button.
     * @type {Phaser.GameObjects.Sprite}
     */

    _this.sprite = _this.scene.add.sprite(x, y, texture, upFrame);
    /**
     * Internal button shape var.
     * @type {number}
     * @private
     */

    _this._shape = shape;
    /**
     * The hit area of the button in which input events will be detected.
     * @type {Phaser.Geom.Circle|Phaser.Geom.Rectangle} hitArea
     */

    if (shape === _const.default.CIRC_BUTTON) {
      _this.hitArea = new Phaser.Geom.Circle(_this.sprite.x, _this.sprite.y, _this.sprite.width / 2);
    } else if (shape === _const.default.RECT_BUTTON) {
      _this.hitArea = new Phaser.Geom.Rectangle(_this.sprite.x - _this.sprite.width / 2, _this.sprite.y - _this.sprite.height / 2, _this.sprite.width, _this.sprite.height);
    }
    /**
     * A reference to the Input Pointer being used to update this button.
     * @type {Phaser.Input.Pointer}
     */


    _this.pointer = null;
    /**
     * Should this button process or dispatch any events? Set to `false` to disable it.
     * @type {boolean}
     */

    _this.enabled = true;
    /**
     * The current down state of this button. A button is determined as being down if it has been pressed.
     * @type {boolean}
     */

    _this.isDown = false;
    /**
     * The current up state of this button. A button is determined as being up if it is not being pressed.
     * @type {boolean}
     */

    _this.isUp = true;
    /**
     * The time when the button last entered an `isDown` state.
     * @type {integer}
     */

    _this.timeDown = 0;
    /**
     * The time when the button last entered an `isUp` state.
     * @type {integer}
     */

    _this.timeUp = 0;
    /**
     * A name for this Button. This property is never used by Phaser, so you are free to set it to whatever
     * your game requires.
     * @type {string}
     */

    _this.name = '';
    /**
     * The current time, as set by the plugin each frame.
     * @type {integer}
     */

    _this.currentTime = 0;
    /**
     * The `repeatRate` allows you to set how often this button fires the `ButtonDownEvent`.
     * 
     * At the default setting of zero the onDown event will be sent only once and no further events
     * will be sent until the button is released and pressed again.
     *
     * By setting `repeatRate` to a value above zero you can control the time delay in milliseconds between each event.
     *
     * For example: `button.repeatRate = 100` would send the event once every 100ms for as long as the button is held down.
     *
     * To disable a repeat rate set the value back to zero again.
     * 
     * @type {integer}
     */

    _this.repeatRate = 0;
    /**
     * The key that is bound to this button. Pressing it activates the button the same way as clicking does.
     * It is set via `Button.addKey`.
     * 
     * @type {?Phaser.Input.Keyboard.Key}
     */

    _this.key = null;
    /**
     * Internal calculation var.
     * @type {number}
     * @private
     */

    _this._timeNext = 0;
    /**
     * Internal calculation var.
     * @type {number}
     * @private
     */

    _this._scale = 1;
    var input = _this.scene.sys.input;
    input.on('pointerdown', _this.checkDown, _assertThisInitialized(_this));
    input.on('pointerup', _this.checkUp, _assertThisInitialized(_this));
    return _this;
  }
  /**
   * You can bind a Keyboard key to this button, so that when the key is pressed the button is activated.
   *
   * Obviously you only want to do this on desktop browsers, but it allows you to minimize your code quantity.
   *
   * When the Key is pressed the Button.onDown event is dispatched.
   * 
   * The given argument can be either an existing Key object, a string, such as `A` or `SPACE`, or a key code value.
   *
   * If a Key object is given, and one already exists matching the same key code, the existing one is replaced with the new one.
   *
   * @param {(Phaser.Input.Keyboard.Key|string|integer)} key - Either a Key object, a string, such as `A` or `SPACE`, or a key code value.
   * 
   * @return {Phaser.Input.Keyboard.Key} The newly created Key object, or a reference to it if it already existed in the keys array.
   */


  _createClass(Button, [{
    key: "addKey",
    value: function addKey(key) {
      var input = this.scene.sys.input;

      if (input.keyboard) {
        if (this.key) {
          this.key.off('down', this.keyDown, this);
          this.key.off('up', this.keyUp, this);
          input.keyboard.removeKey(this.key);
          this.key = null;
        }

        this.key = input.keyboard.addKey(key);
        this.key.on('down', this.keyDown, this);
        this.key.on('up', this.keyUp, this);
      }

      return this.key;
    }
    /**
     * The Key.onDown callback. Processes the down event for this button.
     *
     * @private
     * @fires {ButtonDownEvent}
     */

  }, {
    key: "keyDown",
    value: function keyDown() {
      if (!this.isDown) {
        this.sprite.setFrame(this.downFrame);
        this.isDown = true;
        this.isUp = false;
        this.timeDown = this.key.timeDown;
        this.timeUp = 0;
        this._timeNext = this.timeDown + this.repeatRate;
        this.emit('down', this, this.key);
      }
    }
    /**
     * The Key.onUp callback. Processes the down event for this button.
     *
     * @private
     * @fires {ButtonUpEvent}
     */

  }, {
    key: "keyUp",
    value: function keyUp() {
      if (this.isDown) {
        this.sprite.setFrame(this.upFrame);
        this.isDown = false;
        this.isUp = true;
        this.timeUp = this.key.timeUp;
        this.emit('up', this, this.key, this.duration);
      }
    }
    /**
     * The Input.onDown callback. Processes the down event for this button.
     *
     * @private
     * @fires {ButtonDownEvent}
     * 
     * @param {Phaser.Input.Pointer} pointer - The Phaser Pointer that triggered the event.
     */

  }, {
    key: "checkDown",
    value: function checkDown(pointer) {
      if (this.enabled && this.isUp && this.hitArea.contains(pointer.worldX, pointer.worldY)) {
        this.pointer = pointer;
        this.sprite.setFrame(this.downFrame);
        this.isDown = true;
        this.isUp = false;
        this.timeDown = pointer.time;
        this.timeUp = 0;
        this._timeNext = this.timeDown + this.repeatRate;
        this.emit('down', this, pointer);
      }
    }
    /**
     * The Input.onUp callback. Processes the up event for this button.
     *
     * @private
     * @fires {ButtonUpEvent}
     * 
     * @param {Phaser.Input.Pointer} pointer - The Phaser Pointer that triggered the event.
     */

  }, {
    key: "checkUp",
    value: function checkUp(pointer) {
      if (pointer === this.pointer) {
        this.pointer = null;
        this.sprite.setFrame(this.upFrame);
        this.isDown = false;
        this.isUp = true;
        this.timeUp = pointer.time;
        this.emit('up', this, pointer, this.duration);
      }
    }
    /**
     * The update callback. This is called automatically by the Virtual Joystick Plugin.
     *
     * @private
     * @fires {ButtonDownEvent}
     * 
     * @param {integer} time - The current time.
     */

  }, {
    key: "update",
    value: function update(time) {
      this.currentTime = time;

      if (this.repeatRate > 0 && this.isDown && time >= this._timeNext) {
        this.emit('down', this, this.pointer);
        this._timeNext = time + this.repeatRate;
      }
    }
    /**
     * Visually aligns the button to the bottom left of the game view.
     * The optional spacing parameter allows you to add a border between the edge of the game and the button.
     *
     * @param {number} [spacing=0] - The spacing to apply between the edge of the game and the button.
     * 
     * @return {Button} This button instance.
     */

  }, {
    key: "alignBottomLeft",
    value: function alignBottomLeft() {
      var spacing = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
      var w = this.sprite.width / 2 + spacing;
      var h = this.sprite.height / 2 + spacing;
      this.posX = w;
      this.posY = this.scene.sys.scale.height - h;
      return this;
    }
    /**
     * Visually aligns the button to the bottom right of the game view.
     * The optional spacing parameter allows you to add a border between the edge of the game and the button.
     *
     * @param {number} [spacing=0] - The spacing to apply between the edge of the game and the button.
     * 
     * @return {Button} This button instance.
     */

  }, {
    key: "alignBottomRight",
    value: function alignBottomRight() {
      var spacing = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
      var w = this.sprite.width / 2 + spacing;
      var h = this.sprite.height / 2 + spacing;
      this.posX = this.scene.sys.scale.width - w;
      this.posY = this.scene.sys.scale.height - h;
      return this;
    }
    /**
     * The `repeatRate` allows you to set how often the DPad fires the direction events.
     * 
     * At the default setting of zero the events will be sent only once and no further events
     * will be sent until the DPad changes direction.
     *
     * By setting `repeatRate` to a value above zero you can control the time delay in milliseconds between each event.
     *
     * For example: `repeatRate = 100` would send the event once every 100ms for as long as
     * the button is held down in the same direction.
     *
     * To disable a repeat rate set the value back to zero again.
     *
     * @param {integer} [rate=0] - The repeat rate.
     * 
     * @return {Button} This button instance.
     */

  }, {
    key: "setRepeatRate",
    value: function setRepeatRate() {
      var rate = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
      this.repeatRate = rate;
      return this;
    }
    /**
     * Sets a name for this Button.
     * 
     * @param {string} [name] - The name for this button.
     * 
     * @return {Button} This button instance.
     */

  }, {
    key: "setName",
    value: function setName() {
      var name = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
      this.name = name;
      return this;
    }
    /**
     * Destroys this Button.
     * 
     * Removes all associated listeners and events and calls destroy on the button sprite.
     */

  }, {
    key: "destroy",
    value: function destroy() {
      var input = this.scene.sys.input;
      input.off('pointerdown', this.checkDown, this);
      input.off('pointerup', this.checkUp, this);
      this.sprite.destroy();

      if (this.key) {
        this.key.off('down', this.keyDown, this);
        this.key.off('up', this.keyUp, this);
        input.keyboard.removeKey(this.key);
        this.key.destroy();
        this.key = null;
      }

      this.removeAllListeners();
      this.hitArea = null;
      this.pointer = null;
      this.scene = null;
    }
    /**
     * The x coordinate the button is rendered at. Value should be given in pixel coordinates based on game dimensions.
     * Use this to change the position of the button on-screen. Value can even be tweened to display or hide the button in interesting ways.
     * 
     * @type {number}
     */

  }, {
    key: "posX",
    get: function get() {
      return this.sprite.x;
    }
    /**
     * The x coordinate the button is rendered at. Value should be given in pixel coordinates based on game dimensions.
     * Use this to change the position of the button on-screen. Value can even be tweened to display or hide the button in interesting ways.
     * 
     * @type {number}
     */
    ,
    set: function set(x) {
      this.sprite.x = x;
      this.hitArea.x = this._shape === _const.default.CIRC_BUTTON ? x : x - this.sprite.width / 2;
    }
    /**
     * The y coordinate the button is rendered at. Value should be given in pixel coordinates based on game dimensions.
     * Use this to change the position of the button on-screen. Value can even be tweened to display or hide the button in interesting ways.
     * 
     * @type {number}
     */

  }, {
    key: "posY",
    get: function get() {
      return this.sprite.y;
    }
    /**
     * The y coordinate the button is rendered at. Value should be given in pixel coordinates based on game dimensions.
     * Use this to change the position of the button on-screen. Value can even be tweened to display or hide the button in interesting ways.
     * 
     * @type {number}
     */
    ,
    set: function set(y) {
      this.sprite.y = y;
      this.hitArea.y = this._shape === _const.default.CIRC_BUTTON ? y : y - this.sprite.height / 2;
    }
    /**
     * The alpha value of the Button.
     * 
     * @type {number}
     */

  }, {
    key: "alpha",
    get: function get() {
      return this.sprite.alpha;
    }
    /**
     * The alpha value of the Button.
     * 
     * Adjusting this value changes the alpha property of button sprite.
     * 
     * @type {number}
     */
    ,
    set: function set(value) {
      this.sprite.alpha = value;
    }
    /**
     * The visible state of the Button.
     * 
     * Adjusting this value changes the visible property of the button sprite.
     *
     * Note that this button will carry on processing and dispatching events even when not visible.
     * If you wish to disable the button from processing events see `Button.enabled`.
     * 
     * @type {number}
     */

  }, {
    key: "visible",
    get: function get() {
      return this.sprite.visible;
    }
    /**
     * The visible state of the Button.
     * 
     * Adjusting this value changes the visible property of the button sprite.
     *
     * Note that this button will carry on processing and dispatching events even when not visible.
     * If you wish to disable the button from processing events see `Button.enabled`.
     * 
     * @type {number}
     */
    ,
    set: function set(value) {
      this.sprite.visible = value;
    }
    /**
    * The scale of the Button. The scale is applied evenly to both the x and y axis of the Button.
    * You cannot specify a different scale per axis.
    * 
    * @type {number}
    */

  }, {
    key: "scale",
    get: function get() {
      return this._scale;
    }
    /**
    * The scale of the Button. The scale is applied evenly to both the x and y axis of the Button.
    * You cannot specify a different scale per axis.
    * 
    * Adjusting this value changes the scale of the button sprite and recalculates the hit area.
    * 
    * @type {number}
    */
    ,
    set: function set(value) {
      this.sprite.setScale(value);

      if (this._shape === _const.default.CIRC_BUTTON) {
        this.hitArea.setTo(this.sprite.x, this.sprite.y, this.sprite.width);
      } else {
        this.hitArea.setTo(this.sprite.x, this.sprite.y, this.sprite.width, this.sprite.height);
      }

      this._scale = value;
    }
    /**
     * The duration in milliseconds that the Button has been held down for.
     * 
     * If the button is not currently in an `onDown` state it returns the duration the button was previously held down for.
     * 
     * If the button is in an `onDown` state it returns the current duration in ms.
     * 
     * @type {integer}
     */

  }, {
    key: "duration",
    get: function get() {
      if (this.isUp) {
        return this.timeUp - this.timeDown;
      } else {
        return this.currentTime - this.timeDown;
      }
    }
  }]);

  return Button;
}(_eventemitter.default);
/**
 * The ButtonDown event is dispatched as soon as the button is touched, or clicked when under mouse emulation.
 * 
 * If you have added a Key to this button via `addKey` and that is pressed, the event will send the Key as the second
 * parameter instead of a Pointer object.
 * 
 * Listen to this event from a button instance:
 * 
 * ```javascript
 * const button = this.pad.addButton(...);
 * button.on('down', handler);
 * ```
 * 
 * @typedef {Object} ButtonDownEvent
 * @property {Button} button
 * @property {Phaser.Input.Pointer|Phaser.Input.Keyboard.Key} source
 */

/**
 * The ButtonUp event is dispatched as soon as the button is released.
 * 
 * If you have added a Key to this button via `addKey`, and that was released, the event will send the Key as the second
 * parameter instead of a Pointer object.
 * 
 * It will also send the duration in milliseconds that the button was held down for prior to release.
 * 
 * Listen to this event from a button instance:
 * 
 * ```javascript
 * const button = this.pad.addButton(...);
 * button.on('up', handler);
 * ```
 * 
 * @typedef {Object} ButtonUpEvent
 * @property {Button} button
 * @property {Phaser.Input.Pointer|Phaser.Input.Keyboard.Key} source
 * @property {integer} duration
 */


exports.Button = Button;
module.exports = Button;
},{"./const":"f08c","eventemitter3":"JJlS"}],"ExWd":[function(require,module,exports) {
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.BaseStick = void 0;

var _const = _interopRequireDefault(require("./const"));

var _eventemitter = _interopRequireDefault(require("eventemitter3"));

var _VirtualJoystickPlugin = require("./VirtualJoystickPlugin");

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

/**
 * A `BaseStick` is the base virtual joystick class that all other types of stick extend from.
 */
var BaseStick = /*#__PURE__*/function (_EventEmitter) {
  _inherits(BaseStick, _EventEmitter);

  var _super = _createSuper(BaseStick);

  /**
   * @param {Phaser.Scene} scene - A reference to the Scene this stick was created in.
   * @param {number} x - The x coordinate to draw the joystick at. The joystick is centered on this coordinate.
   * @param {number} y - The y coordinate to draw the joystick at. The joystick is centered on this coordinate.
   * @param {number} distance - The distance threshold between the stick and the base. This is how far the stick can be pushed in any direction.
   */
  function BaseStick(scene, x, y, distance) {
    var _this;

    _classCallCheck(this, BaseStick);

    _this = _super.call(this);
    /**
     * A reference to the Scene this stick was created in.
     * @type {Phaser.Scene}
     */

    _this.scene = scene;
    /**
     * The position of the joystick in screen coordinates. To adjust please use `posX` and `posY`.
     * @type {Phaser.Math.Vector2}
     */

    _this.position = new Phaser.Math.Vector2(x, y);
    /**
     * The line object used for stick to base calculations.
     * @type {Phaser.Geom.Line}
     */

    _this.line = new Phaser.Geom.Line(x, y, x, y);
    /**
     * The circular hit area that defines the base of the joystick.
     * @type {Phaser.Geom.Circle}
     */

    _this.baseHitArea = new Phaser.Geom.Circle(x, y, distance / 2);
    /**
     * The circular hit area that defines the stick or handle of the joystick.
     * @type {Phaser.Geom.Circle}
     */

    _this.stickHitArea = new Phaser.Geom.Circle(x, y, distance / 2);
    /**
     * The Sprite that is used to display the base of the joystick.
     * @type {?Phaser.GameObjects.Sprite}
     */

    _this.baseSprite = null;
    /**
     * The Sprite that is used to display the stick or handle of the joystick.
     * @type {?Phaser.GameObjects.Sprite}
     */

    _this.stickSprite = null;
    /**
     * A Point object that holds the stick limits.
     * @type {Phaser.Math.Vector2}
     */

    _this.limitPoint = new Phaser.Math.Vector2();
    /**
     * A reference to the Input Pointer being used to update this joystick.
     * @type {Phaser.Input.Pointer}
     */

    _this.pointer = null;
    /**
     * Should this joystick process or dispatch any events? Set to `false` to disable it.
     * @type {boolean}
     */

    _this.enabled = true;
    /**
     * The current down state of this joystick. A joystick is determined as being down if it has been pressed and interacted with.
     * If it has a `deadZone` set then it's not considered as being down unless it has moved beyond the limits of the deadZone.
     * @type {boolean}
     */

    _this.isDown = false;
    /**
     * The current up state of this joystick. A joystick is determined as being up if it is not being interacted with.
     * If it has a `deadZone` set then it's considered as being up until it has moved beyond the limits of the deadZone.
     * @type {boolean}
     */

    _this.isUp = true;
    /**
     * The time when the joystick last entered an `isDown` state.
     * @type {integer}
     */

    _this.timeDown = 0;
    /**
     * The time when the joystick last entered an `isUp` state.
     * @type {integer}
     */

    _this.timeUp = 0;
    /**
     * The angle of the joystick in degrees. From -180 to 180 where zero is right-handed.
     * @type {number}
     */

    _this.angle = 0;
    /**
     * The angle of the joystick in degrees. From 0 to 360 where zero is right-handed.
     * @type {number}
     */

    _this.angleFull = 0;
    /**
     * The 4-way direction the stick is currently pointing, if active.
     *
     * @type {Phaser.NONE|Phaser.LEFT|Phaser.RIGHT|Phaser.UP|Phaser.DOWN}
     */

    _this.direction = Phaser.NONE;
    /**
     * The quadrant the joystick is in.
     * Where 315 to 45 degrees is quadrant 0.
     * 45 to 135 degrees is quadrant 1.
     * 135 to 225 degrees is quadrant 2.
     * 225 to 315 degrees is quadrant 3.
     * @type {integer}
     */

    _this.quadrant = 0;
    /**
     * The nearest octant of the joystick. Where each octant is 360 degrees / 45.
     * @type {integer}
     */

    _this.octant = 0;
    /**
     * A Stick can be motion locked. When locked it can only move along the specified axis.
     *
     * `motionLock = 0` will allow it to move freely.
     * `motionLock = 1` will only allow it to move horizontally.
     * `motionLock = 2` will only allow it to move vertically.
     * @type {VirtualJoystick.NONE|VirtualJoystick.HORIZONTAL|VirtualJoystick.VERTICAL}
     */

    _this.motionLock = _const.default.NONE;
    /**
     * Internal calculation var.
     * @type {number}
     * @private
     */

    _this._distance = distance;
    /**
     * Internal calculation var.
     * @type {number}
     * @private
     */

    _this._deadZone = distance * 0.1;
    /**
     * Internal calculation var.
     * @type {number}
     * @private
     */

    _this._scale = 1;
    /**
     * Internal var.
     * @type {boolean}
     * @private
     */

    _this._tracking = false;
    /**
     * Internal var.
     * @type {boolean}
     * @private
     */

    _this._showOnTouch = false;
    var input = _this.scene.sys.input;
    input.on('pointerdown', _this.checkDown, _assertThisInitialized(_this));
    input.on('pointerup', _this.checkUp, _assertThisInitialized(_this));
    input.on('pointerupoutside', _this.checkUp, _assertThisInitialized(_this));
    input.on('pointermove', _this.moveStick, _assertThisInitialized(_this));
    return _this;
  }
  /**
   * Processes the down event for this stick, or starts tracking if required.
   *
   * @private
   *
   * @param {Phaser.Input.Pointer} pointer - The Phaser Pointer that triggered the event.
   */


  _createClass(BaseStick, [{
    key: "checkDown",
    value: function checkDown(pointer) {
      var x = pointer.worldX;
      var y = pointer.worldY;
      var line = this.line;

      if (this.enabled && this.isUp) {
        this.pointer = pointer;

        if (this.motionLock === _const.default.NONE) {
          line.x2 = x;
          line.y2 = y;
        } else if (this.motionLock === _const.default.HORIZONTAL) {
          line.x2 = x;
        } else if (this.motionLock === _const.default.VERTICAL) {
          line.y2 = y;
        }

        if (this._showOnTouch) {
          line.x1 = x;
          line.y1 = y;
          this.posX = x;
          this.posY = y;
          this.visible = true;
          this.setDown();
          this.moveStick(pointer);
        } else {
          if (this.stickHitArea.contains(x, y)) {
            if (Phaser.Geom.Line.Length(line) <= this.deadZone) {
              this._tracking = true;
            } else {
              this.setDown();
              this.moveStick(pointer);
            }
          }
        }
      }
    }
    /**
     * Processes the up event for this stick.
     *
     * @private
     * @emits {UpEvent}
     *
     * @param {Phaser.Input.Pointer} pointer - The Phaser Pointer that triggered the event.
     */

  }, {
    key: "checkUp",
    value: function checkUp(pointer) {
      if (pointer === this.pointer) {
        this.pointer = null;
        this.stickHitArea.setPosition(this.position.x, this.position.y);

        if (this.stickSprite) {
          this.stickSprite.setPosition(this.position.x, this.position.y);
        }

        var line = this.line;
        line.x2 = line.x1;
        line.y2 = line.y1;
        this.isDown = false;
        this.isUp = true;
        this.direction = Phaser.NONE;
        this.timeUp = pointer.time;
        this.emit('up', this, pointer);

        if (this._showOnTouch) {
          this.visible = false;
        }
      }
    }
    /**
     * Internal down handler. Activated either onDown or after tracking if the stick has a dead zone.
     *
     * @private
     * @emits {DownEvent}
     */

  }, {
    key: "setDown",
    value: function setDown() {
      this.isDown = true;
      this.isUp = false;
      this.timeDown = this.pointer.time;
      this.timeUp = 0;
      this._tracking = false;
      this.checkArea();
      this.emit('down', this, this.pointer);
    }
    /**
     * Internal calculation method. Updates the various angle related properties.
     *
     * @private
     */

  }, {
    key: "checkArea",
    value: function checkArea() {
      this.angle = Phaser.Math.RadToDeg(Phaser.Geom.Line.Angle(this.line));
      var angleFull = this.angle;
      var quadrant = 1;

      if (angleFull < 0) {
        angleFull += 360;
      }

      if (angleFull >= 45 && angleFull < 135) {
        quadrant = 1;
        this.direction = Phaser.DOWN;
      } else if (angleFull >= 135 && angleFull < 225) {
        quadrant = 2;
        this.direction = Phaser.LEFT;
      } else if (angleFull >= 225 && angleFull < 315) {
        quadrant = 3;
        this.direction = Phaser.UP;
      } else {
        quadrant = 0;
        this.direction = Phaser.RIGHT;
      }

      this.angleFull = angleFull;
      this.quadrant = quadrant;
      this.octant = 45 * Math.round(angleFull / 45);
    }
    /**
     * Processes the movement event for this stick.
     *
     * @private
     * @emits {StickMoveEvent}
     *
     * @param {Phaser.Input.Pointer} pointer - The Phaser Pointer that triggered the event.
     */

  }, {
    key: "moveStick",
    value: function moveStick(pointer) {
      var x = pointer.worldX;
      var y = pointer.worldY;

      if (!this.pointer || this.pointer != pointer || !this.isDown && !this._tracking) {
        return;
      }

      var line = this.line;

      if (this.motionLock === _const.default.NONE) {
        line.x2 = x;
        line.y2 = y;
      } else if (this.motionLock === _const.default.HORIZONTAL) {
        line.x2 = x;
      } else if (this.motionLock === _const.default.VERTICAL) {
        line.y2 = y;
      }

      this.checkArea();
      var lineLength = Phaser.Geom.Line.Length(line);
      var lineAngle = Phaser.Geom.Line.Angle(line);

      if (!this.isDown && lineLength <= this.deadZone) {
        return;
      }

      if (this._tracking) {
        //  Was tracking, now in the zone so dispatch and follow
        this.setDown();
      }

      if (lineLength < this.baseHitArea.radius) {
        if (this.motionLock === _const.default.NONE) {
          this.stickHitArea.setPosition(x, y);
        } else if (this.motionLock === _const.default.HORIZONTAL) {
          this.stickHitArea.x = x;
        } else if (this.motionLock === _const.default.VERTICAL) {
          this.stickHitArea.y = y;
        }
      } else {
        //  Let it smoothly rotate around the base limit
        var limitPoint = this.limitPoint;
        Phaser.Geom.Circle.CircumferencePoint(this.baseHitArea, lineAngle, limitPoint);

        if (this.motionLock === _const.default.NONE) {
          this.stickHitArea.setPosition(limitPoint.x, limitPoint.y);
        } else if (this.motionLock === _const.default.HORIZONTAL) {
          this.stickHitArea.x = limitPoint.x;
        } else if (this.motionLock === _const.default.VERTICAL) {
          this.stickHitArea.y = limitPoint.y;
        }
      }

      if (this.stickSprite) {
        this.stickSprite.setPosition(this.stickHitArea.x, this.stickHitArea.y);
      }

      this.emit('move', this, this.force, this.forceX, this.forceY);
    }
    /**
     * The update callback. This is called automatically by the Virtual Joystick Plugin.
     *
     * @private
     * @emits {StickUpdateEvent}
     */

  }, {
    key: "update",
    value: function update() {
      if (!this._tracking) {
        this.emit('update', this, this.force, this.forceX, this.forceY);
      }
    }
    /**
     * Visually aligns the joystick to the bottom left of the game view.
     * The optional spacing parameter allows you to add a border between the edge of the game and the joystick.
     *
     * @param {number} [spacing=0] - The spacing to apply between the edge of the game and the joystick.
     *
     * @return {this} This joystick instance.
     */

  }, {
    key: "alignBottomLeft",
    value: function alignBottomLeft() {
      var spacing = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;

      if (this.baseSprite) {
        var w = this.baseSprite.displayWidth / 2 + spacing;
        var h = this.baseSprite.displayHeight / 2 + spacing;
        this.posX = w;
        this.posY = this.scene.scale.height - h;
      }

      return this;
    }
    /**
     * Visually aligns the joystick to the bottom right of the game view.
     * The optional spacing parameter allows you to add a border between the edge of the game and the joystick.
     *
     * @param {number} [spacing=0] - The spacing to apply between the edge of the game and the joystick.
     *
     * @return {this} This joystick instance.
     */

  }, {
    key: "alignBottomRight",
    value: function alignBottomRight() {
      var spacing = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;

      if (this.baseSprite) {
        var w = this.baseSprite.displayWidth / 2 + spacing;
        var h = this.baseSprite.displayHeight / 2 + spacing;
        this.posX = this.scene.scale.width - w;
        this.posY = this.scene.scale.height - h;
      }

      return this;
    }
    /**
     * Destroys this Stick.
     *
     * Removes all associated event listeners and signals and calls destroy on the stick sprites.
     */

  }, {
    key: "destroy",
    value: function destroy() {
      var input = this.scene.sys.input;
      input.off('pointerdown', this.checkDown, this);
      input.off('pointerup', this.checkUp, this);
      input.off('pointerupoutside', this.checkUp, this);
      input.off('pointermove', this.moveStick, this);
      this.removeAllListeners();
      this.stickHitArea = null;
      this.baseHitArea = null;
      this.line = null;
      this.limitPoint = null;
      this.pointer = null;
      this.scene = null;
    }
    /**
     * A Stick can be motion locked. When locked it can only move along the specified axis.
     *
     * `motionLock = 0` will allow it to move freely.
     * `motionLock = 1` will only allow it to move horizontally.
     * `motionLock = 2` will only allow it to move vertically.
     *
     * @param {integer} [value=0] - The motion lock setting to use.
     *
     * @return {this} This joystick instance.
     */

  }, {
    key: "setMotionLock",
    value: function setMotionLock() {
      var value = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
      this.motionLock = value;
      return this;
    }
    /**
     * The dead zone is a distance in pixels within which the Stick isn't considered as down or moving.
     * Only when it moves beyond this value does it start dispatching events.
     *
     * By default the deadZone is 15% of the given distance value.
     * So if the distance is 100 pixels then the Stick won't be considered as active until it has moved at least 15 pixels from its base.
     *
     * This value is adjusted for scale.
     *
     * It should never be more than the `Stick.distance` value.
     *
     * @param {integer} [value=0] - The dead zone to use.
     *
     * @return {this} This joystick instance.
     */

  }, {
    key: "setDeadZone",
    value: function setDeadZone() {
      var value = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
      this.deadZone = value;
      return this;
    }
    /**
     * Set the scale of the joystick.
     *
     * @param {number} value - The scale of the joystick.
     *
     * @return {this} This joystick instance.
     */

  }, {
    key: "setScale",
    value: function setScale(value) {
      this.scale = value;
      return this;
    }
    /**
     * Set the alpha of the joystick.
     *
     * @param {number} value - The alpha of the joystick.
     *
     * @return {this} This joystick instance.
     */

  }, {
    key: "setAlpha",
    value: function setAlpha(value) {
      this.alpha = value;
      return this;
    }
    /**
     * Set the visibility of the joystick.
     *
     * Note that this dpad will carry on processing and dispatching events even when not visible.
     * If you wish to disable the dpad from processing events see `Stick.enabled`.
     *
     * @param {number} value - The visible state of the joystick.
     *
     * @return {this} This joystick instance.
     */

  }, {
    key: "setVisible",
    value: function setVisible(value) {
      this.visible = value;
      return this;
    }
    /**
     * Renders out a debug view of this DPad to the given Graphics and Text objects.
     *
     * It optionally renders the geometry involved in the dpad hit areas and calculation line.
     *
     * It also optionally renders text information relating to the current forces and angles.
     *
     * @param {Phaser.GameObjects.Graphics} [graphics] - Renders the geometry involved in the stick hit areas and calculation line to this Graphics object.
     * @param {Phaser.GameObjects.Text} [text] - Renders text information relating to the current forces and angles to this Text object.
     */

  }, {
    key: "debug",
    value: function debug(graphics, text) {
      if (graphics) {
        graphics.clear();
        graphics.lineStyle(2, 0xff0000);
        graphics.strokeCircleShape(this.baseHitArea);
        graphics.lineStyle(2, 0x00ff00);
        graphics.strokeCircleShape(this.stickHitArea);
        graphics.lineStyle(2, 0xffff00);
        graphics.strokeLineShape(this.line);
      }

      if (text) {
        text.setText(['Force: ' + this.force.toFixed(2), 'ForceX: ' + this.forceX.toFixed(2), 'ForceY: ' + this.forceY.toFixed(2), '', 'Rotation: ' + this.rotation.toFixed(2), 'Angle: ' + this.angle.toFixed(2), '', 'Distance: ' + this.distance, 'Quadrant: ' + this.quadrant, 'Octant: ' + this.octant]);
      }
    }
    /**
     * The rotation of the stick from its base in radians.
     *
     * @type {number}
     */

  }, {
    key: "rotation",
    get: function get() {
      return Phaser.Geom.Line.Angle(this.line);
    }
    /**
     * The current x value of the joystick.
     *
     * This is a value between -1 and 1 calculated based on the distance of the stick from its base.
     * Where -1 is to the left of the base and +1 is to the right.
     *
     * @type {number}
     */

  }, {
    key: "x",
    get: function get() {
      var pi = Math.PI;
      var tau = Phaser.Math.TAU;
      var angle = Phaser.Geom.Line.Angle(this.line);

      if (angle >= 0) {
        if (angle <= tau) {
          //   Bottom right (0 - 90)
          return (tau - angle) / tau;
        } else {
          //   Bottom left (90 - 180)
          return -1 + (pi - angle) / pi * 2;
        }
      } else {
        if (angle >= -tau) {
          //   Top right (0 to -90)
          return Math.abs(-tau - angle) / tau;
        } else {
          //   Top left (-90 to -180)
          return -1 + Math.abs(-pi - angle) / pi * 2;
        }
      }
    }
    /**
     * The current y value of the joystick.
     *
     * This is a value between -1 and 1 calculated based on the distance of the stick from its base.
     * Where -1 is above the base and +1 is below the base.
     *
     * @type {number}
     */

  }, {
    key: "y",
    get: function get() {
      var tau = Phaser.Math.TAU;
      var angle = Phaser.Geom.Line.Angle(this.line);

      if (angle >= 0) {
        //  Down
        return 1 - Math.abs(tau - angle) / tau;
      } else {
        //  Up
        return -1 + Math.abs(-tau - angle) / tau;
      }
    }
    /**
     * The x coordinate the joystick is rendered at.
     * Use this to change the position of the joystick on-screen.
     *
     * @type {number}
     */

  }, {
    key: "posX",
    get: function get() {
      return this.position.x;
    }
    /**
     * The x coordinate the joystick is rendered at. Value should be given in pixel coordinates based on game dimensions.
     * Use this to change the position of the joystick on-screen. Value can even be tweened to display or hide the joystick in interesting ways.
     *
     * @type {number}
     */
    ,
    set: function set(x) {
      this.position.x = x;

      if (this.baseSprite) {
        this.baseSprite.x = x;
      }

      if (this.stickSprite) {
        this.stickSprite.x = x;
      }

      this.baseHitArea.x = x;
      this.stickHitArea.x = x;
      this.line.x1 = x;
      this.line.x2 = x;
    }
    /**
     * The y coordinate the joystick is rendered at.
     * Use this to change the position of the joystick on-screen.
     *
     * @type {number}
     */

  }, {
    key: "posY",
    get: function get() {
      return this.position.y;
    }
    /**
     * The y coordinate the joystick is rendered at. Value should be given in pixel coordinates based on game dimensions.
     * Use this to change the position of the joystick on-screen. Value can even be tweened to display or hide the joystick in interesting ways.
     *
     * @type {number}
     */
    ,
    set: function set(y) {
      this.position.y = y;

      if (this.baseSprite) {
        this.baseSprite.y = y;
      }

      if (this.stickSprite) {
        this.stickSprite.y = y;
      }

      this.baseHitArea.y = y;
      this.stickHitArea.y = y;
      this.line.y1 = y;
      this.line.y2 = y;
    }
    /**
     * The current force being applied to the joystick.
     *
     * This is a value between 0 and 1 calculated based on the distance of the stick from its base.
     * It can be used to apply speed to physics objects, for example:
     *
     * `ArcadePhysics.velocityFromRotation(Stick.rotation, Stick.force * maxSpeed, Sprite.body.velocity)`
     *
     * @type {number}
     */

  }, {
    key: "force",
    get: function get() {
      return Math.min(1, Phaser.Geom.Line.Length(this.line) / this.distance * 2);
    }
    /**
     * The current force being applied to the joystick on the horizontal axis.
     *
     * This is a value between 0 and 1 calculated based on the distance of the stick from its base.
     *
     * If you need to know which direction the Stick is facing (i.e. left or right) then see the `x` property value.
     *
     * @type {number}
     */

  }, {
    key: "forceX",
    get: function get() {
      return this.force * this.x;
    }
    /**
     * The current force being applied to the joystick on the vertical axis.
     *
     * This is a value between 0 and 1 calculated based on the distance of the stick from its base.
     *
     * If you need to know which direction the Stick is facing (i.e. up or down) then see the `y` property value.
     *
     * @type {number}
     */

  }, {
    key: "forceY",
    get: function get() {
      return this.force * this.y;
    }
    /**
     * The filterX value is the forceX value adjusted to be used as the mouse input uniform for a filter.
     *
     * This is a value between 0 and 1 where 0.5 is the center, i.e. the stick un-moved from its base.
     *
     * @type {number}
     */

  }, {
    key: "filterX",
    get: function get() {
      if (this.x === 0) {
        return 0.5;
      } else {
        var fx = Math.abs(this.forceX) / 2;

        if (this.x < 0) {
          return (0.5 - fx).toFixed(2);
        } else {
          return (0.5 + fx).toFixed(2);
        }
      }
    }
    /**
     * The filterY value is the forceY value adjusted to be used as the mouse input uniform for a filter.
     *
     * This is a value between 0 and 1 where 0.5 is the center, i.e. the stick un-moved from its base.
     *
     * @type {number}
     */

  }, {
    key: "filterY",
    get: function get() {
      if (this.y === 0) {
        return 0.5;
      } else {
        var fy = Math.abs(this.forceY) / 2;

        if (this.y < 0) {
          return 1 - (0.5 - fy).toFixed(2);
        } else {
          return 1 - (0.5 + fy).toFixed(2);
        }
      }
    }
    /**
     * The alpha value of the Stick.
     *
     * @type {number}
     */

  }, {
    key: "alpha",
    get: function get() {
      return this.baseSprite.alpha;
    }
    /**
     * The alpha value of the Stick.
     *
     * Adjusting this value changes the alpha property of both the base and stick sprites.
     * Reading it reads the alpha value of the base sprite alone.
     *
     * If you need to give the base and stick sprites *different* alpha values then you can access them directly:
     *
     * `stick.baseSprite.alpha` and `stick.stickSprite.alpha`.
     *
     * Note that DPads only have a `baseSprite`.
     *
     * @type {number}
     */
    ,
    set: function set(value) {
      if (this.baseSprite) {
        this.baseSprite.setAlpha(value);
      }

      if (this.stickSprite) {
        this.stickSprite.setAlpha(value);
      }
    }
    /**
     * The visible state of the Stick.
     *
     * @type {number}
     */

  }, {
    key: "visible",
    get: function get() {
      return this.stickSprite ? this.stickSprite.visible : false;
    }
    /**
     * The visible state of the Stick.
     *
     * Adjusting this value changes the visible property of both the base and stick sprites.
     * Reading it reads the visible value of the stick sprite alone.
     *
     * Note that this stick will carry on processing and dispatching events even when not visible.
     * If you wish to disable the stick from processing events see `Stick.enabled`.
     *
     * If you need to give the base and stick sprites *different* visible values then you can access them directly:
     *
     * `stick.baseSprite.visible` and `stick.stickSprite.visible`.
     *
     * Note that DPads only have a `baseSprite`.
     *
     * @type {number}
     */
    ,
    set: function set(value) {
      if (this.baseSprite) {
        this.baseSprite.setVisible(value);
      }

      if (this.stickSprite) {
        this.stickSprite.setVisible(value);
      }
    }
    /**
     * The distance in pixels that the stick needs to move from the base before it's at 'full force'.
     *
     * This value is adjusted for scale.
     *
     * @type {number}
     */

  }, {
    key: "distance",
    get: function get() {
      return this._distance * this._scale;
    }
    /**
     * The distance in pixels that the stick needs to move from the base before it's at 'full force'.
     *
     * This value is adjusted for scale.
     *
     * It should never be less than the `Stick.deadZone` value.
     *
     * @type {number}
     */
    ,
    set: function set(value) {
      this._distance = value;
    }
    /**
     * The dead zone is a distance in pixels within which the Stick isn't considered as down or moving.
     * Only when it moves beyond this value does it start dispatching events.
     *
     * By default the deadZone is 10% of the given distance value.
     * So if the distance is 100 pixels then the Stick won't be considered as active until it has moved at least 10 pixels from its base.
     *
     * @type {number}
     */

  }, {
    key: "deadZone",
    get: function get() {
      return this._deadZone * this._scale;
    }
    /**
     * The dead zone is a distance in pixels within which the Stick isn't considered as down or moving.
     * Only when it moves beyond this value does it start dispatching events.
     *
     * By default the deadZone is 10% of the given distance value.
     * So if the distance is 100 pixels then the Stick won't be considered as active until it has moved at least 10 pixels from its base.
     *
     * This value is adjusted for scale.
     *
     * It should never be more than the `Stick.distance` value.
     *
     * @type {number}
     */
    ,
    set: function set(value) {
      this._deadZone = value;
    }
    /**
     * The scale of the Stick.
     *
     * @type {number}
     */

  }, {
    key: "scale",
    get: function get() {
      return this._scale;
    }
    /**
     * The scale of the Stick. The scale is applied evenly to both the x and y axis of the Stick.
     * You cannot specify a different scale per axis.
     *
     * Adjusting this value changes the scale of both the base and stick sprites and recalculates all of the hit areas.
     *
     * The base and stick sprites must have the same scale.
     *
     * @type {number}
     */
    ,
    set: function set(value) {
      if (this.baseSprite) {
        this.baseSprite.setScale(value);
      }

      if (this.stickSprite) {
        this.stickSprite.setScale(value);
      }

      this.baseHitArea.setTo(this.position.x, this.position.y, this.distance * value / 2);
      var stickWidth = this.stickSprite ? this.stickSprite.displayWidth : this.distance * value / 2;
      this.stickHitArea.setTo(this.position.x, this.position.y, stickWidth);
      this._scale = value;
    }
    /**
     * A Stick that is set to `showOnTouch` will have `visible` set to false until the player presses on the screen.
     * When this happens the Stick is centered on the x/y coordinate of the finger and can be immediately dragged for movement.
     *
     * @type {boolean}
     */

  }, {
    key: "showOnTouch",
    get: function get() {
      return this._showOnTouch;
    }
    /**
     * A Stick that is set to `showOnTouch` will have `visible` set to false until the player presses on the screen.
     * When this happens the Stick is centered on the x/y coordinate of the finger and can be immediately dragged for movement.
     *
     * @type {boolean}
     */
    ,
    set: function set(value) {
      this._showOnTouch = value;

      if (this._showOnTouch && this.visible) {
        this.visible = false;
      }
    }
  }]);

  return BaseStick;
}(_eventemitter.default);

exports.BaseStick = BaseStick;
module.exports = BaseStick;
},{"./const":"f08c","eventemitter3":"JJlS","./VirtualJoystickPlugin":"V2P2"}],"zKIU":[function(require,module,exports) {
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.DPad = void 0;

var _BaseStick2 = _interopRequireDefault(require("./BaseStick"));

var _const = _interopRequireDefault(require("./const"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _get(target, property, receiver) { if (typeof Reflect !== "undefined" && Reflect.get) { _get = Reflect.get; } else { _get = function _get(target, property, receiver) { var base = _superPropBase(target, property); if (!base) return; var desc = Object.getOwnPropertyDescriptor(base, property); if (desc.get) { return desc.get.call(receiver); } return desc.value; }; } return _get(target, property, receiver || target); }

function _superPropBase(object, property) { while (!Object.prototype.hasOwnProperty.call(object, property)) { object = _getPrototypeOf(object); if (object === null) break; } return object; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

/**
 * A `DPad` is a virtual joystick. It belongs to the Virtual Joystick Plugin which is responsible for creating and updating it.
 *
 * Create a new stick by using the `VirtualJoystickPlugin.addDPad` method.
 *
 * While the Stick class creates an analogue joystick, the DPad one creates a digital joystick. The difference is that a digital joystick
 * is either "on" or "off" in any given direction. There is no pressure or degree of force in any direction, it's either moving or it isn't.
 * This is the same as the way in which NES style game pads work. The "D" stands for "Direction".
 *
 * Unlike the Stick class the DPad can use a different frame from the texture atlas for each of the 4 directions in which it can move.
 *
 * The DPad can either be on-screen all the time, positioned via the `posX` and `posY` setters. Or you can have it only appear when the
 * player touches the screen by setting `showOnTouch` to true.
 * 
 * The DPad sprites are automatically added to the Scene at the point this DPad is created.
 */
var DPad = /*#__PURE__*/function (_BaseStick) {
  _inherits(DPad, _BaseStick);

  var _super = _createSuper(DPad);

  /**
   * @param {Phaser.Scene} scene - A reference to the Scene this stick was created in.
   * @param {number} x - The x coordinate to draw the joystick at. The joystick is centered on this coordinate.
   * @param {number} y - The y coordinate to draw the joystick at. The joystick is centered on this coordinate.
   * @param {number} size - The size of the circular hit area for the DPad. If a falsey value it will use the size of the neutralFrame.
   * @param {string} texture - The key of the texture atlas to be used to render this joystick.
   * @param {string} [neutralFrame='neutral'] - The name of the frame within the texture atlas that contains the 'neutral' state of the dpad. Neutral is the state when the dpad isn't moved at all.
   * @param {string} [upFrame='up'] - The name of the frame within the texture atlas that contains the 'up' state of the dpad.
   * @param {string} [downFrame='down'] - The name of the frame within the texture atlas that contains the 'down' state of the dpad.
   * @param {string} [leftFrame='left'] - The name of the frame within the texture atlas that contains the 'left' state of the dpad.
   * @param {string} [rightFrame='right'] - The name of the frame within the texture atlas that contains the 'right' state of the dpad.
   */
  function DPad(scene, x, y, size, texture) {
    var _this;

    var neutralFrame = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : 'neutral';
    var upFrame = arguments.length > 6 && arguments[6] !== undefined ? arguments[6] : 'up';
    var downFrame = arguments.length > 7 && arguments[7] !== undefined ? arguments[7] : 'down';
    var leftFrame = arguments.length > 8 && arguments[8] !== undefined ? arguments[8] : 'left';
    var rightFrame = arguments.length > 9 && arguments[9] !== undefined ? arguments[9] : 'right';

    _classCallCheck(this, DPad);

    _this = _super.call(this, scene, x, y, size);
    /**
     * The name of the frame within the texture atlas that contains the 'neutral' state of the dpad. Neutral is the state when the dpad isn't moved at all.
     * @type {string}
     */

    _this.neutralFrame = neutralFrame;
    /**
     * The name of the frame within the texture atlas that contains the 'up' state of the dpad.
     * @type {string}
     */

    _this.upFrame = upFrame;
    /**
     * The name of the frame within the texture atlas that contains the 'down' state of the dpad.
     * @type {string}
     */

    _this.downFrame = downFrame;
    /**
     * The name of the frame within the texture atlas that contains the 'left' state of the dpad.
     * @type {string}
     */

    _this.leftFrame = leftFrame;
    /**
     * The name of the frame within the texture atlas that contains the 'right' state of the dpad.
     * @type {string}
     */

    _this.rightFrame = rightFrame;
    /**
     * @ignore
     */

    _this.baseSprite = _this.scene.add.sprite(x, y, texture, neutralFrame);

    if (!size) {
      size = _this.baseSprite.displayWidth;
      /**
       * @ignore
       */

      _this.baseHitArea.radius = size / 2;
      /**
       * @ignore
       */

      _this.stickHitArea.radius = size / 2;
    }
    /**
     * The `repeatRate` allows you to set how often the DPad fires the direction events.
     * 
     * At the default setting of zero the events will be sent only once and no further events
     * will be sent until the DPad changes direction.
     *
     * By setting `repeatRate` to a value above zero you can control the time delay in milliseconds between each event.
     *
     * For example: `repeatRate = 100` would send the event once every 100ms for as long as
     * the button is held down in the same direction.
     *
     * To disable a repeat rate set the value back to zero again.
     * 
     * @type {integer}
     */


    _this.repeatRate = 0;
    /**
     * Internal calculation var.
     * @type {number}
     * @private
     */

    _this._timeNext = 0;
    /**
     * Internal direction to event name mapping.
     * @private
     * @type {string[]}
     */

    _this._directions = ['', '', '', '', 'none', 'moveup', 'movedown', 'moveleft', 'moveright'];
    /**
     * Internal tracking var.
     * @type {integer}
     * @private
     */

    _this._lastDirection = 0;
    return _this;
  }
  /**
   * Processes the up event for this dpad.
   *
   * @private
   * @override
   * 
   * @param {Phaser.Input.Pointer} pointer - The Phaser Pointer that triggered the event.
   */


  _createClass(DPad, [{
    key: "checkUp",
    value: function checkUp(pointer) {
      if (pointer !== this.pointer) {
        return;
      }

      _get(_getPrototypeOf(DPad.prototype), "checkUp", this).call(this, pointer);

      this.baseSprite.setFrame(this.neutralFrame);
      this._lastDirection = 0;
    }
    /**
     * Processes the movement event for this dpad.
     *
     * @private
     * @override
     * @fires {DPadMoveEvent}
     * 
     * @param {Phaser.Input.Pointer} pointer - The Phaser Pointer that triggered the event.
     */

  }, {
    key: "moveStick",
    value: function moveStick(pointer) {
      if (pointer !== this.pointer) {
        return;
      }

      var x = pointer.worldX;
      var y = pointer.worldY;

      if (!this.pointer || !this.isDown && !this._tracking) {
        this.direction = Phaser.NONE;
        this.baseSprite.setFrame(this.neutralFrame);
        return;
      }

      var line = this.line;
      line.x2 = x;
      line.y2 = y;
      this.checkArea();
      var lineLength = Phaser.Geom.Line.Length(line);
      var lineAngle = Phaser.Geom.Line.Angle(line);

      if (!this.isDown && lineLength <= this.deadZone) {
        this.direction = Phaser.NONE;
        this.baseSprite.setFrame(this.neutralFrame);
        return;
      }

      if (this._tracking) {
        //  Was tracking, now in the zone so dispatch and follow
        this.setDown();
      }

      var motionLock = this.motionLock;
      var stickHitArea = this.stickHitArea;
      var quadrant = this.quadrant;

      if (lineLength < this.baseHitArea.radius) {
        if (motionLock === _const.default.NONE) {
          stickHitArea.setPosition(x, y);
        } else if (motionLock === _const.default.HORIZONTAL) {
          stickHitArea.x = x;
        } else if (motionLock === _const.default.VERTICAL) {
          stickHitArea.y = y;
        }
      } else {
        //  Let it smoothly rotate around the base limit
        var limitPoint = this.limitPoint;
        Phaser.Geom.Circle.CircumferencePoint(this.baseHitArea, lineAngle, limitPoint);

        if (motionLock === _const.default.NONE) {
          stickHitArea.setPosition(limitPoint.x, limitPoint.y);
        } else if (motionLock === _const.default.HORIZONTAL) {
          stickHitArea.x = limitPoint.x;
        } else if (motionLock === _const.default.VERTICAL) {
          stickHitArea.y = limitPoint.y;
        }
      }

      if (quadrant === 1) {
        this.baseSprite.setFrame(this.downFrame);
      } else if (quadrant === 2) {
        this.baseSprite.setFrame(this.leftFrame);
      } else if (quadrant === 3) {
        this.baseSprite.setFrame(this.upFrame);
      } else {
        this.baseSprite.setFrame(this.rightFrame);
      }

      this.emit('move', this, this.x, this.y);
    }
    /**
     * The update callback. This is called automatically by the Virtual Joystick Plugin.
     *
     * @private
     * @override
     * @fires {DPadUpdateEvent}
     * @fires {DPadLeftEvent}
     * @fires {DPadRightEvent}
     * @fires {DPadUpEvent}
     * @fires {DPadDownEvent}
     * 
     * @param {integer} time - The current time.
     */

  }, {
    key: "update",
    value: function update(time) {
      if (!this._tracking) {
        this.emit('update', this, this.x, this.y);

        if (this.direction !== Phaser.NONE && this.isDown) {
          if (this.direction !== this._lastDirection || this.repeatRate > 0 && time >= this._timeNext) {
            this.emit(this._directions[this.direction], this);
            this._timeNext = time + this.repeatRate;
            this._lastDirection = this.direction;
          }
        }
      }
    }
    /**
     * The `repeatRate` allows you to set how often the DPad fires the direction events.
     * 
     * At the default setting of zero the events will be sent only once and no further events
     * will be sent until the DPad changes direction.
     *
     * By setting `repeatRate` to a value above zero you can control the time delay in milliseconds between each event.
     *
     * For example: `repeatRate = 100` would send the event once every 100ms for as long as
     * the button is held down in the same direction.
     *
     * To disable a repeat rate set the value back to zero again.
     *
     * @param {integer} [rate=0] - The repeat rate.
     * 
     * @return {DPad} This joystick instance.
     */

  }, {
    key: "setRepeatRate",
    value: function setRepeatRate() {
      var rate = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
      this.repeatRate = rate;
      return this;
    }
    /**
     * Destroys this dpad.
     * 
     * Removes all associated listeners and events and calls destroy on the dpad sprite.
     * 
     * @override
     */

  }, {
    key: "destroy",
    value: function destroy() {
      _get(_getPrototypeOf(DPad.prototype), "destroy", this).call(this);

      this.baseSprite.destroy();
      this.baseSprite = null;
    }
    /**
     * Renders out a debug view of this DPad to the given Graphics and Text objects.
     *
     * It optionally renders the geometry involved in the dpad hit areas and calculation line.
     * 
     * It also optionally renders text information relating to the current forces and angles.
     *
     * @override
     * @param {Phaser.GameObjects.Graphics} [graphics] - Renders the geometry involved in the stick hit areas and calculation line to this Graphics object.
     * @param {Phaser.GameObjects.Text} [text] - Renders text information relating to the current forces and angles to this Text object.
     */

  }, {
    key: "debug",
    value: function debug(graphics, text) {
      _get(_getPrototypeOf(DPad.prototype), "debug", this).call(this, graphics);

      if (text) {
        text.setText(['X: ' + this.x, 'Y: ' + this.y, 'Direction: ' + this._directions[this.direction].substr(4), '', 'Distance: ' + this.distance, 'Quadrant: ' + this.quadrant, 'Octant: ' + this.octant]);
      }
    }
    /**
     * The current x value of the dpad.
     *
     * If the dpad is being held to the left it will return -1. If to the right it will return 1.
     * If either not held at all, or not left or right, it will return 0.
     * 
     * @type {number}
     */

  }, {
    key: "x",
    get: function get() {
      if (this.direction === Phaser.LEFT) {
        return -1;
      } else if (this.direction === Phaser.RIGHT) {
        return 1;
      } else {
        return 0;
      }
    }
    /**
     * The current y value of the joystick.
     * 
     * If the dpad is being held up it will return -1. If down it will return 1.
     * If either not held at all, or not up or down, it will return 0.
     * 
     * @type {number}
     */

  }, {
    key: "y",
    get: function get() {
      if (this.direction === Phaser.UP) {
        return -1;
      } else if (this.direction === Phaser.DOWN) {
        return 1;
      } else {
        return 0;
      }
    }
    /**
     * The current force being applied to the joystick.
     * 
     * For a DPad it is either 0 or 1.
     * 
     * @type {number}
     */

  }, {
    key: "force",
    get: function get() {
      return this.isDown ? 1 : 0;
    }
    /**
     * The current force being applied to the joystick on the horizontal axis.
     * 
     * For a DPad it is either -1, 0 or 1.
     * 
     * @type {number}
     */

  }, {
    key: "forceX",
    get: function get() {
      return this.x;
    }
    /**
     * The current force being applied to the joystick on the vertical axis.
     * 
     * For a DPad it is either -1, 0 or 1.
     * 
     * @type {number}
     */

  }, {
    key: "forceY",
    get: function get() {
      return this.y;
    }
  }]);

  return DPad;
}(_BaseStick2.default);
/**
 * The Move event is dispatched whenever the joystick is moved as a result of a device Touch movement event.
 * 
 * This event is only dispatched when a touch move event is received, even if the stick is held in a specific direction.
 * 
 * If you wish to constantly check the position of the joystick then you should use the Update event instead.
 * 
 * Listen to this event from a stick instance:
 * 
 * ```javascript
 * const stick = this.pad.addDPad(...);
 * stick.on('move', handler);
 * ```
 * 
 * @typedef {Object} DPadMoveEvent
 * @property {DPad} dpad - The DPad that fired the event.
 * @property {integer} forceX - The current force being applied to the joystick on the horizontal axis.
 * @property {integer} forceY - The current force being applied to the joystick on the vertical axis.
 */

/**
* The Update event is dispatched constantly for as long as the joystick is in a down state.
* 
* This is a high frequency event so be careful what is bound to it. If there are computationally cheaper ways of 
* reacting to this joysticks movement then you should explore them.
* 
* Listen to this event from a stick instance:
* 
* ```javascript
* const stick = this.pad.addDPad(...);
* stick.on('update', handler);
* ```
* 
* @typedef {Object} DPadUpdateEvent
* @property {DPad} dpad - The DPad that fired the event.
* @property {integer} forceX - The current force being applied to the joystick on the horizontal axis.
* @property {integer} forceY - The current force being applied to the joystick on the vertical axis.
*/

/**
 * This event is dispatched whenever the DPad is pressed left.
 * 
 * See the `repeatRate` property to control the frequency of the event.
 * 
 * If you wish to constantly check the position of the joystick then you should use the Update event instead.
 * 
 * Listen to this event from a stick instance:
 * 
 * ```javascript
 * const stick = this.pad.addDPad(...);
 * stick.on('moveleft', handler);
 * ```
 * 
 * @typedef {Object} DPadLeftEvent
 * @property {DPad} dpad - The dpad that fired the event.
 */

/**
* This event is dispatched whenever the DPad is pressed right.
* 
* See the `repeatRate` property to control the frequency of the event.
* 
* If you wish to constantly check the position of the joystick then you should use the Update event instead.
* 
* Listen to this event from a stick instance:
* 
* ```javascript
* const stick = this.pad.addDPad(...);
* stick.on('moveright', handler);
* ```
* 
* @typedef {Object} DPadRightEvent
* @property {DPad} dpad - The dpad that fired the event.
*/

/**
 * This event is dispatched whenever the DPad is pressed down.
 * 
 * See the `repeatRate` property to control the frequency of the event.
 * 
 * If you wish to constantly check the position of the joystick then you should use the Update event instead.
 * 
 * Listen to this event from a stick instance:
 * 
 * ```javascript
 * const stick = this.pad.addDPad(...);
 * stick.on('movedown', handler);
 * ```
 * 
 * @typedef {Object} DPadDownEvent
 * @property {DPad} dpad - The dpad that fired the event.
 */

/**
 * This event is dispatched whenever the DPad is pressed up.
 * 
 * See the `repeatRate` property to control the frequency of the event.
 * 
 * If you wish to constantly check the position of the joystick then you should use the Update event instead.
 * 
 * Listen to this event from a stick instance:
 * 
 * ```javascript
 * const stick = this.pad.addDPad(...);
 * stick.on('moveup', handler);
 * ```
 * 
 * @typedef {Object} DPadUpEvent
 * @property {DPad} dpad - The dpad that fired the event.
 */


exports.DPad = DPad;
module.exports = DPad;
},{"./BaseStick":"ExWd","./const":"f08c"}],"hrBt":[function(require,module,exports) {
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.Stick = void 0;

var _BaseStick2 = _interopRequireDefault(require("./BaseStick"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _get(target, property, receiver) { if (typeof Reflect !== "undefined" && Reflect.get) { _get = Reflect.get; } else { _get = function _get(target, property, receiver) { var base = _superPropBase(target, property); if (!base) return; var desc = Object.getOwnPropertyDescriptor(base, property); if (desc.get) { return desc.get.call(receiver); } return desc.value; }; } return _get(target, property, receiver || target); }

function _superPropBase(object, property) { while (!Object.prototype.hasOwnProperty.call(object, property)) { object = _getPrototypeOf(object); if (object === null) break; } return object; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

/**
 * A `Stick` is a virtual joystick. It belongs to the Virtual Joystick Plugin which is responsible for creating and updating it.
 *
 * Create a new stick by using the `VirtualJoystickPlugin.addStick` method.
 * 
 * It consists of two Sprites: one representing the 'base' of the joystick and the other the 'stick' itself, which is the part
 * that the player grabs hold of and interacts with. As the stick is moved you can read back the force being applied, either globally
 * or on a per axis basis.
 *
 * The Stick can either be on-screen all the time, positioned via the `posX` and `posY` setters. Or you can have it only appear when the
 * player touches the screen by setting `showOnTouch` to true.
 *
 * The Stick sprites are automatically added to the Scene at the point this Stick is created.
 * 
 * Stick force values are analogue, that is they are values between 0 and 1 that vary depending on how the stick
 * is being moved. This allows players to have fine-grained control over your game. If you require just an 'on / off' response you may
 * wish to use the DPad class instead.
 */
var Stick = /*#__PURE__*/function (_BaseStick) {
  _inherits(Stick, _BaseStick);

  var _super = _createSuper(Stick);

  /**
   * @param {Phaser.Scene} scene - A reference to the Scene this stick was created in.
   * @param {number} x - The x coordinate to draw the joystick at. The joystick is centered on this coordinate.
   * @param {number} y - The y coordinate to draw the joystick at. The joystick is centered on this coordinate.
   * @param {number} distance - The distance threshold between the stick and the base. This is how far the stick can be pushed in any direction.
   * @param {string} texture - The key of the texture atlas to be used to render this joystick.
   * @param {string} [baseFrame='base'] - The name of the frame within the joystick texture atlas that contains the 'base' image.
   * @param {string} [stickFrame='stick'] - The name of the frame within the joystick texture atlas that contains the 'stick' image.
   */
  function Stick(scene, x, y, distance, texture) {
    var _this;

    var baseFrame = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : 'base';
    var stickFrame = arguments.length > 6 && arguments[6] !== undefined ? arguments[6] : 'stick';

    _classCallCheck(this, Stick);

    _this = _super.call(this, scene, x, y, distance);
    /**
     * The name of the frame within the joystick texture atlas that contains the 'base' image.
     * @type {string} baseFrame
     */

    _this.baseFrame = baseFrame;
    /**
     * The name of the frame within the joystick texture atlas that contains the 'stick' image.
     * @type {string} stickFrame
     */

    _this.stickFrame = stickFrame;
    /**
     * The Sprite that is used to display the base of the joystick.
     * @type {Phaser.GameObjects.Sprite}
     */

    _this.baseSprite = _this.scene.add.sprite(x, y, texture, baseFrame);
    /**
     * The Sprite that is used to display the stick or handle of the joystick.
     * @type {Phaser.GameObjects.Sprite}
     */

    _this.stickSprite = _this.scene.add.sprite(x, y, texture, stickFrame);
    _this.stickHitArea.radius = _this.stickSprite.width / 2;
    return _this;
  }
  /**
   * Destroys this Stick.
   * 
   * Removes all associated listeners and events and calls destroy on the stick sprites.
   */


  _createClass(Stick, [{
    key: "destroy",
    value: function destroy() {
      _get(_getPrototypeOf(Stick.prototype), "destroy", this).call(this);

      this.stickSprite.destroy();
      this.baseSprite.destroy();
      this.stickSprite = null;
      this.baseSprite = null;
    }
  }]);

  return Stick;
}(_BaseStick2.default);
/**
 * The Down event is dispatched as soon as the joystick is touched, or clicked when under mouse emulation.
 * If it has a `deadZone` set then it's not dispatched until it has moved beyond the limits of the deadZone.
 * 
 * Listen to this event from a stick instance:
 * 
 * ```javascript
 * const stick = this.pad.addStick(...);
 * stick.on('down', handler);
 * ```
 * 
 * @typedef {Object} DownEvent
 * @property {Stick|HiddenStick|DPad} stick - The stick that fired the event.
 * @property {Phaser.Input.Pointer} pointer - The Phaser Pointer responsible for causing the event.
 */

/**
 * The Up event is dispatched as soon as the joystick is released, having previously been in an `isDown` state.
 * 
 * Listen to this event from a stick instance:
 * 
 * ```javascript
 * const stick = this.pad.addStick(...);
 * stick.on('up', handler);
 * ```
 * 
 * @typedef {Object} UpEvent
 * @property {Stick|HiddenStick|DPad} stick - The stick that fired the event.
 * @property {Phaser.Input.Pointer} pointer - The Phaser Pointer responsible for causing the event.
 */

/**
 * The Move event is dispatched whenever the joystick is moved as a result of a device Touch movement event.
 * 
 * This event is only dispatched when a touch move event is received, even if the stick is held in a specific direction.
 * 
 * If you wish to constantly check the position of the joystick then you should use the Update event instead.
 * 
 * Listen to this event from a stick instance:
 * 
 * ```javascript
 * const stick = this.pad.addStick(...);
 * stick.on('move', handler);
 * ```
 * 
 * @typedef {Object} StickMoveEvent
 * @property {Stick|HiddenStick} stick - The stick that fired the event.
 * @property {number} force - The current force being applied to the joystick.
 * @property {number} forceX - The current force being applied to the joystick on the horizontal axis.
 * @property {number} forceY - The current force being applied to the joystick on the vertical axis.
 */

/**
 * The Update event is dispatched constantly for as long as the joystick is in a down state.
 * 
 * This is a high frequency event so be careful what is bound to it. If there are computationally cheaper ways of 
 * reacting to this joysticks movement then you should explore them.
 * 
 * Listen to this event from a stick instance:
 * 
 * ```javascript
 * const stick = this.pad.addStick(...);
 * stick.on('update', handler);
 * ```
 * 
 * @typedef {Object} StickUpdateEvent
 * @property {Stick|HiddenStick} stick - The stick that fired the event.
 * @property {number} force - The current force being applied to the joystick.
 * @property {number} forceX - The current force being applied to the joystick on the horizontal axis.
 * @property {number} forceY - The current force being applied to the joystick on the vertical axis.
 */


exports.Stick = Stick;
module.exports = Stick;
},{"./BaseStick":"ExWd"}],"CCUp":[function(require,module,exports) {
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.HiddenStick = void 0;

var _BaseStick2 = _interopRequireDefault(require("./BaseStick"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

/**
 * A `HiddenStick` is a virtual joystick with no on-screen visuals.
 * It belongs to the Virtual Joystick Plugin which is responsible for creating and updating it.
 *
 * Create a new stick by using the `VirtualJoystickPlugin.addHiddenStick` method.
 * 
 * The Stick is active the moment you touch the screen, no matter where you touch it.
 * As such, changing the position, alpha, visible or scale of this stick has no impact.
 * 
 * Stick force values are analogue, that is they are values between 0 and 1 that vary depending on how the stick
 * is being moved. This allows players to have fine-grained control over your game. If you require just an 'on / off' response you may
 * wish to use the DPad class instead.
 */
var HiddenStick = /*#__PURE__*/function (_BaseStick) {
  _inherits(HiddenStick, _BaseStick);

  var _super = _createSuper(HiddenStick);

  /**
   * @param {Phaser.Scene} scene - A reference to the Scene this stick was created in.
   * @param {number} distance - The distance threshold between the stick and the base. This is how far the stick can be pushed in any direction.
   */
  function HiddenStick(scene, distance) {
    var _this;

    _classCallCheck(this, HiddenStick);

    _this = _super.call(this, scene, 0, 0, distance);
    _this._showOnTouch = true;
    return _this;
  }
  /**
   * Setting this property has no effect for a HiddenStick.
   * 
   * @type {boolean}
   */


  _createClass(HiddenStick, [{
    key: "showOnTouch",
    set: function set(value) {//  NOOP
    }
  }]);

  return HiddenStick;
}(_BaseStick2.default);

exports.HiddenStick = HiddenStick;
module.exports = HiddenStick;
},{"./BaseStick":"ExWd"}],"V2P2":[function(require,module,exports) {
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.VirtualJoystick = void 0;

var _const = _interopRequireDefault(require("./const"));

var _Button = _interopRequireDefault(require("./Button"));

var _DPad = _interopRequireDefault(require("./DPad"));

var _Stick = _interopRequireDefault(require("./Stick"));

var _HiddenStick = _interopRequireDefault(require("./HiddenStick"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _createForOfIteratorHelper(o, allowArrayLike) { var it; if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it.return != null) it.return(); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * The Virtual Joystick plugin.
 * 
 * This plugin is responsible for all joysticks and buttons created within a Scene.
 *
 * Add it via the Scene Plugin Loader:
 * 
 * `this.load.scenePlugin('VirtualJoystickPlugin', 'src/VirtualJoystickPlugin.js', 'VirtualJoystickPlugin', 'pad');`
 * 
 * This will add a new property called `pad` to every Scene.
 *
 * Once created you can then add new joysticks and buttons using `this.pad.addStick` and `this.pad.addButton` respectively.
 * 
 * This plugin can create multiple sticks and buttons and will handle processing and updating them all.
 */
var VirtualJoystick = /*#__PURE__*/function () {
  /**
   * @param {Phaser.Scene} scene - A reference to the Scene that has installed this plugin.
   * @param {Phaser.Plugins.PluginManager} pluginManager - A reference to the Plugin Manager.
   */
  function VirtualJoystick(scene, pluginManager) {
    _classCallCheck(this, VirtualJoystick);

    /**
     * A handy reference to the Plugin Manager that is responsible for this plugin.
     * Can be used as a route to gain access to game systems and  events.
     *
     * @name Phaser.Plugins.BasePlugin#pluginManager
     * @type {Phaser.Plugins.PluginManager}
     * @protected
     * @since 3.8.0
     */
    this.pluginManager = pluginManager;
    /**
     * A reference to the Game instance this plugin is running under.
     *
     * @name Phaser.Plugins.BasePlugin#game
     * @type {Phaser.Game}
     * @protected
     * @since 3.8.0
     */

    this.game = pluginManager.game;
    /**
     * A reference to the Scene that has installed this plugin.
     * Only set if it's a Scene Plugin, otherwise `null`.
     * This property is only set when the plugin is instantiated and added to the Scene, not before.
     * You cannot use it during the `init` method, but you can during the `boot` method.
     *
     * @name Phaser.Plugins.BasePlugin#scene
     * @type {?Phaser.Scene}
     * @protected
     * @since 3.8.0
     */

    this.scene = scene;
    /**
     * A reference to the Scene Systems of the Scene that has installed this plugin.
     * Only set if it's a Scene Plugin, otherwise `null`.
     * This property is only set when the plugin is instantiated and added to the Scene, not before.
     * You cannot use it during the `init` method, but you can during the `boot` method.
     *
     * @name Phaser.Plugins.BasePlugin#systems
     * @type {?Phaser.Scenes.Systems}
     * @protected
     * @since 3.8.0
     */

    this.systems = scene.sys;
    /**
     * The Sticks that this plugin is responsible for.
     * @type {Set}
     */

    this.sticks = null;
    /**
     * The Buttons that this plugin is responsible for.
     * @type {Set}
     */

    this.buttons = null;
    /**
     * Internal var to track the Input pointer total.
     * @type {integer}
     * @private
     */

    this._pointerTotal = 0;
    scene.sys.events.once('boot', this.boot, this);
  }
  /**
   * The boot method.
   * 
   * @private
   */


  _createClass(VirtualJoystick, [{
    key: "boot",
    value: function boot() {
      this.systems.events.once('destroy', this.destroy, this); //  Because they may load the plugin via the Loader

      if (this.systems.settings.active) {
        this.start();
      } else {
        this.systems.events.on('start', this.start, this);
      }
    }
    /**
     * The start method.
     * 
     * @private
     */

  }, {
    key: "start",
    value: function start() {
      this.sticks = new Set();
      this.buttons = new Set();
      this.systems.events.on('update', this.update, this);
      this.systems.events.once('shutdown', this.shutdown, this);
    }
    /**
     * Creates a new `Stick` object.
     *
     * `const stick = this.pad.addStick(x, y, distance, 'texture');`
     * 
     * It consists of two Sprites: one representing the 'base' of the joystick and the other the 'stick' itself, which is the part
     * that the player grabs hold of and interacts with. As the stick is moved you can read back the force being applied, either globally
     * or on a per axis basis.
     *
     * The Stick can either be on-screen all the time, positioned via the `posX` and `posY` setters. Or you can have it only appear when the
     * player touches the screen by setting `showOnTouch` to true.
     *
     * The Stick sprites are automatically added to the Scene at the point this Stick is created.
     * 
     * Stick force values are analogue, that is they are values between 0 and 1 that vary depending on how the stick
     * is being moved. This allows players to have fine-grained control over your game. If you require just an 'on / off' response you may
     * wish to use the DPad class instead.
     *
     * @param {number} x - The x coordinate to draw the joystick at. The joystick is centered on this coordinate.
     * @param {number} y - The y coordinate to draw the joystick at. The joystick is centered on this coordinate.
     * @param {number} distance - The distance threshold between the stick and the base. This is how far the stick can be pushed in any direction.
     * @param {string} texture - The key of the texture atlas to be used to render this joystick.
     * @param {string} [baseFrame='base'] - The name of the base frame within the joystick texture atlas.
     * @param {string} [stickFrame='stick'] - The name of the stick frame within the joystick texture atlas.
     * 
     * @return {Stick} The Stick object.
     */

  }, {
    key: "addStick",
    value: function addStick(x, y, distance, texture) {
      var baseFrame = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : 'base';
      var stickFrame = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : 'stick';
      var stick = new _Stick.default(this.scene, x, y, distance, texture, baseFrame, stickFrame);
      this.sticks.add(stick);
      this._pointerTotal++;

      if (this._pointerTotal > 2) {
        this.scene.sys.input.addPointer();
      }

      return stick;
    }
    /**
     * Creates a new `HiddenStick` object.
     *
     * `const stick = this.pad.addHiddenStick(distance);`
     * 
     * A `HiddenStick` is a virtual joystick with no on-screen visuals.
     * It belongs to the Virtual Joystick Plugin which is responsible for creating and updating it.
     * 
     * The Stick is active the moment you touch the screen, no matter where you touch it.
     * As such, changing the position, alpha, visible or scale of this stick has no impact.
     * 
     * Stick force values are analogue, that is they are values between 0 and 1 that vary depending on how the stick
     * is being moved. This allows players to have fine-grained control over your game. If you require just an 'on / off' response you may
     * wish to use the DPad class instead.
     *
     * @param {number} distance - The distance threshold between the stick and the base. This is how far the stick can be pushed in any direction.
     * 
     * @return {HiddenStick} The HiddenStick object.
     */

  }, {
    key: "addHiddenStick",
    value: function addHiddenStick(distance) {
      var stick = new _HiddenStick.default(this.scene, distance);
      this.sticks.add(stick);
      this._pointerTotal++;

      if (this._pointerTotal > 2) {
        this.scene.sys.input.addPointer();
      }

      return stick;
    }
    /**
     * Creates a new `DPad` object.
     *
     * `const dpad = this.pad.addDPad(x, y, size, 'texture');`
     *
     * While the Stick class creates an analogue joystick, the DPad one creates a digital joystick. The difference is that a digital joystick
     * is either "on" or "off" in any given direction. There is no pressure or degree of force in any direction, it's either moving or it isn't.
     * This is the same as the way in which NES style game pads work. The "D" stands for "Direction".
     *
     * Unlike the Stick class the DPad can use a different frame from the texture atlas for each of the 4 directions in which it can move.
     *
     * The DPad can either be on-screen all the time, positioned via the `posX` and `posY` setters. Or you can have it only appear when the
     * player touches the screen by setting `showOnTouch` to true.
     *
     * The DPad sprites are automatically added to the Scene at the point this Stick is created.
     *
     * @param {number} x - The x coordinate to draw the joystick at. The joystick is centered on this coordinate.
     * @param {number} y - The y coordinate to draw the joystick at. The joystick is centered on this coordinate.
     * @param {number} size - The size of the circular hit area for the DPad. If a falsey value it will use the size of the neutralFrame.
     * @param {string} texture - The key of the texture atlas to be used to render this joystick.
     * @param {string} [neutralFrame=neutral] - The name of the frame within the texture atlas that contains the 'neutral' state of the dpad. Neutral is the state when the dpad isn't moved at all.
     * @param {string} [upFrame=up] - The name of the frame within the texture atlas that contains the 'up' state of the dpad.
     * @param {string} [downFrame=down] - The name of the frame within the texture atlas that contains the 'down' state of the dpad.
     * @param {string} [leftFrame=left] - The name of the frame within the texture atlas that contains the 'left' state of the dpad.
     * @param {string} [rightFrame=right] - The name of the frame within the texture atlas that contains the 'right' state of the dpad.
     * 
     * @return {DPad} The DPad object.
     */

  }, {
    key: "addDPad",
    value: function addDPad(x, y, size, texture) {
      var neutralFrame = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : 'neutral';
      var upFrame = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : 'up';
      var downFrame = arguments.length > 6 && arguments[6] !== undefined ? arguments[6] : 'down';
      var leftFrame = arguments.length > 7 && arguments[7] !== undefined ? arguments[7] : 'left';
      var rightFrame = arguments.length > 8 && arguments[8] !== undefined ? arguments[8] : 'right';
      var stick = new _DPad.default(this.scene, x, y, size, texture, neutralFrame, upFrame, downFrame, leftFrame, rightFrame);
      this.sticks.add(stick);
      this._pointerTotal++;

      if (this._pointerTotal > 2) {
        this.scene.sys.input.addPointer();
      }

      return stick;
    }
    /**
     * Removes the given Stick or DPad object from this plugin and then calls `destroy` on it.
     *
     * @param {Stick|HiddenStick|DPad} stick - The Stick or DPad object to be destroyed and removed.
     */

  }, {
    key: "removeStick",
    value: function removeStick(stick) {
      this.sticks.remove(stick);
      stick.destroy();
      this._pointerTotal--;
    }
    /**
     * Creates a new `Button` object - a virtual button.
     *
     * `const button = this.pad.addButton(x, y, 'texture', 'button-up', 'button-down');`
     * 
     * It consists of one sprite with two frames. One frame depicts the button as it's held down, the other when up.
     *
     * The Button sprites are automatically added to the Scene at the point this Button is created.
     *
     * The Button is digital, i.e. it is either 'on or off'. It doesn't have a pressure or force associated with it.
     *
     * @param {number} x - The x coordinate to draw the button at. The button is centered on this coordinate.
     * @param {number} y - The y coordinate to draw the button at. The button is centered on this coordinate.
     * @param {string} texture - The key of the texture atlas to be used to render this button.
     * @param {string} upFrame - The name of the frame within the button texture atlas to be used when the button is in an 'up' state.
     * @param {string} downFrame - The name of the frame within the button texture atlas to be used when the button is in a 'down' state.
     * @param {integer} shape - The shape of the buttons hit area. Either `VirtualJoystick.CIRC_BUTTON` or `VirtualJoystick.RECT_BUTTON`.
     * 
     * @return {Button} The Button object.
     */

  }, {
    key: "addButton",
    value: function addButton(x, y, texture, upFrame, downFrame) {
      var shape = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : _const.default.CIRC_BUTTON;
      var button = new _Button.default(this.scene, shape, x, y, texture, upFrame, downFrame);
      this.buttons.add(button);
      this._pointerTotal++;

      if (this._pointerTotal > 2) {
        this.scene.sys.input.addPointer();
      }

      return button;
    }
    /**
     * Removes the given Button object from this plugin and then calls `Button.destroy` on it.
     *
     * @param {Button|Button[]} button - The Button object, or an array of Buttons, to be destroyed and removed.
     */

  }, {
    key: "removeButton",
    value: function removeButton(button) {
      if (Array.isArray(button)) {
        var _iterator = _createForOfIteratorHelper(button),
            _step;

        try {
          for (_iterator.s(); !(_step = _iterator.n()).done;) {
            var b = _step.value;
            this.buttons.remove(b);
            b.destroy();
            this._pointerTotal--;
          }
        } catch (err) {
          _iterator.e(err);
        } finally {
          _iterator.f();
        }
      } else {
        this.buttons.remove(button);
        button.destroy();
        this._pointerTotal--;
      }
    }
    /**
     * Called automatically by the Phaser Plugin Manager.
     * 
     * Updates all Stick and Button objects.
     * 
     * @param {integer} time - The current game timestep.
     */

  }, {
    key: "update",
    value: function update(time) {
      var _iterator2 = _createForOfIteratorHelper(this.sticks),
          _step2;

      try {
        for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
          var stick = _step2.value;
          stick.update(time);
        }
      } catch (err) {
        _iterator2.e(err);
      } finally {
        _iterator2.f();
      }

      var _iterator3 = _createForOfIteratorHelper(this.buttons),
          _step3;

      try {
        for (_iterator3.s(); !(_step3 = _iterator3.n()).done;) {
          var button = _step3.value;
          button.update(time);
        }
      } catch (err) {
        _iterator3.e(err);
      } finally {
        _iterator3.f();
      }
    }
    /**
     * Shuts down the event listeners for this plugin.
     */

  }, {
    key: "shutdown",
    value: function shutdown() {
      var eventEmitter = this.systems.events;
      eventEmitter.off('update', this.update, this);
      eventEmitter.off('shutdown', this.shutdown, this);
    }
    /**
     * Removes and calls `destroy` on all Stick and Button objects in this plugin.
     */

  }, {
    key: "destroy",
    value: function destroy() {
      this.shutdown();

      var _iterator4 = _createForOfIteratorHelper(this.sticks),
          _step4;

      try {
        for (_iterator4.s(); !(_step4 = _iterator4.n()).done;) {
          var stick = _step4.value;
          stick.destroy();
        }
      } catch (err) {
        _iterator4.e(err);
      } finally {
        _iterator4.f();
      }

      var _iterator5 = _createForOfIteratorHelper(this.buttons),
          _step5;

      try {
        for (_iterator5.s(); !(_step5 = _iterator5.n()).done;) {
          var button = _step5.value;
          button.destroy();
        }
      } catch (err) {
        _iterator5.e(err);
      } finally {
        _iterator5.f();
      }

      this.sticks.clear();
      this.buttons.clear();
      this._pointerTotal = 0;
    }
  }]);

  return VirtualJoystick;
}();
/**
 * @type {integer} VirtualJoystick.NONE
 */


exports.VirtualJoystick = VirtualJoystick;
VirtualJoystick.NONE = 0;
/**
 * @type {integer} VirtualJoystick.HORIZONTAL
 */

VirtualJoystick.HORIZONTAL = 1;
/**
 * @type {integer} VirtualJoystick.VERTICAL
 */

VirtualJoystick.VERTICAL = 2;
/**
 * @type {integer} VirtualJoystick.CIRC_BUTTON
 */

VirtualJoystick.CIRC_BUTTON = 3;
/**
 * @type {integer} VirtualJoystick.RECT_BUTTON
 */

VirtualJoystick.RECT_BUTTON = 4;
module.exports = VirtualJoystick;
},{"./const":"f08c","./Button":"rYfP","./DPad":"zKIU","./Stick":"hrBt","./HiddenStick":"CCUp"}]},{},["V2P2"], "VirtualJoystickPlugin")
//# sourceMappingURL=/VirtualJoystickPlugin.js.map