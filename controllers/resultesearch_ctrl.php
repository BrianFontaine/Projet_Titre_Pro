<?php
require_once dirname(__FILE__).'/../models/Post.php';
if (isset($_GET['search'])&& $_GET['search'] != '')
{
    $findPost = new Post();
    $search = filter_var($_POST['search'], FILTER_SANITIZE_STRING);
    $postList = $findPost->findPost($search);
    echo json_encode($postList);
    exit();
}
else
{
    echo 'non';
} 
require_once dirname(__FILE__).'/../views/resultsearch_views.php';
?>
