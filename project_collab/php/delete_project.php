<?php
require_once 'database.php';

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

if ($id <= 0) {
    die('Invalid project ID');
}

try {
    $sql = "DELETE FROM projects WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit();
    } else {
        die('Failed to delete project');
    }
} catch (PDOException $e) {
    die('Error deleting project: ' . $e->getMessage());
}
?>
