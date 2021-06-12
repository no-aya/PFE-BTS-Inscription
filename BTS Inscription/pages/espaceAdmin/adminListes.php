<?php 
session_start();
include("../../data/sqlFunctions.php");
$filiereID=$_GET['id'];
$result=getListe($filiereID);
$i=0;
?>
<!DOCTYPE html>
<html lang="fr">
 <?php include("../../components/adminheader.html");?>
  <body>
    <div class="container-scroller">
      <!-- partial -->
      <?php include("../../components/adminnav.php");?>
      <div class="container-fluid page-body-wrapper">
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste des retenus en <?=$filiereID?></h4>
                    <h4>Principale</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Code Massar </th>
                            <th> Nom complet </th>
                            <th> Bac </th>
                            <th> Moyenne </th>
                            <th> N° inscription (Confirmer l'inscription) </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $bacMain=23;
                          $bacAutres=7;
                          while($bacMain>0 && isset($result['75'][$i])){ 
                              $row=getCandidat($result['75'][$i]); ?>
                          <tr>
                            <td><?=$row['codeMassar']?></td>
                            <td><?=$row['nom']?> <?=$row['prenom']?></td>
                            <td>Bac <?=$row['typeBac']?> </td>
                            <td><?=$row['moyenneBac']?></td>
                            <td><?=($row['numInscription']==NULL)? "<a href=\"confirmerInscription.php?id={$row['codeMassar']}&filiereID=$filiereID\"><div class=\"badge badge-success\">Confirmer l'inscription</div></a>": $row['numInscription'] ?></td>
                          </tr>
                          <?php $bacMain--; $i++;} ?>

                          <?php 
                          while($bacAutres>0 && isset($result['25'][$i])){ 
                              $row=getCandidat($result['75'][$i]); 
                              print_r($row);?>
                          <tr>
                            <td><?=$row['codeMassar']?></td>
                            <td><?=$row['nom']?> <?=$row['prenom']?></td>
                            <td>Bac <?=$row['typeBac']?> </td>
                            <td><?=$row['moyenneBac']?></td>
                            <td><?=($row['numInscription']==NULL)? "<a href=\"confirmerInscription.php?id={$row['codeMassar']}&filiere=$filiereID\"><div class=\"badge badge-success\">Confirmer l'inscription</div></a>": $row['numInscription'] ?></td>
                          </tr>
                          <?php $bacAutres--; $i++;} ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4>Liste d'attente 1</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Code Massar </th>
                            <th> Nom complet </th>
                            <th> Bac </th>
                            <th> Moyenne </th>
                            <th> N° inscription (Confirmer l'inscription) </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $bacMain=23;
                          $bacAutres=7;
                          while($bacMain>0 && isset($result['75'][$i])){ 
                              $row=getCandidat($result['75'][$i]); ?>
                          <tr>
                            <td><?=$row['codeMassar']?></td>
                            <td><?=$row['nom']?> <?=$row['prenom']?></td>
                            <td>Bac <?=$row['typeBac']?> </td>
                            <td><?=$row['moyenneBac']?></td>
                            <td><?=($row['numInscription']==NULL)? "<a href=\"#\"><div class=\"badge badge-success\">Confirmer l'inscription</div></a>": $row['numInscription'] ?></td>
                          </tr>
                          <?php $bacMain--; $i++;} ?>

                          <?php 
                          while($bacAutres>0 && isset($result['25'][$i])){ 
                              $row=getCandidat($result['75'][$i]); 
                              print_r($row);?>
                          <tr>
                            <td><?=$row['codeMassar']?></td>
                            <td><?=$row['nom']?> <?=$row['prenom']?></td>
                            <td>Bac <?=$row['typeBac']?> </td>
                            <td><?=$row['moyenneBac']?></td>
                            <td><?=($row['numInscription']==NULL)? "<a href=\"#\"><div class=\"badge badge-success\">Confirmer l'inscription</div></a>": $row['numInscription'] ?></td>
                          </tr>
                          <?php $bacAutres--; $i++;} ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4>Liste d'attente 2</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Code Massar </th>
                            <th> Nom complet </th>
                            <th> Bac </th>
                            <th> Moyenne </th>
                            <th> N° inscription (Confirmer l'inscription) </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $bacMain=23;
                          $bacAutres=7;
                          while($bacMain>0 && isset($result['75'][$i])){ 
                              $row=getCandidat($result['75'][$i]); ?>
                          <tr>
                            <td><?=$row['codeMassar']?></td>
                            <td><?=$row['nom']?> <?=$row['prenom']?></td>
                            <td>Bac <?=$row['typeBac']?> </td>
                            <td><?=$row['moyenneBac']?></td>
                            <td><?=($row['numInscription']==NULL)? "<a href=\"#\"><div class=\"badge badge-success\">Confirmer l'inscription</div></a>": $row['numInscription'] ?></td>
                          </tr>
                          <?php $bacMain--; $i++;} ?>

                          <?php 
                          while($bacAutres>0 && isset($result['25'][$i])){ 
                              $row=getCandidat($result['75'][$i]); 
                              print_r($row);?>
                          <tr>
                            <td><?=$row['codeMassar']?></td>
                            <td><?=$row['nom']?> <?=$row['prenom']?></td>
                            <td>Bac <?=$row['typeBac']?> </td>
                            <td><?=$row['moyenneBac']?></td>
                            <td><?=($row['numInscription']==NULL)? "<a href=\"#\"><div class=\"badge badge-success\">Confirmer l'inscription</div></a>": $row['numInscription'] ?></td>
                          </tr>
                          <?php $bacAutres--; $i++;} ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4>Liste d'attente 3</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Code Massar </th>
                            <th> Nom complet </th>
                            <th> Bac </th>
                            <th> Moyenne </th>
                            <th> N° inscription (Confirmer l'inscription) </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $bacMain=23;
                          $bacAutres=7;
                          while($bacMain>0 && isset($result['75'][$i])){ 
                              $row=getCandidat($result['75'][$i]); ?>
                          <tr>
                            <td><?=$row['codeMassar']?></td>
                            <td><?=$row['nom']?> <?=$row['prenom']?></td>
                            <td>Bac <?=$row['typeBac']?> </td>
                            <td><?=$row['moyenneBac']?></td>
                            <td><?=($row['numInscription']==NULL)? "<a href=\"#\"><div class=\"badge badge-success\">Confirmer l'inscription</div></a>": $row['numInscription'] ?></td>
                          </tr>
                          <?php $bacMain--; $i++;} ?>

                          <?php 
                          while($bacAutres>0 && isset($result['25'][$i])){ 
                              $row=getCandidat($result['75'][$i]); 
                              print_r($row);?>
                          <tr>
                            <td><?=$row['codeMassar']?></td>
                            <td><?=$row['nom']?> <?=$row['prenom']?></td>
                            <td>Bac <?=$row['typeBac']?> </td>
                            <td><?=$row['moyenneBac']?></td>
                            <td><?=($row['numInscription']==NULL)? "<a href=\"#\"><div class=\"badge badge-success\">Confirmer l'inscription</div></a>": $row['numInscription'] ?></td>
                          </tr>
                          <?php $bacAutres--; $i++;} ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4>Liste d'attente 4</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Code Massar </th>
                            <th> Nom complet </th>
                            <th> Bac </th>
                            <th> Moyenne </th>
                            <th> N° inscription (Confirmer l'inscription) </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $bacMain=23;
                          $bacAutres=7;
                          while($bacMain>0 && isset($result['75'][$i])){ 
                              $row=getCandidat($result['75'][$i]); ?>
                          <tr>
                            <td><?=$row['codeMassar']?></td>
                            <td><?=$row['nom']?> <?=$row['prenom']?></td>
                            <td>Bac <?=$row['typeBac']?> </td>
                            <td><?=$row['moyenneBac']?></td>
                            <td><?=($row['numInscription']==NULL)? "<a href=\"#\"><div class=\"badge badge-success\">Confirmer l'inscription</div></a>": $row['numInscription'] ?></td>
                          </tr>
                          <?php $bacMain--; $i++;} ?>

                          <?php 
                          while($bacAutres>0 && isset($result['25'][$i])){ 
                              $row=getCandidat($result['75'][$i]); 
                              print_r($row);?>
                          <tr>
                            <td><?=$row['codeMassar']?></td>
                            <td><?=$row['nom']?> <?=$row['prenom']?></td>
                            <td>Bac <?=$row['typeBac']?> </td>
                            <td><?=$row['moyenneBac']?></td>
                            <td><?=($row['numInscription']==NULL)? "<a href=\"#\"><div class=\"badge badge-success\">Confirmer l'inscription</div></a>": $row['numInscription'] ?></td>
                          </tr>
                          <?php $bacAutres--; $i++;} ?>
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