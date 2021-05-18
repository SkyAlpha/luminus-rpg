import { PanelComponent } from "./PanelComponent";

export class LabelBox {
    constructor(scene) {
        /**
         * The Phaser Scene that the Panel will be created on.
         * @type { Phaser.Scene }
         */
         this.scene = scene;

         /**
          * The Panel that will show the information.
          */
         this.panel = new PanelComponent(scene);
    }
}