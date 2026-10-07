
<?php 
  session_start();

  require_once("database.php");

  // get data from the form
  $submission_id = filter_input(INPUT_POST, 'submission_id', FILTER_VALIDATE_INT);

  if (!$submission_id) {
    header("Location: index.php");
    exit();
  }

  // get submission record
  $querySubmissions = 'SELECT s.submissionID, s.submissionDate, s.agencyName, s.imageName, s.agentName, s.emailAddress,
  s.websiteAddress, s.phoneNumber, s.feedback, t.statusType
  FROM submissions s
  LEFT JOIN status_types t ON s.statusID = t.statusID
  WHERE s.submissionID = :submission_id';

    $statement = $db->prepare($querySubmissions);
    $statement->bindValue(':submission_id', $submission_id);
    $statement->execute();
    $submission = $statement->fetch();
    $statement->closeCursor();

    if (!$submission) {
      echo "Submission not found.";
      exit();
    }

  // convert _100 image to _400 version
  $imageName = $submission['imageName']; // example: Bugs_Bunny_100.png
  $dotPosition = strrpos($imageName, '.'); // example: 14 which is the position of the . in $imageName
  $baseName = substr($imageName, 0, $dotPosition); // example: Bugs_Bunny_100 which is the substring in $imageName

  $extension = substr($imageName, $dotPosition); // example: .png which is starting at position 14
                                                // and taking the rest of the string

  // Validation
  if (str_ends_with($baseName, '_100')) {
    $baseName = substr($baseName, 0, -4); // removes the last 4 characters which are the _100
  }

  $imageName_400 = $baseName . '_400' . $extension; // example: Bugs_Bunny + _400 + .png or Bugs_Bunny_400.png

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Submission Details</title>
    <link rel="stylesheet" type="text/css" href="css/submission.css" />
  </head>
  <body>

    <?php include("header.php"); ?>

    <div class = "container">
      <h2>Submission Details</h2>
      
      <img class="submission-image" src="<?php echo htmlspecialchars('./images/' . $imageName_400); ?>" 
          alt="<?php echo htmlspecialchars($submission['agentName'] . ' - ' . $submission['agencyName']); ?>" />

      <div class="submission-info">
        
        <p><strong>Agent Name:</strong> <?php echo htmlspecialchars($submission['agentName']); ?> </p>
        <p><strong>Agency:</strong> <?php echo htmlspecialchars($submission['agencyName']); ?> </p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($submission['emailAddress']); ?> </p>
        <p><strong>Website:</strong> <?php echo htmlspecialchars($submission['websiteAddress']); ?> </p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($submission['phoneNumber']); ?> </p>
        <p><strong>Feedback (if any):</strong> <?php echo htmlspecialchars($submission['feedback']); ?> </p>
        <p>&nbsp;</p>
        <p><strong>Status:</strong> <?php echo htmlspecialchars($submission['statusType']); ?> </p>

      </div>

      <p><a class="back-link" href="index.php">Back to Submission List</a></p>

    </div>

    <?php include("footer.php"); ?>

  </body>

</html>