<?php

class UserHobbyRepository extends Dbh {
    public function getByUserId(int $userId): array {
        $query = 'SELECT hobby_id FROM user_hobby WHERE user_id = ?';
        $statement = $this->connect()->prepare($query);
        $response = array();

        try {
            if ($statement->execute(array($userId))) {
                $response = $statement->fetchAll();
            }
        } catch (Exception) {
            $statement = null;
            return $response;
        }

        $statement = null;
        return $response;
    }

    public function add(int $userId, int $hobbyId): bool {
        $query = 'INSERT INTO user_hobby (user_id, hobby_id) VALUES (?, ?)';
        $statement = $this->connect()->prepare($query);

        try {
            $statement->execute(array($userId, $hobbyId));
        } catch (Exception) {
            $statement = null;
            return false;
        }

        $statement = null;
        return true;
    }
}
