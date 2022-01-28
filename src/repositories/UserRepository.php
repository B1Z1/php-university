<?php

class UserRepository extends Dbh {
    public function addUser(
        $name,
        $surname,
        $email,
        $login,
        $password,
        $address,
        $degreeId
    ) {
        $query = 'INSERT INTO person (name, surname, email, login, password, address, degree_id) VALUES (?, ?, ?, ?, ?, ?, ?)';
        $statement = $this->connect()->prepare($query);
        $response = $statement->execute(array($name, $surname, $email, $login, $password, $address, $degreeId));

        $statement = null;

        if (!$response) {
            return null;
        }

        return $response;
    }
}
