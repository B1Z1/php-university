<?php

require_once '../../boot.php';

if (!isset($_POST['submit'])) {
    navigateTo('');
    exit();
}

require_once 'share/user/user.inc.php';
require_once 'share/user-hobby/user-hobby.inc.php';

require_once 'app/register/RegistrationController.php';

$name = $_POST["name"];
$surname = $_POST["surname"];
$email = $_POST["email"];
$login = $_POST["login"];
$password = $_POST["password"];
$address = $_POST["address"];
$degreeId = $_POST["degree"];
$hobbies = $_POST["hobbies"];

$signupController = new RegistrationController();

$userLogin = $signupController->register(
    $name,
    $surname,
    $email,
    $login,
    $password,
    $address,
    $degreeId,
    ...$hobbies
);

if ($userLogin) {
    navigateTo("profile?userLogin=$userLogin");
} else {
    navigateTo('registration?error=USER_NOT_ADDED');
}

exit();
