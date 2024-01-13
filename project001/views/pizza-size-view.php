<?php

// root>views>product-type-view.php ... 

// root folder> views folder> product-type-view.php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

class ProductTypeView {
    public function displayProductTypes($types, $successMessage, $errorMessage) {
        echo "<main class='type'>";
        echo "<div class='list-wrap'>";
    
        // Display the form
        $this->displayProductTypeForm();
    
        // Display product types
        
        echo "<ul class='list'>";
      
        foreach ($types as $type) {
            echo "<li class='list-item'>{$type['type']} [<a href='./index.php?type&action=delete&id={$type['typeID']}'>Delete</a>]</li>";
        }
        echo "</ul>";

        // Display add and delete success or error messages
        $this->displayAddProductTypeSuccessMessage($successMessage);
        $this->displayAddProductTypeErrorMessage($errorMessage);

        echo "</div>";
        echo "</main class='type'>";
    }

    public function displayProductTypeForm() {
        echo "
        <h2>Add New Product Types</h2>
            <div class='form-wrap'>
               
                <form class='form-2' method='post' action='./index.php?type'>
                
                    <div class='form-group'>
                        <label class='form-label' for='newType'>New Type </label>
                        <input class='form-input' id='newType' type='text' name='newType' placeholder='Enter new type' required>
                    </div>";

        echo "
                    <button type='submit'>Add Type</button>
                </form>
            </div>
            <br>
            <br>
        ";
    }

    public function displayAddProductTypeSuccessMessage($typeSuccessMessage) {
        if ($typeSuccessMessage) {
            echo "<h3 class='success'>$typeSuccessMessage</h3>";
        }
    }

    public function displayAddProductTypeErrorMessage($typeErrorMessage) {
        if ($typeErrorMessage) {
            echo "<h3 class='error'>$typeErrorMessage</h3>";
        }
    }
}

?>
