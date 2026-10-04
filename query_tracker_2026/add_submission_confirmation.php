<?php 
  session_start(); // session variables to be added later

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Submission Tracker - Add Submission Confirmation</title>
    <link rel="stylesheet" type="text/css" href="css/submission.css"/>
  </head>
  <body>
    <?php include("header.php"); ?>
    <main>
      <h2>Success! <?php echo htmlspecialchars($_SESSION["name"]); ?> has been added to your submission list!</h2>
      <p><a href="index.php">View Submission List</a></p>
    </main>
    <?php include("footer.php"); ?>
  </body>
</html>