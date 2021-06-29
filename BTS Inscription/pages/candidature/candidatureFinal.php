<?php 
session_start();
include ('../../data/connexion.php');
if(isset($_SESSION['errMSG'])){
    $errMSG=$_SESSION['errMSG'];
}
session_destroy();
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
                        <form id="msform" method="post" action="candidatureForm.php">
                            <!-- fieldsets -->
                            <fieldset style="border: none;">
                                <script>
                                    
                                </script>
                                <div class="form-card">
                                    <div class="row">
                                        <div>
                                            <h2 class="fs-title">Terminer:</h2>
                                        </div>
                                    </div> <br><br>
                                    <?php if(empty($errMSG)) include("../../components/success.html");
                                    else {
                                        include("../../components/failed.html");
                                        echo "<p>Erreurs :</p>";
                                        foreach ($errMSG as $key) {
                                            echo "<li>$key</li>";
                                        }
                                    }?>
                                </div>
                                <?php 
                                    if(!empty($errMSG)) echo "<input type=\"submit\" name=\"return\" class=\"next action-button\" value=\"Retourner\" /> ";
                                ?>
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include("../../components/credits.html")?>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
</body>
<script>
    var x=document.getElementsByClassName("menu-element")[2];
    x.classList.add("active-page");
</script>
</html>
