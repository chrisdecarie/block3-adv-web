<?php

class Sunglasses {
    private $wearable;
    private $foldable = 0;
    public $isActive = false;

    public function __construct() {
        $this->wearable = "not set";
    }
    private function getWearable() {
        return $this->wearable;
    }
    private function setWearable($newValue) {
        $this->wearable = $newValue;
    }
    public function ask() {
        return "wearable: " . $this->getWearable() . " foldable: " . $this->foldable;
    }
    public function action($data) {
        $this->setWearable($data);
    }
}

$testObject1 = new Sunglasses();
// $testObject1->action(123);
echo $testObject1->ask();
echo $testObject1->isActive ? "active" : "not-active";
