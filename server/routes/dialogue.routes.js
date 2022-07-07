const DialogueModel = require('../models/DialogueModel');
const DialogueRowModel = require('../models/DialogueRowModel');

const router = require('express').Router();

router.get(`/dialogues`, async (req, res) => {
    const response = await DialogueModel.findAll({
        include: {
            model: DialogueRowModel,
            as: 'chat',
            order: [['chat.id', 'ASC']],
        },
    });

    res.json(response);
});

module.exports = router;
