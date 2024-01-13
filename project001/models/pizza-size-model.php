<?php
//root/models/product-type-model.php
//root/models/product-type-model.php
class ProductTypeModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertProductType($type) {
        // Check if the type already exists
        $existingTypes = $this->getAllProductTypes();
        foreach ($existingTypes as $existingType) {
            if (strcasecmp($existingType['type'], $type) === 0) {
                return false; // Type already exists, do not insert
            }
        }

        $query = "INSERT INTO productType (`type`) VALUES ('$type')";
        return mysqli_query($this->db, $query);
    }

    public function getAllProductTypes() {
        $query = "SELECT * FROM productType ORDER BY `type` ASC";
        $result = mysqli_query($this->db, $query);

        $types = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $types[] = $row;
        }

        return $types;
    }

    public function deleteProductType($typeID) {
        $query = "DELETE FROM productType WHERE typeID = $typeID";
        return mysqli_query($this->db, $query);
    }
}

?>
