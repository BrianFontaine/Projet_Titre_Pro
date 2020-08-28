<?php
require_once dirname(__FILE__).'/../models/Post.php';
    session_start();
    date_default_timezone_set("Europe/Paris");
    $date = $_SERVER['REQUEST_TIME'];
    $title ='SpaceBrico';
    // $style ='/css/actu.css';
    $userId = (int) $_SESSION['user']['users_id'];
    $postContent = trim(strip_tags($_POST['post_contents']));
if (!empty($postContent) && $_SERVER['REQUEST_METHOD'] == 'POST')
{
    $post = new Post( 0,$postContent,$date, $userId);
    if($post->create())
    {
        // $createSuccess = true;
    }
}
$post = new Post();
$listPost = $post->readAll();


// echo ($_SERVER['REQUEST_TIME']);
// $firstName = $listPost->;
// $lastName = 'Jean-Charles';
// var_dump($listPost);
    require_once dirname(__FILE__).'/../views/header.php';
    require_once dirname(__FILE__).'/../views/navbar.php';
    require_once dirname(__FILE__).'/../views/actualité_views.php';
?>