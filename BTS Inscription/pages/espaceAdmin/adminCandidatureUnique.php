<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include_once ("../../data/sqlFunctions.php");
checkUser(1);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <?php include("../../components/adminheader.html") ?>
  <title>Candidat</title>
  </head>
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
        <?php include("../../components/adminnavsmall.php") ?>
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
                        <?php if ($countDays >= 0) { ?>
                        <div class="row justify-content-end">
                            <div class="col-md-3">
                                <a href="appCandidat.php?id=<?=$id?><?=(isset($_GET['assist']))?"&assist=1":""?>"><div class="badge badge-success">Approuver</div></a>
                                <a href="rejCandidat.php?id=<?=$id?><?=(isset($_GET['assist']))?"&assist=1":""?>""><div class="badge badge-outline-danger">Rejeter</div></a>
                            </div>
                        </div>
                        <?php } ?>
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
    <?php include("../../components/adminjs.html");?>
  </body>
</html>