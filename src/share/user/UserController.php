<?php

class UserController {
    private readonly UserRepository $repository;

    public function __construct() {
        $this->repository = new UserRepository();
    }

    public function getUserByLogin(string $login) {
        return $this->repository->getUserByLogin($login);
    }

    public function addUser(
        string $name,
        string $surname,
        string $email,
        string $login,
        string $password,
        string $address,
        int    $degreeId
    ) {
        return $this->repository->addUser($name, $surname, $email, $login, $password, $address, $degreeId);
    }
}
