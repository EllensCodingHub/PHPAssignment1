<?php 
  session_start();

  // get data from form and assign variables
  $submission_date = filter_input(INPUT_POST, 'submission_date');
  $agency_name = filter_input(INPUT_POST, 'agency_name');
  $agent_name = filter_input(INPUT_POST, 'agent_name');
  $email_address = filter_input(INPUT_POST, 'email_address');
  $website_address = filter_input(INPUT_POST, 'website_address');
  $phone_number = filter_input(INPUT_POST, 'phone_number');
  $response = filter_input(INPUT_POST, 'response');
  $feedback = filter_input(INPUT_POST, 'feedback');

  require_once("database.php"); // require_once prevents duplicate connections to database

  // Validation will be added later to ensure no null data and no duplicates

  // Add query
  $sql = 'INSERT INTO submissions (submissionDate, agencyName, agentName, emailAddress, 
  websiteAddress, phoneNumber, response, feedback)
  VALUES (:submissionDate, :agencyName, :agentName, :emailAddress, :websiteAddress,
  :phoneNumber, :response, :feedback)';

  $statement = $db->prepare($sql); // matches 'INSERT INTO' query syntax

  $statement->bindValue(':submissionDate', $submission_date); // VALUE, $variable
  $statement->bindValue(':agencyName', $agency_name);
  $statement->bindValue(':agentName', $agent_name);
  $statement->bindValue(':emailAddress', $email_address);
  $statement->bindValue(':websiteAddress', $website_address);
  $statement->bindValue(':phoneNumber', $phone_number);
  $statement->bindValue(':response', $response);
  $statement->bindValue(':feedback', $feedback);

  $statement->execute();
  $statement->closeCursor();

  $url = "add_submission_confirmation.php";
  header("Location: " . $url);
  die();

?>