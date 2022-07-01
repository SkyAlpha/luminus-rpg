const Sequelize = require('sequelize');

/**
 * Class responsible for managing the database.
 * @class
 */
class DatabaseManager {
    constructor() {
        this.sequelize = new Sequelize('postgres://luminus:luminus@localhost:15432/luminusdb');
    }

    /**
     * Connects to the Database.
     */
    async authenticate() {
        try {
            await this.sequelize.authenticate();
            console.log('Connection has been established successfully.');
        } catch (error) {
            console.error('Unable to connect to the database:', error);
        }
    }

    async syncDatabase() {
        try {
            const DialogueModel = require('../models/DialogueModel');
            const DialogueRowModel = require('../models/DialogueRowModel');
            await this.sequelize.sync();
            console.log('Database synced.');
        } catch (error) {
            console.error('Unable to sync database:', error);
        }
    }
}

module.exports = new DatabaseManager();
