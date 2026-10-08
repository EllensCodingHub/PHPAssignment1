
<?php 

  session_start();

  // get data from form and assign variables
  $user_name = filter_input(INPUT_POST, 'user_name');
  $user_password = filter_input(INPUT_POST, 'password');
  $email_address = filter_input(INPUT_POST, 'email_address');
  
  $hash = password_hash($user_password, PASSWORD_DEFAULT);

  require_once("database.php"); // require_once prevents duplicate connections to database
  
  // Validation will be added later to ensure no null data and no duplicates

  // Add query

  $queryUsers = 'SELECT * FROM registrations';

  $statement = $db->prepare($queryUsers);
  $statement->execute();
  $users = $statement->fetchAll();
  $statement->closeCursor();

  foreach ($users as $user) {
    if ($user_name == $user["userName"]) {
      $_SESSION["user_error"] = "Invalid data. Username already exists in our database. Please try again.";
      $url = "user_error.php";
      header("Location: " . $url);
      die();
    }
  }

  if ($user_name == null || $user_password == null || $email_address == null) {
        $_SESSION["user_error"] = "Invalid user information. Please check all fields and try again.";
        $url = "user_error.php";
        header("Location: " . $url);
        die();
      }

  // add registration

  $query = 'INSERT INTO registrations (userName, password, emailAddress)
  VALUES (:userName, :password, :emailAddress)';

  $statement = $db->prepare($query); // matches 'INSERT INTO' query syntax

  $statement->bindValue(':userName', $user_name);
  $statement->bindValue(':password', $hash); // VALUE, $variable
  $statement->bindValue(':emailAddress', $email_address);

  $statement->execute();
  $statement->closeCursor();

  $_SESSION["userName"] = $user_name;
  $_SESSION["isLoggedIn"] = 1;

  $url = "register_user_confirmation.php";
  header("Location: " . $url);
  die();

?>