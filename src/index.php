<?php
require_once 'boot.php';
require_once 'share/utils/hash/HashService.php';
require_once 'share/permissions/permissions.inc.php';
require_once 'share/user/user.inc.php';


if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $hashService = new HashService();
    $userController = new UserController();
    $credentials = $hashService->decrypt($token);
    $user = $userController->getUserByCredentials($credentials[0], $token);

    if ($user) {
        navigateTo(getUrlWithToken('profile', $token));
        exit();
    }
}

?>

<!doctype html>
<html lang="pl">
<head>
    <?php include 'base/head.php'; ?>
    <title>Home page</title>
</head>
<body>

<div class="up-height-screen container is-flex is-flex-direction-column is-justify-content-center is-align-items-center">
    <h1 class="title">Witamy w ukrytym sklepie ksiażek</h1>

    <p class="mb-4">Zaloguj się by zobaczyć naszą listę</p>

    <div class="buttons">
        <a class="button" href="/login">Logowanie</a>
        <a class="button" href="/registration">Rejestracja</a>
    </div>
</div>

<?php include 'base/footer.php'; ?>

</body>
</html>
