<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar OOP</title>
</head>

<body>
    <h1>Register page</h1>
    <?php
    require_once 'app/User.php';

    if (isset($_POST['btnRegist'])) {
        $result = $User->regist($_POST);
        if (!$result) echo "<script>alert('Gagal register');</script>";
        else header('Location: index.php?success=1');
    }
    ?>
    <form action="register.php" method="POST">
        <input type="text" name="username" placeholder="Username..." required>
        <br>
        <input type="password" name="password" placeholder="password" required>
        <br>
        <button type="submit" name="btnRegist">Register</button>
        <br>
        Ada akun? <a href="index.php">Login</a>
    </form>
</body>

</html>