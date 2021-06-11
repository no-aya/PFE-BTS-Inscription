<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <?php include("../../components/adminheader.html");
  include_once ("../../data/sqlFunctions.php");
  $admin=getUser($_GET['id']);
  $roles=getRoles();
  ?>
  <title>Modifier Utilisateur</title>
  <body>
    <div class="container-scroller">
      <?php include("../../components/adminnav.php") ?>
      <div class="container-fluid page-body-wrapper">
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
                        <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Rôle</label>
                        <div class="col-sm-9">
                          <select class="form-control" id="exampleFormControlSelect" name="role" <?php if($admin['roleID']==0) echo "disabled" ?>>
                            <?php while($row=mysqli_fetch_assoc($roles)){ ?>
                            <option value="<?=$row['roleID']?>"<?php if($row['roleID']==$admin['roleID']) echo "selected" ?>> <?=$row['Label']?></option>
                            <?php }?>
                          </select>
                        </div>
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
                          $sql.="nomComplet='".$_POST['nom']."' ,";
                        }
                        if($_POST['email']!=$admin['email']){
                          $sql.="email='".$_POST['email']."' ,";
                        }
                        if(!empty($_POST['mdp'])){
                          $sql.="motDePasse='".md5($_POST['mdp'])."' ,";
                        }
                        $sql.="roleID=".$_POST['role'];
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
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>