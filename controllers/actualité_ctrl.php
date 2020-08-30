<?php
require_once dirname(__FILE__).'/../models/Users.php';
require_once dirname(__FILE__).'/../models/Post.php';
    session_start();
    date_default_timezone_set("Europe/Paris");
    $id = (int) $_SESSION['user']['users_id'];
    $title ='SpaceBrico';
    $isSubmitted = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        $isSubmitted = true;
        $userId = (int) $_SESSION['user']['users_id'];
        $date = $_SERVER['REQUEST_TIME'];
        $post_title = trim(strip_tags($_POST['post_title']));
        $postContent = trim(strip_tags($_POST['post_contents']));
        $post_signal = 0;
    }

if ($isSubmitted && count($errors) == 0)
{
    $post = new Post( 0,$post_title,$postContent,$date,$post_signal,$userId);
    if($post->create())
    {
        // $createSuccess = true;
    }
}
$post = new Post();
$listPost = $post->readAll();

$usersInfos = new Users($id);
$usersViews = $usersInfos->readSingle();
// var_dump($usersViews);

// echo ($_SERVER['REQUEST_TIME']);
$firstName = $usersViews->users_firstname;
$lastName = $usersViews->users_lastname;
$photo = $usersViews->users_pictures;
// var_dump($listPost);
    require_once dirname(__FILE__).'/../views/header.php';
    require_once dirname(__FILE__).'/../views/navbar.php';
    require_once dirname(__FILE__).'/../views/actualité_views.php';
?>