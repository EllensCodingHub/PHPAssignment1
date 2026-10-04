
<?php 
  session_start();

  require_once("database.php");

  $queryStatusTypes = 'SELECT * FROM statusTypes';

  $statement = $db->prepare($queryStatusTypes);
  $statement->execute();
  $statusTypes = $statement->fetchAll();
  $statement->closeCursor();

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Submission Tracker - Add Submission</title>
    <link rel="stylesheet" type="text/css" href="css/submission.css" />
  </head>
  <body>
    <?php include("header.php"); ?>
    <main id="addSubmission">
      <h2>Add Submission</h2>
      <form action="add_submission.php" method="post" id="add_submission_form" enctype="multipart/form-data">
      
      <p><a href="index.php">View Submission List</a></p>
      <div id="data">
        
        <label>Date:</label>
        <input type="text" name="submission_date"/><br/>
        
        <label>Agency:</label>
        <input type="text" name="agency_name"/><br/>
        
        <label>Agent:</label>
        <input type="text" name="agent_name"/><br/>
        
        <label>Email:</label>
        <input type="text" name="email_address"/><br/>
        
        <label>Website:</label>
        <input type="text" name="website_address"/><br/>
        
        <label>Phone:</label>
        <input type="text" name="phone_number"/><br/>
        
        <label>Response? Y/N:</label>
        <input type="text" name="response"/><br/>
        
        <label>Feedback:</label>
        <input type="text" name="feedback"/><br/>

        
        <label>Status:</label>
        <select name="status_id"> 
          <?php foreach($statusTypes as $status):?>

              <option value="<?php echo $status['statusID']; ?>">
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
        <input type="submit" value="Save Submission"/><br/>

      </div>

      </form>
      
      <p><a href="index.php">View Submission List</a></p>

    </main>

    <?php include("footer.php"); ?>

  </body>

</html>