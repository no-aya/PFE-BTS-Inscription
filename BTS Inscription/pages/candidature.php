<?php
session_start();
include_once("../data/sqlFunctions.php");
?>
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
                <?php if ($countDays >= 0) { ?>
                    <h1>Nouveau candidat</h1>
                    <div class="info-card-description">Procéder au formulaire de candidature pour nouveau inscrits</div>
                    <a href="candidature/candidatureDetails.php">
                        <div class="azure-button">Nouvelle candidature</div>
                    </a>
                <? } else { ?>
                    <h1 style="text-align: center;">Les inscriptions sont fermées</h1>
                    <div class="info-card-description">Les listes seront affichées prochainement</div>
                <?php } ?>
            </div>


            <div class="info-card-side info-card-right col-1">
                <h1>Un administrateur</h1>
                <div class="info-card-description">Accéder à la platforme dédié à l'administration</div>
                <a href="espaceAdmin/adminLogin.php">
                    <div class="azure-button">Accéder</div>
                </a>
            </div>
        </div>

        <?php include("../components/credits.html") ?>
    </div>
</body>
<script>
    var x = document.getElementsByClassName("menu-element")[2];
    x.classList.add("active-page");
    x.href = "javascript:void(0)";
</script>

</html>