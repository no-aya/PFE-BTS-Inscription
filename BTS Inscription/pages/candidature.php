<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/BTS Logo white.svg">
    <link rel="stylesheet" href="../css/style.css">
    <title>Candidature</title>
</head>
<body>
    <div class="main-container">
        <?php 
            require_once("../components/header.html");
        ?>
    </div>
    <div class="main-content main-content-3">
        <div class="info-card row-1">
            <div class="info-card-side info-card-left col-1">
                <h1>Nouveau candidat</h1>
                <div class="info-card-description">Procéder au formulaire de candidature pour nouveau inscrits</div>
                <a href="candidature/candidatureDetails.php"><div class="azure-button">Nouvelle candidature</div></a>
            </div>
            <div class="info-card-side info-card-right col-1">
                <h1>Déja un candidat?</h1>
                <div class="info-card-description">Connectez-vous pour modifier ou compléter votre dossier avant la clöture des inscriptions.</div>
                <?php 
                if(isset($_POST['submit'])){
                    include("../data/sqlFunctions.php");
                    if(login($_POST['codeMassar'],$_POST['motDePasse'])){
                        header("location:candidatureForm.php");
                    }else{
                        echo "<span style=\"color:red\">Vérifiez vos coordonnées!</span>";
                    }
                }
                ?>
                <form method="post" action="" class="connexionForm">
                    <label for="codeMassar">Code Massar :</label>
                    <input type="text" name="codeMassar" id="codeMassar" class="connexionFormInput" value="<?=$_POST['codeMassar']?>">
                    <label for="motDePasse">Mot de passe :</label>
                    <input type="password" name="motDePasse" id="motDePasse" class="connexionFormInput">
                    <input type="submit" name="submit" class="connexionFormSubmit" value="Se connecter" /> 
                </form>
            </div>
        </div>
        <?php include("../components/credits.html")?>
    </div>
</body>
<script>
    var x=document.getElementsByClassName("menu-element")[2];
    x.classList.add("active-page");
    x.href = "javascript:void(0)";
</script>
</html>