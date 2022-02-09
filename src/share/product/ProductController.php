<?php

class ProductController {
    private readonly ProductRepository $repository;

    public function __construct() {
        $this->repository = new ProductRepository();
    }

    public function add(string $name, string $description, float $price): bool {
        return $this->repository->add($name, $description, $price);
    }

    public function edit(int $id, string $name, string $description, float $price): bool {
        return $this->repository->edit($id, $name, $description, $price);
    }

    public function delete(int $id): bool {
        return $this->repository->delete($id);
    }

    /**
     * @param int[] $productIds
     * @return Product[]
     */
    public function getByIds(array $productIds): array {
        $dtos = $this->repository->getByIds($productIds);

        return $this->fromDtos(...$dtos);
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
