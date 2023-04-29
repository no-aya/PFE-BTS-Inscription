<?php 
session_start();
ob_start();
include ('../../data/connexion.php');
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
if(!isset($_SESSION['typeBac'])) header("location:candidatureBac.php");
else{
    switch ($_SESSION['typeBac']) {
        case 'scientifique':
            $typeBacFull="Bac série scientifique";
            $sqlFiliere="SELECT * FROM filiere";
            break;
        case 'technique':
            $typeBacFull="Bac série technique";
            $sqlFiliere="SELECT * FROM filiere WHERE filiereID!=\"CG\"";
            break;
        case 'economique':
            $typeBacFull="Bac série économique";
            $sqlFiliere="SELECT * FROM filiere";
            break;
        default:
            header("location:candidatureBac.php");
            break;
    }
}

if (isset($_POST['submit'])){
    include('../../data/sqlFunctions.php');
    insertChoix($_POST['pchoix'],$_SESSION['candidatID'],1);
    insertChoix($_POST['dchoix'],$_SESSION['candidatID'],2);
    insertChoix($_POST['tchoix'],$_SESSION['candidatID'],3);
    insertChoix($_POST['qchoix'],$_SESSION['candidatID'],4);
    header("location:candidatureFinal.php");
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
                        <form id="msform"  method="post">
                            <div class="fieldset fieldset-active">
                                <div class="form-card">
                                    <div class="row">
                                        <div>
                                            <h2 class="fs-title">Vos choix :</h2>
                                        </div>
                                        <div>
                                            <h2 class="steps">Étape 3 - 3</h2>
                                        </div>
                                    </div> 
                                    <?php
                                    $enChoix=["Premier","Deuxième","Troisième","Quatrième"];
                                    $idChoix=["p","d","t","q"];
                                    for($i=0;$i< 4;$i++){
                                        $result=mysqli_query($connexion,$sqlFiliere);
                                        echo "<label class=\"fieldlabels\">".$enChoix[$i]." choix: *</label>"; 
                                        echo "<select name=\"".$idChoix[$i]."choix\" id=\"".$idChoix[$i]."choix\" value=".$_POST[$idChoix[$i].'name'].">";
                                        while($row=mysqli_fetch_assoc($result))
                                        echo "<option value={$row['filiereID']}>{$row['label']}</option>";
                                        echo "</select>";
                                    }
                                    ?>
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