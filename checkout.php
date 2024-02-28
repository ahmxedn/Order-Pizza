<?php 

  include ('config/db_connect.php');

  session_start();

  $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
  $total = 0; // Initialize the total

  // Calculate the total price
  foreach ($cart as $item) {
    $total += $item['price'];
 }
  
  // Check if the form is submitted
if (isset($_POST['submit'])) {
    // Extract form data
    $deliveryType = isset($_POST['deliveryType']) ? $_POST['deliveryType'] : '';
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phoneNumber = isset($_POST['tel']) ? $_POST['tel'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $aptNumber = isset($_POST['aptNumber']) ? $_POST['aptNumber'] : '';
    $deliveryInstructions = isset($_POST['deliveryInstructions']) ? $_POST['deliveryInstructions'] : '';

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the order information into the database
    $sql = "INSERT INTO orders (delivery_type, first_name, last_name, email, phone_number, delivery_address, apt_number, delivery_instructions, total) 
            VALUES ('$deliveryType', '$firstName', '$lastName', '$email', '$phoneNumber', '$address', '$aptNumber', '$deliveryInstructions', '$total')";
    
    
    if ($conn->query($sql)) {
         unset($_SESSION['cart']); // clear the cart
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

 // Close the connection
 $conn->close();
 
 ?>

<!DOCTYPE html>
<html>
<head>
    <?php include('templates/header.php'); ?> 
    <title>Your Order</title>
    <style>
        form{
          
            margin-left:10%; 
            margin-top:2%;
            padding: 20px;
            background: #219ebc;
            width:80%;
        }

        h3, h5{
            text-align: center; 
        }
    </style>
</head>
<body>
    <p>
    <h3>Checkout</h3>
    <p></p>
    <h5>Your total is $<?php echo $total ?></h5>
   
    <form action=<?php echo $_SERVER['PHP_SELF']?> method="POST"> 
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="deliveryType" id="pickupRadio" value="pickup">
            <label class="form-check-label" for="pickupRadio">Pickup</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="deliveryType" id="deliveryRadio" value="delivery">
            <label class="form-check-label" for="deliveryRadio">Delivery</label>
        </div>
        <p>
        <div class="input-group">
            <span class="input-group-text">First and Last name</span>
            <input name="firstName" type="text" aria-label="First name" class="form-control" required>
            <input name="lastName" type="text" aria-label="Last name" class="form-control" required>
    </div> nb
        <p>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
            <input name="tel" type="tel" class="form-control" id="exampleFormControlInput1" required>
        </div>
        <div id="deliveryFields" style="display: none;">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Address</label>
                <input name="address" type="text" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Apt # (optional)</label>
                <input name="aptNumber" type="text" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label name="deliveryInstructions" for="floatingTextarea2">Delivery Instructions (optional) </label>
            </div>
        </div>
        <p>
        <p>
        <input type="submit" name="submit" value="Submit" class="btn btn-success" onclick="orderAlert()">
    </form>
      
    <script>
        const pickupRadio = document.getElementById('pickupRadio');
        const deliveryRadio = document.getElementById('deliveryRadio');
        const deliveryFields = document.getElementById('deliveryFields');
        
        // only show the delivery options if the user chooses 'delivery' 

        pickupRadio.addEventListener('change', () => {
            deliveryFields.style.display = 'none';
        });

        deliveryRadio.addEventListener('change', () => {
            deliveryFields.style.display = 'block';
        });
        
        // function to give an alert once the order is taken 
        function orderAlert() {
            alert("Order submitted successfully!");
        }

    </script>
    <?php include('templates/footer.php'); ?>

    
</body>
</html>
