
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
  $queryStatusTypes = 'SELECT * FROM status_types';

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
        
        <input type="hidden" name="image_name" value="<?php echo $submission['imageName']; ?>" />

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

          <?php if (!empty($submission['imageName'])): ?>
            <label>Current Image:</label>
            <img src="images/<?php echo htmlspecialchars($submission['imageName']); ?>" 
              alt="<?php echo htmlspecialchars($submission['agentName']); ?>"
              height="100" /><br/>
          <?php endif; ?>

          <label for="agent_photo">Update Agent Photo</label>
          <input type="file" name="file1" id="agent_photo" accept=".jpg, .jpeg, .png, .gif"/><br/>

          <div id="preview_container" hidden>
            <label>New Image Preview:</label>
            <img id="image_preview" alt="Selected agent photo" height="100"/><br/>
          </div>

        </div>

      <div id="buttons">
        <label>&nbsp;</label>
        <input type="submit" value="Update Submission"/><br/>
      </div>

      </form>

      <script>

        const photoInput = document.getElementById('agent_photo');
        const imagePreview = document.getElementById('image_preview');
        const previewContainer = document.getElementById('preview_container');

        photoInput.addEventListener('change', function () {
          const file = photoInput.files[0];

          previewContainer.hidden = true;
          imagePreview.removeAttribute('src');

          if (!file) {
            return;
          }

          const reader = new FileReader();

          reader.addEventListener('load', function () {
            imagePreview.src = reader.result;
            previewContainer.hidden = false;
          });

          reader.readAsDataURL(file);
        });

      </script>

      <p><a href="index.php">View Submission List</a></p>

    </main>

    <?php include("footer.php"); ?>

  </body>

</html>