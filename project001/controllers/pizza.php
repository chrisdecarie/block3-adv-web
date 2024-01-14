<?php
//root/controllers/pizza-controller.php

require_once 'models/pizza-model.php';
require_once 'views/pizza-view.php';

class PizzaController {
    private $model;
    private $view;

    public function __construct($pizzaModel, $pizzaView) {
        $this->model = $pizzaModel;
        $this->view = $pizzaView;
    }

    public function handlePizzaRequest() {
        $successMessage = "";
        $errorMessage = "";

        // Form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ordersID = $_POST['ordersID'];
            $ingredientsID = $_POST['ingredientsID'];
            $pizzaName = $_POST['pizzaName'];
            $sizeID = $_POST['sizeID'];

            $existingPizza = $this->model->getPizzaByName($pizzaName);

            if (!$existingPizza) {
                $result = $this->model->addPizza($ingredientsID, $ordersID, $pizzaID, $sizeID);

                if ($result === true) {
                    $successMessage = "Item added successfully!";
                } else {
                    $errorMessage = "Failed to add item. Please check your input.";
                }
            } else {
                $errorMessage = "Item with the same name already exists.";
            }
        }

        // Handle pizza deletion
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
            $pizzaID = $_GET['id'];

            $result = $this->model->deletePizza($pizzaID);

            if ($result) {
                $successMessage = "Item deleted successfully.";
            } else {
                $errorMessage = "Failed to delete item.";
            }
        }

        // Display pizzas
        $pizza = $this->model->getAllPizza();
        $orders = $this->model->getAllOrders();
        $ingredients = $this->model->getAllIngredients();
        $sizes = $this->model->getAllSizes();

        $this->view->displayPizza($pizza $orders, $ingredients, $sizes, $successMessage, $errorMessage);
    }
}

?>
