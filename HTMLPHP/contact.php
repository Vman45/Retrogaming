<!DOCTYPE html>
 <html>
 <head>
  <title>Contact</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../CSS/contact.css">

    <?php include("header.php"); ?>

 </head>
  <body>

    <?php
if(isset($_POST['mailform']))
{
  if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message']))
  {
    $header="MIME-Version: 1.0\r\n";
    $header.='From:"contact.com"<support@primfx.com>'."\n";
    $header.='Content-Type:text/html; charset="uft-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';

    $message='
    <html>
      <body>
        <div align="center">
          <br />
          <u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
          <u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
          <br />
          '.nl2br($_POST['message']).'
          <br />
        </div>
      </body>
    </html>
    ';

    mail("contactretrogamingifa@gmail.com", "CONTACT - Monsite.retrogaming", $message, $header);
    $msg="Votre message a bien été envoyé !";
  }
  else
  {
    $msg="Tous les champs doivent être complétés !";
  }
}
?>
<html>
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <h2>Formulaire de contact !</h2>
    <form class='formulaire' method="POST" action="">
      <input type="text" name="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" ><br><br>
      <input type="email" name="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" ><br><br>
      <textarea name="message" placeholder="Votre message"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea><br><br>
      <input type="submit" value="Envoyer !" name="mailform"/>
    </form>
    <?php
    if(isset($msg))
    {
      echo "<p class='formulaire'>$msg</p>";
    }
    ?>
  </body>
</html>
