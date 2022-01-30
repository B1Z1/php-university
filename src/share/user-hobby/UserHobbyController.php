<?php

class UserHobbyController extends Dbh {
    private readonly UserHobbyRepository $repository;

    public function __construct() {
        $this->repository = new UserHobbyRepository();
    }

    public function addMultiple(int $userId, int ...$hobbyIds): bool {
        foreach ($hobbyIds as $hobbyId) {
            $this->add($userId, $hobbyId);
        }

        return true;
    }

    public function add(int $userId, int $hobbyId): bool {
        return $this->repository->add($userId, $hobbyId);
    }
}
