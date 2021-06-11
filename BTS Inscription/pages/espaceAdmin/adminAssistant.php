<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
 <?php include("../../components/adminheader.html");?>
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
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
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