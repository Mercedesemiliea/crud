<?php
$apiUrl = 'http://localhost:3000/api/products';
$productId = $_GET['id'];
$product = json_decode(file_get_contents(filename: $apiUrl . '/' . $productId), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedProduct = [
        'id' => $productId,
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'description' => $_POST['description']
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'PUT',
            'content' => json_encode($updatedProduct),
        ],
    ];
    $context  = stream_context_create($options);
    file_get_contents($apiUrl . '/' . $productId, false, $context);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
        <br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>
        <br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea>
        <br>
        <button type="submit">Save</button>
    </form>
</body>
</html>