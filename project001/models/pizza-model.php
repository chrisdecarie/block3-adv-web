<?php
// root/models/product-model.php
class ProductModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addProduct($categoryID, $brandID, $productName, $typeID) {
        $query = "INSERT INTO petProduct (categoryID, brandID, productName, typeID)
                  VALUES ('$categoryID', '$brandID', '$productName', '$typeID')";

        return mysqli_query($this->db, $query);
    }

    public function getAllProducts() {
        $query = "SELECT pp.productID, pc.category, pb.brand, pt.type, pp.productName
                  FROM petProduct pp
                  INNER JOIN productCategory pc ON pp.categoryID = pc.categoryID
                  INNER JOIN productBrand pb ON pp.brandID = pb.brandID
                  INNER JOIN productType pt ON pp.typeID = pt.typeID
                  ORDER BY pp.productName";

        $result = mysqli_query($this->db, $query);

        if (!$result) {
            die('Query failed: ' . mysqli_error($this->db));
        }

        $products = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }

        return $products;
    }

    public function deleteProduct($productID) {
        $query = "DELETE FROM petProduct WHERE productID = $productID";
        return mysqli_query($this->db, $query);
    }

    public function getAllCategories() {
        $query = "SELECT * FROM productCategory";
        $result = mysqli_query($this->db, $query);

        if (!$result) {
            die('Query failed: ' . mysqli_error($this->db));
        }

        $categories = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }

        return $categories;
    }

    public function getAllBrands() {
        $query = "SELECT * FROM productBrand";
        $result = mysqli_query($this->db, $query);

        if (!$result) {
            die('Query failed: ' . mysqli_error($this->db));
        }

        $brands = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $brands[] = $row;
        }

        return $brands;
    }

    public function getAllTypes() {
        $query = "SELECT * FROM productType";
        $result = mysqli_query($this->db, $query);

        if (!$result) {
            die('Query failed: ' . mysqli_error($this->db));
        }

        $types = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $types[] = $row;
        }

        return $types;
    }

    public function getProductByName($productName) {
        $productName = mysqli_real_escape_string($this->db, $productName);

        $query = "SELECT * FROM petProduct WHERE productName = '$productName'";
        $result = mysqli_query($this->db, $query);

        if (!$result) {
            die('Query failed: ' . mysqli_error($this->db));
        }

        return mysqli_fetch_assoc($result);
    }
}
?>
