<?php
    require_once dirname(__FILE__).'/../models/Users.php';
    // require_once dirname(__FILE__).'/../models/Country.php';
    require_once dirname(__FILE__).'/../models/Zipcode.php';
    // include 'asset/PHP/regexRegister.php';
    // include '../asset/PHP/picture.php';
// $error ='';
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// // image téléchargé sans erreu
//     if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
//         echo 'ok';
//         $allowedextension = ['jpg', 'jpeg', 'png', 'gif'];
//         $maxsize = 1024 * 1024 * 2;
//         $filename = $_FILES['picture']['name'];
//         $filesize = $_FILES['picture']['size'];
//         $tmp = $_FILES['picture']['tmp_name'];
//         $fileextension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
//         // Vérification de l'extension
//         if (!in_array($fileextension, $allowedextension)) {
//             $error = 'Le format du fichier téléchargé n\'est pas autorisé !';
//         } elseif ($maxsize < $filesize) {
//             $error = 'Le fichier téléchargé depasse la taille max autorisée !';
//         }
//         if (empty($error)) {
//             if (move_uploaded_file($tmp, '../asset/img/' . $filename)) {
//                 setcookie('picture', $filename, time() + 3600);
//                 header('Location: profil.php?picture=' . $filename);
//                 exit();
//             }
//         }
//     }
// }

// validation des données utilisateur

$isSubmitted = false;
$regexName = "/^[A-Za-zéÉ][A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+((-| )[A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+)?$/";
$regexDate = "/^((?:19|20)[0-9]{2})-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/";
$regexTel = "/^(?:\+33|0033|0)[1-79]((?:([\-\/\s\.])?[0-9]){2}){4}$/";
$lastname = '';
$firstname = '';
$birthdate = '';
$password = '';
$phone= '';
$mail = '';
$cgu = '';
$zip_code ='';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $isSubmitted = true;
         //verif champ nom
    // $lastname = trim(filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_STRING));
    // if (empty($lastname)) {
    //     $errors['lastname'] = 'Veuillez renseigner le nom';
    // } 
    // elseif (!preg_match($regexName, $lastname)) {
    //     $errors['lastname'] = 'Votre nom contient des caractères non autorisés !';
    // }
    $lastname = $_POST['lastname'];
     //verif champ prénom
    $firstname = trim(filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_STRING));//enlève les espaces vides avant et après + nettoyage en fonction du type 
    if (empty($firstname)) {//verifie si le champ est vide
        $errors['firstname'] = 'Veuillez renseigner le prénom';
    } elseif (!preg_match($regexName, $firstname)) {//comparatif avec la regex correspondante
        $errors['firstname'] = 'Votre prénom contient des caractères non autorisés !';
    }
     //verif champ date d'anniversaire
    $birthdate = trim(htmlspecialchars($_POST['birthdate']));
    if (empty($birthdate)) {
        $errors['birthdate'] = 'Veuillez renseigner votre date de naissance';
    } elseif (!preg_match($regexDate, $birthdate)) {
        $errors['birthdate'] = 'Le format valide est aaaa-mm-jj !';
    }
    //verif champ mail
    $mail = trim(htmlspecialchars($_POST['mail']));
    if (empty($mail)) {
        $errors['mail'] = 'Veuillez renseigner votre email';
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors['mail'] = 'L\' email  n\'est pas valide!';
    }
     //verif champ mobile
    $phone = trim(htmlspecialchars($_POST['phone']));
    if (empty($phone)) {
        $errors['phone'] = 'Veuillez renseigner votre téléphone';
    } elseif (!preg_match($regexTel, $phone)) {
        $errors['phone'] = 'Le format du téléphone n\'est pas valide!';
    }
    $password = $_POST['pass'];
    $zip_code = $_POST['zip_code'];
}
if($isSubmitted && count($errors) == 0){
    $users = new Users(0, $lastname, $firstname, $birthdate, $mail, $password, $phone, $cgu);

    if($users->create())
    {
        $createSuccess = true;
    }
    $zip_code = new Zipcode(0, $zip_code);

    if($zip_code->create())
    {
        $createSuccess = true;
    }
    // $country = new Country(0, $country);

    // if($country->create())
    // {
    //     $createSuccess = true;
    // }
}
require_once dirname(__FILE__).'/../views/register_views.php';
?>
