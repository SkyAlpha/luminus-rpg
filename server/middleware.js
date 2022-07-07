module.exports = (app) => {
    app.use(
        require('cors')({
            origin: `*`,
        })
    );
};
