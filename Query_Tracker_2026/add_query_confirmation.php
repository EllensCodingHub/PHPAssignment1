<?php 
  session_start(); // session variables to be added later

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Query Tracker - Add Query Confirmation</title>
    <link rel="stylesheet" type="text/css" href="css/contact.css"/>
  </head>
  <body>
    <?php include("header.php"); ?>
    <main>
      <h2>Success! Your query list has been updated!</h2>
      <p><a href="index.php">View Agent List</a></p>
    </main>
    <?php include("footer.php"); ?>
  </body>
</html>