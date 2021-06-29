<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
ob_start();
include_once ("../../data/sqlFunctions.php");
checkUser(0);
  $admin=getUser($_GET['id']);
  $roles=getRoles();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <?php include("../../components/adminheader.html") ?>
  <title>Modifier un utilisateur</title>
  </head>
  <body>
    <div class="container-scroller">
      <?php include("../../components/adminnav.php") ?>
      <div class="container-fluid page-body-wrapper">
      <?php include("../../components/adminnavsmall.php") ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Modifier l'utilisateur n° <?=$admin['adminID']?></h4>
                    <form class="forms-sample" method="POST">
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nom Complet</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Nom complet" name="nom" value="<?=$admin['nomComplet']?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email" name="email" value="<?=$admin['email']?>">
                        </div>
                      </div>
                      <div class="form-group row">
                      <?php if($admin['roleID']!=0){?>
                        <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Rôle</label>
                        <div class="col-sm-9">
                          <select class="form-control" name="role" id="exampleFormControlSelect">
                            <?php while($row=mysqli_fetch_assoc($roles)){ ?>
                            <option value="<?=$row['roleID']?>"<?php if($row['roleID']==$admin['roleID']) echo "selected" ?>> <?=$row['Label']?></option>
                            <?php }?>
                          </select>
                          
                        </div>
                        <?php }else{ $_POST['role']=0; }?>
                      </div>
                      
                      <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Mot de passe</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="exampleInputPassword2" name ="mdp" placeholder="Entrez un nouveau mot de passe">
                        </div>
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary mr-3">Enregister</button>
                    </form>
                    <a href="adminUtilisateurs.php"><button class="btn mr-3 badge-outline-danger" style="margin-top: 2em;">Annuler</button></a>
                    <?php 
                    if(isset($_POST["submit"])){
                        $sql="UPDATE administration SET ";
                        if($_POST['nom']!=$admin['nomComplet']){
                          $sql.="nomComplet='".$_POST['nom']."' ";
                        }
                        if($_POST['email']!=$admin['email']){
                          if (substr($sql, -1) != 'SET ') {
                            $sql.=",";
                          }
                          $sql.="email='".$_POST['email']."'";
                        }
                        if(!empty($_POST['mdp'])){
                          if (substr($sql, -4) != 'SET ') {
                            $sql.=",";
                          }
                          $sql.="motDePasse='".md5($_POST['mdp'])."'";
                        }
                        if (substr($sql, -4) != 'SET ') {
                          $sql.=",";
                        }
                        $sql.=" roleID=".$_POST['role'];
                        $sql.=" WHERE adminID=".$admin['adminID'];
                        updateUser($sql);
                        header("Location:adminUtilisateurs.php");
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <?php include("../../components/credits.html")?>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php include("../../components/adminjs.html");?>
  </body>
</html>