<?php 
  session_start(); // session variables to be added later

?>

<!DOCTYPE html>
<html>
  <head>
    <title>My Book Library - Add New Book</title>
    <link rel="stylesheet" type="text/css" href="css/submission.css"/>
  </head>
  <body>
    <?php include("header.php"); ?>
    <main>
      <h2>Success!</h2>
        
      <p>
        Congratulations, <?php echo $_SESSION["userName"]; ?>! Your new book — <?php echo $_SESSION["bookTitle"]; ?> —
        has been successfully added to your library!
      </p>

      <p><a href="index.php">View Your Library</a></p>

    </main>

    <?php include("footer.php"); ?>

  </body>
</html>