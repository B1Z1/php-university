<?php

class HobbyRepository extends Dbh {
    /**
     * @param int ...$ids
     * @return mixed[]
     */
    public function getByIds(int ...$ids): array {
        $convertedIds = implode(', ', array_map(fn($id): string => '?', $ids));
        $query = "SELECT * FROM hobby WHERE hobby_id IN ($convertedIds)";
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

    public function getAll(): array {
        $query = "SELECT * FROM hobby";
        $statement = $this->connect()->query($query);
        $response = $statement->fetchAll();

        $statement = null;
        return $response;
    }
}
