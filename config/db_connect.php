<?php 

    // Connect to database
    $conn = mysqli_connect('localhost', 'john', 'toor', 'pizza');

    // Check connection
    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error(); 
    }

?>