<?php

class ProductRepository extends Dbh {
    /**
     * @return mixed[]
     */
    public function getAll(): array {
        $query = 'SELECT * FROM product';

        return $this->connect()->query($query)->fetchAll();
    }
}
