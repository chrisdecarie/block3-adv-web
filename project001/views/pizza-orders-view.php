<?php
//root/views/pizza-order-view.php
class PizzaOrderView {
    public function displayOrders($orders, $successMessage, $errorMessage) {

        echo "<main>";
        echo "<section>";
        echo " <article class='orders'>";

        echo "<h2>Pizza Orders</h2>";

        // Display success or error message
        if ($successMessage) {
            echo "<h3 class='success'>$successMessage</h3>";
        } elseif ($errorMessage) {
            echo "<h3 class='error'>$errorMessage</h3>";
        }

        // Display form for adding a new order
        echo "
        <div class='form-wrap'>
            <form class='form-1' method='POST' action='index.php'>
           
                <label class='form-label' for='newOrders'>New Orders</label>
               
                <input class='form-input' type='text' id='newOrders' name='newOrders' placeholder='Enter Orders' required>
                
               
                <button type='submit'>Add Orders</button>
            </form>
            </div>
            <br>
            <br>
            <br>

        ";

        // Display existing orders
            echo "<ul class='list'>";
            foreach ($orders as $orders) {
                echo "<li class='list-item'>
                    {$orders['orders']} - <a href='index.php?action=delete&id={$orders['ordersID']}'>Delete</a>
                </li>";
}
            echo "</ul>";
        echo " </article>";
    echo " </section>";
    echo "</main>";
    }
}
?>
