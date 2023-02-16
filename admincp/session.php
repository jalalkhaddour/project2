<?php require_once __DIR__.'/../App/inti.php';

if(isset($_SESSION['is_logged']) and $_SESSION['is_logged'] == TRUE and $_SESSION['user']['isAdmin'] == TRUE){
    
}else{
    header("Location: ../index.php");
}
$cate = $category->DisplayCategory();

$per_page = ($page-1) * ADMINPREPAGE;
?>





