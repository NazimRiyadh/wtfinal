<?php
include_once '../controller/control_profile.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
</head>
<body>

    <h1>User Profile</h1>

    <table border="1" cellpadding="10">
        <tr>
            <th>Username</th>
            <td><?= htmlspecialchars($user['username']) ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= htmlspecialchars($user['email']) ?></td>
        </tr>
        <tr>
            <th>Phone</th>
            <td><?= htmlspecialchars($user['phone']) ?></td>
        </tr>
        <tr>
            <th>Date of Birth</th>
            <td><?= htmlspecialchars($user['date_of_birth']) ?></td>
        </tr>
        <tr>
            <th>Vehicles</th>
            <td>
            <?= $user['vehicle_bike'] ? 'Bike ' : '' ?>
            <?= $user['vehicle_car'] ? 'Car ' : '' ?>
            <?= $user['vehicle_boat'] ? 'Boat' : '' ?>
            </td>
        </tr>
        <tr>
            <th>Favorite Language</th>
            <td><?= htmlspecialchars($user['fav_language']) ?></td>
        </tr>
        <tr>
            <th>Uploaded File</th>
            <td>
                <?php if (!empty($user['file_path'])): ?>
                    <a href="<?= $user['file_path'] ?>" target="_blank">View File</a>
                <?php else: ?>
                    No file uploaded.
                <?php endif; ?>
            </td>
        </tr>
    </table>
    
    <p><a href="update.php">Update</a></p>
    <p><a href="../controller/control_logout.php">Logout</a></p>
    <p><a href="../controller/control_delete.php">Delete Id</a></p>

</body>
</html>
