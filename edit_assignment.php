<?php
$assignmentID = filter_input(INPUT_POST, 'assignmentID', FILTER_VALIDATE_INT);
$courseName = filter_input(INPUT_POST, 'courseName');
$assignmentName = filter_input(INPUT_POST, 'assignmentName');
$dueDate = filter_input(INPUT_POST, 'dueDate');
$status = filter_input(INPUT_POST, 'status');

if ($assignmentID == null || $assignmentID == false ||
    $courseName == null || $assignmentName == null ||
    $dueDate == null || $status == null) {
    $error = "Invalid assignment data.";
    exit();
} else {
    require_once('database.php');

    $query = 'UPDATE assignments
              SET course_name = :courseName,
                  assignment_name = :assignmentName,
                  due_date = :dueDate,
                  status = :status
              WHERE assignment_id = :assignmentID';

    $statement = $db->prepare($query);
    $statement->bindValue(':courseName', $courseName);
    $statement->bindValue(':assignmentName', $assignmentName);
    $statement->bindValue(':dueDate', $dueDate);
    $statement->bindValue(':status', $status);
    $statement->bindValue(':assignmentID', $assignmentID);
    $statement->execute();
    $statement->closeCursor();

    include('index.php');
}
?>