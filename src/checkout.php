<!doctype html>
<html lang="pl">
<head>
    <?php include 'base/head.php'; ?>
    <title>Koszyk</title>
</head>
<body>

<div class="container is-fullheight py-6">
    <div class="column is-half mx-auto">
        <h1 class="up-text-center mb-6 title">Lista zakupów</h1>

        <ul data-checkout-container class="mb-6"></ul>

        <p class="up-text-end mb-4">
            Razem:
            <span class="tag is-medium ml-2">
                <b>
                    <span data-checkout-summary></span>
                    zł
                </b>
            </span>
        </p>

        <form class="is-flex is-justify-content-space-between" action="app/checkout/checkout.php" method="POST">
            <div class="field mr-4">
                <input id="email"
                       class="input"
                       type="email"
                       name="email"
                       placeholder="Wpisz swój email..."
                       required>
            </div>

            <div class="field mr-4">
                <input id="address"
                       class="input"
                       type="text"
                       name="address"
                       placeholder="Wpisz swój adres..."
                       required>
            </div>

            <input data-checkout-products type="hidden" name="products"/>

            <button class="button" type="submit" name="submit">Zamów</button>
        </form>
    </div>
</div>

<?php include 'base/footer.php'; ?>

<script src="assets/js/utils/product/product-storage.js" defer type="module"></script>
<script src="assets/js/checkout/checkout.js" defer type="module"></script>
</body>
</html>
