<?php 
function getLastAcceuil(){
    $sql="SELECT * FROM article WHERE categorie=1";
    include ('connexion.php');
    return mysqli_query($connexion,$sql);
}
function insertCandidature($typeBac, $moyenneBac, $anneeObtention, $motDePasse){
    $motDePasse=md5($motDePasse);
    $sql="INSERT INTO candidature VALUES(NULL,CURDATE(),'$typeBac', '$moyenneBac', '$anneeObtention', '$motDePasse',NULL)";
    include ('connexion.php');
    mysqli_query($connexion,$sql);
    $result=mysqli_query($connexion,"SELECT MAX(`candidatureID`) FROM candidature");
    $row=mysqli_fetch_assoc($result);
    return $row['MAX(`candidatureID`)'];
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
function loginAdmin($email,$mdp,$remember){
    include ('connexion.php');
        $sql = "Select * from administration where email = '" . $email . "'";
            if(!isset($_COOKIE["admin_login"])) {
                $sql .= " AND motDePasse = '" . md5($mdp) . "'";
        }
        $result = mysqli_query($connexion,$sql);
        $user = mysqli_fetch_array($result);
        if($user) {
                $_SESSION["adminID"] = $user["adminID"];
                if(!empty($remember)) {
                    setcookie ("admin_login",$email,time()+ (10 * 365 * 24 * 60 * 60));
                    setcookie("admin_pass",$mdp,time()+ (10 * 365 * 24 * 60 * 60));
                }
                return $user['role'];
        } else {
            return -1;
        }
}
function getUserData(){
    include ('connexion.php');
        $sql="SELECT * FROM administration NATURAL JOIN role WHERE adminID=".$_SESSION["adminID"];
        $result=mysqli_query($connexion,$sql);
        $user=mysqli_fetch_assoc($result);
        return $user;
}
function countCandidats(){
    include ('connexion.php');
        $sql="SELECT count(candidatureID) FROM candidature";
        $result=mysqli_query($connexion,$sql);
        return mysqli_fetch_row($result)[0];
}
function countAdmin(){
    include ('connexion.php');
        $sql="SELECT count(adminID) FROM administration";
        $result=mysqli_query($connexion,$sql);
        return mysqli_fetch_row($result)[0];
}
function countArticles(){
    include ('connexion.php');
        $sql="SELECT count(articleID) FROM article";
        $result=mysqli_query($connexion,$sql);
        return mysqli_fetch_row($result)[0];
}
function countDays($dateID){
    include ('connexion.php');
        $sql="SELECT DATEDIFF((SELECT date FROM dateimportante WHERE dateID=".$dateID."),CURDATE());";
        $result=mysqli_query($connexion,$sql);
        return mysqli_fetch_row($result)[0];
}
function getUsers(){
    include ('connexion.php');
    $sql="SELECT * FROM administration NATURAL JOIN role";
    return mysqli_query($connexion,$sql);
}
function getRoles(){
    include ('connexion.php');
    $sql="SELECT * FROM role";
    return mysqli_query($connexion,$sql);
}
function checkNewEmail($email){
    include ('connexion.php');
    $sql="SELECT adminID FROM administration WHERE email='".$email."'";
    $result=mysqli_query($connexion,$sql);
    if(mysqli_num_rows($result)==0) return true;
    else return false;
}
function addUser($nom,$email,$mdp,$role){
    include ('connexion.php');
    $mdp=md5($mdp);
    $sql="INSERT INTO administration VALUES(NULL,'$nom','$email','$mdp',$role)";
    mysqli_query($connexion,$sql);
}
function getUser($id){
    include ('connexion.php');
    $sql="SELECT * FROM administration NATURAL JOIN role WHERE adminID=".$id;
    $result=mysqli_query($connexion,$sql);
    return mysqli_fetch_assoc($result);
}
function updateUser($sql){
    include ('connexion.php');
    mysqli_query($connexion,$sql);
}
function deleteUser($id){
    include ('connexion.php');
    $sql = "DELETE FROM `administration` WHERE `administration`.`adminID` =".$id;
    mysqli_query($connexion,$sql);
}
function addArticle($titre,$contenu,$categorie,$adminID){
    include ('connexion.php');
    $sql="INSERT INTO article VALUES(NULL,CURDATE(),'".$titre."','".$contenu."',NULL,".$categorie.",".$adminID.")";
    mysqli_query($connexion,$sql);
}
function getArticles(){
    include ('connexion.php');
    $sql="SELECT * FROM article NATURAL JOIN administration ORDER BY date DESC LIMIT 3";
    return mysqli_query($connexion,$sql);
}
function deleteArticle($id){
    include ('connexion.php');
    $sql = "DELETE FROM `article` WHERE `articleID` =".$id;
    mysqli_query($connexion,$sql);;
}
function lastCandidatures(){
    include ('connexion.php');
    $sql="SELECT * FROM candidature NATURAL JOIN etudiant ORDER BY date DESC LIMIT 5";
    return mysqli_query($connexion,$sql);
}
function countCandidatsRetenus(){
    include ('connexion.php');
        $sql="SELECT count(candidatureID) FROM candidature WHERE `situationCandidature`=1";
        $result=mysqli_query($connexion,$sql);
        return mysqli_fetch_row($result)[0];
}
function getListeCandidatures(){
    include ('connexion.php');
    $sql="SELECT *
    FROM candidature NATURAL JOIN etudiant";
    return mysqli_query($connexion,$sql);
}
function getCandidat($idCandidature){
    include ('connexion.php');
    $sql="SELECT * FROM candidature NATURAL JOIN etudiant WHERE candidatureID =".$idCandidature;
    $result=mysqli_query($connexion,$sql);
    return mysqli_fetch_assoc($result);
}
function getChoix($id){
    include ('connexion.php');
    $sql="SELECT * FROM choix WHERE candidatureID =".$id;
    $result=mysqli_query($connexion,$sql);
    return $result;
}
function getDocuments($id){
    include ('connexion.php');
    $sql = "SELECT * FROM document WHERE candidatureID =$id AND label != 'photo'";
    $result=mysqli_query($connexion,$sql);
    return $result;
}
function getPhoto($id){
    include ('connexion.php');
    $sql = "SELECT * FROM document WHERE candidatureID =$id AND label = 'photo'";
    $result=mysqli_query($connexion,$sql);
    return mysqli_fetch_assoc($result)['lien'];
}
function approuverCandidat($id){
    include ('connexion.php');
    $sql="UPDATE candidature SET situationCandidature=1 WHERE candidatureID=$id";
    mysqli_query($connexion,$sql);
}
function rejeterCandidat($id){
    include ('connexion.php');
    $sql="UPDATE candidature SET situationCandidature=0 WHERE candidatureID=$id";
    mysqli_query($connexion,$sql);
}
function getCandidatId(){
    include ('connexion.php');
    $sql = "SELECT candidatureId FROM candidature WHERE situationCandidature IS NULL LIMIT 1";
    $result=mysqli_query($connexion,$sql);
    if(mysqli_num_rows($result)==0) return false;
    return mysqli_fetch_assoc($result)['candidatureId'];
}
?>
