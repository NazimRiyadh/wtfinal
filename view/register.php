<?php
include_once '../controller/control_register.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Register</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <h1>Registration Form</h1>
        <p>Please fill in the details below to register.</p>
        <table>
            <tr>
                <td><label for="username">Username</label></td>
                <td>
                    <input type="text" name="username" id="username" value="<?= htmlspecialchars($old['username'] ?? '') ?>">
                    <br><span style="color:red;"><?= $errors['username'] ?? '' ?></span>
                </td>
            </tr>

            <tr>
                <td><label for="password">Password</label></td>
                <td>
                    <input type="password" name="password" id="password" value="">
                    <br><span style="color:red;"><?= $errors['password'] ?? '' ?></span>
                </td>
            </tr>

            <tr>
                <td><label for="confirm_password">Confirm Password</label></td>
                <td>
                    <input type="password" name="confirm_password" id="confirm_password" value="">
                    <br><span style="color:red;"><?= $errors['confirm_password'] ?? '' ?></span>
                </td>
            </tr>

            <tr>
                <td><label for="email">E-mail</label></td>
                <td>
                    <input type="text" name="email" id="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>">
                    <br><span style="color:red;"><?= $errors['email'] ?? '' ?></span>
                </td>
            </tr>

            <tr>
                <td><label for="phone">Phone Number</label></td>
                <td>
                    <input type="text" name="phone" id="phone" value="<?= htmlspecialchars($old['phone'] ?? '') ?>">
                    <br><span style="color:red;"><?= $errors['phone'] ?? '' ?></span>
                </td>
            </tr>

            <tr>
                <td><label for="date">Enter date in DD/MM/YYYY format</label></td>
                <td>
                    <input type="text" name="date" id="date" value="<?= htmlspecialchars($old['date'] ?? '') ?>">
                    <br><span style="color:red;"><?= $errors['date'] ?? '' ?></span>
                </td>
            </tr>

            <tr><td>Vehicle:</td></tr>
            <tr>
                <td>
                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" <?= !empty($old['vehicle1']) ? 'checked' : '' ?>>
                    <label for="vehicle1">I have a bike</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="vehicle2" name="vehicle2" value="Car" <?= !empty($old['vehicle2']) ? 'checked' : '' ?>>
                    <label for="vehicle2">I have a car</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat" <?= !empty($old['vehicle3']) ? 'checked' : '' ?>>
                    <label for="vehicle3">I have a boat</label>
                    <br><span style="color:red;"><?= $errors['vehicle'] ?? '' ?></span>
                </td>
            </tr>

            <tr><td>Programming language:</td></tr>
            <tr>
                <td>
                    <input type="radio" id="html" name="fav_language" value="HTML" <?= (isset($old['fav_language']) && $old['fav_language'] === 'HTML') ? 'checked' : '' ?>>
                    <label for="html">HTML</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" id="css" name="fav_language" value="CSS" <?= (isset($old['fav_language']) && $old['fav_language'] === 'CSS') ? 'checked' : '' ?>>
                    <label for="css">CSS</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" id="javascript" name="fav_language" value="JavaScript" <?= (isset($old['fav_language']) && $old['fav_language'] === 'JavaScript') ? 'checked' : '' ?>>
                    <label for="javascript">JavaScript</label>
                    <br><span style="color:red;"><?= $errors['fav_language'] ?? '' ?></span>
                </td>
            </tr>

            <tr>
                <td><label for="file">Submit a file</label></td>
                <td><input type="file" name="file" id="file"></td>
            </tr>

            <tr>
                <td><input type="submit" value="Register"></td>
                <td><a href="login.php">Back to Login</a></td>
            </tr>
        </table>
    </form>
</body>
</html>
