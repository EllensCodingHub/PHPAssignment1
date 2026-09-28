<?php 
  require("database.php");

  $sql = 'SELECT * FROM queries';

  $statement = $db->prepare($sql);
  $statement->execute();
  $queries = $statement->fetchAll();
  $statement->closeCursor();

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Query Tracker - Home</title>
    <link rel="stylesheet" type="text/css" href="css/query.css" /> 
  </head>
  <body>
    <?php include("header.php"); ?>
    <main id="agentList">
      <h2>Agent List</h2>
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
        <?php foreach ($queries as $query): ?>
          <tr>
            <td><?php echo htmlspecialchars($query['submissionDate']); ?></td>
            <td><?php echo htmlspecialchars($query['agencyName']); ?></td>
            <td><?php echo htmlspecialchars($query['agentName']); ?></td>
            <td><?php echo htmlspecialchars($query['emailAddress']); ?></td>
            <td><?php echo htmlspecialchars($query['websiteAddress']); ?></td>
            <td><?php echo htmlspecialchars($query['phoneNumber']); ?></td>
            <td><?php echo htmlspecialchars($query['response']); ?></td>
            <td><?php echo htmlspecialchars($query['feedback']); ?></td>
          </tr>
        <?php endforeach; ?>
      </table>

      <p><a href="add_query_form.php">Add Query</a></p>
    </main>
    <?php include("footer.php"); ?>
  </body>
</html>