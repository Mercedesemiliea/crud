// Import the Express module
const path = require('path');
const express = require('express');


const dotenv = require('dotenv');
dotenv.config({ path: path.resolve(__dirname, '.env') });




// Create an instance of Express
const app = express();

// Define a route handler for the root URL ('/')
app.get('/', (req, res) => {
    let getData = async function () {
        const [rows, fields] = await pool.query('SELECT * FROM test');
        res.send(JSON.stringify(rows) + " " + JSON.stringify(fields));
    }
    getData();
});


// Start the server on port 3000
const port = 3000;
app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`);
});


run();