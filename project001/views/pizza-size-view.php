<?php

// root>views>pizza-size-view.php ... 

// root folder> views folder> pizza-size-view.php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

class PizzaSizeView {
    public function displayPizzaSize($sizes, $successMessage, $errorMessage) {
        echo "<main class='size'>";
        echo "<div class='list-wrap'>";
    
        // Display the form
        $this->displayPizzaSizeForm();
    
        // Display pizza sizes
        
        echo "<ul class='list'>";
      
        foreach ($sizes as $size) {
            echo "<li class='list-item'>{$size['size']} [<a href='./index.php?type&action=delete&id={$size['typeID']}'>Delete</a>]</li>";
        }
        echo "</ul>";

        // Display add and delete success or error messages
        $this->displayAddPizzaSizeSuccessMessage($successMessage);
        $this->displayAddPizzaSizeErrorMessage($errorMessage);

        echo "</div>";
        echo "</main class='type'>";
    }

    public function displayPizzaSizeForm() {
        echo "
        <h2>Add New Pizza Sizes</h2>
            <div class='form-wrap'>
               
                <form class='form-2' method='post' action='./index.php?size'>
                
                    <div class='form-group'>
                        <label class='form-label' for='newSize'>New Size </label>
                        <input class='form-input' id='newSize' type='text' name='newSize' placeholder='Enter new size' required>
                    </div>";

        echo "
                    <button type='submit'>Add Size</button>
                </form>
            </div>
            <br>
            <br>
        ";
    }

    public function displayAddPizzaSizeSuccessMessage($sizeSuccessMessage) {
        if ($sizeSuccessMessage) {
            echo "<h3 class='success'>$sizeSuccessMessage</h3>";
        }
    }

    public function displayAddPizzaSizeErrorMessage($sizeErrorMessage) {
        if ($sizeErrorMessage) {
            echo "<h3 class='error'>$sizeErrorMessage</h3>";
        }
    }
}

?>
