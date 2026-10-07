
<?php 
  
  require_once("database.php");

  // get data from the form
  $submission_id = filter_input(INPUT_POST, 'submission_id', FILTER_VALIDATE_INT);

  // get submission record
  $querySubmissions = 'SELECT * FROM submissions WHERE submissionID = :submission_id';

  $statement = $db->prepare($querySubmissions);
  $statement->bindValue(':submission_id', $submission_id);
  $statement->execute();
  $submission = $statement->fetch();
  $statement->closeCursor();

  // delete the submission from the database
  $queryDelete = 'DELETE * FROM submissions WHERE submissionID = :submission_id';

  $statement = $db->prepare($queryDelete);
  $statement->bindValue(':submission_id', $submission_id);
  $statement->execute();
  $statement->closeCursor();

  // reload the index page
  $url = "index.php";
  header("Location: " . $url);
  die();
  
?>