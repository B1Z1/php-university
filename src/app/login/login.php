<?php

require_once '../../boot.php';

if (!isset($_POST['submit'])) {
    navigateTo('');
    exit();
}

require_once 'share/utils/hash/HashService.php';
require_once 'share/user/user.inc.php';
require_once 'app/login/login.inc.php';

$login = $_POST["login"];
$password = $_POST["password"];

$loginController = new LoginController();

$token = $loginController->login($login, $password);

if ($token) {
    $encoded = urlencode($token);

    navigateTo("profile?token=$encoded");
} else {
    navigateTo('login?error=USER_NOT_LOGGED_IN');
}

exit();
