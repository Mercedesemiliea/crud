const express = require('express');
const bodyParser = require('body-parser');
const fs = require('fs');
const app = express();
const PORT = process.env.PORT || 3000;

app.use(bodyParser.json());

// Läs produkter från en JSON-fil
const readProducts = () => {
    const data = fs.readFileSync('products.json');
    return JSON.parse(data);
};

// Skriv produkter till en JSON-fil
const writeProducts = (products) => {
    fs.writeFileSync('products.json', JSON.stringify(products, null, 2));
};

// GET - Hämta alla produkter
app.get('/api/products', (req, res) => {
    const products = readProducts();
    res.json(products);
});

// POST - Skapa en ny produkt
app.post('/api/products', (req, res) => {
    const products = readProducts();
    const newProduct = req.body;
    products.push(newProduct);
    writeProducts(products);
    res.status(201).json(newProduct);
});

// PUT - Uppdatera en produkt
app.put('/api/products/:id', (req, res) => {
    const products = readProducts();
    const productId = parseInt(req.params.id);
    const updatedProduct = req.body;
    const index = products.findIndex(p => p.id === productId);
    if (index !== -1) {
        products[index] = updatedProduct;
        writeProducts(products);
        res.json(updatedProduct);
    } else {
        res.status(404).json({ message: 'Product not found' });
    }
});

// DELETE - Ta bort en produkt
app.delete('/api/products/:id', (req, res) => {
    const products = readProducts();
    const productId = parseInt(req.params.id);
    const newProducts = products.filter(p => p.id !== productId);
    writeProducts(newProducts);
    res.status(204).end();
});

app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});