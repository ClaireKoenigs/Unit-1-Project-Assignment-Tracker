<?php
require_once('database.php');

$assignmentID = filter_input(INPUT_POST, 'assignmentID', FILTER_VALIDATE_INT);
if ($assignmentID == null || $assignmentID == false) {
    $error = "Invalid assignment.";
    exit();
}

$query = 'SELECT * FROM assignments
          WHERE assignment_id = :assignmentID';

$statement = $db->prepare($query);
$statement->bindValue(':assignmentID', $assignmentID);
$statement->execute();

$assignment = $statement->fetch();
$statement->closeCursor();
if ($assignment == false) {
    $error = "Assignment not found.";
    exit();
}
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
    <h2>Edit Assignment</h2>
    <form action="edit_assignment.php" method="post">
        <input type="hidden" name="assignmentID"
           value="<?php echo $assignment['assignment_id']; ?>">

        <label>Course Name:</label>
        <input type="text" name="courseName"
               value="<?php echo $assignment['course_name']; ?>">

        <br></br>

        <label>Assignment Name:</label>
        <input type="text" name="assignmentName"
               value="<?php echo $assignment['assignment_name']; ?>">
        <br></br>

        <label>Due Date:</label>
        <input type="date" name="dueDate"
               value="<?php echo $assignment['due_date']; ?>">
        <br></br>

        <label>Status:</label>
        <select name="status">
            <option value="Not Started"
                <?php if ($assignment['status'] == 'Not Started') echo 'selected'; ?>>
                Not Started
            </option>
            <option value="In Progress"
                <?php if ($assignment['status'] == 'In Progress') echo 'selected'; ?>>
                In Progress
            </option>
            <option value="Completed"
                <?php if ($assignment['status'] == 'Completed') echo 'selected'; ?>>
                Completed
            </option>
        </select>
        <br></br>

        <input type="submit" value="Edit Assignment">
    </form>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Assignment Tracker, Inc.</p>
</footer>
</body>
</html>