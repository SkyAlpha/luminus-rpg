---
title: 'How to Add Information Zones'
menu: 'Step 10 - How to Add Information Zones'
---

<h1 class="text-center">Step 10 - How to add Information Zones</h1>

It's really easy to add information zones using the Luminus RPG System. Just select the `info` object layer and add a rectangle where the player will be able to interact with the zone. Set a property to this rectangle called `message` of type `string`, then add yous message there. The Luminus Dialog Scene takes care of the rest. Oh! Talking about it, don't forget to launch it on your Scene.

[![](https://i.ibb.co/z5Ddzx5/Screen-Shot-2021-04-12-at-11-17-43.png?classes=center)](https://i.ibb.co/z5Ddzx5/Screen-Shot-2021-04-12-at-11-17-43.png?target=_blank)

```
        this.scene.launch('DialogScene', {
            player: this.player,
            map: map.map,
            scene: this,
        });
```

#### [Previous Step - Adding Environment Particles](../adding-environment-particles) | [Next Step - Adding Help Markers](../adding-help-markers)