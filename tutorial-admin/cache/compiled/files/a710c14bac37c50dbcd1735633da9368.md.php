<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledMarkdownFile',
    'filename' => '/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/user/pages/03.tiled/03.setting-up-your-tiled-map/04.creating-my-first-tileset/default.md',
    'modified' => 1621433530,
    'data' => [
        'header' => [
            'title' => 'Creating My First Tileset',
            'menu' => 'Step 4 - Creating My First Tileset'
        ],
        'frontmatter' => 'title: \'Creating My First Tileset\'
menu: \'Step 4 - Creating My First Tileset\'',
        'markdown' => '<h1 class="text-center">Step 4 - Creating My First Tileset</h1>

Before we start creating the Tile Map itself, we need to create the Tilemap, which is nothing but a Spritesheet with the tiles we will use. First of all, you will need to extrude your tiles. [Follow This Guide to extrude your tileset](https://github.com/sporadic-labs/tile-extruder).

If you don\'t extrude your tiles they might look like this:

[![](https://github.com/sporadic-labs/tile-extruder/raw/master/doc-source/images/demo.png?classes=center)](https://github.com/sporadic-labs/tile-extruder/raw/master/doc-source/images/demo.png?target=_blank)

Once you have extruded your tileset you must add it to the Tiled Editor. Click the `New Tileset...` under the `Tilesets Panel`.

[![](https://i.ibb.co/7vYrW7y/Screen-Shot-2021-04-08-at-15-30-19.png?classes=center)](https://i.ibb.co/7vYrW7y/Screen-Shot-2021-04-08-at-15-30-19.png?target=_blank)

You should be prompted with this Window.

[![](https://i.ibb.co/L5X8rPD/Screen-Shot-2021-04-08-at-15-32-33.png?classes=center)](https://i.ibb.co/L5X8rPD/Screen-Shot-2021-04-08-at-15-32-33.png?target=_blank)

Let\'s fill these inputs with propper values. Name your tileset with whichever name you like, but you must remember it when we get to create the tiles on the next step. The tiles should match the ones you are using in your tileset. Mine are 16x16 pixels. `Margin`, if you didn\'t specify any when you extruded your tileset, should be 1px, and `Spacing` should be 2px. Don\'t forget to browse the extruded file to the Source input. Mine is under `src/assets/maps/tilesets/tutorial_tileset_extruded.png`.

That\'s it! Now you have a Tileset to create your Tile Map.

Next Step we will finally create our tilemap.

#### [Previous Step - Creating Object Layers](../creating-object-layers) | [Next Step - Creating Our First Map](../creating-our-first-tile-map)'
    ]
];
