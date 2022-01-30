<?php

class HobbyController {
    private readonly HobbyRepository $repository;

    public function __construct() {
        $this->repository = new HobbyRepository();
    }

    public function getAll() {
        return $this->repository->getAll();
    }
}
