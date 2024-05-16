<?php

require_once 'Database.php';

class Post extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store($data)
    {
        $title      = $data['title'];
        $content    = $data['content'];
        $author_id  = $_SESSION['id'];

        $sql        = "INSERT INTO posts (author_id, judul, konten) VALUES ('$author_id', '$title', '$content')";
        $query      = mysqli_query($this->con, $sql);

        return $query;
    }

    public function get($author_id)
    {
        $sql    = "SELECT p.id as post_id, u.*, p.* FROM posts as p JOIN users as u ON u.id = p.author_id WHERE author_id = '$author_id'";
        $query  = mysqli_query($this->con, $sql);

        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }


    public function edit($post_id, $author_id)
    {
        $sql    = "SELECT p.id as post_id, u.*, p.* FROM posts as p JOIN users as u ON u.id = p.author_id WHERE p.id = '$post_id' AND p.author_id = '$author_id' LIMIT 1";
        $query  = mysqli_query($this->con, $sql);
        $data   = mysqli_fetch_assoc($query);
        return $data;
    }

    public function update($data)
    {
        $post_id    = $data['post_id'];
        $title      = $data['title'];
        $content    = $data['content'];
        $author_id  = $_SESSION['id'];

        $sql        = "UPDATE posts SET author_id='$author_id', judul='$title', konten='$content' WHERE id = '$post_id'";
        $query      = mysqli_query($this->con, $sql);

        return $query;
    }

    public function delete($post_id)
    {
        $sql = "DELETE FROM posts WHERE id = '$post_id'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
}


$Post = new Post();
