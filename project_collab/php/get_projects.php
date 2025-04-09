<?php
require_once 'database.php';

try {
    $sql = "SELECT id, project_name, due_date FROM projects ORDER BY due_date ASC";
    $stmt = $pdo->query($sql);
    $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($projects) > 0) {
        echo '<table>
            <thead>
                <tr>
                    <th>Project Name</th>
                    <th>Due Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($projects as $project) {
            echo '<tr>
                <td>'.htmlspecialchars($project['project_name']).'</td>
                <td>'.htmlspecialchars($project['due_date']).'</td>
                <td>
                    <form method="POST" action="../php/delete_project.php" style="display:inline">
                        <input type="hidden" name="id" value="'.$project['id'].'">
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </td>
            </tr>';
        }

        echo '</tbody></table>';
    } else {
        echo '<p>No projects found. Add your first project!</p>';
    }
} catch (PDOException $e) {
    echo '<p>Error loading projects: '.htmlspecialchars($e->getMessage()).'</p>';
}
?>
