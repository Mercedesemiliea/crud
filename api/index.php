

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

 
    <link rel="stylesheet" href="/public/css/index.css">
    <title>Products</title>
</head>

<body>
    <div class="index-wrapper">


        <div class="video-background">

        </div>
        <div class="content">
            <h1>Unleash the Power of AI in Your Home.</h1>
            <p> Welcome to a world where tomorrow's technology meets today's needs. Our AI robots are designed to
                simplify your life through smart, efficient solutions that assist you with everything from household
                tasks to personal assistance. Discover how we can transform your everyday life.</p>
        </div>
        <nav class="side-nav">
            <ul>
                <li><a href="/index.php">Dashboard</a></li>
                <li><a href="/products.php">Products</a></li>
                <li><a href="/products/create">Add product</a></li>
                <li>Privacy Policy</li>
                <li>Terms of Service</li>
            </ul>
        </nav>
        <h1>Product Management</h1>
        <div class="products-container">

            <div class="products">
                <div class="form-container">
                    <h2>Create a New Product</h2>
                    <form id="create-product-form" method="POST" action="create_product.php">
                        <input type="text" id="name" name="name" placeholder="Product Name" required />
                        <input type="number" id="price" name="price" placeholder="Price" required />
                        <input type="text" id="description" name="description" placeholder="Description" required />
                        <button type="submit">Create Product</button>
                    </form>
                </div>

                <div class="product-list-container">
                    <h2>Product List</h2>
                    <ul id="product-list">
                        <?php
                        // Exempel på en array med produkter
                        $products = [
                            ['id' => 1, 'name' => 'Robot A', 'price' => 100, 'description' => 'A versatile robot.'],
                            ['id' => 2, 'name' => 'Robot B', 'price' => 200, 'description' => 'A powerful robot.'],
                            // Lägg till fler produkter här
                        ];

                        foreach ($products as $product) {
                            echo '<li>';
                            echo '<h2>' . htmlspecialchars($product['name']) . '</h2>';
                            echo '<p>Price: $' . htmlspecialchars($product['price']) . '</p>';
                            echo '<p class="product-description">' . htmlspecialchars($product['description']) . '</p>';
                            echo '<a href="product.php?id=' . $product['id'] . '" class="product-link">Buy Now</a>';
                            echo '</li>';
                        }
                        ?>
                    </ul>
                </div>


            </div>

</body>

</html>