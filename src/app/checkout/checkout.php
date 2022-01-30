<?php

require_once '../../boot.php';

if (!isset($_POST['submit'])) {
    navigateTo('');
    exit();
}

require_once 'share/product/product.inc.php';
require_once 'app/checkout/checkout.inc.php';

$checkoutController = new CheckoutController();

$email = $_POST["email"];
$address = $_POST["address"];
$productsCount = json_decode($_POST["products"]);
$productIds = array_map(fn($productCount): int => $productCount[0], $productsCount);

$products = $checkoutController->getProductsByProductIds($productIds);

$messageContent = "Dziękujemy za wysłanie zamówienia, wysłamy na $address w najkrótszym czasie\n";

foreach ($products as $product) {
    $messageContent .= "$product->name, ";
}

mail($email, 'Twoje zamówienie zostało złożone', $messageContent);

navigateTo('success');
