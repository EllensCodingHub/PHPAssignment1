<?php 
  require("database.php");

  $querySubmissions = 'SELECT s.submissionDate, s.submissionID, s.agencyName, s.agentName, s.emailAddress,
  s.websiteAddress, s.phoneNumber, s.response, s.feedback, s.statusType
  FROM submissions s
  LEFT JOIN statusTypes t ON s.statusTypeID = t.statusTypeID';

  $statement = $db->prepare($querySubmissions);
  $statement->execute();
  $submissions = $statement->fetchAll();
  $statement->closeCursor();

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Submission Tracker - Home</title>
    <link rel="stylesheet" type="text/css" href="css/submission.css" /> 
  </head>
  <body>
    <?php include("header.php"); ?>
    <main id="agentList">
      <h2>Submission List</h2>
      <table>
        <tr>
          <th>Date</th>
          <th>Agency</th>
          <th>Agent</th>
          <th>Email</th>
          <th>Website</th>
          <th>Phone</th>
          <th>Response Y/N</th>
          <th>Feedback</th>
          <th>Submission Type</th>
          <th>Agent Photo</th>
          <th>Update</th> <!-- for update -->
          <th>&nbsp;</th> <!-- for delete -->
        </tr>
        <?php foreach ($submissions as $submission): ?>
          <tr>
            <td><?php echo htmlspecialchars($submission['submissionDate']); ?></td>
            <td><?php echo htmlspecialchars($submission['submissionID']); ?></td>
            <td><?php echo htmlspecialchars($submission['agencyName']); ?></td>
            <td><?php echo htmlspecialchars($submission['agentName']); ?></td>
            <td><?php echo htmlspecialchars($submission['emailAddress']); ?></td>
            <td><?php echo htmlspecialchars($submission['websiteAddress']); ?></td>
            <td><?php echo htmlspecialchars($submission['phoneNumber']); ?></td>
            <td><?php echo htmlspecialchars($submission['response']); ?></td>
            <td><?php echo htmlspecialchars($submission['feedback']); ?></td>
            <td><?php echo htmlspecialchars($submission['statusType']); ?></td>
            
            <td>
              <img src="<?php echo htmlspecialchars('./images/' . $submission['imageName']); ?>"
              alt="<?php echo htmlspecialchars($submission['agentName'] . ' ' . $submission['agencyName']); ?>" />
              </td>
            
            <td>
              <form action="update_submission_form.php" method="post">
                <input type="hidden" name="submission_id" value="<?php echo $submission["submissionID"]; ?>" />
                <input type="submit" value="Update" />
              </form>
            </td>

          </tr>
        <?php endforeach; ?>
      </table>

      <p><a href="add_submission_form.php">Add Submission</a></p>
      
    </main>

    <?php include("footer.php"); ?>

  </body>

</html>