<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <link rel="stylesheet" type="text/css" href="../CSS/catalogue.css">
            <title>Catalogue RetroGaming</title>
        </head>
        <body>
            <header>
            <?php include("header.php"); ?>
            </header>

        <table class="tableau">
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
            return $nbFichiers;
        }
        $id = nb_element($repertoire);
        //fopen("DONNEES/F".nb_element($repertoire, $nbFichiers).".txt", "w");
        for($i=0; $i<$id; $i++)
        {
        $file_handle = fopen("../DONNEES/F".$i.".txt", "r");

            $line_of_text = fgets($file_handle);
            $gamedetail = explode("#", $line_of_text);
            echo"<tr>";
                if($gamedetail[5]==1)
                {
                    for($j=0; $j<(count($gamedetail)-4); $j++)
                    {
                        echo"<td><a href='detail.php?id=" . $gamedetail[0] . "'>" . $gamedetail[$j] . "</a></td>";
                    }
                }
            echo"</tr>";
            fclose($file_handle);
        }
        ?>
        </table>
        </body>
    </html>
