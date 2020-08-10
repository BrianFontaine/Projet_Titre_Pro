<?php
    // require_once dirname(__FILE__).'/../models/';
    // include 'asset/PHP/regexRegister.php';
    // include '../asset/PHP/picture.php';
$error ='';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// image téléchargé sans erreu
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
        echo 'ok';
        $allowedextension = ['jpg', 'jpeg', 'png', 'gif'];
        $maxsize = 1024 * 1024 * 2;
        $filename = $_FILES['picture']['name'];
        $filesize = $_FILES['picture']['size'];
        $tmp = $_FILES['picture']['tmp_name'];
        $fileextension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
        // Vérification de l'extension
        if (!in_array($fileextension, $allowedextension)) {
            $error = 'Le format du fichier téléchargé n\'est pas autorisé !';
        } elseif ($maxsize < $filesize) {
            $error = 'Le fichier téléchargé depasse la taille max autorisée !';
        }
        if (empty($error)) {
            if (move_uploaded_file($tmp, '../asset/img/' . $filename)) {
                setcookie('picture', $filename, time() + 3600);
                header('Location: profil.php?picture=' . $filename);
                exit();
            }
        }
    }
}
require_once dirname(__FILE__).'/../views/register_views.php';
?>
