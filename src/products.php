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

?>

<?php function renderBottomProduct(Product $product): void { ?>
    <b class="tag is-light is-medium mr-4">
        <?php echo $product->price; ?> zł
    </b>

    <div class="buttons">
        <button data-cart-add="<?php echo $product->id; ?>" class="button is-primary">Dodaj</button>
        <button data-cart-remove="<?php echo $product->id; ?>" class="button is-danger">Usun</button>
    </div>
<?php } ?>

<!doctype html>
<html lang="pl">
<head>
    <?php include 'base/head.php'; ?>
    <title>Produkty</title>
</head>
<body>

<div class="container is-fullheight py-6">
    <div class="column is-half mx-auto">
        <h1 class="up-text-center title mb-6">Lista książek</h1>

        <?php renderProductList($products, fn(Product $product) => renderBottomProduct($product)); ?>
    </div>
</div>

<a href="<?php echo getUrlWithToken('/checkout', $token); ?>"
   class="up-cart-button button"
   data-cart-button>
    Przejdż do podsumowania <span class="tag is-small ml-2" data-cart-counter></span>
</a>

<?php include 'base/footer.php'; ?>

<script src="assets/js/utils/product/product-storage.js" defer type="module"></script>
<script src="assets/js/cart/cart.js" defer type="module"></script>
</body>
</html>
