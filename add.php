<?php 

    if(isset($_POST['email'])) {
        $email = htmlspecialchars($_POST['email']);
        $title = htmlspecialchars($_POST['title']);
        $ingredients = htmlspecialchars($_POST['ingredients']);

        echo $email;
        echo $title;
        echo $ingredients;
    }


?>


<!DOCTYPE html>
<html lang="en">

    <?php require './templates/header.php' ?>

    <section class="container grey-text">
        <h4 class="center">Add a Pizza</h4>
        <form action="" class="white form" method="POST">
            <label>Your Email:</label>
            <input type="email" name="email">
            <label>Pizza Title:</label>
            <input type="text" name="title">
            <label>Ingredients (comma saparated):</label>
            <input type="text" name="ingredients">
            <div class="center">
                <input type="submit" value="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php require './templates/footer.php' ?>
    

</html>