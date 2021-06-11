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
       $countDays=countDays(1);
      ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Candidatures retenues</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?=countCandidatsRetenus()?></h2>
                        </div>
                        <h6 class="text-muted font-weight-normal">en attente de classement</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-file-check text-primary ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Procéder à la vérification</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                      <?php if($countDays>=0) {?>
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                        <a href="adminAssistant.php"><div class="badge badge-danger">Accéder à l'assistant</div></a>
                        </div>
                        <?php }else{ ?>
                          <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <div class="badge badge-outline-danger">Terminé</div>
                          </div>
                        <?php } ?>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-account-card-details text-danger ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Afficher le classement</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <?php if($countDays>=0) {?>
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?=$countDays?></h2>
                        </div>
                        <h6 class="text-muted font-weight-normal">Jours restants</h6>
                        <?php }else{ ?>
                          <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <a href="#"><div class="badge badge-success">Voir les listes</div></a>
                          </div>
                        <?php } ?>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-format-list-bulleted text-success ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste des candidatures</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th></th>
                            <th> Code Massar </th>
                            <th> Nom complet </th>
                            <th> Bac </th>
                            <th> Moyenne </th>
                            <th> Ville </th>
                            <th> État </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $result=getListeCandidatures();
                          while($row=mysqli_fetch_assoc($result)){ ?>
                          <tr>
                          <td>
                              <a href="adminCandidatureUnique.php?id=<?=$row['candidatureID']?>"><i class="mdi mdi-eye"></i></a>
                            </td>
                            <td><?=$row['codeMassar']?></td>
                            <td><?=$row['nom']?> <?=$row['prenom']?></td>
                            <td>Bac <?=$row['typeBac']?> </td>
                            <td><?=$row['moyenneBac']?></td>
                            <td><?=$row['ville']?></td>
                            <td>
                              <?php
                              switch ($row['situationCandidature']) {
                                case NULL:
                                  echo "<div class=\"badge badge-warning\">En attente</div>";
                                  break;
                                case 0 :
                                  echo "<div class=\"badge badge-danger\">Rejeté</div>";
                                  break;
                                case 1 :
                                  echo "<div class=\"badge badge-success\">Approuvé</div>";
                                  break;
                              }?>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
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