<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit post</title>
    <?php

    session_start();
    require_once 'app/Post.php';
    require_once 'app/User.php';

    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
        die();
    }

    if (!isset($_GET['post_id'])) {
        header('Location: dashboard.php');
        die();
    }
    $author_id = $_SESSION['id'];
    $post_id = $_GET['post_id'];
    $post    = $Post->edit($post_id, $author_id);

    if (!$post) {
        header('Location: dashboard.php');
        die();
    }


    ?>
</head>

<body>
    <?php
    if (isset($_POST['postBtn'])) {
        $result = $Post->update($_POST);
        if ($result) echo '<h1>Sukses</h1>';
        else echo '<h1>Gagal</h1>';
    }
    ?>
    <a href="dashboard.php">Back to dashboard</a>
    <form action="edit.php?post_id=<?= $_GET['post_id'] ?>" method="POST">
        <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
        <input type="text" name="title" placeholder="Title..." required autofocus value="<?= $post['judul'] ?>">
        <br>
        <textarea name="content" rows="3" cols="3" style="width: 300px;" placeholder="Ini konten, isi dung"><?= $post['konten'] ?></textarea>
        <br>
        <button type="submit" name="postBtn">Update</button>
    </form>
</body>

</html>