
<?php 
  session_start(); // session variables to be added later

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Submission Tracker - Register User Confirmation</title>
    <link rel="stylesheet" type="text/css" href="css/submission.css"/>
  </head>
  <body>
    <?php include("header.php"); ?>
    <main>
      <h2>Success!</h2> 
      
      <p>
        Thank you for registering, <?php echo $_SESSION["userName"]; ?>! Your Submission
        Tracker has been created successfully. You can now log in and start organizing
        your manuscript submissions.
      </p>

      <p><a href="index.php">View Submissions List.</a></p>

    </main>

    <?php include("footer.php"); ?>

  </body>
</html>