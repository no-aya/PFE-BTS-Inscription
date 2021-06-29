<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if(!isset($_SESSION["adminID"])){
  header("location:adminlogin.php");
}
include_once ("../../data/sqlFunctions.php");
checkUser(1);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <?php include("../../components/adminheader.html") ?>
  <title>Asistant de gestion des candidatures</title>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <?php include("../../components/adminnav.php");
      $id=getCandidatId();
      $assist=1;
      ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial -->
        <?php include("../../components/adminnavsmall.php") ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                      <h4 class="card-title mb-1">Assistant de vérification</h4>
                    <?php if($id!=false) {?>
                      <p>Vous allez être dirigé vers toutes les candidatures en attentes afin de les vérifier une par une.</p> 
                      <p>Voulez-vous continuer?</p>
                        <div class="row">
                            <div class="col-md-3">
                                <a href="adminCandidatureUnique.php?id=<?=$id?>&assist=1"><div class="badge badge-success">Continuer</div></a>
                                <a href="adminAcceuil.php"><div class="badge badge-outline-danger">Annuler</div></a>
                            </div>
                        </div>
                    <?php }else{ ?>
                        <p>Plus aucune candidature à vérifier!</p>
                    <?php } ?>
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