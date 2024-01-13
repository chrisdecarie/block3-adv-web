<?php
//root/views/product-category-view.php
class ProductCategoryView {
    public function displayCategories($categories, $successMessage, $errorMessage) {

        echo "<main>";
        echo "<section>";
        echo " <article class='brand'>";

        echo "<h2>Product Categories</h2>";

        // Display success or error message
        if ($successMessage) {
            echo "<h3 class='success'>$successMessage</h3>";
        } elseif ($errorMessage) {
            echo "<h3 class='error'>$errorMessage</h3>";
        }

        // Display form for adding a new category
        echo "
        <div class='form-wrap'>
            <form class='form-1' method='POST' action='index.php'>
           
                <label class='form-label' for='newCategory'>New Category</label>
               
                <input class='form-input' type='text' id='newCategory' name='newCategory' placeholder='Enter Category' required>
                
               
                <button type='submit'>Add Category</button>
            </form>
            </div>
            <br>
            <br>
            <br>

        ";

        // Display existing categories
            echo "<ul class='list'>";
            foreach ($categories as $category) {
                echo "<li class='list-item'>
                    {$category['category']} - <a href='index.php?action=delete&id={$category['categoryID']}'>Delete</a>
                </li>";
}
            echo "</ul>";
        echo " </article>";
    echo " </section>";
    echo "</main>";
    }
}
?>
