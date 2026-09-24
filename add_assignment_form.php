<?php
require_once('database.php');
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
    <h2>Add Assignment</h2>
    <form action="add_assignment.php" method="post">
        <label>Course Name:</label>
        <input type="text" name="courseName">
        <br></br>

        <label>Assignment Name:</label>
        <input type="text" name="assignmentName">
        <br></br>

        <label>Due Date:</label>
        <input type="date" name="dueDate">
        <br></br>

        <label>Status:</label>
        <select name="status">
            <option value="Not Started">Not Started</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select>
        <br></br>

        <input type="submit" value="Add Assignment">
    </form>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Assignment Tracker, Inc.</p>
</footer>
</body>
</html>