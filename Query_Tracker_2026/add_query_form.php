
<!DOCTYPE html>
<html>
  <head>
    <title>Query Tracker - Add Query</title>
    <link rel="stylesheet" type="text/css" href="css/query.css" />
  </head>
  <body>
    <?php include("header.php"); ?>
    <main id="addQuery">
      <h2>Add Query</h2>
      <form action="add_query.php" method="post" id="add_query_form" enctype="multipart/form-data">
      
      <p><a href="index.php">View Agent List</a></p>
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
        <input type="submit" value="Save Query"/><br/>

    </div>
    </form>
      </main>
      <?php include("footer.php"); ?>
  </body>
</html>