<?php

class DegreeController {
    private readonly DegreeRepository $repository;

    public function __construct() {
        $this->repository = new DegreeRepository();
    }

    /**
     * @return Degree[]
     */
    public function getAll(): array {
        $dtos = $this->repository->getAll();

        return $this->fromDtos($dtos);
    }

    public function getById(int $id): Degree {
        $dto = $this->repository->getById($id);

        return $this->fromDto($dto);
    }

    /**
     * @return Degree[]
     */
    private function fromDtos(mixed $dtos): array {
        return array_map(fn($dto): Degree => $this->fromDto($dto), $dtos);
    }

    private function fromDto(mixed $dto): Degree {
        return new Degree(
            $dto['id'],
            $dto['name']
        );
    }
}
