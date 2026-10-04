
<?php 
  session_start();

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

  // get submission status
  $queryStatusTypes = 'SELECT * FROM statusTypes';

    $statement = $db->prepare($queryStatusTypes);
    $statement->execute();
    $statusTypes = $statement->fetchAll();
    $statement->closeCursor();

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Submission Manager - Update Submission Form</title>
    <link rel="stylesheet" type="text/css" href="css/submission.css" />
  </head>
  <body>

    <?php include("header.php"); ?>

    <main>
      <h2>Update Submission</h2>
      <form action="update_submission.php" method="post" id="update_submission_form" enctype="multipart/form-data">
        <input type="hidden" name="submission_id" value="<?php echo $submission["submissionID"]; ?>" />
      
        <div id="data">

          <label>Date:</label>
          <input type="text" name="submission_date" value="<?php echo $submission["submissionDate"] ?>"><br/>
          
          <label>Agency</label>
          <input type="text" name="agency_name" value="<?php echo $submission["agencyName"] ?>"><br/>
          
          <label>Agent</label>
          <input type="text" name="agent_name" value="<?php echo $submission["agentName"] ?>"><br/>
          
          <label>Email</label>
          <input type="text" name="email_address" value="<?php echo $submission["emailAddress"] ?>"><br/>
          
          <label>Website</label>
          <input type="text" name="website_address" value="<?php echo $submission["websiteAddress"] ?>"><br/>
          
          <label>Phone</label>
          <input type="text" name="phone_number" value="<?php echo $submission["phoneNumber"] ?>"><br/>
          
          <label>Response? Y/N</label>
          <input type="text" name="response" value="<?php echo $submission["response"] ?>"><br/>

          <label>Feedback</label>
          <input type="text" name="feedback" value="<?php echo $submission["feedback"] ?>"><br/>
          
          <label>Status</label>
          <select name="status_id">
            <?php foreach($statusTypes as $status): ?>

              <option value="<?php echo $status['statusID']; ?>"
                <?php if ($status['statusID'] == $submission['statusID']) echo 'selected';?> >
                <?php echo $status['statusType']; ?>
              </option>

            <?php endforeach; ?>
          </select><br/>

          <label>Upload Agent Photo</label>
          <input type="file" name="file1"/><br/>

        </div>

      <div id="buttons">
        <label>&nbsp;</label>
        <input type="submit" value="Update Submission"/><br/>
      </div>

      </form>

      <p><a href="index.php">View Submission List</a></p>

    </main>

    <?php include("footer.php"); ?>

  </body>

</html>