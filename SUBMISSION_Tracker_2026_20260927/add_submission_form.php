
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
        <label>Response:</label>
        <input type="text" name="response"/><br/>
        <label>Feedback:</label>
        <input type="text" name="feedback"/><br/>

      </div>

      <div id="buttons">

        <label>&nbsp;</label>
        <input type="submit" value="Save Submission"/><br/>

    </div>
    </form>
      </main>
      <?php include("footer.php"); ?>
  </body>
</html>