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
    <title>Koszyk</title>
</head>
<body>

<div class="container is-fullheight py-6">

</div>

<?php include 'base/footer.php'; ?>

<script src="assets/js/cart/cart.js" defer type="module"></script>
</body>
</html>
