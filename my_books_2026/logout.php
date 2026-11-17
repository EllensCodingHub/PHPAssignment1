
<?php
  session_start();

  $_SESSION = []; // CLEARS ALL SESSION DATA
  session_destroy(); // cleans up the session ID

  header("Location: login_form.php");
  die();
?>