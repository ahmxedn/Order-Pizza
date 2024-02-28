<?php
session_start();

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0; // Initialize the total

// Calculate the total price
foreach ($cart as $item) {
    $total += $item['price'];
}
?>

<!DOCTYPE html>
<html>
<head>
<?php include('templates/header.php'); ?>

    <title>Cart</title>
    <style>
     
        .table-container {
            display: flex;
            justify-content: center; 
            align-items: center;
            margin-top:2%;
        }     

        table, th, td{
            border: 1px solid black; 
        }

        th, td{
            text-align:center; 
            padding:15px;
        }

        table{
            width:80%;
        }

        tr:nth-child(even) {
            background-color: #a5c5e8;
        }
        
        .checkout{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 1%;
            padding-bottom: 2%; 
        }
    </style>
</head>
<body>
    <h1>Your Cart</h1>
    <div class="table-container">
    <table>
        <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
        <!-- echo the name, quantity. and price of the pizza in a table -->
        <?php foreach ($cart as $item) { ?>
            <tr>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td>$<?php echo $item['price']; ?></td>
            </tr>
        <?php } ?>
        <tr>
            <!-- echo the total --> 
            <td colspan="2"><strong>Total:</strong></td>
            <td><strong>$<?php echo $total; ?></strong></td>
        </tr>
    </table>
</div>
<div class="checkout">
    <a href="checkout.php" class="btn btn-success">Checkout</a>
</div>
<?php include('templates/footer.php'); ?>
</body>
</html>
