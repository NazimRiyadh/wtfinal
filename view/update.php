<?php
include_once '../controller/control_profile.php'; // Load $user data
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Profile</title>
</head>
<body>

<h1>Update Profile</h1>

<form action="../controller/control_update.php" method="POST" enctype="multipart/form-data">
    <table cellpadding="8" border="0">
        <tr>
            <td><label for="email">Email:</label></td>
            <td><input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>"></td>
        </tr>
        <tr>
            <td><label for="phone">Phone:</label></td>
            <td><input type="text" name="phone" id="phone" value="<?= htmlspecialchars($user['phone']) ?>"></td>
        </tr>
        <tr>
            <td><label for="date_of_birth">Date of Birth:</label></td>
            <td><input type="text" name="date_of_birth" id="date_of_birth" value="<?= htmlspecialchars($user['date_of_birth']) ?>" placeholder="DD/MM/YYYY"></td>
        </tr>
        <tr>
            <td><label>Vehicles:</label></td>
            <td>
            <input type="checkbox" name="vehicle_bike" value="1" <?= isset($user['vehicle_bike']) && $user['vehicle_bike'] == 1 ? 'checked' : '' ?>> Bike
            <input type="checkbox" name="vehicle_car" value="1" <?= isset($user['vehicle_car']) && $user['vehicle_car'] == 1 ? 'checked' : '' ?>> Car
            <input type="checkbox" name="vehicle_boat" value="1" <?= isset($user['vehicle_boat']) && $user['vehicle_boat'] == 1 ? 'checked' : '' ?>> Boat

            </td>
        </tr>
        <tr>
            <td><label for="fav_language">Favorite Language:</label></td>
            <td>
                <select name="fav_language" id="fav_language">
                    <option value="HTML" <?= $user['fav_language'] === 'HTML' ? 'selected' : '' ?>>HTML</option>
                    <option value="CSS" <?= $user['fav_language'] === 'CSS' ? 'selected' : '' ?>>CSS</option>
                    <option value="JavaScript" <?= $user['fav_language'] === 'JavaScript' ? 'selected' : '' ?>>JavaScript</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="file">Upload New File:</label></td>
            <td><input type="file" name="file" id="file"></td>
        </tr>
    </table>

    <input type="submit" value="Update">
</form>

<p><a href="profile.php">Back to Profile</a></p>

</body>
</html>
