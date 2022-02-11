<?php

class RegistrationController {
    private readonly UserController $userController;
    private readonly UserHobbyController $userHobbyController;
    private readonly HashService $hashService;

    public function __construct() {
        $this->userController = new UserController();
        $this->userHobbyController = new UserHobbyController();
        $this->hashService = new HashService();
    }

    /**
     * @param string $name
     * @param string $surname
     * @param string $email
     * @param string $login
     * @param string $password
     * @param string $address
     * @param int $degreeId
     * @param int[] $hobbyIds
     * @return string|null
     */
    public function register(
        string      $name,
        string      $surname,
        string      $email,
        string      $login,
        string      $password,
        string      $address,
        int         $degreeId,
        array       $hobbyIds,
        Permissions $permissions = Permissions::Normal
    ): string|null {
        $encryptedPassword = $this->hashService->encrypt(array($login, $password));
        $userAdded = $this->userController->addUser(
            $name,
            $surname,
            $email,
            $login,
            $encryptedPassword,
            $address,
            $degreeId,
            $permissions
        );

        if (!$userAdded) {
            return null;
        }

        $user = $this->userController->getUserByLogin($login);

        if (!$user) {
            return null;
        }

        $userId = $user->id;
        $userHobbyAdded = $this->userHobbyController->addMultiple($userId, $hobbyIds);

        if (!$userHobbyAdded) {
            return null;
        }

        return $encryptedPassword;
    }
}
