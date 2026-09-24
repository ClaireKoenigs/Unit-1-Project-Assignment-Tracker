<?php
$courseName = filter_input(INPUT_POST, 'courseName');
$assignmentName = filter_input(INPUT_POST, 'assignmentName');
$dueDate = filter_input(INPUT_POST, 'dueDate');
$status = filter_input(INPUT_POST, 'status');

if ($courseName == null || $assignmentName == null ||
    $dueDate == null || $status == null) {
    $error = "Invalid assignment data.";
    exit();
} else {
    require_once('database.php');

    $query = 'INSERT INTO assignments (course_name, assignment_name, due_date, status)
              VALUES (:courseName, :assignmentName, :dueDate, :status)';
    $statement = $db->prepare($query);
    $statement->bindValue(':courseName', $courseName);
    $statement->bindValue(':assignmentName', $assignmentName);
    $statement->bindValue(':dueDate', $dueDate);
    $statement->bindValue(':status', $status);
    $statement->execute();
    $statement->closeCursor();

    include('index.php');
}
?>