<?php
session_start();
require_once dirname(__FILE__).'/../models/Users.php';
require_once dirname(__FILE__).'/../models/Post.php';
require_once dirname(__FILE__).'/../models/Comment.php';
require_once dirname(__FILE__).'/../models/Ranks.php';
require_once dirname(__FILE__).'/../models/Element.php';
require_once dirname(__FILE__).'/../models/Note.php';
$title = 'Suppression article numéro '.$_GET['id'].' | Panneau Administrateur.';
// ================= Afficher le post a supprimer ======================
$id = $_GET['id'];
$posts = new Post($id);
$postInfos = $posts->readSingle();
// si lextention de la photo est enregister en bdd 
if($postInfos->users_pictures != null){
    $photo = '../uploads/pict-'.$postInfos->users_id.'.'.$postInfos->users_pictures;
}else{
    $photo = '../asset/img/user-boy_default.png';
}
// ============ recupere le token en bdd =======================
$users = new users($_SESSION['user']['users_id']);
$usersInfos = $users->readSingle();
// ==========================================================================================================================
// Supprimer un article en supprimant tous se qui lui est lier ==============================================================
// ==========================================================================================================================
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $postId = (int) $_POST['delete'];
    $postToken = $_POST['token'];
    // on verifie que le token enregistrer en base de donnée est bien le meme que celui en session
    if($postToken == $_SESSION['user']['token']){
        // on instancie la class elements
        $elements = new Element();
        // on hydrade la class element avec l'id de l'article que l'on veux supprimer
        $elements->post_id = $postId;
        // si les element de l'article on bien etais supprimer 
        if($elements->deleteElementsPost()){
            // on instancie comments 
            $comment = new Comment();
            // on l'hydrate avec l'd de larticle 
            $comment->post_id = $postId;
            // si les commentaires on bien été supprimer 
            if($comment->deleteCommentFromPost()){
                // on instancie la class Notes
                $note = new Note();
                // on hydrate Note avec l'id du post
                $note->post_id= $postId;
                // si Les Note sont supprimer
                if($note->deleteNoteFromPost()){
                    // on hydrate l'article avec son id 
                    $posts->post_id = $postId;
                    // si l'article a bien été supprimer 
                    if ($posts->deletePost()){
                        // on declare delete succes a true 
                        $deleteSucces = true;
                        // on redirige au bout de quelque seconde ver tout les articles 
                        header('refresh:2;listPost_ctrl.php');
                    }else{
                        $errors['admin'] = 'Cet article n\'a pas pu être supprimé.';
                    }
                }else{
                    $errors['admin'] = 'Une erreur s\'est produite.';
                }
            }else{
                $errors['admin'] = 'Une erreur s\'est produite.';
            }
        }else{
            $errors['admin'] = 'Une erreur s\'est produite.';
        }
    }else{
        $errors['admin'] = 'Vous n\'êtes pas autorisé à supprimer cet article.';
    }
}
// ================================================================================
require_once dirname(__FILE__).'/../views/delete_article.php';
?>