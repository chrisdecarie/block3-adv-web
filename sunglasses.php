<?php

ini_set('display_errors', 1);
class Sunglasses {
    // Object properties
    private $brand;
    private $model;
    private $color;
    private $price;
    private $folded;

    // Constructor to initialize the object properties
    public function __construct($brand, $model, $color, $price) {
        $this->brand = $brand;
        $this->model = $model;
        $this->color = $color;
        $this->price = $price;
        $this->folded = false; // Sunglasses start as unfolded
    }

    // Method to fold the sunglasses
    public function fold() {
        $this->folded = true;
    }

    // Method to unfold the sunglasses
    public function unfold() {
        $this->folded = false;
    }

    // Method to clean the sunglasses
    public function clean() {
        echo "Cleaning the sunglasses...\n";
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

    // Method to display information about the sunglasses
    public function displayInfo() {
        echo "Sunglasses Information: \n";
        echo "Brand: " . $this->getBrand() . "\n";
        echo "Model: " . $this->getModel() . "\n";
        echo "Color: " . $this->getColor() . "\n";
        echo "Price: $" . $this->getPrice() . "\n";
        echo "Status: " . ($this->isFolded() ? "Folded" : "Unfolded") . "\n";
    }
}

// Create an instance of the Sunglasses class
$sunglasses1 = new Sunglasses("Ray-Ban", "Aviator", "Black", 150.99);

// Display information about the sunglasses
$sunglasses1->displayInfo();

// Fold the sunglasses
$sunglasses1->fold();
$sunglasses1->displayInfo();

// Unfold the sunglasses
$sunglasses1->unfold();
$sunglasses1->displayInfo();

// Clean the sunglasses
$sunglasses1->clean();

?>

