<?php

class RegistrationController {
    private UserController $userController;
    private UserHobbyController $userHobbyController;

    public function __construct() {
        $this->userController = new UserController();
        $this->userHobbyController = new UserHobbyController();
    }

    public function register(
        string $name,
        string $surname,
        string $email,
        string $login,
        string $password,
        string $address,
        int    $degreeId,
        int    ...$hobbies
    ): string|null {
        $userAdded = $this->userController->addUser($name, $surname, $email, $login, $password, $address, $degreeId);

        if (!$userAdded) {
            return null;
        }

        $user = $this->userController->getUserByLogin($login);

        if (!$user) {
            return null;
        }

        $userId = $user->id;
        $userHobbyAdded = $this->userHobbyController->addMultiple($userId, ...$hobbies);

        if (!$userHobbyAdded) {
            return null;
        }

        return $user->login;
    }
}
