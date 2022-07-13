const DialogueModel = require('../models/DialogueModel');
const DialogueRowModel = require('../models/DialogueRowModel');

const router = require('express').Router();

router.get(`/dialogues`, async (req, res) => {
    const response = await DialogueModel.findAll({
        include: {
            model: DialogueRowModel,
            as: 'chat',
            order: [['id', 'ASC']],
            separate: true,
        },
    });

    res.json(response);
});

router.post(`/dialogues/create-parent`, async (req, res) => {
    const response = await DialogueModel.findOrCreate({
        id: req.body.id,
        name: req.body.name,
    });

    res.json(response);
});

router.post(`/dialogues/create-row`, async (req, res) => {
    const response = await DialogueModel.findOrCreate({
        id: req.body.id,
        name: req.body.name,
    });

    res.json(response);
});

module.exports = router;
