<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledMarkdownFile',
    'filename' => '/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/user/pages/03.tiled/03.setting-up-your-tiled-map/11.adding-help-markers/default.md',
    'modified' => 1618249809,
    'data' => [
        'header' => [
            'title' => 'Adding Help Markers',
            'menu' => 'Step 11 - Adding Help Markers'
        ],
        'frontmatter' => 'title: \'Adding Help Markers\'
menu: \'Step 11 - Adding Help Markers\'',
        'markdown' => '<h1 class="text-center">Step 11 - Adding Help Markers</h1>

While I was creating this Game Template, I showed it to some friends that gave me some feedback about the game. Some of them struggled to find the information zones... So... I created markers to show that there is something interact with.

Open your Tiled Map and the Object Layers, click the `markers` layer and add a `Insert Point (P)` to anywhere you whant the marker to show up.

[![](https://i.ibb.co/q1FH14f/Screen-Shot-2021-04-12-at-14-32-19.png?classes=center)](https://i.ibb.co/q1FH14f/Screen-Shot-2021-04-12-at-14-32-19.png?target=_blank)

Add the initialization code to the `create` method of your Scene. And don\'t forget to Save and Export your Tile Map.

```
		// Markers.
        const interactiveMarkers = new LuminusObjectMarker(this, map.map);
        interactiveMarkers.create();
```

[![](https://i.ibb.co/WsVRtHJ/Screen-Shot-2021-04-12-at-14-37-32.png?classes=center)](https://i.ibb.co/WsVRtHJ/Screen-Shot-2021-04-12-at-14-37-32.png?target=_blank)

You should enter the house for sure! Let\'s make a warp so the player can enter the house.

#### [Previous Step - How to Add Information Zones](../how-to-add-information-zones) | [Next Step - How add Warps](../how-to-add-warps)'
    ]
];
