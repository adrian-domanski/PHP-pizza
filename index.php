<?php 

    // // // // // // // // //
    // Connect to database  // 
    // // // // // // // // // 

    $conn = mysqli_connect('localhost', 'john', 'toor', 'pizza');

    // Check connection
    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error(); 
    }

    // Write query for all pizzas
    $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';
    
    // Make query and & get result
    $result = mysqli_query($conn, $sql);

    // Fetch the resulting row as an assoc array
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free result from memory
    mysqli_free_result($result);

    // Close connection
    mysqli_close($conn);

    // Print items
    print_r($pizzas);

?>

<!DOCTYPE html>
<html lang="en">

    <?php require './templates/header.php' ?>
    <?php require './templates/footer.php' ?>

</html>