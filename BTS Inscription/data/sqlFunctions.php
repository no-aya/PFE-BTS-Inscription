<?php 
function insertCandidature($typeBac, $moyenneBac, $anneeObtention, $motDePasse){
    $motDePasse=md5($motDePasse);
    $sql="INSERT INTO candidature VALUES(NULL,CURDATE(),'$typeBac', '$moyenneBac', '$anneeObtention', '$motDePasse',NULL)";
    include ('connexion.php');
    mysqli_query($connexion,$sql);
    $result=mysqli_query($connexion,"SELECT last_insert_id()");
    $row=mysqli_fetch_assoc($result);
    return $row['last_insert_id()'];
}
function insertEtudiant($codeMassar,$cine,$nom,$prenom,$sexe,$ville,$adresse,$email,$candidatureID){
    if($sexe=="garçon") $sexe=0;
    elseif ($sexe=="fille") $sexe=1;
    $sql="INSERT INTO etudiant VALUES ('$codeMassar', '$cine', '$nom', '$prenom', $sexe, '$ville', '$adresse', '$email', NULL, '$candidatureID');";
    include ('connexion.php');
    mysqli_query($connexion,$sql);
}
function insertChoix($filiereID,$candidatureID,$priorite){
    $sql="INSERT INTO choix VALUES ('$filiereID', '$candidatureID', $priorite, NULL)";
    include ('connexion.php');
    mysqli_query($connexion,$sql);
}
function insertDocument($label,$type,$lien,$candidatureID){
    $sql="INSERT INTO document VALUES (NULL, '$label', '$type', '$lien','$candidatureID')";
    include ('connexion.php');
    mysqli_query($connexion,$sql);
}
function login($codeMassar,$mdp){
    include ('connexion.php');
    $mdp=md5($mdp);
    $sql="SELECT codeMassar, motDePasse FROM candidature NATURAL JOIN etudiant WHERE codeMassar='$codeMassar' AND motDePasse='$mdp'";
    $result=mysqli_query($connexion,$sql);
    if (mysqli_num_rows($result)==0){
        return false;
    }else{
        return true;
    }
}
?>