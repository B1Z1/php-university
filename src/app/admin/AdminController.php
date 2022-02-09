<?php

class AdminController {

    private readonly ProductController $productController;

    public function __construct() {
        $this->productController = new ProductController();
    }

    public function addProduct(string $name, string $description, float $price): bool {
        return $this->productController->add($name, $description, $price);
    }

    public function editProduct(int $id, string $name, string $description, float $price): bool {
        return $this->productController->edit($id, $name, $description, $price);
    }
}
