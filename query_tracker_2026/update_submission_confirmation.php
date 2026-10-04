
<?php 
  session_start(); // session variables to come later
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Submission Tracker - Update Submission Confirmation</title>
    <link rel="stylesheet" type="text/css" href="css/submission.css">
  </head>
  <body>
    
    <?php include("header.php"); ?>

    <main>
      <h2>Update Submission Confirmation</h2>

      <p>
        Thank you. Your submission to <?php echo $_SESSION["agent_name"]; ?> has been
        successfully updated. 
      </p>
      <p><a href="index.php">View Submission List</a></p>
    </main>

    <?php include("footer.php"); ?>

  </body>

</html>
