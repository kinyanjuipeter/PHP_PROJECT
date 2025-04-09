<?php
// Database configuration will be added after MySQL setup
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Collaboration System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Project Management</h1>
        <form method="POST" action="php/add_project.php">
            <div class="form-group">
                <label for="projectName">Project Name</label>
                <input type="text" id="projectName" name="projectName" required>
            </div>
            <div class="form-group">
                <label for="dueDate">Due Date</label>
                <input type="date" id="dueDate" name="dueDate" required>
            </div>
            <button type="submit">Add Project</button>
        </form>
        <div id="projectsTable">
            <?php include 'php/get_projects.php'; ?>

        </div>
    </div>
</body>
</html>
