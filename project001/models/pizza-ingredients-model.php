<?php
//root/models/product-brand-model.php
class ProductBrandModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertBrand($brand) {
        // Check if the brand already exists
        $existingBrands = $this->getAllBrands();
        foreach ($existingBrands as $existingBrand) {
            if (strcasecmp($existingBrand['brand'], $brand) === 0) {
                return false; // Brand already exists, do not insert
            }
        }

        $query = "INSERT INTO productBrand (`brand`) VALUES ('$brand')";
        return mysqli_query($this->db, $query);
    }

    public function getAllBrands() {
        $query = "SELECT * FROM productBrand ORDER BY `brand` ASC";
        $result = mysqli_query($this->db, $query);

        $brands = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $brands[] = $row;
        }

        return $brands;
    }

    public function deleteBrand($brandID) {
        $query = "DELETE FROM productBrand WHERE brandID = $brandID";
        return mysqli_query($this->db, $query);
    }
    
}
?>
