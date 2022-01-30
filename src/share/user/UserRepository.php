<?php

class UserRepository extends Dbh {
    public function getUserByLogin(string $login): mixed {
        $query = 'SELECT * FROM user WHERE login LIKE ?';
        $statement = $this->connect()->prepare($query);

        $statement->execute(array($login));

        return $statement->fetch();
    }

    public function addUser(
        string $name,
        string $surname,
        string $email,
        string $login,
        string $password,
        string $address,
        int    $degreeId
    ): bool {
        $query = 'INSERT INTO user (name, surname, email, login, password, address, degree_id) VALUES (?, ?, ?, ?, ?, ?, ?)';
        $statement = $this->connect()->prepare($query);

        try {
            $statement->execute(array($name, $surname, $email, $login, $password, $address, $degreeId));
        } catch (Exception) {
            $statement = null;
            return false;
        }

        $statement = null;
        return true;
    }
}
