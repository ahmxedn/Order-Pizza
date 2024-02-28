<!DOCTYPE html>
<html>
<head>  
<?php include('templates/header.php'); ?>

    <title>Menu</title>
    <style>
        body{
            background:#fcfaf7;
        }
        .c-item{
            height: 480px; 
        }

        .c-img{
            height:100%; 
            object-fit:cover; 
        }
        .carousel-caption{
            color:black; 
            font-weight:bold; 
            background:white; 
          
        }

        #carouselExample {
            max-width: 80%; /* Adjust the width as needed */
            margin: 0 auto;
        }

        h3{
            margin:0; 
            padding:0; 
            text-align:center; 
        }
        
    </style>
</head>
<body>
    <p>
    <h3>Menu</h3>
    <p>
    <div class="container">
        <form action="index.php" method="POST">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-50">
                    <h3 class="card-title">Classics</h3>
                    <img src = "images/cheesePizza.jpg" class="card-img-top" alt="cheese pizza">
                    <div class="card-body">    
                        <p class="card-text"></p>
                    </div>
                    <div class="card-footer">
                    <a href="classicPizzas.php" class="btn btn-primary d-flex justify-content-center">More Info</a>         
                    </div>
                </div>
            </div>
           
            <div class="col">
                <div class="card h-50">
                    <h3 class="card-title">Veggie Favourites</h3>
                    <img src = "images/mixedVeggiePizza.jpg" class="card-img-top" alt="veggie pizza">
                    <div class="card-body">
                       
                        <p class="card-text"></p>
                    </div>
                    <div class="card-footer">
                        <a href="veggiePizzas.php" class="btn btn-primary d-flex justify-content-center">More Info</a>
                        
                    </div>
                </div>
            </div>
           
            <div class="col">
                <div class="card h-50">
                     <h3 class="card-title">Meat Favourites</h3>
                    <img src = "images/pepperoniPizza.jpg" class="card-img-top" alt="meat pizza">
                    <div class="card-body">    
                        <p class="card-text"></p>
                    </div>
                    <div class="card-footer">
                        <a href="meatPizzas.php" class="btn btn-primary d-flex justify-content-center">More Info</a>
                    </div>
                </div>
            </div>
           
        </form>
    </div>
    <?php include('templates/footer.php'); ?>
</body>
</html>

