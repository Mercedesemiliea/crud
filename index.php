<?php
$apiUrl = 'http://localhost:3000/api/products';
$json = file_get_contents($apiUrl);
$products = json_decode($json, true);
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produkter</title>
</head>
<body>
    <h1>Produkter</h1>
    <ul>
        <?php foreach ($products as $product): ?>
            <li><?php echo $product['name']; ?> - <?php echo $product['price']; ?> SEK</li>
        <?php endforeach; ?>
    </ul>

    <form id="product-form">
    <input type="text" id="name" placeholder="Namn" required>
    <input type="number" id="price" placeholder="Pris" required>
    <button type="submit">Lägg till produkt</button>
</form>

<script>
    document.getElementById('product-form').addEventListener('submit', function(e) {
        e.preventDefault();

        const name = document.getElementById('name').value;
        const price = document.getElementById('price').value;

        fetch('http://localhost:3000/api/products', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ name, price })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Produkt tillagd:', data);
            window.location.reload(); // Ladda om sidan för att uppdatera listan
        })
        .catch(error => console.error('Error:', error));
    });
</script>

</body>
</html>
