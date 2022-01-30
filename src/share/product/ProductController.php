<?php

class ProductController {
    private readonly ProductRepository $repository;

    public function __construct() {
        $this->repository = new ProductRepository();
    }

    /**
     * @return Product[]
     */
    public function getAll(): array {
        $dtos = $this->repository->getAll();

        return $this->fromDtos(...$dtos);
    }

    /**
     * @param mixed ...$dtos
     * @return Product[]
     */
    private function fromDtos(mixed ...$dtos): array {
        return array_map(fn($dto): Product => $this->fromDto($dto), $dtos);
    }

    private function fromDto(mixed $dto): Product {
        return new Product(
            $dto['id'],
            $dto['name'],
            $dto['description'],
            $dto['price']
        );
    }
}
