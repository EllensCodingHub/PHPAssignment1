
<?php 
  session_start();

  // get data from form and assign to variables
  $submission_id = filter_input(INPUT_POST, 'submission_id', FILTER_VALIDATE_INT);
  $submission_date = filter_input(INPUT_POST, 'submission_date');
  $agency_name = filter_input(INPUT_POST, 'agency_name');
  $agent_name = filter_input(INPUT_POST, 'agent_name');
  $email_address = filter_input(INPUT_POST, 'email_address');
  $website_address = filter_input(INPUT_POST, 'website_address');
  $phone_number = filter_input(INPUT_POST, 'phone_number');
  $response = filter_input(INPUT_POST, 'response');
  $feedback = filter_input(INPUT_POST, 'feedback');

  require_once("database.php"); // require_once prevents duplicate connections to the database

  // Validation to be added later to ensure no null data and no duplicate contacts

  $querySubmissions = 'SELECT * FROM submissions';

  $statement = $db->prepare($querySubmissions);
  $statement->execute();
  $submissions = $statement->fetchAll();
  $statement->closeCursor();

  foreach ($submissions as $submission) {
    if ($email_address == $submission["emailAddress"] && submission_id != $submission["submissionID"]) {
      $_SESSION["update_error"] = "Invalid data. That email address already exists in the database. Please try again.";
      $url = "update_error.php";
      header("Location: " . $url);
      die();
    }
  }

  // Update submission info

  $query = '
      UPDATE contacts
      SET submissionDate = :submissionDate,
          agencyName = :agencyName,
          agentName = :agentName,
          emailAddress = :emailAddress,
          websiteAddress = :websiteAddress,
          phoneNumber = :phoneNumber,
          response = :response,
          feedback = :feedback
      WHERE submissionID = :submissionID';

  $statement = $db->prepare($query);

  $statement->bindValue(':submissionID',$submission_id); // VALUE, $variable
  $statement->bindValue(':submissionDate',$submission_date); // VALUE, $variable
  $statement->bindValue(':agencyName', $agency_name);
  $statement->bindValue(':agentName', $agent_name);
  $statement->bindValue(':emailAddress', $email_address);
  $statement->bindValue(':websiteAddress', $website_address);
  $statement->bindValue(':phoneNumber', $phone_number);
  $statement->bindValue(':response', $response);
  $statement->bindValue(':feedback', $feedback);

  $statement->execute();
  $statement->closeCursor();

  $_SESSION["agentName"] = $agent_name . " " ;
  $url = "update_contact_confirmation.php";
  header("Location: " . $url);
  die();

?>