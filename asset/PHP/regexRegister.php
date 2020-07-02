<?php 
    // verify captcha --------------------------------------
require('vendor/autoload.php');
if(isset($_POST['submit_post'])) 
{
    $errors = '';
    if(!empty($_POST['g-recaptcha-response'])) 
    {
        $recaptcha = new \ReCaptcha\ReCaptcha('6LcQtfYUAAAAAHrbq0Bn7rCJ_p1LhlIq72zBIpqn');
        $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
        if ($resp->isSuccess()) 
        {
            #Redirection ver profil.php
            header('Location: succes.php'); 
        }
        else 
        {
            #si le captcha est incorect
            $errors = $resp->getErrorCodes();
            #$errors ='Captcha Invalide';
        }
    } 
    else 
    {
        #quand le captcha n'est pas remplie!
        $errors = 'Captcha non rempli';
    }
}
// --------------------------------------------------
?>