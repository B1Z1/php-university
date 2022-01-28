<?php

if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $login = $_POST["login"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $degreeId = $_POST["degree"];
    $hobbies = $_POST["hobbies"];

    include '../repositories/Dbh.php';
    include '../repositories/UserRepository.php';
    include '../controllers/RegisterController.php';

    $signupController = new RegisterController(
        $name,
        $surname,
        $email,
        $login,
        $password,
        $address,
        $hobbies,
        $degreeId
    );

    if ($signupController->register()) {
        $signupController = null;
        header('location: ../profile');
        exit();
    }
}
