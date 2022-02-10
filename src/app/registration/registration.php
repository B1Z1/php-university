<?php

require_once '../../boot.php';

if (!isset($_POST['submit'])) {
    navigateTo('');
    exit();
}

require_once 'share/utils/hash/HashService.php';
require_once 'share/user/user.inc.php';
require_once 'share/user-hobby/user-hobby.inc.php';
require_once 'app/registration/registration.inc.php';

$name = $_POST["name"];
$surname = $_POST["surname"];
$email = $_POST["email"];
$login = $_POST["login"];
$password = $_POST["password"];
$address = $_POST["address"];
$degreeId = $_POST["degree"];
$hobbies = $_POST["hobbies"];

$signupController = new RegistrationController();

$token = $signupController->register(
    $name,
    $surname,
    $email,
    $login,
    $password,
    $address,
    $degreeId,
    $hobbies
);

if ($token) {
    $encoded = urlencode($token);

    navigateTo("profile?token=$encoded");
} else {
    navigateTo('registration?error=USER_NOT_ADDED');
}

exit();
