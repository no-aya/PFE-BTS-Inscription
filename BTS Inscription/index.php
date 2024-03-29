<?php 
include ('./data/connexion.php');
$MSG="";
$successMSG="<p style=\"color:red;\">Enregistré avec succés!</p>";
if(isset($_POST['submit'])){
    if(empty($_POST['visiteurEmail'])) $MSG="<p style=\"color:red;\">Remplissez les champs</p>";
    else{
        $sql = "INSERT INTO `Visiteur` (`email`) VALUES ('".$_POST['visiteurEmail']."')";
        mysqli_query($connexion,$sql);
        $MSG=$successMSG;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centre du BTS - Lycée Mohammed VI</title>
    <link rel="icon" href="images/BTS Logo white.svg">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
</head>
<body>
    <div class="main-container">
        <div class="header">
            <nav>
                <a href="."><img src="images/BTS Logo white.svg" alt="BTS Lycée Mohammed VI"></a>
                <ul>
                    <li ><a href="#" class="active-page">Acceuil</a></li>
                    <li><a href="pages/filieres.php">Filières</a></li>
                    <li><a href="pages/candidature.php">Candidature</a></li>
                    <li><a href="pages/contact.php">Contact</a></li>
                    <a href="pages/espaceLog.php"><li class="azure-button">Espace étudiant</li></a>
                </ul>
            </nav>  
        </div>
        <div class="row-1">
            <div class="col-1"> 
                <h1>Votre parcours professionnel commence dès maintenant</h1>
                <p>Une formation dans le métier de technicien, qui s’étale sur 2 ans, ouverte aux titulaires du baccalauréat.</p>
                <?php include("components/candidater.html") ?>
            </div>
            <img class = "col-2" src="images/stacking-cubes.svg" alt="">
        </div>
    </div>
    <div class="row-1 stylish-banner">
        <div class="col-1">
            <div class="subscribe-field">
                <div>
                    <h1>Rester à jour des dates importantes</h1>
                    <p>Ouverture des candidatures, affichage des listes, dépôt des dossiers … On s’en occupe !</p>
                    <?php echo $MSG?>
                    <form class="c-form" method="post" id="c-form" <?php if($MSG==$successMSG) {echo " style='display: none'"; } ?>>
                    <input class="c-form__input" placeholder="Saisissez votre email" type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" name="visiteurEmail">
                    <button class="c-form__button" form="c-form" type="submit" value="submit" name="submit"><img src="images/send-icon.svg" alt=""></button>
                    </label>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-1">
            <div class="glide-contain multiple">
                <div class="glider">
                    <figure>
                        <p class="text-glider">L’arrêté ministériel <span> n° 329.05 du 24 mai 2005 </span>organise les diplômes permettant d’accéder à la fonction publique en tant que <span>technicien 1er grade</span>.</p>
                    </figure>
                    <figure>
                        <p class="text-glider">L’organisation des formations dans les classes de préparation du Brevet de Technicien Supérieur est régie par l’arrêté ministériel n 1431 du 26 novembre 2012.</p>
                    </figure>
                </div>
                <div id="dots" class="glider-dots"></div>
            </div>
        </div>
    </div>
    <div class="main-content main-content-1">
        <div class="row-1">
            <img class="col-1" src="images/personPC.png" alt="">
            <div class="col-1">
                <h1>Un environnement adéquat pour l’apprentissage</h1>
                <p style="margin-bottom: 0;">Le centre BTS Mohammed VI à Marrakech offre un espace hautement équipé, selon les standards des référentiels de chaque formation afin de garantir le caractère national du diplôme et assurer l’obtention du maximum de chaque filière.</p>
                <p>Une équipe d’enseignants, directeurs, cadres et responsables qualifiés et ponctuels pour vous accompagner tout au long de votre cursus.</p>
                <?php include("components/candidater.html") ?>
            </div>
        </div>
    </div>
    
    <div class="main-content row-1">
        <div class="element">
            <img src="images/icone1.svg" alt="">
            <div>
                <h2>S’épanouir</h2>
                <p>Un espace de travail riche en connaissance, une vie associative et une ville incroyable à découvrir. Bienvenue à Marrakech.</p>
            </div>
        </div>
        <div class="element ">
            <img src="images/icone2.svg" alt="">
            <div class="element-text">
                <h2>La campagne BDE</h2>
                <p>Faire partie d’un BDE vous permet de vous construire un réseau extra professionnel. Rejoignez - le !</p>
            </div>
        </div>
        <div class="element">
            <img src="images/icone3.svg" alt="">
            <div class="element-text">
                <h2>Plus qu’un diplôme</h2>
                <p>Un cursus qui demande non uniquement un score scolaire, mais aussi un score au milieu professionnel grâce aux stages.</p>
            </div>
        </div>
    </div>
    <?php include("components/credits.html")?>
</body>
<script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
<script>
        new Glider(document.querySelector('.glider'), {
            slidesToShow: 1,
            dots: '#dots',
            draggable: false,
        });
</script>
</html>