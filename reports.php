<?php
// Database configuration
// Change to your actual database name
$host = 'localhost';
$dbname = 'magnum'; 
$username = 'root';
$password = '';
// Create connection
$conn = new mysqli($host, $dbname, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch reports from database
$sql = "SELECT id, title, description, date_created, status FROM reports ORDER BY date_created DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Reports</title>
    
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>           
<ul>
            <a href="admin.php">Dashboard</a> <li> &nbsp;</li>
            <a href="foods.php">Foods</a> <li> &nbsp;</li>
            <a href="order.php">Orders</a> <li> &nbsp;</li>
            <a href="employees.php">Employees</a> <li> &nbsp;</li>
            <a href="reports.php">Reports</a> <li> &nbsp;</li>
        </ul>
    <h2>Website Reports</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Date Created</th>
            <th>Status</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo htmlspecialchars($row["title"]); ?></td>
                    <td><?php echo htmlspecialchars($row["description"]); ?></td>
                    <td><?php echo $row["date_created"]; ?></td>
                    <td><?php echo $row["status"]; ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="5">No reports found.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
