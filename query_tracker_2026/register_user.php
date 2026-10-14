
<?php 

  session_start();

  require_once('message.php');

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

  // set up email variables . . . this is site administrator sending email to user
  $to_address = $email_address;
  $to_name = $user_name;
  $from_address = 'YOUR_USERNAME@somehost.com'; // host's email address
  $from_name = 'Manuscript Submission Tracker Admin';
  $subject = 'Manuscript Submission Tracker - Registration Complete';
  $body = '<p>Thank you for registering with Manuscript Submission Tracker.</p>' . 
          '<p>Sincerely,</p>' . 
          '<p>Manuscript Submission Tracker Admin Team</p>';
  $is_body_html = true;

  // send email
  try {
    send_mail($to_address, $to_name, $from_address, $from_name, $subject, $body, $is_body_html);
  } 
  catch (Exception $ex) {
    //throw $th;
    $_SESSION["user_error"] = $ex->getMessage();
        $url = "user_error.php";
        header("Location: " . $url);
        die();
  }

  $url = "register_user_confirmation.php";
  header("Location: " . $url);
  die();

?>