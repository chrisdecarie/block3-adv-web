<?php
//root/views/pizza-ingredients-view.php
class PizzaIngredientsView {
    public function displayIngredients($ingredients, $ingredientsSuccessMessage, $ingredientsErrorMessage) {

        echo "<main class='ingredients'>";
        echo "<section>";
        echo " <article>";

        echo "<h2>Pizza Ingredients</h2>";

        // Display success or error message
        if ($ingredientsSuccessMessage) {
            echo "<h3 class='success'>$ingredientsSuccessMessage</h3>";
        } elseif ($ingredientsErrorMessage) {
            echo "<h3 class='error'>$ingredientsErrorMessage</h3>";
        }

        // Display form for adding a new ingredient
        echo "
        <div class='form-wrap'>
            <form class='form-1' method='POST' action='index.php'>
           
                <label class='form-label' for='newIngredients'>New Ingredients</label>
               
                <input class='form-input' type='text' id='newIngredients' name='newIngredients' placeholder=' Enter new ingredients' required>
                
               
                <button type='submit'>Add Ingredients</button>
            </form>
            </div>
            <br>


        ";

        // Display existing ingredients
        echo "<ul class='list'>";
        foreach ($ingredients as $ingredient) {
            echo "<li class='list-item'>
                {$ingredients['ingredients']} - <a href='index.php?action=delete&id={$ingredients['ingredientsID']}'>Delete</a>
            </li>";
        }
        echo "</ul>";
        echo " </article>";
        echo " </section>";
        echo "</main>";
    }
}

?>
