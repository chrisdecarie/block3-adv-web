<?php
// root folder>controllers>main-controller.php

require_once 'pizza-controller.php';
require_once 'pizza-ingredients-controller.php'; 
require_once 'pizza-size-controller.php';
require_once 'pizza-orders-controller.php';
require_once 'models/pizza-model.php';
require_once 'models/pizza-ingredients-model.php'; 
require_once 'models/pizza-size-model.php';
require_once 'models/pizza-orders-model.php';
require_once 'views/pizza-view.php';
require_once 'views/pizza-ingredients-view.php'; 
require_once 'views/pizza-size-view.php';
require_once 'views/pizza-orders-view.php';

// Create instances of models and views
$pizzaModel = new PizzaModel($link);
$pizzaIngredientsModel = new PizzaIngredientsModel($link);
$pizzaSizeModel = new PizzaSizeModel($link);
$pizzaOrdersModel = new PizzaOrdersModel($link);

$pizzaView = new PizzaView();
$pizzaIngredientsView = new PizzaIngredientsView();
$pizzaSizeView = new PizzaSizeView();
$pizzaOrdersView = new PizzaOrdersView();


// Create instances of controllers
$pizzaController = new PizzaController($pizzaModel, $pizzaView);
$pizzaIngredientsController = new PizzaIngredientsController($pizzaIngredientsModel, $pizzaIngredientsView);
$pizzaSizeController = new PizzaSizeController($pizzaSizeModel, $pizzaSizeView);
$pizzaOrdersController = new PizzaOrdersController($pizzaOrdersModel, $pizzaOrdersView);


// Handle the requests
$pizzaController->handleTypeRequest();
$pizzaIngredientsController->handleCategoryRequest();
$pizzaSizeController->handleBrandRequest();
$pizzaOrdersController->handleProductRequest();

?>
