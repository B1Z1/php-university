<?php
require_once 'boot.php';

if (!isset($_GET['token'])) {
    navigateTo('login');
}

require_once 'share/utils/hash/HashService.php';
require_once 'share/permissions/permissions.inc.php';
require_once 'share/user/user.inc.php';

$token = $_GET['token'];
$hashService = new HashService();
$userController = new UserController();

$credentials = $hashService->decrypt($token);
$user = $userController->getUserByCredentials($credentials[0], $token);

if (!$user) {
    navigateTo('login');
    exit();
}

?>

<!doctype html>
<html lang="pl">
<head>
    <?php include 'base/head.php'; ?>
    <title>Success page</title>
</head>
<body>

<div class="up-height-screen container is-flex is-flex-direction-column is-justify-content-center is-align-items-center">
    <h1 class="up-text-center title">Twoje zamówienie zostało złożone :)</h1>
    <a href="<?php echo getUrlWithToken('products', $token); ?>" class="button">Przejdź do produktów</a>
</div>

<?php include 'base/footer.php'; ?>

<script src="assets/js/utils/product/product-reset.js"></script>

</body>
</html>
