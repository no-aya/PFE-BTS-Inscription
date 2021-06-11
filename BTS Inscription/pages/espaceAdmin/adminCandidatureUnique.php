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
      $id=$_GET['id'];
      $row=getCandidat($id);
      $choix=getChoix($id);
      $document=getDocuments($id);
      ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Candidature n° <?=$row['candidatureID']?></h4>
                        <div class="d-flex py-4">
                            <div class="preview-list w-100">
                                <div class="preview-item p-0">
                                    <div class="preview-thumbnail">
                                        <img src="<?=getPhoto($id)?>" class="rounded-circle" alt="">
                                    </div>
                                    <div class="preview-item-content d-flex flex-grow">
                                <div class="flex-grow">
                                <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                    <h6 class="preview-subject"><?=$row['nom']?> <?=$row['prenom']?></h6>
                                    <p class="text-muted text-small"><?=$row['ville']?></p>
                                </div>
                                <div class="d-flex d-lg-block d-xl-flex justify-content-between">
                                    <h6 class="preview-subject"><?=$row['codeMassar']?></h6>
                                    <p class="text-muted text-small"><?=$row['adresse']?></p>
                                </div>
                                </div>
                            </div>
                            
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>  </th>
                                <th> Moyenne </th>
                                <th> Choix 1 </th>
                                <th> Choix 2 </th>
                                <th> Choix 3 </th>
                                <th> Choix 4 </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Bac <?=$row['typeBac']?> </td>
                                <td><?=$row['moyenneBac']?></td>
                                <?php while ($listChoix=mysqli_fetch_assoc($choix)){?>
                                <td><?=$listChoix['filiereID']?></td>
                                <?php } ?>
                            </tr>
                            </tbody>
                        </table>
                        <h4 class="card-title">Documents</h4>
                        <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel" id="owl-carousel-basic">
                            <?php while($listDocuments=mysqli_fetch_assoc($document)){ ?>  
                            <div class="item">
                                <img src="<?=$listDocuments['lien']?>" alt="">
                            </div>
                            <?php } ?>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-md-3">
                                <a href="appCandidat.php?id=<?=$id?><?=(isset($_GET['assist']))?"&assist=1":""?>"><div class="badge badge-success">Approuver</div></a>
                                <a href="rejCandidat.php?id=<?=$id?><?=(isset($_GET['assist']))?"&assist=1":""?>""><div class="badge badge-outline-danger">Rejeter</div></a>
                            </div>
                        </div>
                    </div>
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