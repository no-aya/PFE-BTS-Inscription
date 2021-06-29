<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if(!isset($_SESSION["adminID"])){
    header("location:adminlogin.php");
}
ob_start();
include_once ("../../data/sqlFunctions.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <?php include("../../components/adminheader.html") ?>
  <title>Abscence</title>
  </head>
  <body>
    <div class="container-scroller">
      <?php include("../../components/adminnav.php") ?>
      <div class="container-fluid page-body-wrapper">
      <?php include("../../components/adminnavsmall.php") ?>
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Ajouter un professeur et sa période d'abscence</h4>
                    <form class="forms-sample" method="POST">
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nom complet</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Nom du professeur" name="nom">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Matière</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Matière enseignée" name="matiere">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">De :</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" id="exampleInputUsername2" name="dateDepart">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">à :</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" id="exampleInputUsername2" name="dateRetour">
                        </div>
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary mr-3">Confirmer</button>
                    </form>
                    <?php 
                    if(isset($_POST["submit"])){ 
                      if(empty($_POST['nom'])||empty($_POST['matiere'])||empty($_POST['dateDepart'])||empty($_POST['dateRetour'])) echo "<div style=\"color:red\">Remplissez les champs!</div>";
                      else{
                          addAbsence($_POST['nom'],$_POST['matiere'],$_POST['dateDepart'],$_POST['dateRetour']);
                          echo "<div style=\"color:green\">Ajouté!</div>";
                      }
                    }
                    ?>
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