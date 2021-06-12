<?php 
session_start();
ob_start();
include ('../../data/connexion.php');
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
    if($_POST['codeMassar']=="") $_SESSION['errMSG'][]="Vous n'avez pas saisit votre codeMassar";
    else{
        if(checkCodeMassar($_POST['codeMassar'])) $_SESSION['errMSG'][]= "Vous êtes déjà un candidat! Connectez vous pour accéder à votre candidature.";
        else {
            $patern='/^[A-Za-z][0-9]{9}$/';
            if(!preg_match($patern,$_POST['codeMassar'])) $_SESSION['errMSG'][]="Votre code Massar est invalid";
        }
    }
    if(trim($_POST['lname'])=="") $_SESSION['errMSG'][]="Vous n'avez pas saisit votre nom";
    if(trim($_POST['fname'])=="") $_SESSION['errMSG'][]="Vous n'avez pas saisit votre prénom";
    if($_POST['pwd']=="") $_SESSION['errMSG'][]="Vous n'avez pas saisit votre mot de passe";
    if(trim($_POST['email'])=="") $_SESSION['errMSG'][]="Vous n'avez pas saisit votre email";
    else{
        $patern='/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
        if(!preg_match($patern,$_POST['email'])) $_SESSION['errMSG'][]="Votre email est invalid";
    }
    if($_POST['birthday']=="") $_SESSION['errMSG'][]="Vous n'avez pas saisit votre date de naissance";
    if($_POST['cine']=="") $_SESSION['errMSG'][]="Vous n'avez pas saisit votre CNIE";
    else{
        $patern='/^[A-Za-z]?[A-Za-z][0-9]{6}[0-9]*$/';
        if(!preg_match($patern,$_POST['cine'])) $_SESSION['errMSG'][]="Votre email est invalid";
    }

    if($_POST['adresse']=="") $_SESSION['errMSG'][]="Vous n'avez pas saisit votre adresse";
    if($_POST['ville']=="") $_SESSION['errMSG'][]="Vous n'avez pas saisit votre ville";
    if(!isset($_SESSION['typeBac']))  $_SESSION['errMSG'][]="Vous n'avez pas précisé le type de votre bac";
    else if($_SESSION['typeBac']!='economique' && $_SESSION['typeBac']!='technique' && $_SESSION['typeBac']!='scientifique') $_SESSION['errMSG'][]="Le type de votre bac est invalid";
    if($_POST['note']==""|| is_float($_POST['note'])) $_SESSION['errMSG'][]="Vous n'avez pas saisit votre note";
    if(empty($_SESSION['errMSG'])){
        $candidatID=insertCandidature($_SESSION['typeBac'],$_POST['note'],$_POST['bacyear']);
        $_SESSION['candidatID']=$candidatID;
        insertEtudiant($_POST['codeMassar'],$_POST['cine'],$_POST['lname'],$_POST['fname'],$_POST['sexe'],$_POST['ville'],$_POST['adresse'],$_POST['email'],$candidatID);
        header("location:candidatureStep2.php");
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
                        <form id="msform"  method="post">
                            <div class="fieldset fieldset-active">
                                <div class="form-card">
                                    <div class="row">
                                        <div>
                                            <h2 class="fs-title">Informations personnelles :</h2>
                                        </div>
                                        <div>
                                            <h2 class="steps">Étape 1 - 3</h2>
                                        </div>
                                    </div> 
                                    <label class="fieldlabels">Code Massar : *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> <input type="text" name="codeMassar" value="<?php echo $_POST['codeMassar']?>" placeholder="A000000000"/> 
                                    <label class="fieldlabels">Nom : *<span class="error-message"></span> <i class="fas fa-exclamation-circle"></i></label><input type="text" name="lname" placeholder="Nom" value="<?php echo $_POST['lname']?>" />
                                    <label class="fieldlabels">Prénom: *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> <input type="text" name="fname" placeholder="Prénom" value="<?php echo $_POST['fname']?>" />
                                    <label class="fieldlabels">Sexe :</label> 
                                    <select name="sexe" id="sexe">
                                        <option value="garçon">Garçon</option>
                                        <option value="fille">Fille</option>
                                    </select>
                                    <label class="fieldlabels">Email : *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> <input type="email" name="email" placeholder="Email" value="<?=$_POST['email']?>"/> 
                                    <label class="fieldlabels">Date de naissance : *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> <input type="date" name="birthday" value="<?php echo $_POST['birthday']?>" placeholder="jj/mm/aaaa"/> 
                                    <label class="fieldlabels">CINE : *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> <input type="text" name="cine" value="<?=$_POST['cine']?>" placeholder="Nº carte nationale" /> 
                                    <label class="fieldlabels">Adresse : *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> <input type="text" name="adresse" value="<?=$_POST['adresse']?>" placeholder="Où habitez-vous?" />
                                    <label class="fieldlabels">Ville : *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> 
                                    <input type="text" name="ville" id="ville" value="<?=$_POST['ville']?>" placeholder="Ville de naissance">
                                    
                                    <label class="fieldlabels">Type de bac: *</label> 
                                    <select name="bactype" id="bactype" value="<?=$_SESSION['typeBac']?>" disabled>
                                        <option value="<?=$_SESSION['typeBac']?>" selected ><?=$typeBacFull?></option>
                                    </select>
                                    <label class="fieldlabels">Année d'obtention : *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> <input type="number" name="bacyear" value="<?php echo $_POST['bacyear']?>" placeholder="aaaa" pattern="20[0-9][0-9]"/> 
                                    <label class="fieldlabels">Note générale: *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> <input type="number" step="0.01" name="note" value="<?php echo $_POST['note']?>" placeholder="Note du bac" pattern="[0-2][0-9].[0-9][0-9]"/> 
                                    <label class="fieldlabels">Mention: *<span class="error-message"></span><i class="fas fa-exclamation-circle"></i></label> 
                                    <select name="bacmention" id="bacmention" value="<?php echo $_POST['bacmention']?>">
                                        <option value="tb">Très bien</option>
                                        <option value="bi">Bien</option>
                                        <option value="ab">Assez-bien</option>
                                        <option value="pas">Passables</option>
                                        <option value="ad">Admis</option>
                                    </select>
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