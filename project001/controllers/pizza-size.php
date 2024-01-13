<?php
//root/controllers/product-type-controller.php
// root/controllers/product-type-controller.php
require_once 'connect/dbconnect.php';
require_once 'models/product-type-model.php';
require_once 'views/product-type-view.php';

class ProductTypeController {
    private $model;
    private $view;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function handleTypeRequest() {
        $typeSuccessMessage = "";
        $typeErrorMessage = "";

        // Form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newType = isset($_POST['newType']) ? $_POST['newType'] : '';

            if (!empty($newType)) {
                $result = $this->model->insertProductType($newType);

                if ($result === true) {
                    $typeSuccessMessage = "Item added successfully!";
                } elseif ($result === false) {
                    $typeErrorMessage = "Item already exists. Please choose a different type.";
                } else {
                    $typeErrorMessage = "Failed to add item. Please check your input.";
                }
            }
        }

        // Handle type deletion
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
            $typeID = $_GET['id'];

            $result = $this->model->deleteProductType($typeID);

            if ($result) {
                $typeSuccessMessage = "Item deleted successfully.";
            } else {
                $typeErrorMessage = "Failed to delete item.";
            }
        }

        // Display product types
        $types = $this->model->getAllProductTypes();
        $this->view->displayProductTypes($types, $typeSuccessMessage, $typeErrorMessage);
    }
}

?>
