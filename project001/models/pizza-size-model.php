<?php
//root/models/pizza-size-model.php
//root/models/pizza-size-model.php
class PizzaSizeModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertPizzaSize($size) {
        // Check if the size already exists
        $existingSizes = $this->getAllPizzaSizes();
        foreach ($existingSizes as $existingSize) {
            if (strcasecmp($existingSize['size'], $size) === 0) {
                return false; // Type already exists, do not insert
            }
        }

        $query = "INSERT INTO pizzaSize (`size`) VALUES ('$size')";
        return mysqli_query($this->db, $query);
    }

    public function getAllPizzaSizes() {
        $query = "SELECT * FROM pizzaSize ORDER BY `size` ASC";
        $result = mysqli_query($this->db, $query);

        $sizes = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $sizes[] = $row;
        }

        return $sizes;
    }

    public function deletePizzaSize($sizeID) {
        $query = "DELETE FROM pizzaSize WHERE sizeID = $sizeID";
        return mysqli_query($this->db, $query);
    }
}

?>
