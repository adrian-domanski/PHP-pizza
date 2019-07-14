<?php 

    $email = $title = $ingredients = '';

    if(isset($_POST['email'])) {
        $form_err = false;
        $errors = [];
        

        // Check email field
        if(empty($_POST['email'])) {
            $form_err = true;
            $errors['e_email'] = 'An email is required';
        } else {
            $email = htmlspecialchars($_POST['email']);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $form_err = true;
                $errors['e_email'] = 'Invalid email address!';
                // DEV
                echo 'Invalid email!';
            }
        }

        // Check title field
        if(empty($_POST['title'])) {
            $errors['e_title'] = 'An title is required <br>';
        } else {
            $title = htmlspecialchars($_POST['title']);
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {
                $form_err = true;
                $errors['e_title'] = "Title must be letters and spaces only!";
            }
        }

        // Check ingredients field
        if(empty($_POST['ingredients'])) {
            $errors['e_ingredients'] = 'At least one ingredient is required!';
        } else {
            $ingredients = htmlspecialchars($_POST['ingredients']);
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
                $form_err = true;
                $errors['e_ingredients'] = "Ingregients must be a comma separated list!";
            }
        }
    }


?>


<!DOCTYPE html>
<html lang="en">

    <?php require './templates/header.php' ?>

    <section class="container grey-text">
        <h4 class="center">Add a Pizza</h4>
        <form action="" class="white form" method="POST">
            <label>Your Email:</label>
            <input type="email" value="<?php echo htmlspecialchars($email) ?>" name="email">
            <div class="red-text"><?php if(isset($errors['e_email'])) echo $errors['e_email'] ?></div>
            <label>Pizza Title:</label>
            <input type="text" value="<?php echo htmlspecialchars($title) ?>" name="title">
            <div class="red-text"><?php if(isset($errors['e_title'])) echo $errors['e_title'] ?></div>
            <label>Ingredients (comma saparated):</label>
            <input type="text" value="<?php echo htmlspecialchars($ingredients) ?>" name="ingredients">
            <div class="red-text"><?php if(isset($errors['e_ingredients'])) echo $errors['e_ingredients'] ?></div>
            <div class="center">
                <input type="submit" value="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php require './templates/footer.php' ?>
    

</html>