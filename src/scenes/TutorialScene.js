import { TilesetImageConfig } from '../models/TilesetImageConfig';
import AnimatedTiles from '../plugins/AnimatedTiles';
import { LuminusEnvironmentParticles } from '../plugins/LuminusEnvironmentParticles';
import { LuminusMapCreator } from '../plugins/LuminusMapCreator';
import { LuminusObjectMarker } from '../plugins/LuminusObjectMarker';
import { LuminusWarp } from '../plugins/LuminusWarp';

export class TutorialScene extends Phaser.Scene {
    constructor() {
        super({
            key: 'TutorialScene',
        });
    }

    preload() {
        this.load.scenePlugin(
            'animatedTiles',
            AnimatedTiles,
            'animatedTiles',
            'animatedTiles'
        );
    }

    create() {
        let map = new LuminusMapCreator(this);
        map.mapName = 'tutorial';
        map.tilesetImages = [
            new TilesetImageConfig(
                'tutorial_tileset_extruded',
                'tutorial_tileset'
            ),
            new TilesetImageConfig('collision', 'collision_tile'), // Add these lines to use the Collision tiles.
            new TilesetImageConfig('overworld', 'tiles_overworld'), // Add these lines to use the Overworld Tileset.
            new TilesetImageConfig('inner', 'inner'), // Add this for inner
        ];
        map.create();
        this.cameras.main.startFollow(this.player.container);
        this.cameras.main.setZoom(2.5);

        // Created Particles
        this.particles = new LuminusEnvironmentParticles(this, map.map);
        this.particles.create();

        // Dialogs
        this.scene.launch('DialogScene', {
            player: this.player,
            map: map.map,
            scene: this,
        });

        // Markers.
        const interactiveMarkers = new LuminusObjectMarker(this, map.map);
        interactiveMarkers.create();

        const luminusWarp = new LuminusWarp(this, this.player, map.map);
        luminusWarp.createWarps();
    }

    update() {}
}
