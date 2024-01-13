<?php
// root folder>controllers>main-controller.php

require_once 'product-type-controller.php';
require_once 'product-category-controller.php'; 
require_once 'product-brand-controller.php';
require_once 'product-controller.php';
require_once 'models/product-type-model.php';
require_once 'models/product-category-model.php'; 
require_once 'models/product-brand-model.php';
require_once 'models/product-model.php';
require_once 'views/product-type-view.php';
require_once 'views/product-category-view.php'; 
require_once 'views/product-brand-view.php';
require_once 'views/product-view.php';

// Create instances of models and views
$productTypeModel = new ProductTypeModel($link);
$productCategoryModel = new ProductCategoryModel($link);
$productBrandModel = new ProductBrandModel($link);
$productModel = new ProductModel($link);

$productTypeView = new ProductTypeView();
$productCategoryView = new ProductCategoryView();
$productBrandView = new ProductBrandView();
$productView = new ProductView();


// Create instances of controllers
$productTypeController = new ProductTypeController($productTypeModel, $productTypeView);
$productCategoryController = new ProductCategoryController($productCategoryModel, $productCategoryView);
$productBrandController = new ProductBrandController($productBrandModel, $productBrandView);
$productController = new ProductController($productModel, $productView);


// Handle the requests
$productTypeController->handleTypeRequest();
$productCategoryController->handleCategoryRequest();
$productBrandController->handleBrandRequest();
$productController->handleProductRequest();

?>
