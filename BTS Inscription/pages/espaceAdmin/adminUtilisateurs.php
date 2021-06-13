<?php
session_start();
ob_start();
include_once ("../../data/sqlFunctions.php");
  $result=getUsers();
  $roles=getRoles();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <?php include("../../components/adminheader.html") ?>
  <title>Utilisateurs</title>
  </head>
  <body>
    <div class="container-scroller">
      <?php include("../../components/adminnav.php") ?>
      <div class="container-fluid page-body-wrapper">
      <?php include("../../components/adminnavsmall.php") ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste des utilisateurs</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Nom Complet</th>
                            <th> Email </th>
                            <th> Rôle </th>
                            <th> Options </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php while($row=mysqli_fetch_assoc($result)){?>
                          <tr>
                            <td>
                              <span class="pl-2"><?=$row['nomComplet']?></span>
                            </td>
                            <td> <?=$row['email']?></td>
                            <td> <?=$row['Label']?> </td>
                            <td>
                              <a href="modUser.php?id=<?=$row['adminID']?>"><div class="badge badge-outline-warning">Modifier</div></a>
                            </td>
                            <?php if($row['roleID']!=0){?>
                            <td>
                            <a href="suppUser.php?id=<?=$row['adminID']?>"><div class="badge badge-outline-danger">Supprimer</div></a>
                            </td>
                            <?php } ?>
                          </tr>
                        <?php } ?>
                        
                        
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Ajouter un utilisateur</h4>
                    <form class="forms-sample" method="POST">
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nom Complet</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Nom complet" name="nom">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email" name="email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Rôle</label>
                        <div class="col-sm-9">
                          <select class="form-control" id="exampleFormControlSelect" name="role">
                            <?php while($row=mysqli_fetch_assoc($roles)){ ?>
                            <option value="<?=$row['roleID']?>"><?=$row['Label']?></option>
                            <?php }?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Mot de passe</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="exampleInputPassword2" name ="mdp" placeholder="Password">
                        </div>
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary mr-3">Ajouter</button>
                    </form>
                    <?php 
                    if(isset($_POST["submit"])){ 
                      if(empty($_POST['nom'])||empty($_POST['email'])||empty($_POST['mdp'])||empty($_POST['role'])) echo "<div style=\"color:red\">Remplissez les champs!</div>";
                      else{
                        if(checkNewEmail($_POST['email'])){
                          addUser($_POST['nom'],$_POST['email'],$_POST['mdp'],$_POST['role']);
                          echo "<div style=\"color:green\">Ajouté!</div>";
                          header("Refresh: 0");
                        }else{
                          echo "<div style=\"color:red\">Email existant!</div>";
                        }
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