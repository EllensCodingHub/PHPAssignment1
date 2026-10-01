<?php 
  require("database.php");

  $sql = 'SELECT * FROM submissions';

  $statement = $db->prepare($sql);
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
        </tr>
        <?php foreach ($submissions as $submission): ?>
          <tr>
            <td><?php echo htmlspecialchars($submission['submissionDate']); ?></td>
            <td><?php echo htmlspecialchars($submission['agencyName']); ?></td>
            <td><?php echo htmlspecialchars($submission['agentName']); ?></td>
            <td><?php echo htmlspecialchars($submission['emailAddress']); ?></td>
            <td><?php echo htmlspecialchars($submission['websiteAddress']); ?></td>
            <td><?php echo htmlspecialchars($submission['phoneNumber']); ?></td>
            <td><?php echo htmlspecialchars($submission['response']); ?></td>
            <td><?php echo htmlspecialchars($submission['feedback']); ?></td>
          </tr>
        <?php endforeach; ?>
      </table>

      <p><a href="add_submission_form.php">Add Submission</a></p>
    </main>
    <?php include("footer.php"); ?>
  </body>
</html>