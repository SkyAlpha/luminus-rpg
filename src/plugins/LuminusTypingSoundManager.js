import Phaser from 'phaser';

/**
 * @class
 */
export class LuminusTypingSoundManager {
    /**
     * This class is responsible for creating sound effects for the the Typing effects from the Dialog.
     * @param { Phaser.Scene } scene Scene that this Sound Manager will be a child.
     */
    constructor(scene) {
        /**
         * The scene that will be user to create objects and play the typing sounds
         * @type { Phaser.Scene }
         */
        this.scene = scene;

        /**
         * Typing space sound. This audio should already be loaded previously.
         * @type { string }
         * @default
         */
        this.spaceSoundName = 'space_sound';

        /**
         * @type { Phaser.Sound.BaseSound }
         */
        this.spaceAudioManager = null;

        /**
         * Array of the names of the sounds that will play while typing actual letters.
         * @type { Array }
         * @default
         */
        this.typingKeySounds = [
            'typing_key_01',
            'typing_key_02',
            'typing_key_03',
            'typing_key_04',
            'typing_key_05',
        ];

        /**
         * An Array of Phaser Audio that will play the specific audios.
         * @type { Phaser.Sound.BaseSound[] }
         * @defualt
         */
        this.letterAudios = [];

        /**
         * The Current letter typed index.
         * @type { number }
         */
        this.letterTypedIndex = 0;
    }

    create() {
        this.spaceAudioManager = this.scene.sound.add(this.spaceSoundName);
        for (let i = 0; i < this.typingKeySounds.length; i++) {
            const audio = this.scene.sound.add(this.typingKeySounds[i]);
            this.letterAudios.push(audio);
        }
    }

    /**
     * Play a sound when the letter is being typed by the game.
     * @param { string } letter Can be either a letter or space.
     */
    type(letter) {
        // If its Space or empty, playes the space sound.
        if (letter.trim() === '' || letter.trim() === ' ') {
            this.spaceAudioManager.play();
        } else {
            // If its a letter, then play one of the letter sounds.
            this.letterAudios[this.letterTypedIndex].play();
            this.letterTypedIndex++;
            if (this.letterTypedIndex === this.letterAudios.length) {
                this.letterTypedIndex = 0;
            }
        }
    }
}
