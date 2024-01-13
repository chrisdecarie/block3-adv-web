<?php
//root/controllers/product-category-controller.php
require_once 'connect/dbconnect.php';
require_once 'models/product-category-model.php';
require_once 'views/product-category-view.php';

class ProductCategoryController {
    private $model;
    private $view;

    public function __construct($productCategoryModel, $productCategoryView) {
        $this->model = $productCategoryModel;
        $this->view = $productCategoryView;
    }

    public function handleCategoryRequest(){
        // Form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newCategory = isset($_POST['newCategory']) ? $_POST['newCategory'] : '';

            if (!empty($newCategory)) {
                $result = $this->model->insertCategory($newCategory);

                if ($result === false) {
                    $categoryAddErrorMessage = "Item already exists. Please choose a different category.";
                } elseif ($result === null) {
                    $categoryAddErrorMessage = "Failed to add item. Please check your input.";
                }
            }
        }

        // Handle category deletion
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
            $categoryID = $_GET['id'];

            $result = $this->model->deleteCategory($categoryID);

            if ($result === null) {
                $categoryDeleteErrorMessage = "Failed to delete item.";
            }
        }

        // Display product categories without success and error messages
        $categories = $this->model->getAllCategories();
        $this->view->displayCategories($categories, null, null);
    }
}
?>
