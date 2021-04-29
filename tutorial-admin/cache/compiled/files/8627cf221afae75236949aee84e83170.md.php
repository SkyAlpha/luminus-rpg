<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledMarkdownFile',
    'filename' => '/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/user/pages/03.tiled/03.setting-up-your-tiled-map/02.creating-tile-layers/default.md',
    'modified' => 1617904481,
    'data' => [
        'header' => [
            'title' => 'Creating Layers',
            'menu' => 'Step 2 - Creating Tile Layers',
            'slug' => 'creating-tile-layers'
        ],
        'frontmatter' => 'title: \'Creating Layers\'
menu: \'Step 2 - Creating Tile Layers\'
slug: creating-tile-layers',
        'markdown' => '<h1 class="text-center">Step 2 - Creating Tile Layers</h1>

Now that you have a Tiled Map Created, you should create the layers. A `Tile Layer` is how we will draw our map in the Grey Window that is showing in the middle of the Tiled Map Editor. By default the new map will have One Layer called `Tile Layer 1`, you should rename it to `base` that is how we will call our ground layer. The Tiled layers work just like any Image Editor Software Layer system, the one that is above will cover the one that is below, this will be important as we start to create the other layers.

[![](https://i.ibb.co/94539tJ/Screen-Shot-2021-04-08-at-10-16-26.png?classes=center)](https://i.ibb.co/94539tJ/Screen-Shot-2021-04-08-at-10-16-26.png)

To create new Layers you have to click on the little paper with a yellow star in the Layers Panel, and then click `Tile Layer`.

[![](https://i.ibb.co/L8Y4vLh/Screen-Shot-2021-04-08-at-10-35-08.png?classes=center)](https://i.ibb.co/L8Y4vLh/Screen-Shot-2021-04-08-at-10-35-08.png)

Let\'s create all the layers that we will need. Please do note that the layers represent the order that they will be rendered, It\'s rendered from Bottom to Top.

#### Layers Order >
* collision
* overplayer2
* overplayer
* overlay4
* overlay3
* overlay2
* overlay
* base

If you created the layers correctlly they should look like this.

[![](https://i.ibb.co/DpW3q53/Screen-Shot-2021-04-08-at-14-45-26.png?classes=center)](https://i.ibb.co/DpW3q53/Screen-Shot-2021-04-08-at-14-45-26.png)

Now, Just save the file.

Next we will create the objects layers.

#### [Previous Step - Creating a Map](../creating-a-map) | [Next Step - Creating Object Layers](../creating-object-layers)'
    ]
];
