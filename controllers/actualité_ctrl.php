<?php
require_once dirname(__FILE__).'/../models/Users.php';
require_once dirname(__FILE__).'/../models/Post.php';
require_once dirname(__FILE__).'/../models/Comment.php';
require_once dirname(__FILE__).'/../models/Note.php';
    session_start();
    $post = new Post();
    $listPost = $post->readAll();
    // var_dump($listPost);
    date_default_timezone_set("Europe/Paris");
    $id = (int) $_SESSION['user']['users_id'];
    $title ='SpaceBrico';
    $isSubmitted = false;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        // insert POST
        $isSubmitted = true;
        $userId = (int) $_SESSION['user']['users_id'];
        $date = $_SERVER['REQUEST_TIME'];
        $post_title = trim(strip_tags($_POST['post_title']));
        $postContent = trim(strip_tags($_POST['post_contents']));
        $post_signal = 0;
        // insert comment
        $content = trim(strip_tags($_POST['comment']));
        $signal = 0;
        $post_id = (int) $_POST['post_id'];
        // insert Note
        $note = (int) $_POST['note'];

    }

if ($isSubmitted && $_POST['add_post'] == "valider")
{
    $post = new Post( 0,$post_title,$postContent,$date,$post_signal,$userId);
    if($post->create())
    {
        // $createSuccess = true;
    }
} else if($isSubmitted && $_POST['add_comment'] == "valider")
{
    $comment = new Comment( 0,$content,$date,$signal,$userId,$post_id);
    if($comment->create())
    {
        $add_note = new Note(0,$note,$post_id);
        if ($add_note->create()){
            $createCommentSuccess = true;
        }
    }
}

$usersInfos = new Users($id);
$usersViews = $usersInfos->readSingle();

$comment = new Comment();
$listComment = $comment->readAll();

$firstName = $usersViews->users_firstname;
$lastName = $usersViews->users_lastname;
$photo = $usersViews->users_pictures;

    require_once dirname(__FILE__).'/../views/header.php';
    require_once dirname(__FILE__).'/../views/navbar.php';
    require_once dirname(__FILE__).'/../views/actualité_views.php';
?>