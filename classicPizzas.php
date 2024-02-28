<?php
session_start();

// Initialize cart if it does not exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = []; // empty cart 
}

// // Clear the cart
// unset($_SESSION['cart']);

// Sample pizza types with names and prices
// Associative array that contains information about different types of pizzas
$pizzaTypes = [
    'cheese' => ['name' => 'Cheese Pizza', 'price' => 4.99],
    'pepperoni' => ['name' => 'Pepperoni Pizza', 'price' => 6.99],
    'margarita' => ['name' => 'Margarita Pizza', 'price' => 5.99],
];

// Handle form submission
// Check if the user selected a pizza
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pizza_type']) && isset($_POST['quantity'])) {
    $pizzaType = $_POST['pizza_type']; // Save the $pizzaType as what the user chose 
    $quantity = intval($_POST['quantity']); // Save the $quantity as how many the user chose
    
    // Check if the $quantity is greater than 0 and if the $pizzaType exists in the $pizzaTypes array
    if ($quantity > 0 && isset($pizzaTypes[$pizzaType])) {
      $pizza = [
          'name' => $pizzaTypes[$pizzaType]['name'], // Get the name of the pizza from the $pizzaTypes array
          'quantity' => $quantity, // Set the quantity of this pizza
          'price' => $quantity * $pizzaTypes[$pizzaType]['price'] // Calculate the total price of this pizza based on quantity and pizza type price
      ];
      
      // Add the newly created $pizza array to the 'cart' stored in the $_SESSION variable
      array_push($_SESSION['cart'], $pizza);

        // Redirect to cart page
        header("Location: cart.php");
        exit(); //Exit after redirection
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('templates/header.php'); ?>
  <title>Classics</title>
    <style>
        .card-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card {
            max-width: 750px;
            margin: 10px; /* Add some space between cards */
        }
    </style>
</head>

<body>
  <p>
  <div class="card-container">
  <div class="card mb-3" style="max-width: 750px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="images/cheesePizza.jpg" class="img-fluid rounded-start" alt="cheese pizza">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Cheese Pizza</h5>
           <div class="dropend"> 
           <form class="dropdown-menu p-4" method="POST">
              <div class="mb-3">
                <div class="hide"> <!-- hide select option --> 
                  <select id="pizza_type" name="pizza_type">
                    <option value="cheese">Cheese Pizza</option>
                  </select>
                </div>
                <br>
                <label for="quantity">Enter quantity:</label>
                <input type="number" id="quantity" name="quantity" min="0" value="0">
                <button type="submit">Add to Cart</button>
                <p>$4.99 each</p>
              </form>
            </div>
            <p class="card-text">Savor the classic allure of our Cheese Pizza. Melted mozzarella and cheddar unite over our perfect crust, harmonizing into a timeless, satisfying indulgence that captures the essence of comfort.</p>
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
            Quick Add
          </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="card mb-3" style="max-width: 750px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="images/pepperoniPizza.jpg" class="img-fluid rounded-start" alt="pepperoni pizza">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Pepperoni Pizza</h5>
        <div class="dropend">
          <form class="dropdown-menu p-4" method="POST">
            <div class="mb-3">
              <div class="hide"> <!-- hide select option --> 
                <select id="pizza_type" name="pizza_type">
                  <option value="pepperoni">Pepperoni Pizza</option>
                </select>
              </div>
              <br>
              <label for="quantity">Enter quantity:</label>
              <input type="number" id="quantity" name="quantity" min="0" value="0">
              <button type="submit">Add to Cart</button>
               <p>$6.99 each</p>
          </form>
        </div>
        <p class="card-text">Indulge in a delightful harmony of zesty tomato sauce, gooey melted cheese, and perfectly spiced pepperoni, all atop our freshly baked, golden crust, making each bite of our pepperoni pizza an irresistibly satisfying experience.</p>
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
          Quick Add
        </button>
       </div>
     </div>
   </div>
 </div>
</div>

  <div class="card mb-3" style="max-width: 750px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="images/margaritaPizza.png" class="img-fluid rounded-start" alt="Margarita Pizza">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Margarita Pizza</h5>
        <div class="dropend">
          <form class="dropdown-menu p-4" method="POST">
            <div class="mb-3">
              <div class="hide"> <!-- hide select option --> 
                <select id="pizza_type" name="pizza_type">
                  <option value="margarita">Margarita Pizza</option>
                </select>
              </div>
              <br>
              <label for="quantity">Enter quantity:</label>
              <input type="number" id="quantity" name="quantity" min="0" value="0">
              <button type="submit">Add to Cart</button>
              <p>$5.99 each</p>
            </form>
          </div>
          <p class="card-text">Experience pizza perfection with our Margherita Pizza. Vibrant tomato slices, fresh mozzarella, and fragrant basil converge on our artisanal crust, delivering an authentic Italian delight that's both simple and sublime.</p>
          <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
            Quick Add
          </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <?php include('templates/footer.php'); ?>
 </body>
</html>

  <script>
    // Hide all the select options 
    
    // Get all elements with the "hide" class
    var hideElements = document.querySelectorAll(".hide");

    // Loop through each element and hide it
    for (var i = 0; i < hideElements.length; i++) {
        hideElements[i].style.display = "none";
    }
  </script>