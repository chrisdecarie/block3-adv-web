<?php
//root/controllers/pizza-orders-controller.php
require_once 'connect/dbconnect.php';
require_once 'models/pizza-orders-model.php';
require_once 'views/pizza-orders-view.php';

class PizzaOrdersController {
    private $model;
    private $view;

    public function __construct($pizzaOrdersModel, $pizzaOrdersView) {
        $this->model = $pizzaOrdersModel;
        $this->view = $pizzaOrdersView;
    }

    public function handleOrdersRequest(){
        // Form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newOrders = isset($_POST['newOrders']) ? $_POST['newOrders'] : '';

            if (!empty($newOrders)) {
                $result = $this->model->insertOrders($newOrders);

                if ($result === false) {
                    $ordersAddErrorMessage = "Item already exists. Please choose a different orders.";
                } elseif ($result === null) {
                    $ordersAddErrorMessage = "Failed to add item. Please check your input.";
                }
            }
        }

        // Handle orders deletion
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
            $ordersID = $_GET['id'];

            $result = $this->model->deleteOrders($ordersID);

            if ($result === null) {
                $ordersDeleteErrorMessage = "Failed to delete item.";
            }
        }

        // Display orders without success and error messages
        $orders = $this->model->getAllOrders();
        $this->view->displayOrders($orders, null, null);
    }
}
?>
