<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if(!isset($_SESSION["adminID"])){
  header("location:adminlogin.php");
}
include("../../data/sqlFunctions.php");
checkUser(1);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <?php include("../../components/adminheader.html") ?>
  <title>Filières</title>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial -->
      <?php include("../../components/adminnav.php");?>
      <div class="container-fluid page-body-wrapper">
        <!-- partial -->
        <?php include("../../components/adminnavsmall.php") ?>
        <div class="main-panel">
          <div class="content-wrapper">
          <h4>Choisissez une filière à afficher</h4>
            <div class="row">
              <?php $result=getFiliere();
              while ($row=mysqli_fetch_assoc($result)) {?>
              <div class="col-sm-5 grid-margin">
                <a href="adminListes.php?id=<?=$row['filiereID']?>">
                <div class="card">
                  <div class="card-body">
                    <h5><?=$row['label']?></h5>
                  </div>
                </div>
                </a>
              </div>
              <?php } ?>
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