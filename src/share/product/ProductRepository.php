<?php

class ProductRepository extends Dbh {
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
