<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php
    session_start();
    require_once 'app/Post.php';
    require_once 'app/User.php';

    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
        die();
    }

    if (isset($_GET['logout'])) $User->logout();

    $author_id = $_SESSION['id'];
    $posts = $Post->get($author_id);
    ?>
</head>

<body>
    <?php
    if (isset($_GET['success'])) echo "<h1>Welcome! berhasil login kyaaaa</h1>";

    if (isset($_POST['postBtn'])) {
        $result = $Post->store($_POST);
        header('Location: dashboard.php');
    }

    if (isset($_POST['deleteBtn'])) {
        $result = $Post->delete($_POST['post_id']);
        header('Location: dashboard.php');
    }
    ?>
    <h3>Kamu login dengan username :
        <?= $_SESSION['username'] ?>
    </h3>
    <div style="margin: auto;">
        <form action="dashboard.php" method="POST">
            <input type="text" name="title" placeholder="Title..." required autofocus>
            <br>
            <textarea name="content" rows="3" cols="3" style="width: 300px;" placeholder="Ini konten, isi dung"></textarea>
            <br>
            <button type="submit" name="postBtn">Post</button>
        </form>
    </div>

    <br><br>

    <ul>
        <?php foreach ($posts as $post) : ?>
            <li>
                <div>
                    <h4><?= $post['judul'] ?></h4>
                    <p>
                        <?= $post['konten'] ?>
                    </p>
                    <small><?= $post['username'] ?></small>
                    <div>
                        <a href="edit.php?post_id=<?= $post['post_id'] ?>">Edit</a>
                        <form action="dashboard.php" method="POST" onsubmit="return confirm('Yakin mau hapus?')">
                            <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
                            <button type="submit" name="deleteBtn">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </li>
        <?php endforeach ?>
    </ul>
</body>

</html>