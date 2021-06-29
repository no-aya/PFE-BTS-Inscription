<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
ob_start();
include_once ("../../data/sqlFunctions.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <?php include("../../components/adminheader.html") ?>
  <title>Emails</title>
  </head>
  <body>
    <div class="container-scroller">
      <?php include("../../components/adminnav.php") ?>
      <div class="container-fluid page-body-wrapper">
      <?php include("../../components/adminnavsmall.php") ?>
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Derniers Emails</h4>
                    <?php   $result=getEmails(); ?>
                    <?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1"><?=$row['objet']?></h6>
                        <p class="text-muted mb-0">Envoyé le <?=$row['dateEnvoi']?> <br> <?=$row['date']?></p>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Communiquer un email</h4>
                    <form class="forms-sample" method="POST">
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Objet</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Citer l'objet de votre email" name="objet">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Message</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" placeholder="Votre message ici" name="message" rows="6"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Envoyer aux </label>
                        <div class="col-sm-9">
                          <select class="form-control" id="exampleFormControlSelect" name="audience">
                            <option value="1">Visiteurs</option>
                            <option value="2">Candidats</option>
                            <option value="3">Candidats retenus</option>
                            <option value="4">Inscrits uniquements</option>
                          </select>
                        </div>
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary mr-3">Envoyer</button>
                    </form>
                    <div style="color:red"><?=$errMSG?></div>
                    <?php 
                    if(isset($_POST["submit"])){ 
                      if(empty($_POST['objet'])||empty($_POST['message'])||empty($_POST['audience'])){
                        $errMSG="Remplissez les champs!</div>";
                        unset($errMSG);
                      } 
                      else{
                          sendEmail($_POST['objet'],$_POST['message'],$_POST['audience']);
                          echo "<div style=\"color:green\">Envoyé!</div>";
                          header("Refresh: 0");
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