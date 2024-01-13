<?php
// root folder> views folder> product-view.php 

class ProductView {
    public function displayProducts($products, $categories, $brands, $types, $productSuccessMessage, $productErrorMessage) {
        echo "<main>";
        echo "<div class='list-wrap'>";
    
        // Display the form
        $this->displayProductForm($categories, $brands, $types);
    
        // Display products
        echo "<h2>Products</h2>";
        echo "<ul class='product-list'>";
        foreach ($products as $product) {
            echo "<li class='list-item'>{$product['productName']} - {$product['type']} - {$product['category']} - {$product['brand']} [<a href='./index.php?product&action=delete&id={$product['productID']}'>Delete</a>]</li>";
        }
        echo "</ul>";

        // Display delete success or error messages
        $this->displayDeleteProductSuccessMessage($productSuccessMessage);
        $this->displayDeleteProductErrorMessage($productErrorMessage);

        echo "</div>";
        echo "</main>";
    }

    public function displayProductForm($categories, $brands, $types) {
        echo "<main>";
        echo "<h2>Products</h2>
            <div class='form-wrap'>
                
                <form class='form-2' method='post' action='./index.php?product'>
                
                    <div class='form-group'>
                        <label class='form-label' for='categoryID'>Category </label>
                        <select class='form-input' id='categoryID' name='categoryID' required>
                            <option value='' disabled selected>Select Category </option>";
                            foreach ($categories as $category) {
                                echo "<option value='{$category['categoryID']}'>{$category['category']}</option>";
                            }
            echo "
                        </select>
                    </div>";
                    
            // Add Type dropdown
            echo "
                    <div class='form-group'>
                        <label class='form-label' for='typeID'>Type </label>
                        <select class='form-input' id='typeID' name='typeID' required>
                            <option value='' disabled selected>Select Type</option>";
                            foreach ($types as $type) {
                                echo "<option value='{$type['typeID']}'>{$type['type']}</option>";
                            }
            echo "
                        </select>
                    </div>";

            echo "
                    <div class='form-group'>
                        <label class='form-label' for='brandID'>Brand </label>
                        <select class='form-input' id='brandID' name='brandID' required>
                            <option value='' disabled selected>Select Brand</option>";
                            foreach ($brands as $brand) {
                                echo "<option value='{$brand['brandID']}'>{$brand['brand']}</option>";
                            }
                echo "
                        </select>
                    </div>";

            echo "
                    <div class='form-group'>
                        <label class='form-label' for='productName'>Product Name</label>
                        <input class='form-input' id='productName' type='text' name='productName' placeholder='Enter product name' required>
                    </div>";

            echo "
                    <button type='submit'>Add Product</button>
                </form>
            </div>
        ";
        echo "</main>";
    }

    public function displayDeleteProductSuccessMessage($productSuccessMessage) {
        if ($productSuccessMessage) {
            echo "<h3 class='success'>$productSuccessMessage</h3>";
        }
    }

    public function displayDeleteProductErrorMessage($productErrorMessage) {
        if ($productErrorMessage) {
            echo "<h3 class='error'>$productErrorMessage</h3>";
        }
    }
}
?>
