import Phaser from 'phaser';

/**
 * @class
 */
export class LuminusWarp {
    /**
     * Creates a portal at the Tiled object Specified position.
     * @param {Phaser.Scene} scene Phaser scene that it will control.
     * @param {GameObject} player the game object that will be teleported to a certain spot.
     */
    constructor(scene, player, map) {
        /**
         * Scene Context.
         * @type { Phaser.Scene }  */
        this.scene = scene;
        /**
         * player Player Game Object.
         * @type { Phaser.GameObjects }  */
        this.player = player;
        /**
         * Tile Map to get the object from.
         * @type {Phaser.Tilemaps.Tilemap} */
        this.map = map;
        /**
         * Duration of the fade time of the camera.
         * @type { number }
         */
        this.defaultFadeTime = 1000;
        /**
         * Duration of the fade in time of the camera.
         * @type { number }
         */
        this.fadeOutTime = this.defaultFadeTime;
        /**
         * Duration of the fade in time of the camera.
         * @type { number }
         */
        this.fadeInTime = this.defaultFadeTime;
        /**
         * Name of the object defined in the Tiled Software to pull the Warps from.
         * @type { string }
         */
        this.warpObjectName = 'warps'; // Default name of the warps object created in the Tiled Software.
        /**
         * Name of  property of the object defined in the Tiled Software to pull the destination position from.
         * @type { string }
         */
        this.propertyWarpName = 'goto';

        /**
         * Maximum speed that the player can move. User only for caching in this class.
         * @private
         * @type { number }
         */
        this.maxSpeed = this.player.body.maxSpeed;

        /**
         * @type { Phaser.GameObjects.Particles.ParticleEmitter }
         */
        this.particlesConfig = null;
    }

    /**
     * Creates all warps of the game.
     */
    createWarps() {
        const warps = this.map.getObjectLayer(this.warpObjectName);
        const warp_array = warps.objects.filter((obj) => obj.properties);
        const destinations = warps.objects.filter((obj) => !obj.properties);
        const warp_points = [];

        warp_array.forEach((warp) => {
            // For logging purpposes
            // let rect = this.add.rectangle(
            //     warp.x,
            //     warp.y,
            //     warp.width,
            //     warp.height,
            //     0xffff00,
            //     0.5
            // );
            let zone = this.scene.add.zone(
                warp.x,
                warp.y,
                warp.width,
                warp.height
            );

            let emiterZone = new Phaser.Geom.Rectangle(
                warp.x,
                warp.y,
                warp.width,
                warp.height
            );

            this.particlesConfig = {
                angle: -90,
                frequency: 300,
                speed: 1,
                // accelerationY: -1,
                x: { min: zone.x, max: zone.x + zone.width },
                y: { min: zone.y, max: zone.y + zone.height },
                lifespan: { min: 500, max: 2000 },
                scale: 0.5,
                alpha: { start: 0.4, end: 0.8 },
                // radial: true,
                rotation: 180,
            };
            const particles = this.scene.add
                .particles('particle_warp')
                .createEmitter(this.particlesConfig);
            this.scene.physics.add.existing(zone);
            zone.body.immovable = true; // Prevents it from moving on collision.
            zone.setOrigin(0, 0);
            warp_points.push({ ...zone, warp });
        });

        this.scene.cameras.main.on('camerafadeoutstart', (fade) => {
            // Stop moving.
            this.player.body.maxSpeed = 0;
        });
        this.scene.cameras.main.on('camerafadeincomplete', (fade) => {
            this.player.body.maxSpeed = this.maxSpeed;
        });

        // Sets the collision between the player and the waro points.
        this.scene.physics.add.collider(
            warp_points,
            this.player,
            (warp_point, player) => {
                const dest = destinations.find(
                    (d) =>
                        d.id ===
                        warp_point.warp.properties.filter(
                            (f) => f.name === this.propertyWarpName
                        )[0].value
                );
                this.scene.cameras.main.fade(this.fadeOutTime);
                if (dest) {
                    player.x = dest.x;
                    player.y = dest.y;
                    this.scene.cameras.main.fadeIn(this.fadeInTime);
                }
            }
        );
    }
}
