<?php
//root/models/pizza-ingredients-model.php
class PizzaIngredientsModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertIngredients($ingredients) {
        // Check if the ingredients already exists
        $existingIngredients = $this->getAllIngredients();
        foreach ($existingIngredients as $existingIngredients) {
            if (strcasecmp($existingIngredients['ingredients'], $ingredients) === 0) {
                return false; // Ingredients already exists, do not insert
            }
        }

        $query = "INSERT INTO pizzaIngredients (`ingredients`) VALUES ('$ingredients')";
        return mysqli_query($this->db, $query);
    }

    public function getAllIngredients() {
        $query = "SELECT * FROM pizzaIngredients ORDER BY `ingredients` ASC";
        $result = mysqli_query($this->db, $query);

        $ingredients = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $ingredients[] = $row;
        }

        return $ingredients;
    }

    public function deleteIngredients($ingredientsID) {
        $query = "DELETE FROM productIngredients WHERE ingredientsID = $ingredientsID";
        return mysqli_query($this->db, $query);
    }
    
}
?>
