const { DataTypes, Model } = require('sequelize');
const { sequelize } = require('../db/DatabaseManager');
const DialogueRowModel = require('./DialogueRowModel');

class DialogueModel extends Model {}

DialogueModel.init(
    {
        id: {
            type: DataTypes.BIGINT,
            allowNull: false,
            autoIncrement: true,
            unique: true,
            primaryKey: true,
        },
        name: {
            type: DataTypes.STRING,
            allowNull: false,
            default: '',
        },
    },
    {
        sequelize,
        modelName: 'dialogues',
        timestamps: true,
    }
);

DialogueModel.hasMany(DialogueRowModel, { as: 'chat', foreignKey: 'dialogue_id' });

module.exports = DialogueModel;
