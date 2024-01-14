<?php
//root/controllers/pizza-ingredients-controller.php
require_once 'connect/dbconnect.php';
require_once 'models/pizza-ingredients-model.php';
require_once 'views/pizza-ingredients-view.php';
class PizzaIngredientsController {
    private $model;
    private $view;

    public function __construct($pizzaIngredientsModel, $pizzaIngredientsView) { 
        $this->model = $pizzaIngredientsModel;
        $this->view = $pizzaIngredientsView;
    }

    public function handleIngredientsRequest(){
        $ingredientsSuccessMessage = "";
        $ingredientsErrorMessage = "";

        // Form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newIngredients = isset($_POST['newIngredients']) ? $_POST['newIngredients'] : '';

            if (!empty($newIngredients)) {
                $result = $this->model->insertIngredients($newIngredients);

                if ($result === true) {
                    $ingredientsSuccessMessage = "Item added successfully!";
                } elseif ($result === false) {
                    $ingredientsErrorMessage = "Item already exists. Please choose a different item.";
                } else {
                    $ingredientsErrorMessage = "Failed to add item. Please check your input.";
                }
            }
        }

        // Handle ingredients deletion
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
            $ingredientsID = $_GET['id'];

            $result = $this->model->deleteIngredients($ingredientsID);

            if ($result) {
                $ingredientsSuccessMessage = "Item deleted successfully.";
            } else {
                $ingredientsErrorMessage = "Failed to delete ingredients.";
            }
        }

        // Display ingredients
        $ingredients = $this->model->getAllIngredients();
        $this->view->displayIngredients($ingredients, $ingredientsSuccessMessage, $ingredientsErrorMessage);
    }
}

?>
