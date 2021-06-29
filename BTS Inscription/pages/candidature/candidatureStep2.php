<?php 
session_start();
ob_start();
include ('../../data/connexion.php');
if(!isset($_SESSION['typeBac'])||!isset($_SESSION['candidatID'])) header("location:candidatureBac.php");

if (isset($_POST['submit'])){
    include('../../data/sqlFunctions.php');
    insertDocument("image",$_FILES['picCandidat'],$_SESSION['candidatID']);
    insertDocument("bac",$_FILES['picBac'],$_SESSION['candidatID']);
    insertDocument("recu",$_FILES['picRecu'],$_SESSION['candidatID']);
    if( !isset($_SESSION['errMSG'])){
        header("location:candidatureStep3.php");
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        require_once("../../components/pageStart2.html");
    ?>
    <link rel="stylesheet" href="../../css/form.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />   
    <title>Formulaire</title>
</head>
<body>
    <div class="main-container">
        <?php 
            require_once("../../components/header2.html");
        ?>
    </div>
    <div class="main-content main-content-3">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div>
                    <div class="card">
                        <h2 id="heading" class="page-title">Pré-inscription</h2>
                        <p style="text-align: center;">Veuillez remplir soigneusement le formulaire suivant, toutes ces informations seront prises en charge afin de confirmer votre inscription.</p>
                        <p style="color:red">
                            <?php 
                            if(isset($_SESSION['errMSG'])){
                            foreach ($_SESSION['errMSG'] as $key) {
                                echo "<li>$key</li>";
                            }
                            unset($_SESSION['errMSG']);
                        } ?>
                        </p>
                        <form id="msform"  method="post" enctype='multipart/form-data'>
                            <div class="fieldset fieldset-active">
                                <div class="form-card">
                                    <div class="row">
                                        <div>
                                            <h2 class="fs-title">Vos documents :</h2>
                                        </div>
                                        <div>
                                            <h2 class="steps">Étape 2 - 3</h2>
                                        </div>
                                    </div> 
                                    <label class="fieldlabels">Scannez votre image :<span class="error-message"></span><i class="fas fa-exclamation-circle" ></i></label> <input type="file" name="picCandidat" value="<?php echo $_POST['picCandidat']?>" class="files"> 
                                    <label class="fieldlabels">Scannez votre bac :<span class="error-message"></span><i class="fas fa-exclamation-circle" ></i></label> <input type="file" name="picBac" value="<?php echo $_POST['picBac']?>" class="files">
                                    <label class="fieldlabels">Attachez votre reçu d'inscription sur e-bts.gov.ma :<span class="error-message"></span><i class="fas fa-exclamation-circle" ></i></label> <input type="file" name="picRecu"  value="<?php echo $_POST['picRecu']?>" class="files">
                                </div> 
                                <input type="submit" name="submit" class="action-button" value="Suivant" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include("../../components/credits.html")?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="../../js/form.js"></script>
</body>
<script>
    var x=document.getElementsByClassName("menu-element")[2];
    x.classList.add("active-page");
</script>
</html>