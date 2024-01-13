<?php
//root/views/product-brand-view.php
class ProductBrandView {
    public function displayBrands($brands, $brandSuccessMessage, $brandErrorMessage) {

        echo "<main class='brand'>";
        echo "<section>";
        echo " <article>";

        echo "<h2>Product Brands</h2>";

        // Display success or error message
        if ($brandSuccessMessage) {
            echo "<h3 class='success'>$brandSuccessMessage</h3>";
        } elseif ($brandErrorMessage) {
            echo "<h3 class='error'>$brandErrorMessage</h3>";
        }

        // Display form for adding a new brand
        echo "
        <div class='form-wrap'>
            <form class='form-1' method='POST' action='index.php'>
           
                <label class='form-label' for='newBrand'>New Brand</label>
               
                <input class='form-input' type='text' id='newBrand' name='newBrand' placeholder=' Enter new brand' required>
                
               
                <button type='submit'>Add Brand</button>
            </form>
            </div>
            <br>


        ";

        // Display existing brands
        echo "<ul class='list'>";
        foreach ($brands as $brand) {
            echo "<li class='list-item'>
                {$brand['brand']} - <a href='index.php?action=delete&id={$brand['brandID']}'>Delete</a>
            </li>";
        }
        echo "</ul>";
        echo " </article>";
        echo " </section>";
        echo "</main>";
    }
}

?>
