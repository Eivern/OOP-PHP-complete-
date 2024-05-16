<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar OOP</title>
</head>

<body>
    <h1>Login page</h1>
    <?php
    if (isset($_GET['success'])) {
        echo '<h1>Register sukses bro</h1>';
    }

    require_once 'app/User.php';

    if (isset($_POST['btnLogin'])) {
        $result = $User->login($_POST);
        if (!$result) echo "<script>alert('gagal login bossq');</script>";
        else header('Location: dashboard.php?success=1');
    }
    ?>

    <form action="index.php" method="POST">
        <input type="text" name="username" placeholder="Username..." required>
        <br>
        <input type="password" name="password" placeholder="password..." required>
        <br>
        <button type="submit" name="btnLogin">Login</button>
        <br>
        Ngga ada akun? <a href="register.php">Regist</a>
    </form>
</body>

</html>
<!-- Twitter Clone -->
<!-- 
1. Buat twit -> post caption
2. Login        (done)
3. Register     (done)
 -->