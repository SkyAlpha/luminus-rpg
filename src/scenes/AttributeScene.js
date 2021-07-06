import Phaser from 'phaser';
import { ButtonMinus } from '../components/UI/ButtonMinus';
import { ButtonPlus } from '../components/UI/ButtonPlus';
import { Player } from '../entities/Player';
import lodash from 'lodash';
export const AttributeSceneName = 'AttributeScene';

export class AttributeScene extends Phaser.Scene {
    constructor() {
        super({
            key: AttributeSceneName,
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
            {
                attribute: 'agi',
                text: 'AGI',
            },
            {
                attribute: 'vit',
                text: 'VIT',
            },
            {
                attribute: 'dex',
                text: 'DEX',
            },
            {
                attribute: 'int',
                text: 'INT',
            },
        ];

        this.attributesUiArray = [];
    }

    init(args) {
        this.player = args.player;
        console.log('player', this.player);
    }

    create() {
        this.lastRawAttributes = lodash.cloneDeep(this.player.attributes.rawAttributes);
        this.attributesUiArray = [];
        this.attributesBackground = this.add.image(0, 0, this.atributesBackgroundSpriteName).setOrigin(0, 0);
        const baseX = this.cameras.main.width / 2 - this.attributesBackground.width / 2;
        const baseY = this.cameras.main.height / 2 - this.attributesBackground.height / 2;
        this.attributesBackground.setPosition(baseX, baseY);
        this.createAttributesButtons();
    }

    createAttributesButtons() {
        const startPosition = 30;
        this.attributesConfiguration.forEach((attribute, i) => {
            const yPosition = this.attributesBackground.y + startPosition + 25 * (i + 1);
            const xPosition = this.attributesBackground.x + 50;
            let minus_button = new ButtonMinus(this, xPosition, yPosition, 'removeAttribute', attribute);
            let plus_button = new ButtonPlus(
                this,
                this.attributesBackground.x + 150,
                yPosition,
                'addAttribute',
                attribute
            );

            let attribute_text = this.add.text(
                xPosition + Math.abs((plus_button.x - minus_button.x) / 2),
                yPosition,
                attribute.text
            );
            attribute_text.setOrigin(0.5, 0.5);
            this.attributesUiArray.push({ minus_button, attributeText: attribute_text, plus_button });
        });
        this.availableAttributesText = this.add
            .text(
                this.attributesBackground.x + 43,
                this.attributesBackground.y + startPosition + 26 * (this.attributesConfiguration.length + 1),
                'Available: ' + this.player.attributes.availableStatPoints
            )
            .setOrigin(0, 0.5);
    }

    createAttributesInfo() {}

    checkButtonEnabled() {
        this.attributesConfiguration.forEach((value, i) => {
            let item = this.attributesUiArray[i];
            const raw = this.player.attributes.rawAttributes[value.attribute];
            const lastRaw = this.lastRawAttributes[value.attribute];

            if (lastRaw == raw) {
                item.minus_button.play('disabled_button_minus', true);
            } else if (!item.minus_button.anims.isPlaying) {
                item.minus_button.play('init_button_minus', true);
            }
            if (this.player.attributes.availableStatPoints <= 0) {
                item.plus_button.play('disabled_button_plus', true);
            } else if (!item.plus_button.anims.isPlaying) {
                item.plus_button.play('init_button_plus', true);
            }
        });
    }

    addAttribute(payload) {
        this.player.attributesManager.addAttribute(payload.attribute, 1, this.lastRawAttributes);
    }

    removeAttribute(payload) {
        console.log(this.lastRawAttributes);
        this.player.attributesManager.removeAttribute(payload.attribute, 1, this.lastRawAttributes);
    }

    update() {
        this.checkButtonEnabled();
        if (this.player && this.availableAttributesText)
            this.availableAttributesText.setText('Available: ' + this.player.attributes.availableStatPoints);
    }
}
