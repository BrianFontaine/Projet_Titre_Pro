<?php
// require_once dirname(__FILE__).'/../models/Users.php';
require_once dirname(__FILE__) . '/../utils/function.php';
require_once dirname(__FILE__) . '/../config/config.php';
session_start();
$title = 'contactez-nous';
$regexName = "/^[A-Za-zéÉ][A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+((-| )[A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+)?$/";
$regexDate = "/^((?:19|20)[0-9]{2})-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/";
$regexTel = "/^(?:\+33|0033|0)[1-79]((?:([\-\/\s\.])?[0-9]){2}){4}$/";
$lastname = $firstname = $phone = $email = $subject = $text = '';
$errors = [];
$isSubmitted = false;
// déclarer et nettoyer les variable de formulaire de contact ==========
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isSubmitted = true;
    // verification du nom de famille ======================================
    if (isset($_POST['firstname'])) {
        $firstname = $_POST['firstname'];
        if (empty($firstname)) {
            $errors['firstname'] = 'Votre prénom est obligatoire';
        } elseif (!preg_match($regexName, $firstname)) {
            $errors['firstname'] = 'Le format du prénom n\'est pas valide!';
        }
    }
    // =====================================================================
    // verification du prenom ==============================================
    if (isset($_POST['lastname'])) {
        $lastname = $_POST['lastname'];
        if (empty($lastname)) {
            $errors['lastname'] = 'Votre nom est obligatoire';
        } elseif (!preg_match($regexName, $lastname)) {
            $errors['lastname'] = 'Le format du nom n\'est pas valide!';
        }
    }
    // =====================================================================
    // verification du numero de telephone  ================================
    if (isset($_POST['phone'])) {
        $phone = trim(htmlspecialchars($_POST['phone']));
        if (empty($phone)) {
            $errors['phone'] = 'Veuillez renseigner votre téléphone';
        } elseif (!preg_match($regexTel, $phone)) {
            $errors['phone'] = 'Le format du téléphone n\'est pas valide!';
        }
    }
    // =====================================================================
    // verification du titre de la demande  ================================
    if (isset($_POST['demande'])) {
        $subject = $_POST['demande'];
        if (empty($subject)) {
            $errors['demande'] = 'Votre Sujet est obligatoire';
        }
    }
    // =====================================================================
    // verification du text entree =========================================
    if (isset($_POST['describ'])) {
        $text = $_POST['describ'];
        if (empty($text)) {
            $errors['describ'] = 'Votre Description est obligatoire';
        }
    }
    // =====================================================================
    // verification de l'adresse email =====================================
    if (isset($_POST['email'])) {
        $email = trim(htmlspecialchars($_POST['email']));
        if (empty($email)) {
            $errors['email'] = 'Veuillez renseigner votre email';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'L\' email  n\'est pas valide!';
        }
    }
    // ======================================================================
}
require_once dirname(__FILE__) . '/../utils/PHPMailer/src/Exception.php';
require_once dirname(__FILE__) . '/../utils/PHPMailer/src/PHPMailer.php';
require_once dirname(__FILE__) . '/../utils/PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
$mailSend = false;
$mail = new PHPMailer(true);
if ($isSubmitted && count($errors) == 0){
// ====================== Ajouter une photo =============================
// Si On reçoit une photo
if(isset($_FILES['picture'])){
    if ($_FILES['picture']['error'] == 0) {
        $filename = $_FILES['picture']['name'];
        $extension = getExtension($filename);

        $sizePicture = $_FILES['picture']['size'];
        // Si poids pas ok
        if ($sizePicture > MAXFILESIZE) {
            // Erreur de poids*
            $errors["picture"] = "Erreur de poids";
        }
        // var_dump($sizePicture);
        // Si extension pas ok
        if (!in_array($extension, AUTHORIZED_EXTENSIONS)) {
            // Erreur d'extension
            $errors["picture"] = "Erreur d'extension";
        }
        // var_dump($extension);
        // var_dump($users);
        // Si poids et extension ok
        if (count($errors) == 0) {
            // Definir le nom de la photo (pict-1.jpg, pict-4.png)
            $pictureRenamed = str_replace(" ", "_", $subject) . "." . $extension;
            $pictureDest = dirname(__FILE__) . "/.." . PICT_FOLDER . PICT_FOLDER_CONTACT . $pictureRenamed;
            $tmp_name = $_FILES["picture"]["tmp_name"];
            // Enregistrement de la photo
            if (move_uploaded_file($tmp_name, $pictureDest)) {
                // Redimensionnement et compression
                if (redim($pictureDest, 1920, 1080)) {
                    // $users->users_id = $id;
                    // $users->users_pictures = $extension;
                    // var_dump($users);
                    // $users->updateUser();
                } else {
                    $errors["picture"] = "Un problème s'est produit lors du redimensionnement";
                }
            } else {
                $errors["picture"] = "Un problème s'est produit lors de l'envoi de votre photo";
            }
        }
    } else {
        // $errors["picture"] = "Vous êtes inscrit, mais vous n'avez pas envoyé de photo";
    }
}
// ======================================================================
// ============================================= Envoie de mail ======================================
// ============== Regiger un mail sur la page contact ===================
    $message = '
        <div style="background: url(http://spacebrico.fr/asset/img/logoSpaceBrico_V2.2.png);height: 800px;background-position:center;background-repeat:no-repeat">
            <h1 style="text-align: center;color: rgb(40,40,40);">' . $subject . '</h1>
            <p style="font-size: 1.3em;color: black;" >' . $text . '</p>
            <p style="font-size: 1.3em;color: black;" ></br>'.$lastname .' '. $firstname  ."<br/>". $phone .'</p>
            <a style="margin: auto;color:#fff;background-color:#007bff;border-color:#007bff;font-weight:400;text-align:center;white-space:nowrap;vertical-align:middle;border:1px solid transparent;padding:0.375rem 0.75rem;font-size:1rem;line-height:1.5;border-radius:0.25rem;text-decoration:none;display: block;"
            href="http://www.spacebrico.fr/uploads/contact/' . $pictureRenamed . '">Télécharger l\'image</a>
        </div>';
    try {
        //Server settings
        $mail->SMTPDebug = 2; // enables SMTP debug information (for testing)
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
        $mail->Port = 465; // set the SMTP port for the GMAIL server
        $mail->Username = "spacebrico@gmail.com"; // GMAIL username
        $mail->Password = "xvenbrvtbndryacv"; // GMAIL password
        $mail->Subject = 'PHPMailer Test Subject via mail(), advanced';
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically                             // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($email, $lastname.' '.$firstname);
        $mail->addAddress('spacebrico@gmail.com', $lastname, $firstname); // Add a recipient
        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AltBody = utf8_decode('tu as reçus un message de ' . $_POST["lastname"]);

        if ($mail->send()) {
            // echo 'votre email a été envoyé avec succès';
            $mailSend = true;

        }
    } catch (Exception $e) {
        // echo "votre message n'a pas été envoyé!!! erreur de mailing: {$mail->ErrorInfo}";
    }
}
// ======================================================================
require_once dirname(__FILE__) . '/../views/header.php';
require_once dirname(__FILE__) . '/../controllers/nav_bar_ctrl.php';
require_once dirname(__FILE__) . '/../views/contact_views.php';
