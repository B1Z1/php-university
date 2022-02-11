<?php

class DegreeRepository extends Dbh {
    public function getById(int $id): mixed {
        $query = "SELECT * FROM degree WHERE id = ?";
        $statement = $this->connect()->prepare($query);
        $response = null;
        try {
            if ($statement->execute(array($id))) {
                $response = $statement->fetch();
            }
        } catch (Exception) {
            $statement = null;
            return $response;
        }

        $statement = null;
        return $response;
    }

    public function getAll(): mixed {
        $query = "SELECT * FROM degree";

        return $this->connect()->query($query)->fetchAll();
    }
}
