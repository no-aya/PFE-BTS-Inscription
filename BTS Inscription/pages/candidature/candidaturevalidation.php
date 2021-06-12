<?php 
if(!empty($_POST['endo'])){
    echo $_POST['lname']."\n";
    echo $_POST['fname']."\n";
    echo $_POST['pwd']."\n";
    echo$_POST['email']."\n";
    echo $_POST['birthday']."\n";
    echo $_POST['adresse']."\n";
    echo $_POST['ville']."\n";
    echo $_POST['bacyear']."\n";
    echo $_POST['codeMassar']."\n";
    echo $_POST['note']."\n";
    echo $_POST['pchoix']."\n";
    echo $_POST['dchoix']."\n";
    echo $_POST['tchoix']."\n";
    echo $_POST['qchoix']."\n";
    echo $_POST['picCandidat']."\n";
    echo $_POST['picBac']."\n";
    echo $_POST['picRecu']."\n";

    if(trim($_POST['lname'])=="") $errMsg[]="Vous n'avez pas saisit votre nom";
    if(trim($_POST['fname'])=="") $errMsg[]="Vous n'avez pas saisit votre prénom";
    if($_POST['pwd']=="") $errMsg[]="Vous n'avez pas saisit votre mot de passe";
    if(trim($_POST['email'])=="") $errMsg[]="Vous n'avez pas saisit votre email";
    else{
        $patern='/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
        if(!preg_match($patern,$_POST['email'])) $errMsg[]="Votre email est invalid";
    }
    if($_POST['birthday']=="") $errMsg[]="Vous n'avez pas saisit votre date de naissance";
    else{
        $date=explode('/',$_POST['birthday']);
        $_POST['birthday']=$date[2].'-'.$date[1].'-'.$date[0];
    }
    if($_POST['cine']=="") $errMsg[]="Vous n'avez pas saisit votre CNIE";
    else{
        $patern='/^[A-Za-z]?[A-Za-z][0-9]{6}[0-9]*$/';
        if(!preg_match($patern,$_POST['cine'])) $errMsg[]="Votre email est invalid";
    }
    if($_POST['adresse']=="") $errMsg[]="Vous n'avez pas saisit votre adresse";
    if($_POST['ville']=="") $errMsg[]="Vous n'avez pas saisit votre ville";
    if($_POST['codeMassar']=="") $errMsg[]="Vous n'avez pas saisit votre codeMassar";
    else{
        $patern='/^[A-Za-z][0-9]{9}$/';
        if(!preg_match($patern,$_POST['codeMassar'])) $errMsg[]="Votre code Massar est invalid";
    }
    if(!isset($_SESSION['typeBac']))  $errMsg[]="Vous n'avez pas précisé le type de votre bac";
    else if($_SESSION['typeBac']!='economique' && $_SESSION['typeBac']!='technique' && $_SESSION['typeBac']!='scientifique') $errMsg[]="Le type de votre bac est invalid";
    if($_POST['note']==""|| is_float($_POST['note'])) $errMsg[]="Vous n'avez pas saisit votre note";
    $result=mysqli_query($connexion,"SELECT filiereID FROM filiere");
    $filieres=[];
    while($row = mysqli_fetch_assoc($result)) $filieres[] = $row['filiereID'];
    if(!in_array($_POST['pchoix'], $filieres) || !in_array($_POST['dchoix'], $filieres) || !in_array($_POST['tchoix'], $filieres) || !in_array($_POST['qchoix'], $filieres)) $errMsg[]="Choix des filières invalide";
    if(!empty($errMSG)){
        $_SESSION['errMSG']=$errMsg;
        //header("location:../pages/candidatureFinal.php");
        print_r($errMSG);
    }else{
        include('../data/sqlFunctions.php');
        $candidatID=insertCandidature($_SESSION['typeBac'],$_POST['note'],$_POST['bacyear'],$_POST['pwd']);
        insertEtudiant($_POST['codeMassar'],$_POST['cine'],$_POST['lname'],$_POST['fname'],$_POST['sexe'],$_POST['ville'],$_POST['adresse'],$_POST['email'],$candidatID);
        insertChoix($_POST['pchoix'],$candidatID,1);
        insertChoix($_POST['dchoix'],$candidatID,2);
        insertChoix($_POST['tchoix'],$candidatID,3);
        insertChoix($_POST['qchoix'],$candidatID,4);
        $file=explode('.',$_POST['picCandidat']);
        insertDocument("image",$file[1],"to be determinated...",$candidatID);
        $file=explode('.',$_POST['picBac']);
        insertDocument("bac",$file[1],"to be determinated...",$candidatID);
        $file=explode('.',$_POST['picRecu']);
        insertDocument("recu",$file[1],"to be determinated...",$candidatID);
        //header("location:../pages/candidatureFinal.php");
    }
}
?>