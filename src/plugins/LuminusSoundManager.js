import Phaser from 'phaser';

/**
 * @class
 */
export class LuminusSoundManager {
    /**
     * This plugin is responsible for managing the audio for a given Scene. Usualy the MainScene, but should work for any scene you want.
     * @param { Phaser.Scene } scene The parent scene of which this manager will be a child.
     */
    constructor(scene) {
        /**
         * The parent scene of which this manager will be a child.
         * @type { Phaser.Scene }
         */
        this.scene = scene;
        /**
         * This should be the name of scene that plays the sound you want to stop the audio from.
         * @type { string }
         * @default
         */
        this.mainAudioSceneName = 'MainScene';

        /**
         * This should be the name of scene that plays the sound you want to stop the audio from.
         * @type { Phaser.Scene }
         * @default
         */
        this.mainAudioScene = null;
    }

    /**
     * Creates the component dependencies.
     */
    create() {
        this.mainAudioScene = this.scene.scene.get(this.mainAudioSceneName);
    }

    /**
     * Stops all the audio from the Scene.
     */
    stopAllAudio() {
        if (this.mainAudioScene) {
            this.mainAudioScene.sound.pauseAll();
        }
    }

    /**
     * Resumes all the audio from the Scene.
     */
    resumeAllAudio() {
        if (this.mainAudioScene) {
            this.mainAudioScene.sound.resumeAll();
        }
    }
}
