<?php
// root/models/pizza-model.php
class PizzaModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addPizza($ordersID, $ingredientsID, $pizzaName, $sizeID) {
        $query = "INSERT INTO pizza (ordersID, ingredientsID, pizzaID, sizeID)
                  VALUES ('$ordersID', '$ingredientsID', '$pizzaID', '$sizeID')";

        return mysqli_query($this->db, $query);
    }

    public function getAllPizza() {
        $query = "SELECT pp.pizzaID, po.orders, pi.ingredients, ps.size,
                  FROM pizzaID pp
                  INNER JOIN pizzaOrders po ON po.ordersID = po.ordersID
                  INNER JOIN pizzaIngredients pi ON pi.ingredientsID = pi.ingredientsID
                  INNER JOIN pizzaSize ps ON ps.sizeID = ps.sizeID
                  ORDER BY pp.pizzaID";

        $result = mysqli_query($this->db, $query);

        if (!$result) {
            die('Query failed: ' . mysqli_error($this->db));
        }

        $pizza = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $pizza[] = $row;
        }

        return $pizza;
    }

    public function deletePizza($productID) {
        $query = "DELETE FROM pizza WHERE pizzaID = $pizzaID";
        return mysqli_query($this->db, $query);
    }

    public function getAllOrders() {
        $query = "SELECT * FROM pizzaOrders";
        $result = mysqli_query($this->db, $query);

        if (!$result) {
            die('Query failed: ' . mysqli_error($this->db));
        }

        $orders = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $orders[] = $row;
        }

        return $orders;
    }

    public function getAllIngredients() {
        $query = "SELECT * FROM pizzaIngredients";
        $result = mysqli_query($this->db, $query);

        if (!$result) {
            die('Query failed: ' . mysqli_error($this->db));
        }

        $ingredients = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $ingredients[] = $row;
        }

        return $ingredients;
    }

    public function getAllSizes() {
        $query = "SELECT * FROM pizzasize";
        $result = mysqli_query($this->db, $query);

        if (!$result) {
            die('Query failed: ' . mysqli_error($this->db));
        }

        $sizes = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $sizes[] = $row;
        }

        return $sizes;
    }

    public function getPizzaByName($pizzaName) {
        $pizzaName = mysqli_real_escape_string($this->db, $pizzaName);

        $query = "SELECT * FROM pizza WHERE pizza = '$pizzaName'";
        $result = mysqli_query($this->db, $query);

        if (!$result) {
            die('Query failed: ' . mysqli_error($this->db));
        }

        return mysqli_fetch_assoc($result);
    }
}
?>
