<?

ini_set('display_errors', 1);

class Sunglasses {
    // Object properties
    private $brand;
    private $model;
    private $color;
    private $price;
    private $folded;
    private $worn;

    // Constructor to initialize the object properties
    public function __construct($brand, $model, $color, $price) {
        $this->brand = $brand;
        $this->model = $model;
        $this->color = $color;
        $this->price = $price;
        $this->folded = true; // Sunglasses start as folded
        $this->worn = false;  // Sunglasses start as not worn
    }

    // Method to unfold the sunglasses
    public function unfold() {
        $this->folded = false;
    }

    // Method to fold the sunglasses
    public function fold() {
        $this->folded = true;
    }

    // Method to clean the sunglasses
    public function clean() {
        echo "Cleaning the sunglasses...\n";
    }

    // Method to put on the sunglasses
    public function putOn() {
        if (!$this->worn && !$this->folded) {
            $this->worn = true;
            echo "You are now wearing the sunglasses.\n";
        } else {
            echo "You cannot wear the sunglasses in this state.\n";
        }
    }

    // Method to remove the sunglasses
    public function remove() {
        if ($this->worn) {
            $this->worn = false;
            echo "You have removed the sunglasses.\n";
        } else {
            echo "You are not currently wearing the sunglasses.\n";
        }
    }

    // Method to get the brand of the sunglasses
    public function getBrand() {
        return $this->brand;
    }

    // Method to get the model of the sunglasses
    public function getModel() {
        return $this->model;
    }

    // Method to get the color of the sunglasses
    public function getColor() {
        return $this->color;
    }

    // Method to get the price of the sunglasses
    public function getPrice() {
        return $this->price;
    }

    // Method to check if the sunglasses are folded
    public function isFolded() {
        return $this->folded;
    }

    // Method to check if the sunglasses are worn
    public function isWorn() {
        return $this->worn;
    }

    // Method to display information about the sunglasses
    public function displayInfo() {
        echo "Sunglasses Information: \n";
        echo "Brand: " . $this->getBrand() . "\n";
        echo "Model: " . $this->getModel() . "\n";
        echo "Color: " . $this->getColor() . "\n";
        echo "Price: $" . $this->getPrice() . "\n";
        echo "Status: " . ($this->isFolded() ? "Folded" : "Unfolded") . "\n";
        echo "Worn: " . ($this->isWorn() ? "Yes" : "No") . "\n";
    }
}

// Create an instance of the Sunglasses class
$sunglasses1 = new Sunglasses("Ray-Ban", "Aviator", "Black", 150.99);

// Display information about the sunglasses
$sunglasses1->displayInfo();

// Unfold the sunglasses
$sunglasses1->unfold();
$sunglasses1->displayInfo();

// Clean the sunglasses
$sunglasses1->clean();

// Put on the sunglasses
$sunglasses1->putOn();
$sunglasses1->displayInfo();

// Remove the sunglasses
$sunglasses1->remove();
$sunglasses1->displayInfo();

// Fold the sunglasses
$sunglasses1->fold();
$sunglasses1->displayInfo();

?>
