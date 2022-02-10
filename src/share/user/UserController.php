<?php

class UserController {
    private readonly UserRepository $repository;

    public function __construct() {
        $this->repository = new UserRepository();
    }

    public function getUserByCredentials(string $login, string $password): User|null {
        $user = $this->repository->getUserByCredentials($login, $password);

        if (!$user) {
            return null;
        }

        return $this->fromDTO($user);
    }

    public function getUserByLogin(string $login): User|null {
        $user = $this->repository->getUserByLogin($login);

        if (!$user) {
            return null;
        }

        return $this->fromDTO($user);
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

    private function fromDTO(mixed $dto): User {
        return new User(
            $dto['id'],
            $dto['name'],
            $dto['surname'],
            $dto['email'],
            $dto['login'],
            $dto['password'],
            $dto['address'],
            $dto['degree_id']
        );
    }
}
