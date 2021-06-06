<?php 
session_start();
include ('../data/connexion.php');
if(!isset($_GET['typeBac'])&&!isset($_SESSION['typeBac'])) header("location:candidatureBac.php");
else{
    $_SESSION['typeBac']=$_GET['typeBac'];
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
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        require_once("../components/pageStart.html");
    ?>
    <link rel="stylesheet" href="../css/form.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />   
    <title>Formulaire</title>
</head>
<body>
    <div class="main-container">
        <?php 
            require_once("../components/header.html");
        ?>
    </div>
    <div class="main-content main-content-3">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div>
                    <div class="card">
                        <h2 id="heading" class="page-title">Pré-inscription</h2>
                        <p style="text-align: center;">Veuillez remplir soigneusement le formulaire suivant, toutes ces informations seront prises en charge afin de confirmer votre inscription.</p>
                        <form id="msform" action="../data/candidaturevalidation.php" method="post" >
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Personelles</strong></li>
                                <li id="bac"><strong>Bac</strong></li>
                                <li id="choix"><strong>Choix</strong></li>
                                <li id="confirm"><strong>Terminer</strong></li>
                            </ul>

                            <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div>
                                            <h2 class="fs-title">Informations personnelles :</h2>
                                        </div>
                                        <div>
                                            <h2 class="steps">Étape 1 - 4</h2>
                                        </div>
                                    </div> 
                                    <label class="fieldlabels">Nom : *<span class="error-message"></span> <i class="fas fa-exclamation-circle"></i></label><input type="text" name="lname" placeholder="Nom" value="<?php echo $_POST['lname']?>" />
                                    <label class="fieldlabels">Prénom: *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> <input type="text" name="fname" placeholder="Prénom" value="<?php echo $_POST['fname']?>" />
                                    <label class="fieldlabels">Mot de passe: *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> <input type="password" autocomplete="current-password" name="pwd" value="<?php echo $_POST['pwd']?>" placeholder="Vous pouvez l'utiliser ultérieurement pour modifier vos données" /> 
                                    <label class="fieldlabels">Sexe :</label> 
                                    <select name="sexe" id="sexe">
                                        <option value="garçon">Garçon</option>
                                        <option value="fille">Fille</option>
                                    </select>
                                    <label class="fieldlabels">Email : *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> <input type="email" name="email" placeholder="Email" value="<?php echo $_POST['email']?>"/> 
                                    <label class="fieldlabels">Date de naissance : *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> <input type="text" name="birthday" value="<?php echo $_POST['birthday']?>" placeholder="jj/mm/aaaa"/> 
                                    <label class="fieldlabels">CINE : *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> <input type="text" name="cine" value="<?php echo $_POST['cine']?>" placeholder="Nº carte nationale" /> 
                                    <label class="fieldlabels">Adresse : *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> <input type="text" name="adresse" value="<?php echo $_POST['adresse']?>" placeholder="Où habitez-vous?" />
                                    <label class="fieldlabels">Ville : *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> 
                                    <input type="text" name="ville" id="ville" value="<?php echo $_POST['ville']?>" placeholder="Ville de naissance">
                                </div> 
                                <input type="button" name="next" class="next action-button" value="Suivant" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div>
                                            <h2 class="fs-title">Baccalauréat :</h2>
                                        </div>
                                        <div>
                                            <h2 class="steps">Étape 2 - 4</h2>
                                        </div>
                                    </div> 
                                    <label class="fieldlabels">Code Massar : *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> <input type="text" name="codeMassar" value="<?php echo $_POST['codeMassar']?>" placeholder="A000000000"/> 
                                    <label class="fieldlabels">Année d'obtention : *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> <input type="number" name="bacyear" value="<?php echo $_POST['bacyear']?>" placeholder="aaaa" pattern="20[0-9][0-9]"/> 
                                    <label class="fieldlabels">Type de bac: *</label> 
                                    <select name="bactype" id="bactype" onblur="quatriemeChoix();" value="<?=$_SESSION['typeBac']?>" disabled>
                                        <option value="<?=$_SESSION['typeBac']?>" selected ><?=$typeBacFull?></option>
                                    </select>
                                    <label class="fieldlabels">Note générale: *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> <input type="number" name="note" value="<?php echo $_POST['note']?>" placeholder="Note du bac" pattern="[0-2][0-9].[0-9][0-9]"/> 
                                    <label class="fieldlabels">Mention: *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> 
                                    <select name="bacmention" id="bacmention" value="<?php echo $_POST['bacmention']?>">
                                        <option value="tb">Très bien</option>
                                        <option value="bi">Bien</option>
                                        <option value="ab">Assez-bien</option>
                                        <option value="pas">Passables</option>
                                        <option value="ad">Admis</option>
                                    </select>
                                    <label class="fieldlabels">Scannez votre image :<span class="error-message"></span><i class="fas fa-exclamation-circle" ></i></label> <input type="file" name="picCandidat" value="<?php echo $_POST['picCandidat']?>" class="files"> 
                                    <label class="fieldlabels">Scannez votre bac :<span class="error-message"></span><i class="fas fa-exclamation-circle" ></i></label> <input type="file" name="picBac" value="<?php echo $_POST['picBac']?>" class="files">
                                    <label class="fieldlabels">Attachez votre reçu d'inscription sur e-bts.gov.ma :<span class="error-message"></span><i class="fas fa-exclamation-circle" ></i></label> <input type="file" name="picRecu"  value="<?php echo $_POST['picRecu']?>" class="files">
                                </div> 
                                <input type="button" name="next" class="next action-button" value="Suivant" /> 
                                <input type="button" name="previous" class="previous action-button-previous" value="Précédent" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div>
                                            <h2 class="fs-title">Vos Choix:</h2>
                                        </div>
                                        <div>
                                            <h2 class="steps">Étape 3 - 4</h2>
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
                                <input type="submit" class="next action-button" value="Confirmer"/> 
                                <input type="button" name="previous" class="previous action-button-previous" value="Précédent" />
                            </fieldset>
                            <fieldset>
                                <p>Un moment s'il vous plait....</p>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include("../components/credits.html")?>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="../js/form.js"></script>
</body>
<script>
    var x=document.getElementsByClassName("menu-element")[2];
    x.classList.add("active-page");
</script>
</html>
