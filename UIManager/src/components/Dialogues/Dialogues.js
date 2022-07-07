import axios from 'axios';

export default {
    name: 'Dialogues',
    data() {
        return {
            dialogues: [],
        };
    },
    methods: {
        async getDialogues() {
            const { data } = await axios.get('http://localhost:3000/api/v1/dialogues');
            this.dialogues = data;
        },
    },
    async mounted() {
        await this.getDialogues();
    },
};
