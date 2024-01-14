
<?php
//root/models/pizza-orders-model.php
class PizzaOrdersModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertOrders($orders) {
        // Check if the category already exists
        $existingOrders = $this->getAllOrders();
        foreach ($existingOrders as $existingOrders) {
            if (strcasecmp($existingOrders['orders'], $orders) === 0) {
                return false; // Orders already exists, do not insert
            }
        }

        $query = "INSERT INTO pizzaOrders (`orders`) VALUES ('$orders')";
        return mysqli_query($this->db, $query);
    }

    public function getAllOrders() {
        $query = "SELECT * FROM pizzaOrders ORDER BY `orders` ASC";
        $result = mysqli_query($this->db, $query);

        $orders = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $orders[] = $row;
        }

        return $orders;
    }

    public function deleteOrders($ordersID) {
        $query = "DELETE FROM pizzaOrders WHERE ordersID = $ordersID";
        return mysqli_query($this->db, $query);
    }
}
?>
