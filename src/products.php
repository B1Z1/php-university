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

<div class="container is-fullheight py-6">
    <h1 class="up-text-center title mb-6">Lista książek</h1>

    <dl>
        <?php foreach ($products as $product) { ?>
            <div class="column is-half mx-auto">
                <dt class="mb-4">
                    <h4 class="subtitle">
                        <b><?php echo $product->name; ?></b>
                    </h4>
                </dt>

                <dd class="mb-4">
                    <?php echo $product->description; ?>
                </dd>

                <div class="is-flex is-align-items-center is-justify-content-end">
                    <b class="tag is-light is-medium mr-4">
                        <?php echo $product->price; ?> zł
                    </b>

                    <div class="buttons">
                        <button data-cart-add="<?php echo $product->id; ?>" class="button is-primary">Dodaj</button>
                        <button data-cart-remove="<?php echo $product->id; ?>" class="button is-danger">Usun</button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </dl>
</div>

<a href="/checkout"
   class="up-cart-button button"
   data-cart-button>
    Przejdż do podsumowania <span class="tag is-small ml-2" data-cart-counter></span>
</a>

<?php include 'base/footer.php'; ?>

<script src="assets/js/utils/product/product-storage.js" defer type="module"></script>
<script src="assets/js/cart/cart.js" defer type="module"></script>
</body>
</html>
