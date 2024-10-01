<?php
$apiUrl = 'http://localhost:3000/api/products';
$products = json_decode(file_get_contents($apiUrl), true);

if ($_GET['format'] === 'xml') {
    header('Content-Type: application/xml');
    $xml = new SimpleXMLElement('<products/>');
    foreach ($products as $product) {
        $productNode = $xml->addChild('product');
        $productNode->addChild('id', $product['id']);
        $productNode->addChild('name', $product['name']);
        $productNode->addChild('price', $product['price']);
        $productNode->addChild('description', $product['description']);
    }
    echo $xml->asXML();
} elseif ($_GET['format'] === 'csv') {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=products.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['ID', 'Name', 'Price', 'Description']);
    foreach ($products as $product) {
        fputcsv($output, $product);
    }
    fclose($output);
}
?>