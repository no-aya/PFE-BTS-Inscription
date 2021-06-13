<?php
session_start();
ob_start();
include_once ("../../data/sqlFunctions.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <?php include("../../components/adminheader.html") ?>
  <title>Articles</title>
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
                    <h4 class="card-title">Derniers Articles</h4>
                    <?php   $result=getArticles(); ?>
                    <?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1"><?=$row['titre']?></h6>
                        <p class="text-muted mb-0">Par <?=$row['nomComplet']?> <br> <?=$row['date']?></p>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                      <a href="suppArticle.php?id=<?=$row['articleID']?>"><div class="badge badge-outline-danger"><i class="mdi mdi-close"></i></div></a>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Ajouter un article</h4>
                    <form class="forms-sample" method="POST">
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Titre</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Titre de votre article" name="titre">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Contenu</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" placeholder="Expliquez en bref" name="contenu" rows="6"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                          <input type="file" id="img" name="img" accept="image/*">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Où le poster?</label>
                        <div class="col-sm-9">
                          <select class="form-control" id="exampleFormControlSelect" name="categorie">
                            <option value="1">Acceuil</option>
                            <option value="2">Annonces</option>
                          </select>
                        </div>
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary mr-3">Poster</button>
                    </form>
                    <?php 
                    if(isset($_POST["submit"])){ 
                      if(empty($_POST['titre'])||empty($_POST['contenu'])||empty($_POST['categorie'])) echo "<div style=\"color:red\">Remplissez les champs!</div>";
                      else{
                          addArticle($_POST['titre'],$_POST['contenu'],$_POST['categorie'],$_SESSION['adminID']);
                          echo "<div style=\"color:green\">Ajouté!</div>";
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