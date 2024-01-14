<?php
// root folder> views folder> pizza-view.php 

class PizzaView {
    public function displayProducts($pizza, $orders, $ingredients, $sizes, $pizzaSuccessMessage, $pizzatErrorMessage) {
        echo "<main>";
        echo "<div class='list-wrap'>";
    
        // Display the form
        $this->displayPizzaForm($orders, $ingredients, $sizes);
    
        // Display pizzas
        echo "<h2>Pizzas</h2>";
        echo "<ul class='pizza-list'>";
        foreach ($pizza as $pizza) {
            echo "<li class='list-item'>{$pizza['pizzaName']} - {$pizza['size']} - {$pizza['orders']} - {$pizza['ingredients']} [<a href='./index.php?pizza&action=delete&id={$pizza['pizzaID']}'>Delete</a>]</li>";
        }
        echo "</ul>";

        // Display delete success or error messages
        $this->displayDeletePizzaSuccessMessage($pizzaSuccessMessage);
        $this->displayDeletePizzaErrorMessage($pizzaErrorMessage);

        echo "</div>";
        echo "</main>";
    }

    public function displayPizzaForm($orders, $ingredients, $sizes) {
        echo "<main>";
        echo "<h2>Pizzas</h2>
            <div class='form-wrap'>
                
                <form class='form-2' method='post' action='./index.php?pizza'>
                
                    <div class='form-group'>
                        <label class='form-label' for='ordersID'>Orders </label>
                        <select class='form-input' id='ordersID' name='ordersID' required>
                            <option value='' disabled selected>Select Orders </option>";
                            foreach ($orders as $order) {
                                echo "<option value='{$orders['ordersID']}'>{$orders['orders']}</option>";
                            }
            echo "
                        </select>
                    </div>";
                    
            // Add Size dropdown
            echo "
                    <div class='form-group'>
                        <label class='form-label' for='sizeID'>Type </label>
                        <select class='form-input' id='sizeID' name='sizeID' required>
                            <option value='' disabled selected>Select Size</option>";
                            foreach ($sizes as $size) {
                                echo "<option value='{$size['sizeID']}'>{$size['size']}</option>";
                            }
            echo "
                        </select>
                    </div>";

            echo "
                    <div class='form-group'>
                        <label class='form-label' for='ingredientsID'>Ingredients </label>
                        <select class='form-input' id='ingredientsID' name='ingredientsID' required>
                            <option value='' disabled selected>Select Ingredients</option>";
                            foreach ($ingredients as $ingredient) {
                                echo "<option value='{$ingredient['ingredientID']}'>{$ingredient['ingredient']}</option>";
                            }
                echo "
                        </select>
                    </div>";

            echo "
                    <div class='form-group'>
                        <label class='form-label' for='pizzaName'>Pizza Name</label>
                        <input class='form-input' id='pizzaName' type='text' name='pizzaName' placeholder='Enter pizza name' required>
                    </div>";

            echo "
                    <button type='submit'>Add Pizza</button>
                </form>
            </div>
        ";
        echo "</main>";
    }

    public function displayDeletePizzaSuccessMessage($pizzaSuccessMessage) {
        if ($pizzaSuccessMessage) {
            echo "<h3 class='success'>$pizzaSuccessMessage</h3>";
        }
    }

    public function displayDeletePizzaErrorMessage($pizzaErrorMessage) {
        if ($pizzaErrorMessage) {
            echo "<h3 class='error'>$pizzaErrorMessage</h3>";
        }
    }
}
?>
