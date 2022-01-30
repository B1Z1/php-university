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

<div class="container is-fullheight pt-6">
    <h1 class="up-text-center title mb-6">Lista produktów</h1>

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
                    <span class="mr-4">
                        <?php echo $product->price; ?>zł
                    </span>
                    <button class="button is-primary">Do koszyka</button>
                </div>
            </div>
        <?php } ?>
    </dl>
</div>

<?php include 'base/footer.php'; ?>

</body>
</html>
