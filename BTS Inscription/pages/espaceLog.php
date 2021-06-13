<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        require_once("../components/pageStart.html");
        include("../data/connexion.php");
        if(isset($_POST['submit'])){
            $code=$_POST['code'];
            $result=mysqli_query($connexion,"SELECT codeMassar FROM etudiant WHERE codeMassar='$code' AND numInscription IS NOT NULL");
            if(mysqli_num_rows($result)==0) $errMSG="Vous n'êtes pas inscrit dans l'établissement!";
            else header("location:espaceEtudiant/acceuil.php");
        }
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
                <p><?=(isset($errMSG))? $errMSG : "Cet espace est réservé aux étudiants déjà inscrits à l’établissement." ?></p>
                <form class="c-form" method="post">
                    <input class="c-form__input" placeholder="Code Massar" type="text" name="code" pattern="[A-Za-z][0-9]+">
                    <label class="c-form__buttonLabel" for="checkbox">
                        <button class="c-form__button" type="submit" name="submit"><img src="../images/send-icon.svg" alt=""></button>
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