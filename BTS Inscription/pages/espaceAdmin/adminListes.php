<?php 
session_start();
include("../../data/sqlFunctions.php");
$filiereID=$_GET['id'];
$result=getListe($filiereID);
$i=0;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <?php include("../../components/adminheader.html") ?>
  <title>Les listes finales</title>
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
    <?php include("../../components/adminjs.html");?>
  </body>
</html>