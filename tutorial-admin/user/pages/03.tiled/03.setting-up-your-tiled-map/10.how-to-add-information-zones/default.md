---
title: 'How to Add Information Zones'
menu: 'Step 10 - How to Add Information Zones'
---

<h1 class="text-center">Step 10 - How to add Information Zones</h1>

You can also call it a Chat / Dialog as you can tell a whole Story with this.

First of all, you have to create the actual chat in the `src/consts/DB_SEED/Chats.js`

This is the Structure of the object:

```
export const CHATS = [
	..., // Other code
    {
        id: 2,
        chat: [
                {
                    leftPortraitName: 'lucius_portrait_beardless', // Sprite name of the portrait that will be displayed at the left side. The sprite should be imported by the Assets Manager with this name.
                    leftName: 'Person Name', // The name that will be displayed at the left side of the dialog box.
                    left: true, // Should the left side Name and Portrait be displayed? If it's already visible, it will dim the name and portrait to indicate that this is not the one who is talking.
                    leftExit: false, // Optionally you can make the portrait move away, like the person is leaving, just set it to true. Also, this is how you remove the person from the conversation, making the name disapear.
                    message:
                        'Hello there!!', // The message that will be displayed at the dialog.
                    rightPortraitName: '', // Sprite name of the portrait that will be displayed at the right side. The sprite should be imported by the Assets Manager with this name.
                    rightName: '', // The name that will be displayed at the right side of the dialog box.
                    right: false, // Should the right side Name and Portrait be displayed? If it's already visible, it will dim the name and portrait to indicate that this is not the one who is talking.
                    rightExit: false, // Optionally you can make the portrait move away, like the person is leaving, just set it to true. Also, this is how you remove the person from the conversation, making the name disapear.
                },
                {
                    leftPortraitName: 'lucius_portrait_beardless', // Sprite name of the portrait that will be displayed at the left side. The sprite should be imported by the Assets Manager with this name.
                    leftName: 'Person Name', // The name that will be displayed at the left side of the dialog box.
                    left: false, // Should the left side Name and Portrait be displayed? If it's already visible, it will dim the name and portrait to indicate that this is not the one who is talking.
                    leftExit: false, // Optionally you can make the portrait move away, like the person is leaving, just set it to true. Also, this is how you remove the person from the conversation, making the name disapear.
                    message:
                        'Heyyy!!', // The message that will be displayed at the dialog.
                    rightPortraitName: 'lucius_portrait_beard', // Sprite name of the portrait that will be displayed at the right side. The sprite should be imported by the Assets Manager with this name.
                    rightName: 'Person 2', // The name that will be displayed at the right side of the dialog box.
                    right: true, // Should the right side Name and Portrait be displayed? If it's already visible, it will dim the name and portrait to indicate that this is not the one who is talking.
                    rightExit: false, // Optionally you can make the portrait move away, like the person is leaving, just set it to true. Also, this is how you remove the person from the conversation, making the name disapear.
                },
                {
                    leftPortraitName: 'lucius_portrait_beardless', // Sprite name of the portrait that will be displayed at the left side. The sprite should be imported by the Assets Manager with this name.
                    leftName: 'Person Name', // The name that will be displayed at the left side of the dialog box.
                    left: false, // Should the left side Name and Portrait be displayed? If it's already visible, it will dim the name and portrait to indicate that this is not the one who is talking.
                    leftExit: false, // Optionally you can make the portrait move away, like the person is leaving, just set it to true. Also, this is how you remove the person from the conversation, making the name disapear.
                    message:
                        'Byeee!!!', // The message that will be displayed at the dialog.
                    rightPortraitName: 'lucius_portrait_beard', // Sprite name of the portrait that will be displayed at the right side. The sprite should be imported by the Assets Manager with this name.
                    rightName: 'Person 2', // The name that will be displayed at the right side of the dialog box.
                    right: true, // Should the right side Name and Portrait be displayed? If it's already visible, it will dim the name and portrait to indicate that this is not the one who is talking.
                    rightExit: true, // Optionally you can make the portrait move away, like the person is leaving, just set it to true. Also, this is how you remove the person from the conversation, making the name disapear.
                },
            ]
	}
];
```

It's really easy to add information zones using the Luminus RPG System. Just select the `info` object layer and add a rectangle where the player will be able to interact with the zone. Set a property to this rectangle called `messageID` of type `int`, then add the id of the conversation that you have just created. The Luminus Dialog Scene takes care of the rest. Oh! Talking about it, don't forget to launch it on your Scene.

[![](https://i.ibb.co/D803fDX/Screen-Shot-2021-06-14-at-12-16-04.png?classes=center)](https://i.ibb.co/D803fDX/Screen-Shot-2021-06-14-at-12-16-04.png?target=_blank)

```
        this.scene.launch('DialogScene', {
            player: this.player,
            map: map.map,
            scene: this,
        });
```

#### [Previous Step - Adding Environment Particles](../adding-environment-particles) | [Next Step - Adding Help Markers](../adding-help-markers)