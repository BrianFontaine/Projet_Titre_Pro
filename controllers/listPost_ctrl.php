<?php
session_start();
require_once dirname(__FILE__).'/../models/Users.php';
require_once dirname(__FILE__).'/../models/Post.php';
require_once dirname(__FILE__).'/../models/Comment.php';
require_once dirname(__FILE__).'/../models/Ranks.php';
require_once dirname(__FILE__).'/../models/Element.php';
require_once dirname(__FILE__).'/../models/Note.php';
$title = 'List des Post | Panneau Administrateur';
// ================= Lister tous les post ======================
    $posts = new Post();
    $listPost = $posts->readAll();
// =============================================================
// ============== Element du post ==============================
    $elementInfos = new Element();
    $listElements = $elementInfos->readAll();
// =============================================================
require_once dirname(__FILE__).'/../views/listPost.php';
?>