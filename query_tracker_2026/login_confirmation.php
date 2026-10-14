

<?php 
  session_start(); // session variables to be added later

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Manuscript Submission Tracker - Login Confirmation</title>
    <link rel="stylesheet" type="text/css" href="css/submission.css"/>
  </head>
  <body>
    <?php include("header.php"); ?>
    <main>
      <h2>Login Confirmed!</h2> 
      
      <p>
        Welcome back, <?php echo $_SESSION["userName"]; ?> ! 
      </p>
      <p>
        You can now access your submission list by clicking below.
      </p>

      <p><a href="index.php">View Submissions List.</a></p>

    </main>

    <?php include("footer.php"); ?>

  </body>
</html>