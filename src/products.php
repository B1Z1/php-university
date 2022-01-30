<?php
require_once 'boot.php';
require_once 'share/product/product.inc.php';

$productController = new ProductController();

$products = $productController->getAll();

?>

<!doctype html>
<html lang="pl">
<head>
    <?php include 'base/head.php'; ?>
    <title>Produkty</title>
</head>
<body>

<div class="container pt-6">
    <h1 class="up-text-center title">Lista produktów</h1>
</div>

<?php include 'base/footer.php'; ?>

</body>
</html>
