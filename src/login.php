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
    <title>Rejestracja</title>
</head>
<body>

<div class="container is-full py-6">
    <div class="column is-half mx-auto">
        <h1 class="up-text-center title">
            Logowanie
        </h1>

        <form action="app/login/login.php" method="post">
            <div class="field">
                <label for="login" class="label">Login:</label>
                <input id="login"
                       class="input"
                       type="text"
                       name="login"
                       placeholder="Wpisz swój login..."
                       minlength="4"
                       required>
            </div>

            <div class="field">
                <label for="password" class="label">Hasło:</label>
                <input id="password"
                       class="input"
                       type="password"
                       name="password"
                       minlength="4"
                       placeholder="Wpisz swoje hasło..."
                       required>
            </div>

            <button type="submit"
                    name="submit"
                    class="is-block mx-auto button">
                Zaloguj się
            </button>
        </form>
    </div>
</div>

<?php include 'base/footer.php'; ?>

</body>
</html>
