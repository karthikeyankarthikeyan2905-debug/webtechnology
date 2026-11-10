<?php
include "db.php";

$result = mysqli_query($conn, "SELECT * FROM contacts ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AURORA TECHNOLOGIES</title>
    <link rel="stylesheet" href="style.css">
</head>
<body></body>

<div class="container">

    <h1>AURORA TECHNOLOGIES</h1>

    <a href="add.php" class="add-btn">+ Add Contact</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Action</th>
        </tr>

        <?php while($row = $result->fetch_assoc()) { ?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars($row['phone']); ?></td>
            <td><?php echo htmlspecialchars($row['address']); ?></td>
            <td>
                <a class="edit-btn" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a class="delete-btn"
                   href="delete.php?id=<?php echo $row['id']; ?>"
                   onclick="return confirmDelete();">Delete</a>
            </td>
        </tr>

        <?php } ?>

    </table>

</div>

<script src="script.js"></script>

</body>
</html>