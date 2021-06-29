<?php
require("site_config.php");
function checkUser($role)
{
    switch ($role) {
        case '0':
            if ($_SESSION["roleID"]!=0){
                header("location:adminAcceuil.php");
            }
            break;
        
        case '1':
            if ($_SESSION["roleID"]!=0 && $_SESSION["roleID"]!=1){
                header("location:adminAcceuil.php");
            }
            break;
    }
    
}
function getLastAcceuil()
{
    $sql = "SELECT * FROM article WHERE categorie=1";
    include('connexion.php');
    return mysqli_query($connexion, $sql);
}
function getLastAnonces()
{
    $sql = "SELECT * FROM article WHERE categorie=2";
    include('connexion.php');
    return mysqli_query($connexion, $sql);
}
function insertCandidature($typeBac, $moyenneBac, $anneeObtention)
{
    $sql = "INSERT INTO candidature VALUES(NULL,CURDATE(),'$typeBac', '$moyenneBac', '$anneeObtention', NULL)";
    include('connexion.php');
    mysqli_query($connexion, $sql);
    $result = mysqli_query($connexion, "SELECT MAX(`candidatureID`) FROM candidature");
    $row = mysqli_fetch_assoc($result);
    return $row['MAX(`candidatureID`)'];
}
function insertEtudiant($codeMassar, $cine, $nom, $prenom, $sexe, $ville, $adresse, $email, $candidatureID)
{
    if ($sexe == "garçon") $sexe = 0;
    elseif ($sexe == "fille") $sexe = 1;
    $sql = "INSERT INTO etudiant VALUES ('$codeMassar', '$cine', '$nom', '$prenom', $sexe, '$ville', '$adresse', '$email', NULL,NULL, '$candidatureID');";
    include('connexion.php');
    mysqli_query($connexion, $sql);
}
function insertChoix($filiereID, $candidatureID, $priorite)
{
    $sql = "INSERT INTO choix VALUES ('$filiereID', '$candidatureID', $priorite, NULL)";
    include('connexion.php');
    mysqli_query($connexion, $sql);
}
function insertDocument($label, $file, $candidatureID)
{
    $target_dir = "../../uploads/";
    $array = explode('.', $file['name']);
    $setName = "$candidatureID-$label." . end($array);
    $target_file = $target_dir . basename($setName);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($file["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $errMSG[] = "Format du fichier non supporté.";
        $uploadOk = 0;
    }


    // Check if file already exists
    if (file_exists($target_file)) {
        $errMSG[] = "Désolé, fichier existant.";
        $uploadOk = 0;
    }

    // Check file size
    /* if ($file["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }*/

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "pdf"
    ) {
        $errMSG[] = "Uniquement les formats PNG, JPG, JPEG et PDF.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $errMSG[] = "Votre fichier n'a pas pu être transféré!";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            $sql = "INSERT INTO document VALUES (NULL, '$label', '$imageFileType', '$target_file', '$candidatureID')";
            include('connexion.php');
            mysqli_query($connexion, $sql);
        } else {
            $errMSG[] = "Une erreur est survenue lors du transfert de votre fichier.";
        }
    }
    if (isset($errMSG)) {
        $_SESSION['errMSG'] = $errMSG;
    }
}
function login($codeMassar, $mdp)
{
    include('connexion.php');
    $mdp = md5($mdp);
    $sql = "SELECT codeMassar, motDePasse FROM candidature NATURAL JOIN etudiant WHERE codeMassar='$codeMassar' AND motDePasse='$mdp'";
    $result = mysqli_query($connexion, $sql);
    if (mysqli_num_rows($result) == 0) {
        return false;
    } else {
        return true;
    }
}
function loginAdmin($email, $mdp, $remember)
{
    include('connexion.php');
    $sql = "Select * from administration where email = '" . $email . "'";
    if (!isset($_COOKIE["admin_login"])) {
        $sql .= " AND motDePasse = '" . md5($mdp) . "'";
    }
    $result = mysqli_query($connexion, $sql);
    $user = mysqli_fetch_array($result);
    if ($user) {
        $_SESSION["adminID"] = $user["adminID"];
        if (!empty($remember)) {
            setcookie("admin_login", $email, time() + (10 * 365 * 24 * 60 * 60));
            setcookie("admin_pass", $mdp, time() + (10 * 365 * 24 * 60 * 60));
        }
        return $user['roleID'];
    } else {
        return -1;
    }
}
function getUserData()
{
    include('connexion.php');
    $sql = "SELECT * FROM administration NATURAL JOIN role WHERE adminID=" . $_SESSION["adminID"];
    $result = mysqli_query($connexion, $sql);
    $user = mysqli_fetch_assoc($result);
    return $user;
}
function countCandidats()
{
    include('connexion.php');
    $sql = "SELECT count(candidatureID) FROM candidature";
    $result = mysqli_query($connexion, $sql);
    return mysqli_fetch_row($result)[0];
}
function countAdmin()
{
    include('connexion.php');
    $sql = "SELECT count(adminID) FROM administration";
    $result = mysqli_query($connexion, $sql);
    return mysqli_fetch_row($result)[0];
}
function countArticles()
{
    include('connexion.php');
    $sql = "SELECT count(articleID) FROM article";
    $result = mysqli_query($connexion, $sql);
    return mysqli_fetch_row($result)[0];
}
function countDays($dateID)
{
    include('connexion.php');
    $sql = "SELECT DATEDIFF((SELECT date FROM dateimportante WHERE dateID=" . $dateID . "),CURDATE());";
    $result = mysqli_query($connexion, $sql);
    return mysqli_fetch_row($result)[0];
}
function getUsers()
{
    include('connexion.php');
    $sql = "SELECT * FROM administration NATURAL JOIN role";
    return mysqli_query($connexion, $sql);
}
function getRoles()
{
    include('connexion.php');
    $sql = "SELECT * FROM role";
    return mysqli_query($connexion, $sql);
}
function checkNewEmail($email)
{
    include('connexion.php');
    $sql = "SELECT adminID FROM administration WHERE email='" . $email . "'";
    $result = mysqli_query($connexion, $sql);
    if (mysqli_num_rows($result) == 0) return true;
    else return false;
}
function addUser($nom, $email, $mdp, $role)
{
    include('connexion.php');
    $mdp = md5($mdp);
    $sql = "INSERT INTO administration VALUES(NULL,'$nom','$email','$mdp',$role)";
    mysqli_query($connexion, $sql);
}
function getUser($id)
{
    include('connexion.php');
    $sql = "SELECT * FROM administration NATURAL JOIN role WHERE adminID=" . $id;
    $result = mysqli_query($connexion, $sql);
    return mysqli_fetch_assoc($result);
}
function updateUser($sql)
{
    include('connexion.php');
    mysqli_query($connexion, $sql);
}
function deleteUser($id)
{
    include('connexion.php');
    $sql = "DELETE FROM `administration` WHERE `administration`.`adminID` =" . $id;
    mysqli_query($connexion, $sql);
}
function addArticle($titre, $contenu, $categorie, $adminID)
{
    include('connexion.php');
    $sql = "INSERT INTO article VALUES(NULL,CURDATE(),'" . $titre . "','" . $contenu . "',NULL," . $categorie . "," . $adminID . ")";
    mysqli_query($connexion, $sql);
}
function getArticles()
{
    include('connexion.php');
    $sql = "SELECT * FROM article NATURAL JOIN administration ORDER BY date DESC LIMIT 3";
    return mysqli_query($connexion, $sql);
}
function deleteArticle($id)
{
    include('connexion.php');
    $sql = "DELETE FROM `article` WHERE `articleID` =" . $id;
    mysqli_query($connexion, $sql);;
}
function getEmails()
{
    include('connexion.php');
    $sql = "SELECT * FROM email ORDER BY dateEnvoi DESC LIMIT 3";
    return mysqli_query($connexion, $sql);
}

function lastCandidatures()
{
    include('connexion.php');
    $sql = "SELECT * FROM candidature NATURAL JOIN etudiant ORDER BY date DESC LIMIT 5";
    return mysqli_query($connexion, $sql);
}
function countCandidatsRetenus()
{
    include('connexion.php');
    $sql = "SELECT count(candidatureID) FROM candidature WHERE `situationCandidature`=1";
    $result = mysqli_query($connexion, $sql);
    return mysqli_fetch_row($result)[0];
}
function getListeCandidatures()
{
    include('connexion.php');
    $sql = "SELECT *
    FROM candidature NATURAL JOIN etudiant";
    return mysqli_query($connexion, $sql);
}
function getCandidat($idCandidature)
{
    include('connexion.php');
    $sql = "SELECT * FROM candidature NATURAL JOIN etudiant WHERE candidatureID =" . $idCandidature;
    $result = mysqli_query($connexion, $sql);
    return mysqli_fetch_assoc($result);
}
function getChoix($id)
{
    include('connexion.php');
    $sql = "SELECT * FROM choix WHERE candidatureID =" . $id;
    $result = mysqli_query($connexion, $sql);
    return $result;
}
function getDocuments($id)
{
    include('connexion.php');
    $sql = "SELECT * FROM document WHERE candidatureID =$id AND label != 'photo'";
    $result = mysqli_query($connexion, $sql);
    return $result;
}
function getPhoto($id)
{
    include('connexion.php');
    $sql = "SELECT * FROM document WHERE candidatureID =$id AND label = 'image'";
    $result = mysqli_query($connexion, $sql);
    return mysqli_fetch_assoc($result)['lien'];
}
function approuverCandidat($id)
{
    include('connexion.php');
    $sql = "UPDATE candidature SET situationCandidature=1 WHERE candidatureID=$id";
    mysqli_query($connexion, $sql);
}
function rejeterCandidat($id)
{
    include('connexion.php');
    $sql = "UPDATE candidature SET situationCandidature=0 WHERE candidatureID=$id";
    mysqli_query($connexion, $sql);
}
function getCandidatId()
{
    include('connexion.php');
    $sql = "SELECT candidatureId FROM candidature WHERE situationCandidature IS NULL LIMIT 1";
    $result = mysqli_query($connexion, $sql);
    if (mysqli_num_rows($result) == 0) return false;
    return mysqli_fetch_assoc($result)['candidatureId'];
}
function checkCodeMassar($codeMassar)
{
    include('connexion.php');
    $sql = "SELECT codeMassar FROM etudiant WHERE codeMassar='$codeMassar'";
    $result = mysqli_query($connexion, $sql);
    if (mysqli_num_rows($result) == 0) return false;
    else return true;
}
function getListe($filiereID)
{
    include('connexion.php');
    $liste = [];
    $sql = "SELECT DISTINCT candidatureID FROM candidature NATURAL JOIN choix WHERE filiereID='$filiereID' AND situationCandidature=1";
    if ($filiereID != 'CG') {
        $sql75 = "SELECT * FROM candidature WHERE `typeBac`='technique' AND candidatureID IN ($sql) ORDER BY `moyenneBac` DESC";
        $sql25 = "SELECT * FROM candidature WHERE `typeBac`!='technique' AND candidatureID IN ($sql) ORDER BY `moyenneBac` DESC";
    } else {
        $sql75 = "SELECT * FROM candidature WHERE `typeBac`='economique' AND candidatureID IN ($sql) ORDER BY `moyenneBac` DESC";
        $sql25 = "SELECT * FROM candidature WHERE `typeBac`!='technique' AND `typeBac`!='economique' AND candidatureID IN ($sql) ORDER BY `moyenneBac` DESC";
    }
    $result = mysqli_query($connexion, $sql75);
    while ($row = mysqli_fetch_assoc($result)) {
        $liste['75'][] = $row['candidatureID'];
    }
    $result = mysqli_query($connexion, $sql25);
    while ($row = mysqli_fetch_assoc($result)) {
        $liste['25'][] = $row['candidatureID'];
    }
    return $liste;
}
function isInscrit($candidatureID)
{
    include('connexion.php');
    $sql = "SELECT codeMassar FROM etudiant WHERE candidatureID=$candidatureID AND numInscription IS NOT NULL";
    $result = mysqli_query($connexion, $sql);
    if (mysqli_num_rows($result) == 0) return false;
    else return true;
}
function getFiliere()
{
    include('connexion.php');
    $sql = "SELECT * FROM filiere";
    return mysqli_query($connexion, $sql);
}
function confirmerInscription($codeMassar, $filiereID)
{
    include('connexion.php');
    $result = mysqli_query($connexion, "SELECT MAX(numInscription) FROM etudiant");
    $numInscription = mysqli_fetch_assoc($result)['MAX(numInscription)'];
    if ($numInscription == NULL) $numInscription = 0;
    $numInscription++;
    $sql = "UPDATE etudiant SET filiereID='$filiereID', numInscription=$numInscription WHERE codeMassar='$codeMassar'";
    echo $sql;
    mysqli_query($connexion, $sql);
}
function sendEmail($objet, $message, $audience)
{
    //liste des emails
    switch ($audience) {
        case '1':
            $sql = "SELECT email,visiteurID FROM visiteur";
            break;
        case '2':
            $sql = "SELECT email, codeMassar FROM etudiant where numInscription IS NULL";
            break;
        case '3':
            $sql = "SELECT email, codeMassar FROM etudiant NATURAL JOIN candidature WHERE situationCandidature=1";
            break;
        case '4':
            $sql = "SELECT email, codeMassar FROM etudiant where numInscription IS NOT NULL";
            break;
    }
    include('connexion.php');
    $result = mysqli_query($connexion, $sql);
    mysqli_query($connexion, "INSERT INTO email VALUES (NULL,curdate(),'$objet','$message')");
    $result2 = mysqli_query($connexion, "SELECT MAX(`emailID`) FROM email");
    $row = mysqli_fetch_assoc($result2);
    $id = $row['MAX(`emailID`)'];
    while ($row = mysqli_fetch_assoc($result)) {
        $to = $row['email'];
        $subject = $objet;
        $from = 'admin@m6.ma';

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Create email headers
        $headers =  'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: Aya <info@address.com>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Compose a simple HTML email message
        $message = '<html><body>';
        $message .= "<h1>$objet</h1>";
        $message .= "<p>$message</p>";
        $message .= '</body></html>';

        // Sending email
        if (mail($to, $subject, $message, $headers)) {
            if (isset($row['codeMassar'])) mysqli_query($connexion, "INSERT INTO emailing VALUES($id,NULL,{$row['codeMassar']})");
            if (isset($row['visiteurID'])) mysqli_query($connexion, "INSERT INTO emailing VALUES($id,{$row['visiteurID']},NULL)");

            echo 'Votre email a été envoyé.';
        }
    }
}
function addAbsence($nom,$matiere,$dateDepart,$dateRetour)
{
    $sql="INSERT INTO abscence VALUES(NULL,'$nom','$matiere','$dateDepart','$dateRetour')";
    include('connexion.php');
    mysqli_query($connexion,$sql);
}
function getAbsence(){
    $sql="SELECT * FROM abscence WHERE dateRet>CURRENT_DATE()";
    include('connexion.php');
    return mysqli_query($connexion,$sql);
}