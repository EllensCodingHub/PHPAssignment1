
<?php 
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Submission Tracker - Update Error</title>
    <link rel="stylesheet" type="text/css" href="css/submission.css" />
  </head>
  <body>

    <?php include("header.php"); ?>

    <main>
      <h2>Update Error</h2>

      <p>Error Message: <?php echo $_SESSION["update_error"]; ?> </p>

      <p><a href="update_submission_form.php">Return to Submission Form</a></p>
    </main>

    <?php include("footer.php"); ?>

  </body>

</html>