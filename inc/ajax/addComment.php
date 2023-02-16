<?php

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['comment'])){
    require_once __DIR__.'/../../App/inti.php';
    $post->addNewComment($_POST['id'] , $_POST['comment']);
}