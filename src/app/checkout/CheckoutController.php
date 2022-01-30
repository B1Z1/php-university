<?php

class CheckoutController {
    private readonly ProductController $productController;

    public function __construct() {
        $this->productController = new ProductController();
    }

    /**
     * @param int[] $productIds
     * @return Product[]
     */
    public function getProductsByProductIds(array $productIds): array {
        return $this->productController->getByIds($productIds);
    }
}
