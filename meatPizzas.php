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
    'hawaiian' => ['name' => 'Hawaiian Pizza', 'price' => 7.99],
    'chicken_mushroom' => ['name' => 'Chicken & Mushroom Pizza', 'price' => 8.99],  
    'meat_deluxe' => ['name' => 'Meat Deluxe Pizza', 'price' => 9.99],
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
      exit(); // Exit after redirection
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include('templates/header.php'); ?>


    <title>Meat Favourites</title>
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
      <img src="images/hawaiianPizza.jpg" class="img-fluid rounded-start" alt="hawaiian pizza">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Hawaiian Pizza</h5>
           <div class="dropend">
          <form class="dropdown-menu p-4" method="POST">
          
          <div class="mb-3">
           
            <div class="hide">
            <select id="pizza_type" name="pizza_type">
            <option value="hawaiian">Hawaiian Pizza</option>
            </select>
            </div>
            
            <br>
            <label for="quantity">Enter quantity:</label>
            <input type="number" id="quantity" name="quantity" min="0" value="0">
            <p>$7.99 each</p>
             <button type="submit">Add to Cart</button>

              </form>
            </div>
            <p class="card-text">Experience a taste of paradise with our Hawaiian Breeze Pizza. Juicy ham and sweet, succulent pineapple dance upon our signature crust, harmonizing with melted mozzarella to deliver a balanced and delightful tropical escape in every slice.</p>
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
      <img src="images/chickenMushroomPizza.jpg" class="img-fluid rounded-start" alt="buffalo chicken pizza">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Chicken & Mushroom Pizza</h5>
           <div class="dropend">
          <form class="dropdown-menu p-4" method="POST">
           
          <div class="mb-3">
            
            <div class="hide">
            <select id="pizza_type" name="pizza_type">
            <option value="chicken_mushroom">Chicken Mushroom Pizza</option>
            </select>
            </div>

            <br>
            

            <label for="quantity">Enter quantity:</label>
            <input type="number" id="quantity" name="quantity" min="0" value="0">
            <p>$8.99 each</p>
             <button type="submit">Add to Cart</button>
              </form>
            </div>
            <p class="card-text">Savor the rich symphony of tender grilled chicken, earthy sautéed mushrooms, and velvety melted cheese, nestled on our signature golden crust. Each bite of our chicken and mushroom pizza offers a sublime, flavor-packed indulgence.</p>
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
      <img src="images/meatDeluxePizza.png" class="img-fluid rounded-start" alt="Meat Deluxe Pizza">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Meat Deluxe Pizza</h5>
           <div class="dropend">
          <form class="dropdown-menu p-4" method="POST">
            <div class="mb-3">
            
            <div class="hide">
            <select id="pizza_type" name="pizza_type">
            <option value="meat_deluxe">Meat Deluxe Pizza</option>
            </select>
          </div> 

            <br>
            <label for="quantity">Enter quantity:</label>
            <input type="number" id="quantity" name="quantity" min="0" value="0">
             <button type="submit">Add to Cart</button>
             <p>$9.99 each</p>
              </form>
            </div>
            <p class="card-text">Indulge in the bold flavors of our Meat Deluxe Pizza. A carnivore's dream, this masterpiece boasts a hearty assortment of premium meats, generously spread over our artisanal crust and topped with a luscious blend of melted cheeses. Satisfy your cravings with each mouthwatering, protein-packed bite.</p>
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

