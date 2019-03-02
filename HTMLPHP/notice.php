<!DOCTYPE html>
    <html lang="fr" dir="ltr">
        <head>
            <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="../CSS/notice.css">
            <header>
                <?php include("header.php");  ?>
            </header>
                <title>Notice catalogue Rétrogaming</title>
                <h1 class=".titre"> Notice d'explication catalogue Rétrogaming </h1>
        </head>
        <body>
            <h2>Vous trouverez ici la notice d'explication du fonctionnement de notre catalogue :</h2> <br>

                <p>Ce catalogue a été réalisé grâce à PHP et HTML, permet à l'utilisateur d'ajouter, de modifier et de supprimer
                des éléments directement depuis le catalogue, sans modifier le code. <br>
                Il à été réalisé dans le cadre de notre <span class="fil_rouge">projet fil rouge</span>
                par <span class="auteurs">Bastien Mantès, Lucas Mantoani et Amélie Barthel.</span><br>
                Ce catalogue à été conçu pour être mono-utilisateur.
                </p>

            <h2>Accueil</h2>

                <p> Il s'agit de la première page ou l'utilisateur arrive quand il lance le catalogue, depuis cette page
                    grâce au header, il peut naviger simplement dans le catalogue.</p>

            <h2>Catalogue</h2>
                    <p>Juste à droite du bouton <span class="auteurs">Accueil</span> dans le menu en haut de page, il y'a le bouton <span class="auteurs">Catalogue.</span>
                    Cliquez simplement dessus et vous aurez accès à tout le catalogue, donc à tout les éléments contenus dedans. <br>
                    Si vous cliquez sur le jeu de votre choix, cela ouvre une page avec une fiche détaillée du jeu.<br>
                    Une fois sur cette page, vous aurez la possibilité de modifier la fiche du jeu ou de la supprimer grâce à
                    deux boutons prévus à cet effet.
                </p>

            <h2>Catégories</h2>
                    <p>A droite de "Catalogue" dans le menu, il y'a <span class="auteurs">Catégories</span> :<br>
                    Il s'agit d'un menu déroulant listant les catégories de jeux par console, en cliquant sur une catégorie, vous affichez donc uniquement les jeux contenus
                    dans celle-ci, ce qui permet de faire une recherche plus ciblée dans le catalogue.
                    </p>

        </body>
    </html>
