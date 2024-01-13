<?php
//root/controllers/product-brand-controller.php
require_once 'connect/dbconnect.php';
require_once 'models/product-brand-model.php';
require_once 'views/product-brand-view.php';
class ProductBrandController {
    private $model;
    private $view;

    public function __construct($productBrandModel, $productBrandView) { 
        $this->model = $productBrandModel;
        $this->view = $productBrandView;
    }

    public function handleBrandRequest(){
        $brandSuccessMessage = "";
        $brandErrorMessage = "";

        // Form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newBrand = isset($_POST['newBrand']) ? $_POST['newBrand'] : '';

            if (!empty($newBrand)) {
                $result = $this->model->insertBrand($newBrand);

                if ($result === true) {
                    $brandSuccessMessage = "Item added successfully!";
                } elseif ($result === false) {
                    $brandErrorMessage = "Item already exists. Please choose a different item.";
                } else {
                    $brandErrorMessage = "Failed to add item. Please check your input.";
                }
            }
        }

        // Handle brand deletion
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
            $brandID = $_GET['id'];

            $result = $this->model->deleteBrand($brandID);

            if ($result) {
                $brandSuccessMessage = "Item deleted successfully.";
            } else {
                $brandErrorMessage = "Failed to delete brand.";
            }
        }

        // Display brands
        $brands = $this->model->getAllBrands();
        $this->view->displayBrands($brands, $brandSuccessMessage, $brandErrorMessage);
    }
}

?>
