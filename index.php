<?php 
require_once('database.php'); 
$queryAssignments = 'SELECT * FROM assignments'; 
$statement = $db->prepare($queryAssignments); 
$statement->execute(); 
$assignments = $statement->fetchAll(); 
$statement->closeCursor(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Tracker</title>
    <link rel="stylesheet" href="style.css"/>
</head>

<body>
<header><h1>Assignment Tracker</h1></header>
<nav>
    <a href="index.php">Assignments</a>
    <a href="add_assignment_form.php">Add Assignment</a>
</nav>
<main>
<h2>Assignments</h2>
<section>
    <table>
    <tr>
        <th>Course Name</th>
        <th>Assignment Name</th>
        <th>Due Date</th>
        <th>Status</th>
        <th>&nbsp;</th>
    </tr>

    <?php foreach ($assignments as $assignment) : ?>
    <tr>
        <td><?php echo $assignment['course_name']; ?></td>
        <td><?php echo $assignment['assignment_name']; ?></td>
        <td><?php echo $assignment['due_date']; ?></td>
        <td><?php echo $assignment['status']; ?></td>
        <td><form action="edit_assignment_form.php" method="post">
            <input type="hidden" name="assignmentID"
                   value="<?php echo $assignment['assignment_id']; ?>">
        <input type="submit" value="Edit">
        </form></td>
        <td><form action="delete_assignment.php" method="post">
            <input type="hidden" name="assignmentID"
                   value="<?php echo $assignment['assignment_id']; ?>">
            <input type="submit" value="Delete">
        </form></td>
    </tr>
    <?php endforeach; ?>
    </table>
</section>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Assignment Tracker, Inc.</p>
</footer>
</body>
</html>