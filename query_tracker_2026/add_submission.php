<?php 

  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  session_start();

  // get data from form and assign variables
  $submission_id = filter_input(INPUT_POST, 'submission_id');
  $submission_date = filter_input(INPUT_POST, 'submission_date');
  $agency_name = filter_input(INPUT_POST, 'agency_name');
  $image = $_FILES['file1'];
  $agent_name = filter_input(INPUT_POST, 'agent_name');
  $email_address = filter_input(INPUT_POST, 'email_address');
  $website_address = filter_input(INPUT_POST, 'website_address');
  $phone_number = filter_input(INPUT_POST, 'phone_number');
  $feedback = filter_input(INPUT_POST, 'feedback');
  $status = filter_input(INPUT_POST, 'status_id');

  require_once("database.php"); // require_once prevents duplicate connections to database
  
  require_once("image_util.php"); // for image processing functions

  $base_dir = './images/';

  // Validation will be added later to ensure no null data and no duplicates

  // Add query

  $querySubmissions = 'SELECT * FROM submissions';

  $statement = $db->prepare($querySubmissions);
  $statement->execute();
  $submissions = $statement->fetchAll();
  $statement->closeCursor();

  foreach ($submissions as $submission) {
    if ($email_address == $submission["emailAddress"]) {
      $_SESSION["add_error"] = "Invalid data. Email address already exists in our database. Please try again.";
      $url = "add_error.php";
      header("Location: " . $url);
      die();
    }
  }

  if ($agency_name == null || $agent_name == null || $email_address == null || $website_address == null || 
      $phone_number == null) {
        $_SESSION["add_error"] = "Invalid submission data. Please check all fields and try again.";
        $url = "add_error.php";
        header("Location: " . $url);
        die();
      }

  $image_name = ''; // default empty

  // ***** Image Upload *****

  if ($image && $image['error'] == UPLOAD_ERR_OK) {
    // process new image
    $original_filename = basename($image['name']);
    $upload_path = $base_dir . $original_filename;

    if (!move_uploaded_file($image['tmp_name'], $upload_path)) {
      die('Could not move uploaded file to: ' . $upload_path);
}

    process_image($base_dir, $original_filename);

    // save _100 version in DB
    $dot_pos = strpos($original_filename, '.');
    $name_100 = substr($original_filename, 0, $dot_pos) . '_100' . substr($original_filename, $dot_pos);
    $image_name = $name_100;

  }
  else {
    // use placeholder
    $placeholder = 'placeholder.jpg';
    $placeholder_100 = 'placeholder_100.jpg';
    $placeholder_400 = 'placeholder_400.jpg';

    if (!file_exists($base_dir . $placeholder_100) || !file_exists($base_dir . $placeholder_400)) {
        process_image($base_dir, $placeholder);
    }

    $image_name = $placeholder_100;

  }

  // add submission

  $query = 'INSERT INTO submissions (submissionDate, submissionID, agencyName, imageName, agentName, emailAddress, 
  websiteAddress, phoneNumber, feedback, statusID)
  VALUES (:submissionDate, :submissionID, :agencyName, :imageName, :agentName, :emailAddress, :websiteAddress,
  :phoneNumber, :feedback, :statusID)';

  $statement = $db->prepare($query); // matches 'INSERT INTO' query syntax

  $statement->bindValue(':submissionID', $submission_id);
  $statement->bindValue(':submissionDate', $submission_date); // VALUE, $variable
  $statement->bindValue(':agencyName', $agency_name);
  $statement->bindValue(':imageName', $image_name);
  $statement->bindValue(':agentName', $agent_name);
  $statement->bindValue(':emailAddress', $email_address);
  $statement->bindValue(':websiteAddress', $website_address);
  $statement->bindValue(':phoneNumber', $phone_number);
  $statement->bindValue(':feedback', $feedback);
  $statement->bindValue(':statusID', $status);

  $statement->execute();
  $statement->closeCursor();

  $_SESSION["fullName"] = $agent_name . " ";
  $url = "add_submission_confirmation.php";
  header("Location: " . $url);
  die();

?>