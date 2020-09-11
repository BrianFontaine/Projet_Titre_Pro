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
$mailexist = '';
$existingUser ='';
$phone= '';
$email = '';
$cgu = '';
$gender = 0;
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// ====================================================================================================   
    $token = bin2hex(random_bytes(16));
// ====================================================================================================
    $isSubmitted = true;
         //verif champ nom
// ====================================================================================================
    $firstname = trim(filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_STRING));
    if (empty($firstname)) {
        $errors['firstname'] = 'Veuillez renseigner le nom';
    } 
    elseif (!preg_match($regexName, $firstname)) {
        $errors['firstname'] = 'Votre nom contient des caractères non autorisés !';
    }
    // $lastname = $_POST['lastname'];
     //verif champ prénom
// ====================================================================================================
    $lastname = trim(filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_STRING));//enlève les espaces vides avant et après + nettoyage en fonction du type 
    if (empty($lastname)) {//verifie si le champ est vide
        $errors['lastname'] = 'Veuillez renseigner le prénom';
    } elseif (!preg_match($regexName, $lastname)) {//comparatif avec la regex correspondante
        $errors['lastname'] = 'Votre prénom contient des caractères non autorisés !';
    }
     //verif champ date d'anniversaire
// ====================================================================================================
    $birthdate = trim(htmlspecialchars($_POST['birthdate']));
    if (empty($birthdate)) {
        $errors['birthdate'] = 'Veuillez renseigner votre date de naissance';
    } elseif (!preg_match($regexDate, $birthdate)) {
        $errors['birthdate'] = 'Le format valide est aaaa-mm-jj !';
    }
    //verif champ mail
// ====================================================================================================
    $mail = trim(htmlspecialchars($_POST['mail']));
    if (empty($mail)) 
    {
        $errors['mail'] = 'Veuillez renseigner votre email';
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) 
    {
        $errors['mail'] = 'L\' email  n\'est pas valide!';
    }
    //verif champ mobile
    // $phone = trim(htmlspecialchars($_POST['phone']));
    // if (empty($phone)) {
    //     $errors['phone'] = 'Veuillez renseigner votre téléphone';
    // } elseif (!preg_match($regexTel, $phone)) {
    //     $errors['phone'] = 'Le format du téléphone n\'est pas valide!';
    // }
// ====================================================================================================
    $email = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING));
    if (empty($email)) {
        $errors['mail'] = 'Merci de renseigner votre adresse électronique.';
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors['mail'] = 'Le format attendu n\'est pas respecté.';
    } else {
        $user = new Users('','','',$email);
        $existingUser = $user->readPregMatchMail();
        $mailexist = $existingUser->users_mail;
        if ($email == $mailexist) {
            $errors['mail'] = 'Cette adresse email a déjà été renseignée.';
        }     
    }
    var_dump($existingUser);
// ====================================================================================================
    if(empty($_POST['pass'])){
        $errors['pass'] = 'Veuillez entrer un mot de passe';
    }else if ($_POST['pass'] != $_POST['confPass']){
        $errors['pass'] = 'Vos mots de passe ne correspondes pas !';
    }else{
        $password = password_hash($_POST['pass'],PASSWORD_BCRYPT);
    }
// ====================================================================================================
    // $gender = (int) trim(htmlspecialchars($_POST['genre']));
    $gender = trim(filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_NUMBER_INT));
    if (empty($gender)) {
        $errors['genre'] = 'Merci de renseigner votre civilité';
    }
// ====================================================================================================
    $profil_picture = trim(htmlspecialchars($_POST['picture']));
// ====================================================================================================
    $rank = 34560 ;
// ====================================================================================================
    // $cgu = (int) $_POST['cgu'];
    $cgu = trim(filter_input(INPUT_POST, 'cgu', FILTER_SANITIZE_NUMBER_INT));
    if(empty($cgu)){
        $errors['cgu'] = 'Veuillez accepter les conditions générales d\'utilisation';
    }
// ===================================================================================================
    // $city_id = (int) $_POST['cities'];
    $city_id = trim(filter_input(INPUT_POST, 'cities', FILTER_SANITIZE_NUMBER_INT));
    if (empty($city_id)) {
        $errors['cities'] = 'veuillez renseigner votre ville';
    }
}
// ======================================== Lecture des villes de france =============================
$city = new City();
$listCity = $city->readAll();
// ===================================================================================================

// ============================================= Envoie de mail ======================================
require_once dirname(__FILE__).'/../utils/PHPMailer/src/Exception.php';
require_once dirname(__FILE__).'/../utils/PHPMailer/src/PHPMailer.php';
require_once dirname(__FILE__).'/../utils/PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
$mailSend = false;
$mail = new PHPMailer(true);
// ===================================================================================================
if($isSubmitted && count($errors) == 0)
{
    $users = new Users( 0,$firstname,$lastname,$email,$birthdate,$password,$gender,$profil_picture,'','','','',0,$token,$city_id,$rank);
    $usersId = (int)$users->create();
    // var_dump($users);
    if($usersId)
    {
        // header('location:succes_ctrl.php');
        $createSuccess = true;
        try {
            //Server settings
            // $mail->Host       = "localhost";                //Je suis en localhost.Dois-je donc laisser l'intitulé tel quel ou definir localhost à la place?
            $mail->SMTPDebug  = 2;                          // enables SMTP debug information (for testing)
            $mail->SMTPAuth   = true;                       // enable SMTP authentication
            $mail->SMTPSecure = "ssl";                      // sets the prefix to the servier
            $mail->Host       = "smtp.gmail.com";           // sets GMAIL as the SMTP server
            $mail->Port       = 465;                        // set the SMTP port for the GMAIL server
            $mail->Username   = "spacebrico@gmail.com";     // GMAIL username
            $mail->Password   = "xvenbrvtbndryacv";             // GMAIL password
            $mail->Subject    = 'PHPMailer Test Subject via mail(), advanced';
            $mail->AltBody    = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically                             // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
            //Recipients
            $mail->setFrom('noreply@spacebrico.fr', 'SpaceBrico');
            $mail->addAddress('spacebrico@gmail.com', $_POST['firstname'],$_POST['lastname']);     // Add a recipient
            // Content
            $mail->isHTML(false);                                  // Set email format to HTML
            $mail->Subject = 'Confirmez Votre Compte Spacebrico !';
            $mail->Body    = '<a href="http://www.spacebrico.fr/controllers/succes_ctrl.php?confirm='.$token.'&id='.$usersId.'">Confirmer Votre compte</a>';
            $mail->AltBody = utf8_decode('tu as reçus un message de '.$_POST["lastname"]);
        
            if($mail->send()){
            echo 'votre email a été envoyé avec succès';
            $mailSend = true;
        
        }
        } catch (Exception $e) {
            echo "votre message n'a pas été envoyé!!! erreur de mailing: {$mail->ErrorInfo}";
        }
    }
}
require_once dirname(__FILE__).'/../views/register_views.php';
?>