<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledMarkdownFile',
    'filename' => '/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/user/pages/03.tiled/03.setting-up-your-tiled-map/06.adding-the-player/default.md',
    'modified' => 1617991811,
    'data' => [
        'header' => [
            'title' => 'Adding the Player',
            'menu' => 'Step 6 - Adding the Player'
        ],
        'frontmatter' => 'title: \'Adding the Player\'
menu: \'Step 6 - Adding the Player\'',
        'markdown' => '<h1 class="text-center">Step 6 - Adding the Player</h1>

### The Object Layers

There is a reason why we have created so many Object Layers in our tile map. They all have a pourpose. We are going to use one of those to add the player to a desired position. It\'s preatty simple. 

1. Select the Object Layer on the Layers Panel. 
2. Slect the `spawn` Object Layer.
3. Select the `Insert Point (I)`.
4. Place de `Insert Point` where you want the player to Spawn.
5. Name the `Insert Point` Object you just created as `Spawn Point`.
6. Export your map again to the same place you have already saved it, so your game knows your changes.
7. Run your Secne again.


[![](https://i.ibb.co/8dgSPGB/Screen-Shot-2021-04-09-at-08-58-58.png?classes=center)](https://i.ibb.co/8dgSPGB/Screen-Shot-2021-04-09-at-08-58-58.png?target=_blank)

Just place the Insert Point where ever you want the player to spawn. Don\'t forget to save and export your project again.

[![](https://i.ibb.co/3zWQJ5R/Screen-Shot-2021-04-09-at-09-07-21.png?classes=center)](https://i.ibb.co/3zWQJ5R/Screen-Shot-2021-04-09-at-09-07-21.png?target=_blank)

If you followed all the steps carefully you should have the default player character placed where you defined the `Spawn Point`. The `LuminusMapCreator` class makes sure that if you define a `Spawn Point` you have a player placed there once your game starts. You already have full control over the player, he can walk, atack, and do so many other stuff that we will discuss on another article. Use your Keyboard Arrows or Xbox Controller (or something similar) to move the Character around.

[![](https://i.ibb.co/dcbJJyB/Screen-Shot-2021-04-09-at-09-12-29.png?classes=center)](https://i.ibb.co/dcbJJyB/Screen-Shot-2021-04-09-at-09-12-29.png?target=_blank)

Finally we will zoom in to have a better look at the character, we don\'t want the player to have a whole picture of the map. He should see only a portion of it. The `LuminusMapCreator` created a variable to the Parent Scene called `player` that will give us access to the `Player` Entity, we are going to use it to make the camera follow the `this.player.container`. If you want to change the name of the variable to something differente than `player`, you should go to the `src/consts/Player.js` and change it.

```
export const PlayerConfig = {
    texture: \'character\',
    variableName: \'player\', // Change here to whatever you want the player variable to be.
};
```

Add the following piece of code right bellow the `map.create()` function so it Zooms in the camera.

```
		// this.cameras.main.centerOn(0, 0); // Remove this line once you set the camera to follow the player.
        this.cameras.main.startFollow(this.player.container); // Follow the player container.
        this.cameras.main.setZoom(2.5);
```

Remove the `this.cameras.main.centerOn(0, 0);` line, we don\'t need it anymore.

Now you can explore the map on a zelda fashion. Next we will define collisions on the map.

#### [Previous Step - Creating Our First Tile Map](../creating-our-first-tile-map) | [Next Step - Adding Map Collisions](../adding-map-collisions)'
    ]
];
