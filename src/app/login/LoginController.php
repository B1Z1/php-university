<?php

class LoginController {
    private readonly UserController $userController;
    private readonly HashService $hashService;

    public function __construct() {
        $this->userController = new UserController();
        $this->hashService = new HashService();
    }

    public function login(string $login, string $password): string|null {
        $encryptedPassword = $this->hashService->encrypt(array($login, $password));
        $user = $this->userController->getUserByCredentials($login, $encryptedPassword);

        if (!$user) {
            return null;
        }

        return $encryptedPassword;
    }
}
