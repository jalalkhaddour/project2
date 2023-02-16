<?php
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['username'])){
    require_once __DIR__.'/../../App/inti.php';
    $contact->getInput($_POST['email'] , $_POST['username'] , $_POST['message']);
}


