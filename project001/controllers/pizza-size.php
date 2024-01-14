<?php
//root/controllers/pizza-size-controller.php
require_once 'connect/dbconnect.php';
require_once 'models/pizza-size-model.php';
require_once 'views/pizza-size-view.php';

class PizzaSizeController {
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
                $result = $this->model->insertPizzaSize($newType);

                if ($result === true) {
                    $typeSuccessMessage = "Item added successfully!";
                } elseif ($result === false) {
                    $typeErrorMessage = "Item already exists. Please choose a different type.";
                } else {
                    $typeErrorMessage = "Failed to add item. Please check your input.";
                }
            }
        }

        // Handle size deletion
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
            $sizeID = $_GET['id'];

            $result = $this->model->deletePizzaSize($typeID);

            if ($result) {
                $typeSuccessMessage = "Item deleted successfully.";
            } else {
                $typeErrorMessage = "Failed to delete item.";
            }
        }

        // Display pizza sizes
        $types = $this->model->getAllPizzaSizes();
        $this->view->displayPizzaSizes($sizes, $sizeSuccessMessage, $sizeErrorMessage);
    }
}

?>
