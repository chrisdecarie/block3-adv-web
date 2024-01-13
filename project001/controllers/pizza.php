<?php
//root/controllers/product-controller.php

require_once 'models/product-model.php';
require_once 'views/product-view.php';

class ProductController {
    private $model;
    private $view;

    public function __construct($productModel, $productView) {
        $this->model = $productModel;
        $this->view = $productView;
    }

    public function handleProductRequest() {
        $successMessage = "";
        $errorMessage = "";

        // Form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryID = $_POST['categoryID'];
            $brandID = $_POST['brandID'];
            $productName = $_POST['productName'];
            $typeID = $_POST['typeID'];

            $existingProduct = $this->model->getProductByName($productName);

            if (!$existingProduct) {
                $result = $this->model->addProduct($categoryID, $brandID, $productName, $typeID);

                if ($result === true) {
                    $successMessage = "Item added successfully!";
                } else {
                    $errorMessage = "Failed to add item. Please check your input.";
                }
            } else {
                $errorMessage = "Item with the same name already exists.";
            }
        }

        // Handle product deletion
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
            $productID = $_GET['id'];

            $result = $this->model->deleteProduct($productID);

            if ($result) {
                $successMessage = "Item deleted successfully.";
            } else {
                $errorMessage = "Failed to delete item.";
            }
        }

        // Display products
        $products = $this->model->getAllProducts();
        $categories = $this->model->getAllCategories();
        $brands = $this->model->getAllBrands();
        $types = $this->model->getAllTypes();

        $this->view->displayProducts($products, $categories, $brands, $types, $successMessage, $errorMessage);
    }
}

?>
