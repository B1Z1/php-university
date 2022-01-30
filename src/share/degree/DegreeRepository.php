<?php

class DegreeRepository extends Dbh {
    public function getById(int $id): mixed {
        $query = "SELECT * FROM degree WHERE degree_id = ?";
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
}
