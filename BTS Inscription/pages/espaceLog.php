<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        require_once("../components/pageStart.html");
    ?>    
    <title>Espace étudiant</title>
</head>
<body style="overflow: hidden;">
    <div class="main-container">
        <?php 
            require_once("../components/header.html");
        ?>
    </div>
    <div class="main-log-container">
        <div class="log-section">
            <div class="log-box">
                <p>Cet espace est réservé aux étudiants déjà inscrits à l’établissement.</p>
                <form class="c-form" action="espaceEtudiant/acceuil.html">
                    <input class="c-form__input" placeholder="Code Massar" type="text" pattern="[A-Za-z][0-9]+">
                    <label class="c-form__buttonLabel" for="checkbox">
                        <button class="c-form__button" type="submit"><img src="../images/send-icon.svg" alt=""></button>
                    </label>
                </form>
            </div>
        </div>
        <?php include("../components/credits.html")?>
    </div>
</body>
<script>
    var x=document.getElementsByClassName("menu-element")[4];
    x.href = "javascript:void(0)";
    x=document.getElementsByClassName("credits")[0].style;
    x.color="white";
    x.position="absolute";
    x.bottom="5%";
    x.width="100%";
    x.textAlign="center";
</script>
</html>