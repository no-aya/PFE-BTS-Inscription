<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
 <?php include("../../components/adminheader.html");
 include("../../data/sqlFunctions.php");
 ?>
  <body>
    <div class="container-scroller">
      <!-- partial -->
      <?php include("../../components/adminnav.php");?>
      <div class="container-fluid page-body-wrapper">
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <h4>Choisissez une filière à afficher</h4>
            <div class="row">
              <?php $result=getFiliere();
              while ($row=mysqli_fetch_assoc($result)) {?>
              <div class="col-sm-4 grid-margin">
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
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>