const express = require('express');
require('./db/DatabaseManager');
const DatabaseManager = require('./db/DatabaseManager');
const middleware = require('./middleware');

const app = express();
const port = 3000;
require('./middleware')(app);
require('./routes')(app);

//const DialogueModel = require('./models/DialogueModel');

app.get('/', async (req, res) => {
    res.send('Hello World!');
});

(async () => {
    await DatabaseManager.authenticate();
    await DatabaseManager.syncDatabase();

    app.listen(port, async () => {
        console.log(`Example app listening on port ${port}`);
        console.log(`http://localhost:${port}/`);
    });
})();
