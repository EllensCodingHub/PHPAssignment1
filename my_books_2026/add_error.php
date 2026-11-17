<?php 
  session_start();
?>

<!DOCTYPE html>

<html>
  <head>
    <title>My Books - Add Error</title>
    <link rel="stylesheet" type="text/css" href="css/submission.css" />
  </head>

  <body>
    <?php include("header.php"); ?>

    <main>
      <h2>Add Error</h2>

      <p>Error Message: <?php echo $_SESSION["add_error"]; ?> </p>

      <p><a href="add_submission_form.php">Add Book</a></p>
      <p><a href="index.php">View Book Library</a></p>
    </main>

    <?php include("footer.php"); ?>

  </body>

</html>