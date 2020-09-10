<?php
if(isset($_POST['mailform']))

$header="MIME-Version: 1.0\r\n";
$header.='From:"jems-galery.com"<james.dardinier@jems-galery.com>'."\n";
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';

$message="coucou ";
mail("briandeveloppeurweb@gmail.com", "Salut tout le monde !", $message, $header);

?>
<form method="POST" action="">
    <input type="submit" value="Recevoir un mail !" name="mailform"/>
</form>