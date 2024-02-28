<?php

  // MYSQLi
  // connect to database 
  // conn is variable used to connect 
  // host, username, password, database  
  $conn = mysqli_connect('localhost', 'ahmedn', 'test1234', "ahmed's_pizza"); 
  
  // check the connection 
  // if there is an error echo the mysqlii connect error 
  if (!$conn){
    echo 'Connection error' . mysqli_connect_error(); 
  }

?> 