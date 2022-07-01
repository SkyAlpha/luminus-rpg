const { DataTypes, Model } = require('sequelize');
const { sequelize } = require('../db/DatabaseManager');

class DialogueRowModel extends Model {}

DialogueRowModel.init(
    {
        id: {
            type: DataTypes.BIGINT,
            allowNull: false,
            autoIncrement: true,
            unique: true,
            primaryKey: true,
        },
        dialogue_id: {
            type: DataTypes.BIGINT,
            allowNull: false,
            references: {
                model: 'dialogues',
                key: 'id',
            },
        },
        leftPortraitName: {
            type: DataTypes.STRING,
            allowNull: false,
            default: '',
        },
        leftName: {
            type: DataTypes.STRING,
            allowNull: false,
            default: '',
        },
        left: {
            type: DataTypes.BOOLEAN,
            allowNull: false,
            default: false,
        },
        message: {
            type: DataTypes.STRING,
            allowNull: false,
            default: '',
        },
        rightPortraitName: {
            type: DataTypes.STRING,
            allowNull: false,
            default: '',
        },
        rightName: {
            type: DataTypes.STRING,
            allowNull: false,
            default: '',
        },
        right: {
            type: DataTypes.BOOLEAN,
            allowNull: false,
            default: false,
        },
    },
    {
        sequelize,
        modelName: 'dialogue_rows',
        timestamps: false,
    }
);

module.exports = DialogueRowModel;
