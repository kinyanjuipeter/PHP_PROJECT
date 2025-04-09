<?php
require_once 'database.php';

// Get POST data
$projectName = isset($_POST['projectName']) ? trim($_POST['projectName']) : '';
$dueDate = isset($_POST['dueDate']) ? trim($_POST['dueDate']) : '';

// Validate input
if (empty($projectName) || empty($dueDate)) {
    die('Project name and due date are required');
}

if (strtotime($dueDate) <= time()) {
    die('Due date must be in the future');
}

// Prepare SQL and bind parameters
$sql = "INSERT INTO projects (project_name, due_date) VALUES (:projectName, :dueDate)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':projectName', $projectName, PDO::PARAM_STR);
$stmt->bindParam(':dueDate', $dueDate, PDO::PARAM_STR);

if ($stmt->execute()) {
    header("Location: ../index.php");
    exit();
} else {
    die('Failed to add project');
}
?>
