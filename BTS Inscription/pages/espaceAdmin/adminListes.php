<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if(!isset($_SESSION["adminID"])){
  header("location:adminlogin.php");
}
include("../../data/sqlFunctions.php");
checkUser(1);
if($countDays>=0) header("location:adminAcceuil.php");
$filiereID = $_GET['id'];
$result = getListe($filiereID);
$i = 0;
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
    <?php include("../../components/adminnav.php"); ?>
    <div class="container-fluid page-body-wrapper">
      <!-- partial -->
      <?php include("../../components/adminnavsmall.php") ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row ">
            <div class="col-12 grid-margin">
              <h4 class="card-title">Liste des retenus en <?= $filiereID ?></h4>
              <form method="POST" id="convert_form1" action="spreadsheet/export.php">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-8">
                        <h4>Principale</h4>
                      </div>
                      <div class="col-4">
                        <div class="badge badge-success" style="width: 100%;" id="convertTable1" onclick="convert(1)">Exporter</div>
                      </div>
                    </div>
                    <div class="table-responsive">

                      <table class="table" id="table_content1">
                        <thead>
                          <tr>
                            <th> Code Massar </th>
                            <th> CINE </th>
                            <th> Nom</th>
                            <th> Prénom</th>
                            <th> Bac </th>
                            <th> Moyenne </th>
                            <th> N° inscription (Confirmer l'inscription) </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $bacMain = $BACMAIN;
                          $bacAutres = $BACAUTRES;
                          while ($bacMain > 0 && isset($result['75'][$i])) {
                            $row = getCandidat($result['75'][$i]); ?>
                            <tr>
                              <td><?= $row['codeMassar'] ?></td>
                              <td><?= $row['cine'] ?></td>
                              <td><?= $row['nom'] ?></td>
                              <td><?= $row['prenom'] ?></td>
                              <td>Bac <?= $row['typeBac'] ?> </td>
                              <td><?= $row['moyenneBac'] ?></td>
                              <td><?= ($row['numInscription'] == NULL) ? "<a href=\"confirmerInscription.php?id={$row['codeMassar']}&filiereID=$filiereID\"><div class=\"badge badge-success\">Confirmer l'inscription</div></a>" : $row['numInscription'] ?></td>
                            </tr>
                          <?php $bacMain--;
                            $i++;
                          } ?>

                          <?php
                          while ($bacAutres > 0 && isset($result['25'][$i])) {
                            $row = getCandidat($result['75'][$i]);
                            print_r($row); ?>
                            <tr>
                              <td><?= $row['codeMassar'] ?></td>
                              <td><?= $row['cine'] ?></td>
                              <td><?= $row['nom'] ?></td>
                              <td><?= $row['prenom'] ?></td>
                              <td>Bac <?= $row['typeBac'] ?> </td>
                              <td><?= $row['moyenneBac'] ?></td>
                              <td><?= ($row['numInscription'] == NULL) ? "<a href=\"confirmerInscription.php?id={$row['codeMassar']}&filiereID=$filiereID\"><div class=\"badge badge-success\">Confirmer l'inscription</div></a>" : $row['numInscription'] ?></td>
                            </tr>
                          <?php $bacAutres--;
                            $i++;
                          } ?>
                        </tbody>
                      </table>
                      <input type="hidden" name="titre" id="titre1" value="Liste principale">
                      <input type="hidden" name="file_content" id="file_content1" ?>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="row ">
            <div class="col-12 grid-margin">
              <form method="POST" id="convert_form2" action="spreadsheet/export.php">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-8">
                        <h4>Liste d'attente 1</h4>
                      </div>
                      <div class="col-4">
                        <div class="badge badge-success" style="width: 100%;" id="convertTable1" onclick="convert(2)">Exporter</div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table" id="table_content2">
                      <thead>
                          <tr>
                            <th> Code Massar </th>
                            <th> CINE </th>
                            <th> Nom</th>
                            <th> Prénom</th>
                            <th> Bac </th>
                            <th> Moyenne </th>
                            <th> N° inscription (Confirmer l'inscription) </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $bacMain = $BACMAIN;
                          $bacAutres = $BACAUTRES;
                          while ($bacMain > 0 && isset($result['75'][$i])) {
                            $row = getCandidat($result['75'][$i]); ?>
                            <tr>
                              <td><?= $row['codeMassar'] ?></td>
                              <td><?= $row['cine'] ?></td>
                              <td><?= $row['nom'] ?></td>
                              <td><?= $row['prenom'] ?></td>
                              <td>Bac <?= $row['typeBac'] ?> </td>
                              <td><?= $row['moyenneBac'] ?></td>
                              <td><?= ($row['numInscription'] == NULL) ? "<a href=\"confirmerInscription.php?id={$row['codeMassar']}&filiereID=$filiereID\"><div class=\"badge badge-success\">Confirmer l'inscription</div></a>" : $row['numInscription'] ?></td>
                            </tr>
                          <?php $bacMain--;
                            $i++;
                          } ?>

                          <?php
                          while ($bacAutres > 0 && isset($result['25'][$i])) {
                            $row = getCandidat($result['75'][$i]); ?>
                            <tr>
                              <td><?= $row['codeMassar'] ?></td>
                              <td><?= $row['cine'] ?></td>
                              <td><?= $row['nom'] ?></td>
                              <td><?= $row['prenom'] ?></td>
                              <td>Bac <?= $row['typeBac'] ?> </td>
                              <td><?= $row['moyenneBac'] ?></td>
                              <td><?= ($row['numInscription'] == NULL) ? "<a href=\"confirmerInscription.php?id={$row['codeMassar']}&filiereID=$filiereID\"><div class=\"badge badge-success\">Confirmer l'inscription</div></a>" : $row['numInscription'] ?></td>
                            </tr>
                          <?php $bacAutres--;
                            $i++;
                          } ?>
                        </tbody>
                      </table>
                      <input type="hidden" name="titre" id="titre2" value="Liste d'attente 1">
                      <input type="hidden" name="file_content" id="file_content2">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="row ">
            <div class="col-12 grid-margin">
              <form method="POST" id="convert_form3" action="spreadsheet/export.php">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-8">
                        <h4>Liste d'attente 2</h4>
                      </div>
                      <div class="col-4">
                        <div class="badge badge-success" style="width: 100%;" id="convertTable1" onclick="convert(3)">Exporter</div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table" id="table_content3">
                      <thead>
                          <tr>
                            <th> Code Massar </th>
                            <th> CINE </th>
                            <th> Nom</th>
                            <th> Prénom</th>
                            <th> Bac </th>
                            <th> Moyenne </th>
                            <th> N° inscription (Confirmer l'inscription) </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $bacMain = $BACMAIN;
                          $bacAutres = $BACAUTRES;
                          while ($bacMain > 0 && isset($result['75'][$i])) {
                            $row = getCandidat($result['75'][$i]); ?>
                            <tr>
                              <td><?= $row['codeMassar'] ?></td>
                              <td><?= $row['cine'] ?></td>
                              <td><?= $row['nom'] ?></td>
                              <td><?= $row['prenom'] ?></td>
                              <td>Bac <?= $row['typeBac'] ?> </td>
                              <td><?= $row['moyenneBac'] ?></td>
                              <td><?= ($row['numInscription'] == NULL) ? "<a href=\"confirmerInscription.php?id={$row['codeMassar']}&filiereID=$filiereID\"><div class=\"badge badge-success\">Confirmer l'inscription</div></a>" : $row['numInscription'] ?></td>
                            </tr>
                          <?php $bacMain--;
                            $i++;
                          } ?>

                          <?php
                          while ($bacAutres > 0 && isset($result['25'][$i])) {
                            $row = getCandidat($result['75'][$i]);
                            print_r($row); ?>
                            <tr>
                              <td><?= $row['codeMassar'] ?></td>
                              <td><?= $row['cine'] ?></td>
                              <td><?= $row['nom'] ?></td>
                              <td><?= $row['prenom'] ?></td>
                              <td>Bac <?= $row['typeBac'] ?> </td>
                              <td><?= $row['moyenneBac'] ?></td>
                              <td><?= ($row['numInscription'] == NULL) ? "<a href=\"confirmerInscription.php?id={$row['codeMassar']}&filiereID=$filiereID\"><div class=\"badge badge-success\">Confirmer l'inscription</div></a>" : $row['numInscription'] ?></td>
                            </tr>
                          <?php $bacAutres--;
                            $i++;
                          } ?>
                        </tbody>
                      </table>
                      <input type="hidden" name="titre" id="titre3" value="Liste d'attente 2">
                      <input type="hidden" name="file_content" id="file_content3">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="row ">
            <div class="col-12 grid-margin">
              <form method="POST" id="convert_form4" action="spreadsheet/export.php">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-8">
                        <h4>Liste d'attente 3</h4>
                      </div>
                      <div class="col-4">
                        <div class="badge badge-success" style="width: 100%;" id="convertTable1" onclick="convert(4)">Exporter</div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table" id="table_content4">
                      <thead>
                          <tr>
                            <th> Code Massar </th>
                            <th> CINE </th>
                            <th> Nom</th>
                            <th> Prénom</th>
                            <th> Bac </th>
                            <th> Moyenne </th>
                            <th> N° inscription (Confirmer l'inscription) </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $bacMain = $BACMAIN;
                          $bacAutres = $BACAUTRES;
                          while ($bacMain > 0 && isset($result['75'][$i])) {
                            $row = getCandidat($result['75'][$i]); ?>
                            <tr>
                              <td><?= $row['codeMassar'] ?></td>
                              <td><?= $row['cine'] ?></td>
                              <td><?= $row['nom'] ?></td>
                              <td><?= $row['prenom'] ?></td>
                              <td>Bac <?= $row['typeBac'] ?> </td>
                              <td><?= $row['moyenneBac'] ?></td>
                              <td><?= ($row['numInscription'] == NULL) ? "<a href=\"confirmerInscription.php?id={$row['codeMassar']}&filiereID=$filiereID\"><div class=\"badge badge-success\">Confirmer l'inscription</div></a>" : $row['numInscription'] ?></td>
                            </tr>
                          <?php $bacMain--;
                            $i++;
                          } ?>

                          <?php
                          while ($bacAutres > 0 && isset($result['25'][$i])) {
                            $row = getCandidat($result['75'][$i]); ?>
                            <tr>
                              <td><?= $row['codeMassar'] ?></td>
                              <td><?= $row['cine'] ?></td>
                              <td><?= $row['nom'] ?></td>
                              <td><?= $row['prenom'] ?></td>
                              <td>Bac <?= $row['typeBac'] ?> </td>
                              <td><?= $row['moyenneBac'] ?></td>
                              <td><?= ($row['numInscription'] == NULL) ? "<a href=\"confirmerInscription.php?id={$row['codeMassar']}&filiereID=$filiereID\"><div class=\"badge badge-success\">Confirmer l'inscription</div></a>" : $row['numInscription'] ?></td>
                            </tr>
                          <?php $bacAutres--;
                            $i++;
                          } ?>
                        </tbody>
                      </table>
                      <input type="hidden" name="titre" id="titre4" value="Liste d'attente 3">
                      <input type="hidden" name="file_content" id="file_content4">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="row ">
            <div class="col-12 grid-margin">
              <form method="POST" id="convert_form5" action="spreadsheet/export.php">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-8">
                        <h4>Liste d'attente 4</h4>
                      </div>
                      <div class="col-4">
                        <div class="badge badge-success" style="width: 100%;" id="convertTable1" onclick="convert(5)">Exporter</div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table" id="table_content5">
                      <thead>
                          <tr>
                            <th> Code Massar </th>
                            <th> CINE </th>
                            <th> Nom</th>
                            <th> Prénom</th>
                            <th> Bac </th>
                            <th> Moyenne </th>
                            <th> N° inscription (Confirmer l'inscription) </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $bacMain = $BACMAIN;
                          $bacAutres = 7;
                          while ($bacMain > 0 && isset($result['75'][$i])) {
                            $row = getCandidat($result['75'][$i]); ?>
                            <tr>
                              <td><?= $row['codeMassar'] ?></td>
                              <td><?= $row['cine'] ?></td>
                              <td><?= $row['nom'] ?></td>
                              <td><?= $row['prenom'] ?></td>
                              <td>Bac <?= $row['typeBac'] ?> </td>
                              <td><?= $row['moyenneBac'] ?></td>
                              <td><?= ($row['numInscription'] == NULL) ? "<a href=\"confirmerInscription.php?id={$row['codeMassar']}&filiereID=$filiereID\"><div class=\"badge badge-success\">Confirmer l'inscription</div></a>" : $row['numInscription'] ?></td>
                            </tr>
                          <?php $bacMain--;
                            $i++;
                          } ?>

                          <?php
                          while ($bacAutres > 0 && isset($result['25'][$i])) {
                            $row = getCandidat($result['75'][$i]);?>
                            <tr>
                              <td><?= $row['codeMassar'] ?></td>
                              <td><?= $row['cine'] ?></td>
                              <td><?= $row['nom'] ?></td>
                              <td><?= $row['prenom'] ?></td>
                              <td>Bac <?= $row['typeBac'] ?> </td>
                              <td><?= $row['moyenneBac'] ?></td>
                              <td><?= ($row['numInscription'] == NULL) ? "<a href=\"confirmerInscription.php?id={$row['codeMassar']}&filiereID=$filiereID\"><div class=\"badge badge-success\">Confirmer l'inscription</div></a>" : $row['numInscription'] ?></td>
                            </tr>
                          <?php $bacAutres--;
                            $i++;
                          } ?>
                        </tbody>
                      </table>
                      <input type="hidden" name="titre" id="titre5" value="Liste d'attente 4">
                      <input type="hidden" name="file_content" id="file_content5">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <?php include("../../components/credits.html") ?>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <?php include("../../components/adminjs.html"); ?>

  <script>
    /*$(document).ready(function() {
      $('#convertTable').click(function() {
        var table_content = '<table>';
        table_content += $('#table_content').html();
        table_content += '</table>';
        $('#file_content').val(table_content);
        $('#convert_form').submit();
      });
    });*/

    function convert(id) {
      var table_content = '<table>';
      table_content += $('#table_content' + id).html();
      table_content += '</table>';
      $('#file_content' + id).val(table_content);
      $('#convert_form' + id).submit();
    }
  </script>
</body>

</html>