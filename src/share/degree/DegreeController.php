<?php

class DegreeController {
    private readonly DegreeRepository $repository;

    public function __construct() {
        $this->repository = new DegreeRepository();
    }

    public function getById(int $id): Degree {
        $dto = $this->repository->getById($id);

        return new Degree(
            $dto['degree_id'],
            $dto['name']
        );
    }
}
