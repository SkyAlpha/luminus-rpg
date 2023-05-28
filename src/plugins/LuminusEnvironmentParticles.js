/**
 * @class
 */
export class LuminusEnvironmentParticles {
	/**
	 * This class is responsible for creating the environment particles of the game.
	 * @param { Phaser.Scene } scene
	 */
	constructor(scene, map) {
		/**
		 * The Phaser Scene
		 * @type { Phaser.Scene }
		 */
		this.scene = scene;

		/**
		 * The map where the class will get the zone to emit the particles.
		 * @type { Phaser.Tilemaps.Tilemap }
		 */
		this.map = map;

		/**
		 * The particles object.
		 * @type { Phaser.GameObjects.Particles }
		 * @default
		 */
		this.particles = null;

		/**
		 * The particles objects layer name that you defined on the Tiled Software.
		 * @type { string }
		 * @default
		 */
		this.particlesObjectLayerName = 'particles';

		/**
		 * The name of the clouds particles, should be the name of the image that you gave on phaser.
		 * @type { string }
		 * @default
		 */
		this.cloudParticleName = 'cloud';

		/**
		 * The name of the Sprite used for creating the dust particles.
		 * @type { string }
		 * @default
		 */
		this.dustParticleSprite = 'leaves';

		// /**
		//  * The prefix of the emit zone user for clouds. This is user to emit the clouds out of the map.
		//  * This way they look realistic. Otherwise they would just appear randomly in the map.
		//  * @type { string }
		//  */
		// this.particlesEmitZonePrefixName = 'emitzone_';
	}

	/**
	 * Get the zone from the map to emit the particles just inside that zone, so you can use less memory.
	 */
	create() {
		const zones = this.map.getObjectLayer(this.particlesObjectLayerName);
		if (zones.objects && zones.objects.length > 0) {
			zones.objects.forEach((zone) => {
				zone.properties.forEach((property) => {
					if (property.value === this.dustParticleSprite) {
						this.makeDust(zone.width, zone.height, zone.x, zone.y);
					} else if (property.value === this.cloudParticleName) {
						this.makeClouds(zone.width, zone.height, zone.x, zone.y);
					} else {
						// If nothing is specified, then create the basic particle system.
						this.makeDust(zone.width, zone.height, zone.x, zone.y);
					}
				});
			});
		}
	}

	/**
	 * Creates the clouds particles.
	 * @param { number } width Map Width in pixels.
	 * @param { number } height Map Height in Pixels.
	 * @param { number } originX Origin of the clouds.
	 * @param { number } originY Origin of the clouds.
	 */
	makeClouds(width, height, originX, originY) {
		// Sets the bounds of the particles so they do not leave the respective zone.
		const deathZone = new Phaser.Geom.Rectangle(originX, originY, width, height);
		this.particles = this.scene.add.particles(this.cloudParticleName, [
			{
				angle: { min: 0, max: 360 },
				deathZone: { source: deathZone, type: 'onLeave' },
				frequency: 15000,
				speedX: { min: 5, max: 15 },
				speedY: { min: 5, max: 15 },
				x: { min: originX, max: width },
				y: { min: originY, max: height },
				lifespan: 300000,
				scale: 0.8,
				alpha: { start: 0.5, end: 0.7 },
				radial: true,
				rotation: 180,
			},
		]);

		// Clouds should alway cast shadows above everything else in the map.
		this.particles.depth = 9999999999999;
	}

	/**
	 * Creates a Dust like Particle.
	 * @param { number } width Map Width in pixels.
	 * @param { number } height Map Height in Pixels.
	 * @param { number } originX Origin of the particles
	 * @param { number } originY Origin of the particles
	 */
	makeDust(width, height, originX, originY) {
		// Sets the bounds of the particles so they do not leave the respective zone.
		const deathZone = new Phaser.Geom.Rectangle(originX, originY, width, height);
		this.particles = this.scene.add.particles(this.dustParticleSprite, [
			{
				angle: { min: 0, max: 360 },
				// emitZone: { source: offscreen },
				deathZone: { source: deathZone, type: 'onLeave' },
				frequency: 5,
				speedX: { min: 5, max: 20 },
				speedY: { min: 5, max: 20 },
				x: { min: originX, max: width },
				y: { min: originY, max: height },
				lifespan: 10000,
				scale: { start: 1.3, end: 0.7 },
				alpha: { start: 0.4, end: 1 },
				radial: true,
				rotation: 180,
			},
		]);
		this.particles = this.scene.add.particles('dust', [
			{
				angle: { min: 0, max: 360 },
				// emitZone: { source: offscreen },
				deathZone: { source: deathZone, type: 'onLeave' },
				frequency: 5,
				speedX: { min: 5, max: 20 },
				speedY: { min: 0, max: 20 },
				x: { min: originX, max: width },
				y: { min: originY, max: height },
				lifespan: 7000,
				scale: { start: 1.3, end: 0.7 },
				alpha: { start: 0.4, end: 1 },
				radial: true,
				rotation: 180,
			},
		]);
	}
}
