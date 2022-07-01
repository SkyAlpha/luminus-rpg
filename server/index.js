const express = require('express');
require('./db/DatabaseManager');
const DatabaseManager = require('./db/DatabaseManager');
const DialogueModel = require('./models/DialogueModel');
const DialogueRowModel = require('./models/DialogueRowModel');

const app = express();
const port = 3000;

//const DialogueModel = require('./models/DialogueModel');

app.get('/', async (req, res) => {
    const response = await DialogueModel.findAll({
        include: {
            model: DialogueRowModel,
            as: 'chat',
            order: [['chat.id', 'ASC']],
        },
    });

    res.json(response);
});

app.get('/add', async (req, res) => {});

(async () => {
    await DatabaseManager.authenticate();
    await DatabaseManager.syncDatabase();

    app.listen(port, async () => {
        console.log(`Example app listening on port ${port}`);
        console.log(`http://localhost:${port}/`);
    });
})();
