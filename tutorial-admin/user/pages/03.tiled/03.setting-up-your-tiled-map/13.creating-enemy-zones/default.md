---
title: 'Creating Enemy Zones'
media_order: 'Screen Shot 2021-04-07 at 15.40.15.png'
menu: 'Step 13 - Creating Enemy Zones'
---

# <h1 class="text-center">Step 13 - Creating Enemy Zones</h1> 
![Screen%20Shot%202021-04-07%20at%2015.40.15](Screen%20Shot%202021-04-07%20at%2015.40.15.png "Screen%20Shot%202021-04-07%20at%2015.40.15?classes=center")

## Object Layer

In order to create enemies in your game you must have an [Object Layer](https://doc.mapeditor.org/en/stable/manual/objects/) called `enemies`, you can change the Object Layer name to whatever you want, but remember to change it on your code when you get to create your Scene. For this example I'm gonna keep it as `enemies`.

[![](https://i.imgur.com/HhYbmxG.png?classes=center)](https://i.imgur.com/HhYbmxG.png?classes=center)

As the Image shows, you should have the enemies object layer selected in order to create the enemies on the correct layer. Once you have it selected, click on the `Insert Rectangle` icon or Press the `R` Key to create a rectagle on your tiled map.

[![](https://i.ibb.co/6PV6xhj/Rectangle.png?classes=center)](https://i.ibb.co/6PV6xhj/Rectangle.png)

Your cursor now should look like a square, it means that the next time you press and drag the left mouse button it will create a rectangle shaped zone.

[![](https://i.ibb.co/q17h9L1/Screen-Shot-2021-04-07-at-14-57-33.png?classes=center)](https://i.ibb.co/q17h9L1/Screen-Shot-2021-04-07-at-14-57-33.png)

Now lets create a Spawn Zone for your enemies. Click the left mouse button and Drag your mouse until you reach the desired Enemy Zone size, then release the left mouse button.

[![](https://i.ibb.co/LpWLxnS/Screen-Shot-2021-04-07-at-15-04-28.png?classes=center)](https://i.ibb.co/LpWLxnS/Screen-Shot-2021-04-07-at-15-04-28.png)

Now you must pay attention to a couple of things. Once you release the left mouse button you should have the Enemy Zone that you just created selected, you may name it whatever you want, but it's not necessary, you can leave it without a name. What really matters here is the properties Section on the left side of the Screen. Lets click on the `Plus` icon and add two new properties. Name the first one `id`, that should be a `string`, and the second property should be called `number`, and should be of type `int`. The `id` property represents the ID of the Enemy, and the `number` property  is the number of that specific enemy that will spawn on that area. The `id` property should be defined on your `EnemiesSeedConfig.js` accordingly, and should represent a real monster on your game, otherwhise the game will break.

![](https://i.ibb.co/xDsx6yN/Screen-Shot-2021-04-07-at-15-23-29.png?classes=center)![](https://i.ibb.co/R2XBKCW/Screen-Shot-2021-04-07-at-15-22-53.png?classes=center)

When You are done with that your properties panel should look like this.

[![](https://i.ibb.co/QvYzMF3/Screen-Shot-2021-04-07-at-15-26-09.png?classes=center)](https://i.ibb.co/QvYzMF3/Screen-Shot-2021-04-07-at-15-26-09.png)

Last but not least, you must create the `LuminusEnemyZones` configuration, inside the `create` method of your Scene.

```
	/**
    * @param this { Phaser.Scene } The phaser Scene Context.
    * @param map { Phaser.Tilemaps } The Tilemap that you have created.
    */
	this.luminusEnemyZones = new LuminusEnemyZones(this, map);
    this.luminusEnemyZones.tiledObjectLayer = 'your-object-layer' // Use this line only if you changed the Object Layer Name
	this.luminusEnemyZones.create();
```
`this` is the Scene Context and `map`is the [Phaser Tiled ](https://phaser.io/examples/v3/view/tilemap/tiled-json-map) Map that you created on [Tiled](https://www.mapeditor.org/). Remember, this code should be called only once in your `create` scene method.

You can read more about the `LuminusEnemyZones` on the JSDocs provided by the Template. Just run `npm run jsdoc` on the root of the template project.

#### [Previous Step - How add Warps](../how-to-add-warps)
