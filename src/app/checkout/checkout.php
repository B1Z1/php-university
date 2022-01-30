<?php

require_once '../../boot.php';

if (!isset($_GET['productIds'])) {
    echo json_encode(array('error' => 'No products'));
    exit();
}

require_once 'share/product/product.inc.php';
require_once 'app/checkout/checkout.inc.php';

$checkoutController = new CheckoutController();

$productIds = $_GET['productIds'];
$products = $checkoutController->getProductsByProductIds($productIds);

echo json_encode($products);
