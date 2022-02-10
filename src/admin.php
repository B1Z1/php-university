<?php

require_once 'boot.php';

if (!isset($_GET['token'])) {
    navigateTo('login');
}

require_once 'share/utils/hash/HashService.php';
require_once 'share/user/user.inc.php';
require_once 'share/product/product.inc.php';

$token = $_GET['token'];
$hashService = new HashService();
$userController = new UserController();

$credentials = $hashService->decrypt($token);
$user = $userController->getUserByCredentials($credentials[0], $token);

if (!$user) {
    navigateTo('login');
    exit();
}

$productController = new ProductController();

$products = $productController->getAll();

function renderBottomProduct(Product $product) { ?>
    <span class="tag mr-4"><?php echo $product->price; ?>zł</span>
    <button data-admin-product-edit="<?php echo $product->id; ?>" class="button is-warning mr-2">Edytuj</button>
    <button data-admin-product-cancel="<?php echo $product->id; ?>" class="button is-warning is-hidden mr-2">Powrót
    </button>
    <form action="app/admin/admin-delete-product.php"
          method="POST">
        <input type="hidden" name="productId" value="<?php echo $product->id; ?>">
        <button class="button is-danger" type="submit" name="submit">Usun</button>
    </form>
<?php } ?>

<!doctype html>
<html lang="pl">
<head>
    <?php include 'base/head.php'; ?>
    <title>Admin</title>
</head>
<body>

<div class="up-height-screen container">
    <div class="column is-half mx-auto">
        <?php renderProductList($products, fn(Product $product) => renderBottomProduct($product)); ?>

        <form method="POST" action="app/admin/admin-add-product.php">
            <div class="field">
                <input id="name"
                       class="input"
                       type="text"
                       name="name"
                       placeholder="Nazwa produktu..."
                       minlength="4"
                       required>
            </div>

            <div class="field">
                <textarea id="description"
                          class="textarea"
                          type="text"
                          name="description"
                          placeholder="Opis produktu"
                          minlength="40"
                          required></textarea>
            </div>

            <div class="field">
                <input id="price"
                       class="input"
                       type="number"
                       name="price"
                       placeholder="Cena produktu..."
                       required>
            </div>

            <button class="button" type="submit" name="submit">Dodaj</button>
        </form>
    </div>
</div>

<template data-admin-edit-form-template>
    <form data-admin-edit-form
          class="my-4"
          method="POST"
          action="app/admin/admin-edit-product.php">
        <div class="field">
            <input id="name"
                   class="input"
                   type="text"
                   name="name"
                   placeholder="Nazwa produktu..."
                   minlength="4"
                   required>
        </div>

        <div class="field">
                <textarea id="description"
                          class="textarea"
                          type="text"
                          name="description"
                          placeholder="Opis produktu"
                          minlength="40"
                          required></textarea>
        </div>

        <div class="field">
            <input id="price"
                   class="input"
                   type="number"
                   name="price"
                   placeholder="Cena produktu..."
                   required>
        </div>

        <input type="hidden" name="productId" value=""/>

        <button class="button" type="submit" name="submit">Edytuj</button>
    </form>
</template>

<?php include 'base/footer.php'; ?>

<script src="assets/js/admin/admin.js" type="module"></script>

</body>
</html>
