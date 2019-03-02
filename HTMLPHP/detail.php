<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../CSS/catalogue.css">
    <title>Page Title</title>
</head>
<body>
<header>
    <?php include("header.php"); ?>
</header>
<table class="tableau">
<?php
$id=$_GET['id'];

    $file_handle = fopen("../DONNEES/F".$id.".txt", "r");

    $line_of_text = fgets($file_handle);
    $gamedetail = explode("#", $line_of_text);

    echo"<tr>";
        if($gamedetail[5]==1)
        {
            for($j=0; $j<(count($gamedetail)-5); $j++)
            {
                if($j!=5)
                {
                    echo"<td>" . $gamedetail[$j] . "</td>";
                }
            }
            echo"<td>" . $gamedetail[6] . "</td>";
        }
    echo"</tr>";

    fclose($file_handle);
// }
?>
</table>

<form method='post' action='<?php echo "detail.php?id=".$id;?>'>
    <input id='Modifier' type='submit' name='Modifier' value='Modifier'/>
</form>
<br>
<form method='post' action='<?php echo "detail.php?id=".$id;?>'  enctype="multipart/form-data">
    <input id='Supprimer' type='submit' name='Supprimer' value='Supprimer'/>
</form>

<?php
$file_handle = fopen("../DONNEES/F" . $id . ".txt", "r");
$line_of_text = fgets($file_handle);
$gamedetail = explode("#", $line_of_text);

if(isset($_POST['Modifier']))
{
    $file_handle = fopen("../DONNEES/F" . $id . ".txt", "r");
    $line_of_text = fgets($file_handle);
    $gamedetail = explode("#", $line_of_text);

    echo"<form method='post' action='detail.php?id=".$id."' enctype='multipart/form-data'>
            <span>Saisissez le titre du jeu: </span><input type='text' name='titre' value='" . $gamedetail[1] . "'/><br>
            <span>Indiquez la date de sortie: </span><input type='date' name='date' value='" . $gamedetail[3] . "'/><br>
            <span>Faites une description rapide du jeu: </span><input type='text' name='resume' value='" . $gamedetail[4] . "' size='100'/><br>
            <span>Faites une description détaillé du jeu: </span><input class='description' type='text' name='description' value='" . $gamedetail[6] . "'/><br>
            <span>Sélectionnez la platforme sur lequelle le jeu est sortie:</span>
            <select name='Plateforme'>
                <option valeur='play'>Playstation 1</option>
                <option valeur='play2'>Playstation 2</option>
                <option valeur='sn'>SuperNitendo</option>
                <option valeur='n64'>Nitendo 64</option>
                <option valeur='Atari'>Atari</option>
                <option valeur='unknow'>Autres</option>
            </select> <br>
            <input id='Valider' type='submit' name='sub2'/>
        </form>";

    if(isset($POST['sub2']))
    {
        $gamedetail[1] = $_POST['titre'];
        $gamedetail[3] = $_POST['date'];
        $gamedetail[4] = $_POST['resume'];
        $gamedetail[6] = $_POST['description'];
        //fermeture et suppression du fichier
        fclose($file_handle);
        unlink('../DONNEES/F' . $id . '.txt');
        //création du nouveau contenant les modifs
        $new_item = fopen("../DONNEES/F" . $id . ".txt", "w");
        $add_text = $id . '#' . $gamedetail[1] . '#' . $gamedetail[2] . '#' . $gamedetail[3] . '#' . $gamedetail[4] . '#1#' . $gamedetail[6] . '#' . $_POST['Plateforme'] . '#';
        fwrite($new_item, $add_text);
        fclose($new_item);
        echo '<p id="ajout_item"><a href="menu-bastien.php">Vos modifications ont bien été prises en compte ! Merci de votre contribution au site :).</a></p>';
    }



}



if(isset($_POST['Supprimer']))
{                                                                           //FAIRE DES CSS POUR CES BOUTONS
    echo "Etes vous sur de bien vouloir supprimer ce jeu du catalogue ?
    <form method='get' action='detail.php' enctype='multipart/form-data'>
    <input id='Confirmation_YES' type='submit' name='Yes' value='Oui'/>
    <input id='Confirmation_NO' type='submit' name='No' value='Non'/>
    <input  type='text' name='id' value='".$id."' hidden/>
    </form>";
}
    if(isset($_GET['Yes']))
    {
        $file_handle = fopen("../DONNEES/F" . $id . ".txt", "r");
        $line_of_text = fgets($file_handle);
        $new_text = str_replace('#1#','#0#',$line_of_text);
        fclose($file_handle);
        $file_handle2 = fopen("../DONNEES/F" . $id . ".txt", "w");
        fwrite($file_handle2,$new_text);
        fclose($file_handle2);
    }
    if(isset($_GET['No']))
    {
        echo "<a href='detail.php?id=".$id."'>Revenir à la page détail</a>";

    }


?>
</body>
</html>
