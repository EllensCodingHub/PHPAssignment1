
<?php 
  session_start();

  date_default_timezone_set("America/Halifax");

  // those on Atlantic timezone can use:
  // date_default_timezone_set("America/Halifax");

  require_once("database.php");

  $user_name = filter_input(INPUT_POST, 'user_name');
  $user_password = filter_input(INPUT_POST, 'password');

  $queryUsers = 'SELECT * FROM registrations WHERE userName = :userName';

  $statement = $db->prepare($queryUsers);
  $statement->bindValue(':userName', $user_name);
  $statement->execute();
  $user = $statement->fetch();
  $statement->closeCursor();

  if ($user) { // shorthand for "$user != null"
    $now = new DateTime(); // gets system current date and time
    $last_failed = new DateTime($user['lastFailedLogin']);

    $interval = $now->getTimeStamp() - $last_failed->getTimeStamp();

    if ($user['failedAttempts'] >= 3 && $interval < 300) { // 300 seconds / 5 minutes
      $remaining = 300 - $interval;
      $_SESSION['login_error'] = "Account locked. Try again in " . ceil($remaining) . " second(s).";
      header("Location: login_form.php");
      exit();

    if (password_verify($user_password, $user['password'])) {
      // more code to come next week
    }
    else {
      // more code to come next week
    }
    }
  else {
    $_SESSION['login_error'] = "User not found.";
    header("Location: login_form.php");
    exit();
  }
  }
?>