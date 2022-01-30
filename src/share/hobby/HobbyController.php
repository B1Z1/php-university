<?php

class HobbyController {
    private readonly HobbyRepository $repository;
    private readonly UserHobbyController $userHobbyController;


    public function __construct() {
        $this->repository = new HobbyRepository();
        $this->userHobbyController = new UserHobbyController();
    }

    /**
     * @param int $userId
     * @return Hobby[]
     */
    public function getByUserId(int $userId): array {
        $ids = $this->userHobbyController->getByUserId($userId);
        $dtos = $this->repository->getByIds($ids);

        return $this->fromDtos($dtos);
    }

    /**
     * @return Hobby[]
     */
    public function getAll(): array {
        $dtos = $this->repository->getAll();

        return $this->fromDtos($dtos);
    }

    /**
     * @param array $dtos
     * @return Hobby[]
     */
    private function fromDtos(mixed $dtos): array {
        return array_map(fn($dto): Hobby => $this->fromDto($dto), $dtos);
    }

    /**
     * @param mixed $dto
     * @return Hobby
     */
    private function fromDto(mixed $dto): Hobby {
        return new Hobby(
            $dto['id'],
            $dto['name']
        );
    }
}
