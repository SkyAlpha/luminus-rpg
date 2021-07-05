import Phaser from 'phaser';
import { ButtonMinus } from '../components/UI/ButtonMinus';
import { ButtonPlus } from '../components/UI/ButtonPlus';
import { Player } from '../entities/Player';

export class AttributeScene extends Phaser.Scene {
    constructor() {
        super({
            key: 'AttributeScene',
        });
        /**
         * @type { Player }
         */
        this.player = null;

        /**
         * The Attributes sprite Background.
         * @type { Phaser.GameObjects.Sprite }
         */
        this.attributesBackground = null;
        this.atributesBackgroundSpriteName = 'attributes_background';

        this.attributesConfiguration = [
            {
                attribute: 'str',
                text: 'STR',
            },
        ];
    }

    init(args) {
        this.player = args.player;
        console.log('player', this.player);
    }

    create() {
        this.attributesBackground = this.add.image(0, 0, this.atributesBackgroundSpriteName).setOrigin(0, 0);
        const baseX = this.cameras.main.width / 2 - this.attributesBackground.width / 2;
        const baseY = this.cameras.main.height / 2 - this.attributesBackground.height / 2;
        this.attributesBackground.setPosition(baseX, baseY);
        this.attributesConfiguration.forEach((attribute, i) => {
            const yPosition = this.attributesBackground.y + 50 * (i + 1);
            const xPosition = this.attributesBackground.x + 50;
            let minus_button = new ButtonMinus(this, xPosition, yPosition, 'removeAttribute', attribute);
            let plus_minus = new ButtonPlus(
                this,
                this.attributesBackground.x + 150,
                yPosition,
                'addAttribute',
                attribute
            );
            let attributeText = this.add.text(
                xPosition + Math.abs((plus_minus.x - minus_button.x) / 2),
                yPosition,
                attribute.text
            );
            attributeText.setOrigin(0.5, 0.5);
        });
    }

    addAttribute(payload) {
        this.player.attributesManager.addAttribute(payload.attribute, 1);
    }

    removeAttribute(payload) {
        this.player.attributesManager.removeAttribute(payload.attribute, 1);
    }
}
