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

    <?php
    $nbFichiers = 0;


                                                                                    // Choix du répertoire
    $chemin = '../DONNEES';
                                                                                    // Ouverture du répertoire
    $repertoire = opendir($chemin);

    function nb_element($repertoire)
    {
        $nbFichiers = 0;
        while($fichier = readdir($repertoire))
            {
                if ($fichier != "." && $fichier != "..")
                {
                    $nbFichiers++;
                }
            }
        return ($nbFichiers);
        }

    ?>

    <span>Pour ajouter un jeu remplissez ce formulaire: </span><br><br>
    <form method='post' action='ajout_item.php' enctype="multipart/form-data">
        <span>Saisissez le titre du jeu: </span><input type='text' name='titre' value='Titre'/><br>
        <span>Indiquez la date de sortie: </span><input type='date' name='date' value=''/><br>
        <span>Faites une description rapide du jeu: </span><input type='text' name='resume' value='Résumé du jeu' size='100'/><br>
        <span>Faites une description détaillé du jeu: </span><input class='description' type='text' name='description' value='Description'/><br>
        <span>Sélectionnez la platforme sur lequelle le jeu est sortie:</span>
        <select name="Plateforme">
            <option value="play"><label>Playstation 1</label></option>
            <option value="play2"><label>Playstation 2</label></option>
            <option value="sn"><label>SuperNitendo</label></option>
            <option value="nint"><label>Nitendo 64</label></option>
            <option value="Atari"><label>Atari</label></option>
            <option value="unknow"><label>Autres</label></option>
        </select> <br>
        <span>Sélectionnez une image en format '.jpg': </span><input type='file' name='Valider'/><br>
        <input id='Valider' type='submit' name='sub1'/>
    </form>


    <?php

    $id = nb_element($repertoire);
    $destination = "../IMAGES/".$id.".jpg";

    if(isset($_POST['sub1']))
    {
        move_uploaded_file($_FILES['Valider']['tmp_name'], $destination);

        if($_POST['titre']!='' && $_POST['date']!='' && $_POST['description']!='' && $_POST['resume']) // && is_uploaded_file($_FILES['Valider']['tmp_name'])==1)
        {
            $new_item = fopen("../DONNEES/F" . $id . ".txt", "a");
            $add_text = $id . '#' . $_POST['titre'] . '#' . '<img src="' . $destination . '"/>#' . $_POST['date'] . '#' . $_POST['resume'] . '#1#' . $_POST['description'] . '#' . $_POST['Plateforme'] . "#";
            fwrite($new_item, $add_text);
            fclose($new_item);
            echo '<p id="ajout_item">Votre ajout de jeu rétro a bien été pris en compte ! Merci de votre contribution au site :).</p>';
        }
        else
        {
            echo "<p id='champsincorrect'> Un des champs n'est pas saisie correctement, veuillez compléter tout les champs.</p>";
        }

    }

    ?>

    </body>
    </html>
