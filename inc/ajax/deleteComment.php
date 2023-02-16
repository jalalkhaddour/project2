<?php

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['id'])){
    require_once __DIR__.'/../../App/inti.php';
    $post->deletePostReply($_POST['id']);
}

