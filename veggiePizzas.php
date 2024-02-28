<?php
session_start();

// Initialize cart if not exists
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = []; // empty cart 
}

// // Clear the cart
// unset($_SESSION['cart']);

// Sample pizza types with names and prices
// Associative array that contains information about different types of pizzas
$pizzaTypes = [
    'spinach' => ['name' => 'Spinach Pizza', 'price' => 5.99],
    'mixed_veggie' => ['name' => 'Mixed Veggie Pizza', 'price' => 5.99],
    'mushroom' => ['name' => 'Mushroom Pizza', 'price' => 5.99],
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
    <title>Veggie Pizzas</title>
  </head>
</html>
<?php include('templates/header.php'); ?>

    <title>Veggie Favourites</title>
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
      <img src="images/spinachPizza.jpg" class="img-fluid rounded-start" alt="spinach pizza">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Spinach Pizza</h5>
           <div class="dropend">
          <form class="dropdown-menu p-4" method="POST">
          
          <div class="mb-3">
           
            <div class="hide">
            <select id="pizza_type" name="pizza_type">
            <option value="spinach">Spinach</option>
            </select>
      </div>

            <br>
            <label for="quantity">Enter quantity:</label>
            <input type="number" id="quantity" name="quantity" min="0" value="0">
             <button type="submit">Add to Cart</button>
             <p>$5.99 each</p>

              </form>
            </div>
            <p class="card-text">Elevate your taste experience with our Spinach Delight Pizza. Rich, sautéed spinach meets a blend of premium cheeses atop our handcrafted crust, creating a harmonious fusion of flavors that's as wholesome as it is delicious.</p>
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
      <img src="images/mixedVeggiePizza.jpg" class="img-fluid rounded-start" alt="mixed veggie pizza">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Mixed Veggie Pizza</h5>
           <div class="dropend">
          <form class="dropdown-menu p-4" method="POST">
            <div class="mb-3">
            
            <div class="hide"> 
            <select id="pizza_type" name="pizza_type">
            <option value="mixed_veggie">Mixed Veggie</option>
            </select>
      </div> 

            <br>
            <label for="quantity">Enter quantity:</label> 
            <input type="number" id="quantity" name="quantity" min="0" value="0">
             <button type="submit">Add to Cart</button>
             <p>$5.99 each</p>
              </form>
            </div>
            <p class="card-text">Dive into freshness with our Mixed Veggie Bliss Pizza. A colorful medley of farm-fresh vegetables crowns our artisan crust, topped with a luscious blend of melted cheeses. Each bite celebrates nature's bounty in a truly delectable way.</p>
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
      <img src="images/mushroomPizza.jpg" class="img-fluid rounded-start" alt="mushroom pizza">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Mushroom Pizza</h5>
           <div class="dropend">
          <form class="dropdown-menu p-4" method="POST">
            <div class="mb-3">
            
          <div class="hide">
            <select id="pizza_type" name="pizza_type">
            <option value="mushroom">Mushroom</option>
            </select>
      </div> 

            <br>
            <label for="quantity">Enter quantity:</label>
            <input type="number" id="quantity" name="quantity" min="0" value="0">
             <button type="submit">Add to Cart</button>
             <p>$5.99 each</p>
              </form>
            </div>
            <p class="card-text">Embark on a savory journey with our Mushroom Medley Pizza. Earthy and exquisite, a variety of mushrooms adorn our crafted crust, embraced by a luxurious blanket of melted cheeses. Unveil layers of umami-rich delight in every bite.</p>
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