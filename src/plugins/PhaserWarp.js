import Phaser from 'phaser';

/**
 * @class
 */
export class PhaserWarp {
    /**
     *
     * @param {Phaser.Scene} scene Phaser scene that it will control.
     * @param {GameObject} player the game object that will be teleported to a certain spot.
     */
    constructor(scene, player, map) {
        this.scene = scene;
        this.player = player;
        this.map = map;
        this.defaultFadeTime = 1000;
        this.fadeOutTime = this.defaultFadeTime;
        this.fadeInTime = this.defaultFadeTime;
        this.maxSpeed = this.player.body.maxSpeed;

        this.warpObjectName = 'warps'; // Default name of the warps object created in the Tiled Software.
    }

    createWarps() {
        const warps = this.map.getObjectLayer(this.warpObjectName);
        const warp_array = warps.objects.filter((obj) => obj.properties);
        const destinations = warps.objects.filter((obj) => !obj.properties);
        const warp_points = [];

        warp_array.forEach((warp) => {
            // For log purpposes
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
                    (d) => d.id === warp_point.warp.properties[0].value
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
