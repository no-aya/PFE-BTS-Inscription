<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        require_once("../components/pageStart.html");
    ?>
    <title>Candidature</title>
</head>
<body>
    <div class="main-container">
        <?php 
            require_once("../components/header.html");
        ?>
    </div>
    <div class="main-content main-content-3" style="background: url(../images/Background-wide.png) no-repeat center center;">
        <div class="page-title" style="justify-self: center; max-width: 1000px;">PROCÉDURE DE CANDIDATURE</div>
        <div style="max-width: 1200px;">
        <div class="numered-content">
            <div class="number" ><img src="../images/1.png" alt="1" id="png-1"> </div>
            <div class="text">
                <p>Pour pouvoir accéder à nos Centres BTS Lycée Mohamed VI, il faudrait tout d’abord commencer obligatoirement par une pré-inscription en ligne via le site web: <a class="higlighted-link" href="https://www.e-bts.men.gov.ma">www.e-bts.men.gov.ma</a> ou <a class="higlighted-link" href="https://massarservice.men.gov.ma">massarservice.men.gov.ma</a></p>
                <p>N’oublier pas de télecharger et conserver votre fiche de Candidature.</p>
            </div>
        </div>
        <div class="numered-content numered-content-2">
            <div class="text">
                <p>Une fois les listes finales sont affichés, vérifiez votre admission dans nos centres sur le site <span>e-bts.men.gov.ma</span> . Si vous y figurez, vous devez compléter votre dossier électronique sur notre site afin de confirmer votre choix.</p>
                <p class="warning-text">Attention : Ce n’est pas une inscription définitive !</p>
                <p>Le service de scolarité de l’établissement effectuera un tri, selon l’ordre de mérite et le nombre de places disponibles.</p>
                <a href="candidatureBac.php" style="text-decoration: none;"><div class="azure-button">Procéder à la pré-inscription</div></a>
            </div>
            <div class="number"> <img src="../images/2.png" alt="2"></div>
        </div>
        <div class="numered-content">
            <div class="number"><img src="../images/3.png" alt="3"> </div>
            <div class="text">
                <p>Les listes des candidats admis définitivement sera afficher sur ce site une fois les procédures administratives de l’établissement sont terminés. L’affichage se fera par ordre : liste Principale en premier puis les listes d’attentes.</p>
                <p>Si votre nom y figure, <span>veuillez s’il vous plait finaliser votre inscription en déposant votre dossier au centre des BTS du Lycée Mohammed VI </span>composé de : </p>
                <p>
                    <ol>
                        <li>L’original du baccalauréat et une copie légalisée</li>
                        <li>L’original du relevé de notes et une copie légalisée</li>
                        <li>Copie légalisé de la CIN</li>
                        <li>Copie de la Fiche de Candidature (tirée de Massar)</li>
                        <li>Le carnet de santé</li>
                    </ol>
                <p>
                <p>Ceux qui ne déposeront pas ces originaux dans les délais perdront leur droit d’inscription.</p>
            </div>
            </div>
        </div>
        <?php include("../components/credits.html")?>
    </div>
</body>
<script>
    var x=document.getElementsByClassName("menu-element")[2];
    x.classList.add("active-page");
</script>
</html>