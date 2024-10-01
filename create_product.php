<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = [
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    'price' => $_POST['price'],
  ];

  $ch = curl_init('http://localhost:3000/api/products');
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
  curl_exec($ch);
  curl_close($ch);
}
?>
<form method="post">
  <label for="id">ID:</label>
  <input type="text" name="id" required><br>
  <label for="name">Name:</label>
  <input type="text" name="name" required><br>
  <label for="price">Price:</label>
  <input type="text" name="price" required><br>
  <button type="submit">Create Product</button>
</form>
