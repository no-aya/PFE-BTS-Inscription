<?php
session_start();
include ('../data/connexion.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
     echo $errMSG;
        require_once("../components/pageStart.html");
    ?>
    <title>Formulaire</title>
</head>
<body>
    <div class="main-container">
        <?php 
            require_once("../components/header.html");
        ?>
    </div>
    <div class="main-content main-content-3">
        <div class="info-card general-choix-card">
                <h1>Quel est le type de votre baccalauréat?</h1>
                <div class="choix-card">
                    <a href="setBacType.php?typeBac=scientifique">
                    <div class="choix" >
                        <div class="choix-img"><img src="../images/atom-solid.svg" ></div>
                        <div class="choix-name">BAC SCIENTIFIQUE</div>
                    </div>
                    </a>
                    <a href="setBacType.php?typeBac=technique">
                    <div class="choix">
                        <div class="choix-img"><img src="../images/cog-solid.svg"></div>
                        <div class="choix-name">BAC TECHNIQUE</div>
                    </div>
                    </a>
                    <a href="setBacType.php?typeBac=economique">
                    <div class="choix">
                        <div class="choix-img"><img src="../images/file-invoice-dollar-solid.svg" style="width: 25%;"></div>
                        <div class="choix-name">BAC ÉCONOMIE</div>
                    </div>
                    </a>
                </div>
        </div>
    </div>
    <?php include("../components/credits.html")?>
</body>
<script>
    var x=document.getElementsByClassName("menu-element")[2];
    x.classList.add("active-page");
    x.href = "javascript:void(0)";
</script>
</html>