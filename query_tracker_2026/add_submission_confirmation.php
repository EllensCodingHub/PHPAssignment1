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
      <h2>Success!</h2>
        
      <p>
        Great job, <?php echo $_SESSION["userName"]; ?>! Your most 
        recent manuscript submission to <?php echo $_SESSION["agentName"]; ?> 
        has been successfully added to your submission list!
      </p>

      <p><a href="index.php">View Submission List</a></p>

    </main>

    <?php include("footer.php"); ?>

  </body>
</html>