const ApiRoutes = require('express').Router();
const { API_PREFIX } = require('./consts');
const DialogueRoutes = require('./routes/dialogue.routes');

ApiRoutes.use(DialogueRoutes);

module.exports = (app) => {
    app.use(API_PREFIX, ApiRoutes);
};
