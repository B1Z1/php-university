<?php

class HobbyRepository extends Dbh {
    public function getAll() {
        $sql = "SELECT * FROM hobby";
        $statement = $this->connect()->query($sql);

        return $statement->fetchAll();
    }
}
