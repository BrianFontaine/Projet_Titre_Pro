<?php
require_once dirname(__FILE__).'/../models/Users.php';
require_once dirname(__FILE__).'/../models/City.php';
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
$country ='';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $isSubmitted = true;
         //verif champ nom
    $firstname = trim(filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_STRING));
    if (empty($firstname)) {
        $errors['firstname'] = 'Veuillez renseigner le nom';
    } 
    elseif (!preg_match($regexName, $firstname)) {
        $errors['firstname'] = 'Votre nom contient des caractères non autorisés !';
    }
    // $lastname = $_POST['lastname'];
     //verif champ prénom
    $lastname = trim(filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_STRING));//enlève les espaces vides avant et après + nettoyage en fonction du type 
    if (empty($lastname)) {//verifie si le champ est vide
        $errors['lastname'] = 'Veuillez renseigner le prénom';
    } elseif (!preg_match($regexName, $lastname)) {//comparatif avec la regex correspondante
        $errors['lastname'] = 'Votre prénom contient des caractères non autorisés !';
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
    $password = password_hash($_POST['pass'],PASSWORD_DEFAULT);
    $zip_code =  trim(htmlspecialchars($_POST['zipcode']));
    $city =  trim(htmlspecialchars($_POST['city']));
    $gender = $_POST['genre'];
    $profil_picture = '';
    $grads = '';
    $id= 0;
    $cgu = 1;
}

if($isSubmitted && count($errors) == 0)
{
    $query = "INSERT INTO `city` (`city_name`, `city_zipcode`) VALUES ('$city','$zip_code')";
    $pdo = Database::getInstance();
    $query_success = $pdo->query($query);
    $id = (int) $pdo->lastInsertId();
    $users = new Users( $lastname, $firstname, $birthdate, $mail, $password, $phone, $cgu, $profil_picture, $gender, $grads, $id);
    if($users->create())
    {
        $createSuccess = true;
    }
}
require_once dirname(__FILE__).'/../views/register_views.php';
?>