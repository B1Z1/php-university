<!doctype html>
<html lang="pl">
<head>
    <?php include 'base/head.php'; ?>
    <title>Koszyk</title>
</head>
<body>

<div class="container is-fullheight py-6">
    <h1 class="up-text-center title">Lista zakupów</h1>

    <div class="column is-one-third mx-auto">
        <ul data-checkout-container></ul>

        <p>
            Razem:
            <span class="tag is-medium ml-2">
                <b>
                    <span data-checkout-summary></span>
                    zł
                </b>
            </span>
        </p>
    </div>
</div>

<?php include 'base/footer.php'; ?>

<script src="assets/js/utils/product/product-storage.js" defer type="module"></script>
<script src="assets/js/checkout/checkout.js" defer type="module"></script>
</body>
</html>
