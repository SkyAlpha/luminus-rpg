import Phaser from 'phaser';
import { ButtonMinus } from '../components/UI/ButtonMinus';
import { ButtonPlus } from '../components/UI/ButtonPlus';
import { Player } from '../entities/Player';
import lodash from 'lodash';
import { SceneToggleWatcher } from './wathcers/SceneToggleWatcher';
import { LuminusInterfaceController } from '../plugins/LuminusInterfaceController';
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
        this.player.canMove = false;
        this.sound.play('turn_page');
    }

    create() {
        this.interfaceController = new LuminusInterfaceController(this);
        this.lastRawAttributes = lodash.cloneDeep(this.player.attributes.rawAttributes);
        this.attributesUiArray = [];
        this.attributesBackground = this.add.image(0, 0, this.atributesBackgroundSpriteName).setOrigin(0, 0);
        const baseX = this.cameras.main.width / 2 - this.attributesBackground.width / 2;
        const baseY = this.cameras.main.height / 2 - this.attributesBackground.height / 2;
        this.attributesBackground.setPosition(baseX, baseY);
        this.createCloseButton();
        this.createAttributesButtons();
        this.createAttributesInfo();
        this.scale.on('resize', this.resizeAll);
    }

    createCloseButton() {
        this.closeButton = this.add
            .image(
                this.attributesBackground.x + this.attributesBackground.width * this.attributesBackground.scaleX - 45,
                this.attributesBackground.y + 30,
                'close_button'
            )
            .setDisplaySize(22, 22)
            .setInteractive();

        this.closeButton.on('pointerdown', (pointer) => {
            this.closeScene();
        });
        const closeAction = {
            element: this.closeButton,
            action: 'closeScene',
            context: this,
            args: null,
        };
        this.interfaceController.closeAction = closeAction;
        this.interfaceController.currentElementAction = closeAction;
        this.interfaceController.createFirstRow();
        this.interfaceController.interfaceElements[0][0].push(closeAction);
        this.interfaceController.updateHighlightedElement(closeAction.element);
    }
    closeScene() {
        SceneToggleWatcher.toggleScene(this, AttributeSceneName, this.player);
        this.sound.play('turn_page');
    }

    createAttributesButtons() {
        const startPosition = 30;
        this.interfaceController.interfaceElements[1] = [];
        this.attributesConfiguration.forEach((attribute, i) => {
            this.interfaceController.interfaceElements[1][i] = [];
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
            const minus_button_interface = {
                element: minus_button,
                action: 'removeAttribute',
                context: this,
                args: attribute,
            };
            const plus_button_interface = {
                element: plus_button,
                action: 'addAttribute',
                context: this,
                args: attribute,
            };
            this.interfaceController.interfaceElements[1][i].push(minus_button_interface);
            this.interfaceController.interfaceElements[1][i].push(plus_button_interface);
        });
        this.availableAttributesText = this.add
            .text(
                this.attributesBackground.x + 43,
                this.attributesBackground.y + startPosition + 26 * (this.attributesConfiguration.length + 1),
                'Available: ' + this.player.attributes.availableStatPoints
            )
            .setOrigin(0, 0.5);
    }

    createAttributesInfo() {
        const baseX =
            this.attributesBackground.x + 15 + (this.attributesBackground.width / 2) * this.attributesBackground.scaleX;
        const baseY = this.attributesBackground.y + 55;
        this.atackText = this.add.text(baseX, baseY, `Atack: ${this.player.attributes.atack}`).setOrigin(0, 0.5);
        this.defenseText = this.add
            .text(baseX, this.atackText.y + this.atackText.height + 5, `Defense: ${this.player.attributes.defense}`)
            .setOrigin(0, 0.5);
        this.maxHealthText = this.add
            .text(
                baseX,
                this.defenseText.y + this.defenseText.height + 5,
                `Max Health: ${this.player.attributes.baseHealth}`
            )
            .setOrigin(0, 0.5);
        this.criticalText = this.add
            .text(
                baseX,
                this.maxHealthText.y + this.maxHealthText.height + 5,
                `Critical: ${this.player.attributes.critical} %`
            )
            .setOrigin(0, 0.5);
        this.fleeText = this.add
            .text(baseX, this.criticalText.y + this.criticalText.height + 5, `Flee: ${this.player.attributes.flee}`)
            .setOrigin(0, 0.5);
        this.hitText = this.add
            .text(baseX, this.fleeText.y + this.fleeText.height + 5, `Hit: ${this.player.attributes.hit}`)
            .setOrigin(0, 0.5);
    }

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

    resizeAll(size) {
        if (this.atackText) this.atackText.setPosition(baseX, baseY);
        if (this.defenseText) this.defenseText.setPosition(baseX, this.atackText.y + this.atackText.height + 5);
        if (this.maxHealthText) this.maxHealthText.setPosition(baseX, this.defenseText.y + this.defenseText.height + 5);
        if (this.criticalText)
            this.criticalText.setPosition(baseX, this.maxHealthText.y + this.maxHealthText.height + 5);
        if (this.fleeText) this.fleeText.setPosition(baseX, this.criticalText.y + this.criticalText.height + 5);
        if (this.hitText) this.hitText.setPosition(baseX, this.fleeText.y + this.fleeText.height + 5);
    }

    setAttributesText() {
        if (this.scene.isActive()) {
            this.atackText.setText(`Atack: ${this.player.attributes.atack}`);
            this.defenseText.setText(`Defense: ${this.player.attributes.defense}`);
            this.maxHealthText.setText(`Max Health: ${this.player.attributes.baseHealth}`);
            this.criticalText.setText(`Critical: ${this.player.attributes.critical} %`);
            this.fleeText.setText(`Flee: ${this.player.attributes.flee}`);
            this.hitText.setText(`Hit: ${this.player.attributes.hit}`);
        }
    }

    update() {
        this.checkButtonEnabled();
        this.setAttributesText();
        if (this.player && this.availableAttributesText)
            this.availableAttributesText.setText('Available: ' + this.player.attributes.availableStatPoints);
    }
}
