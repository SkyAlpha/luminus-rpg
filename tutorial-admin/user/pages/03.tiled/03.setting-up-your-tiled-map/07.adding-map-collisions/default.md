---
title: 'Adding Map Collisions'
menu: 'Step 7 - Adding Map Collisions'
---

<h1 class="text-center">Step 7 - Adding Map Collisions</h1>

To add collisions between the `Player` and the Map is really easy with the Luminus RPG. Fun fact is that I have started this project as a simple Proof of Concept if I could paint map colisions [just like GB Studio](https://develop.gbstudio.dev/docs/scenes/) does. Up until now the folder name that stores this project is called `collision`.

1. Select the layers tab on the Layers Panel.
2. Select the `collision` layer.
3. Create a new Property for the `collision` layer called `collides` as a `bool` property.
4. Check the `collides`property.

[![](https://i.ibb.co/rHMtqc3/Screen-Shot-2021-04-09-at-10-21-53.png?classes=center)](https://i.ibb.co/rHMtqc3/Screen-Shot-2021-04-09-at-10-21-53.png?target=_blank)

We are not finished yet. I like to use a special Tile to create collisions. As I said I was inspired by GB Studio's collision technique, so I have created a collision tile, a single red tile that represents the tiles that the player can't go. So let's add it to the Tiled Map. I have provided one red square at `src/assets/maps/tilesets/collision.png` so it's easier for you to follow along, it's a red square with 50% Opacity so we can see throught it.

[![](https://i.ibb.co/ChzwTK3/Screen-Shot-2021-04-09-at-10-42-58.png?classes=center)](https://i.ibb.co/ChzwTK3/Screen-Shot-2021-04-09-at-10-42-58.png?target=_blank)

Now you have to select the `collision` layer, select the tileset `collision`, select the red tile that we have just added and start paiting.

[![](https://i.ibb.co/WD8pQHj/Screen-Shot-2021-04-09-at-10-58-38.png?classes=center)](https://i.ibb.co/WD8pQHj/Screen-Shot-2021-04-09-at-10-58-38.png?target=_blank)

I have painted all the brushes that I have created, so the Player can't walk on those tiles. We still need to add one more property to that red tile. We are going to call it `collides`. It is as a `bool` property and should be checked, as it should be `true`.

[![](https://i.ibb.co/z5jVNw0/Screen-Shot-2021-04-09-at-11-14-20.png?classes=center)](https://i.ibb.co/z5jVNw0/Screen-Shot-2021-04-09-at-11-14-20.png?target=_blank)

Select the Red Tile and Create the Property `collides`

[![](https://i.ibb.co/jZKcqFw/Screen-Shot-2021-04-09-at-11-17-07.png?classes=center)](https://i.ibb.co/jZKcqFw/Screen-Shot-2021-04-09-at-11-17-07.png?target=_blank)

And Check it

[![](https://i.ibb.co/hMBB0KM/Screen-Shot-2021-04-09-at-11-18-13.png?classes=center)](https://i.ibb.co/hMBB0KM/Screen-Shot-2021-04-09-at-11-18-13.png?target=_blank)

The `LuminusMapCreator` takes care of the rest. Just Save, Export and open your Scene again. You should have working collisions between the player and the red tiles you have painted.

Go check it out on your Scene.

#### [Previous Step - Adding the Player](../adding-the-player) | [Next Step - How to Effectivelly Draw a Tile Map](../how-to-effectively-draw-a-tile-map)
