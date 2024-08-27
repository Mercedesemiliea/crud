const express = require('express');
const path = require('path');
const app = express();
const port = process.env.PORT || 3000;

const productRouter = require('./routes/productRouter');

app.use(express.json());
app.use(express.urlencoded({ extended: true }));

app.use('/products', productRouter);

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});

module.exports = app;
