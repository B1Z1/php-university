<?php

class UserHobbyRepository extends Dbh {
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
