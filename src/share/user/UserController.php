<?php

class UserController {
    private readonly UserRepository $repository;

    public function __construct() {
        $this->repository = new UserRepository();
    }

    public function getUserByLogin(string $login): User|null {
        $user = $this->repository->getUserByLogin($login);

        if (!$user) {
            return null;
        }

        return new User(
            $user['user_id'],
            $user['name'],
            $user['surname'],
            $user['email'],
            $user['login'],
            $user['password'],
            $user['address'],
            $user['degree_id']
        );
    }

    public function addUser(
        string $name,
        string $surname,
        string $email,
        string $login,
        string $password,
        string $address,
        int    $degreeId
    ): bool {
        return $this->repository->addUser($name, $surname, $email, $login, $password, $address, $degreeId);
    }
}
