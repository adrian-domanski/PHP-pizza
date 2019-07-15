<?php 

    // // // // // // // // //
    // Connect to database  // 
    // // // // // // // // // 

    require_once 'config/db_connect.php';

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
    // print_r($pizzas);

    // // // // // // // // // //
    // End of basic connection //
    // // // // // // // // // //

    //Separated ingredients array for each pizza
    


?>

<!DOCTYPE html>
<html lang="en">

    <?php require './templates/header.php' ?>

    <h4 class="center grey-text">Pizzas!</h4>
    <div class="container">
        <div class="row">

            <?php foreach($pizzas as $pizza):?>

                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                            <ul>
                                <?php foreach(explode(',', $pizza['ingredients']) as $ing): ?>
                                    <li><?php echo htmlspecialchars($ing) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="card-action right-align">
                            <a href="#!" class="brand-text">More Info</a>
                        </div>
                    </div>
                </div>

        <?php endforeach; ?>

        </div>
    </div>

    <?php require './templates/footer.php' ?>

</html>