<?php

class ProductRepository extends Dbh {
    public function add(string $name, string $description, float $price): bool {
        $query = 'INSERT INTO product (name, description, price) VALUES (?, ?, ?)';
        $statement = $this->connect()->prepare($query);

        try {
            $statement->execute(array($name, $description, $price));
        } catch (Exception) {
            $statement = null;
            return false;
        }

        $statement = null;
        return true;
    }

    public function edit(int $id, string $name, string $description, float $price): bool {
        $query = 'UPDATE product SET name = ?, description = ?, price = ? WHERE id = ?';
        $statement = $this->connect()->prepare($query);

        try {
            $statement->execute(array($name, $description, $price, $id));
        } catch (Exception) {
            $statement = null;
            return false;
        }

        $statement = null;
        return true;
    }

    /**
     * @param int[] $ids
     * @return mixed[]
     */
    public function getByIds(array $ids): array {
        $convertedIds = implode(', ', array_map(fn($id): string => '?', $ids));
        $query = "SELECT * FROM product WHERE id IN ($convertedIds)";
        $statement = $this->connect()->prepare($query);
        $response = array();

        try {
            if ($statement->execute(array(...$ids))) {
                $response = $statement->fetchAll();
            }
        } catch (Exception) {
            $statement = null;
            return $response;
        }

        $statement = null;
        return $response;
    }

    /**
     * @return mixed[]
     */
    public function getAll(): array {
        $query = 'SELECT * FROM product';

        return $this->connect()->query($query)->fetchAll();
    }
}
