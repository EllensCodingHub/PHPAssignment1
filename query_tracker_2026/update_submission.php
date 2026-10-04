
<?php 
  session_start();

  // get data from form and assign to variables
  $submission_id = filter_input(INPUT_POST, 'submission_id', FILTER_VALIDATE_INT);
  $submission_date = filter_input(INPUT_POST, 'submission_date');
  $agency_name = filter_input(INPUT_POST, 'agency_name');
  $image_name = filter_input(INPUT_POST, 'image_name');
  $image = $_FILES['file1'] ?? null;
  $agent_name = filter_input(INPUT_POST, 'agent_name');
  $email_address = filter_input(INPUT_POST, 'email_address');
  $website_address = filter_input(INPUT_POST, 'website_address');
  $phone_number = filter_input(INPUT_POST, 'phone_number');
  $feedback = filter_input(INPUT_POST, 'feedback');
  $status_id = filter_input(INPUT_POST, 'status_id');

  require_once("database.php"); // require_once prevents duplicate connections to the database

  require_once("image_util.php");

  $base_dir = './images/';

  // Validation to be added later to ensure no null data and no duplicate contacts

  $querySubmissions = 'SELECT * FROM submissions';

  $statement = $db->prepare($querySubmissions);
  $statement->execute();
  $submissions = $statement->fetchAll();
  $statement->closeCursor();

  foreach ($submissions as $submission) {
    if ($email_address == $submission["emailAddress"] && $submission_id != $submission["submissionID"]) {
      $_SESSION["update_error"] = "Invalid data. That email address already exists in the database. Please try again.";
      $url = "update_error.php";
      header("Location: " . $url);
      die();
    }
  }

  if($agency_name == null || $agent_name == null || $email_address == null) {
    $_SESSION["update_error"] = "Invalid submission data. Please check all fields
    and try again.";
    $url = "update_error.php";
    header("Location: " . $url);
    die();
  }

  // Update submission info

  if ($image && $image['error'] == UPLOAD_ERR_OK) {
    $original_filename = basename($image['name']);
    $upload_path = $base_dir . $original_filename;

    if (!move_uploaded_file($image['tmp_name'], $upload_path)) {
        die('Could not move uploaded file to: ' . $upload_path);
    }

    process_image($base_dir, $original_filename);

    $dot_pos = strrpos($original_filename, '.');
    $image_name = substr($original_filename, 0, $dot_pos)
                . '_100'
                . substr($original_filename, $dot_pos);
}

  $query = '
      UPDATE submissions
      SET submissionDate = :submissionDate,
          agencyName = :agencyName,
          imageName = :imageName,
          agentName = :agentName,
          emailAddress = :emailAddress,
          websiteAddress = :websiteAddress,
          phoneNumber = :phoneNumber,
          feedback = :feedback,
          statusID = :statusID
      WHERE submissionID = :submissionID';

  $statement = $db->prepare($query);

  $statement->bindValue(':submissionID',$submission_id); // VALUE, $variable
  $statement->bindValue(':submissionDate',$submission_date); // VALUE, $variable
  $statement->bindValue(':agencyName', $agency_name);
  $statement->bindValue(':imageName', $image_name);
  $statement->bindValue(':agentName', $agent_name);
  $statement->bindValue(':emailAddress', $email_address);
  $statement->bindValue(':websiteAddress', $website_address);
  $statement->bindValue(':phoneNumber', $phone_number);
  $statement->bindValue(':feedback', $feedback);
  $statement->bindValue(':statusID', $status_id);

  $statement->execute();
  $statement->closeCursor();

  $_SESSION["agent_name"] = $agent_name . " " ;
  $url = "update_submission_confirmation.php";
  header("Location: " . $url);
  die();

?>