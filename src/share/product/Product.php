<?php

class Product {
    public readonly int $id;
    public readonly string $name;
    public readonly string $description;
    public readonly float $price;

    public function __construct(
        int    $id,
        string $name,
        string $description,
        float  $price
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
}
