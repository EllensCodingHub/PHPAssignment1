
<?php 
  session_start();
?>

<!DOCTYPE html>

<html>
  <head>
    <title>Submission Tracker - User Error</title>
    <link rel="stylesheet" type="text/css" href="css/submission.css" />
  </head>

  <body>
    <?php include("header.php"); ?>

    <main>
      <h2>User Error</h2>

      <p>Error Message: <?php echo $_SESSION["user_error"]; ?> </p>

      <p><a href="register_user_form.php">Registration Form</a></p>
      <p><a href="login_form.php">You already have an account. Please
        return to the login page to sign into your account to access
        your submission list.</a></p>
        
    </main>

    <?php include("footer.php"); ?>

  </body>

</html>