<?php 
session_start();
include ('../data/connexion.php');
$NUMDECHOIX=3;
$enChoix=["Premier","Deuxième","Troisième","Quatrième"];
$idChoix=["p","d","t","q"];
$errMSG="";
if(isset($_POST["submit"])) {
    if(empty($_POST['lname'])||empty($_POST['fname'])||empty($_POST['password'])||empty($_POST['email'])||empty($_POST['birthday'])||empty($_POST['cine'])||empty($_POST['adresse'])||empty($_POST['ville'])||empty($_POST['bacyear'])||empty($_POST['note'])||empty($_POST['bacmention'])||empty($_POST['picCandidat'])||empty($_POST['picBac'])||empty($_POST['picRecu'])) $errMSG="Remplissez les champs";
    else{
        if(strlen($_POST['password'])<8) $errMSG="Mot de passe doit contenir au moins 8 caractères";
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $errMSG="Email invalide !";
        if(preg_match($_POST['birthday'],"/^(0?[1-9]|[12][0-9]|3[01])[\/](0?[1-9]|1[012])[\/]\d{4}$/")!=1) $errMSG="Date de naissance invalide!";
        if(!is_int($_POST['bacyear'])) $errMSG="Date d'obtention de bac est invalide!";
        else if(date("Y")-$_POST['bacyear']>2) $errMSG="Vous n'êtes plus éligible pour cette formation!";
    }
    if($errMSG=="") header("location:../data/candidaturevalidation.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
     echo $errMSG;
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
                        <form id="msform" method="post">
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
                                    <label class="fieldlabels" >Nom : *<span class="error-message"></span> <i class="fas fa-exclamation-circle"></i></label><input type="text" name="lname" placeholder="Nom" value="<?php echo $_POST['lname']?>" />
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
                                    <select name="ville" id="ville" value="<?php echo $_POST['ville']?>">
                                        <option value="Marrakech">Marrakech</option>
                                        <option value="Safi">Safi</option>
                                        <option value="Guelmim">Gelmim</option>
                                        <option value="Ouarzazat">Ouarzazat</option>
                                    </select>
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
                                    <label class="fieldlabels">Année d'obtention : *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> <input type="number" name="bacyear" value="<?php echo $_POST['bacyear']?>" placeholder="aaaa" pattern="20[0-9][0-9]"/> 
                                    <label class="fieldlabels">Type de bac: *</label> 
                                    <select name="bactype" id="bactype" onblur="quatriemeChoix();" value="<?php echo $_POST['bactype']?>">
                                        <option value="svt" selected>Sciences de la Vie et de la Terre</option>
                                        <option value="pc">Sciences Physiques et Chimiques</option>
                                        <option value="sma">Sciences Maths A</option>
                                        <option value="smb">Sciences Maths B</option>
                                        <option value="se">Sciences Economiques</option>
                                        <option value="tgc">Techniques de Gestion et de Comptabilité</option>
                                        <option value="sa">Sciences Agronomiques</option>
                                        <option value="ste">Sciences et Technologies Electriques</option>
                                        <option value="stm">Sciences et Technologies Mécaniques</option>
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
                                    for($i=0;$i<=$NUMDECHOIX;$i++){
                                        $result=mysqli_query($connexion,"SELECT * FROM `Filiere`");
                                        if($i==3){
                                            echo "<label class=\"fieldlabels quatrieme-choix\">".$enChoix[$i]." choix: *</label>"; 
                                            echo "<select class=\"quatrieme-choix\" name=\"".$idChoix[$i]."choix\" id=\"".$idChoix[$i]."choix\" value=".$_POST[$idChoix[$i].'name'].">";
                                        }else{
                                            echo "<label class=\"fieldlabels\">".$enChoix[$i]." choix: *</label>"; 
                                        echo "<select name=\"".$idChoix[$i]."choix\" id=\"".$idChoix[$i]."choix\" value=".$_POST[$idChoix[$i].'name'].">";
                                        }
                                        while($row=mysqli_fetch_assoc($result))
                                        echo "<option value={$row['FiliereID']}>{$row['Label']}</option>";
                                        echo "</select>";
                                    }
                                    ?>
                                </div> 
                                <input type="submit" name="next" class="next action-button" value="Confirmer" /> 
                                <input type="button" name="previous" class="previous action-button-previous" value="Précédent" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div>
                                            <h2 class="fs-title">Terminer:</h2>
                                        </div>
                                        <div>
                                            <h2 class="steps">Étape 4 - 4</h2>
                                        </div>
                                    </div> <br><br>
                                    <?php include("../components/failed.html")?>
                                </div>
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
