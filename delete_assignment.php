<?php
$assignmentID = filter_input(INPUT_POST, 'assignmentID', FILTER_VALIDATE_INT);

if ($assignmentID == null || $assignmentID == false) {
    $error = "Invalid assignment.";
    exit();
} else {
    require_once('database.php');

    $query = 'DELETE FROM assignments
              WHERE assignment_id = :assignmentID';

    $statement = $db->prepare($query);
    $statement->bindValue(':assignmentID', $assignmentID);
    $statement->execute();
    $statement->closeCursor();

    include('index.php');
}
?>