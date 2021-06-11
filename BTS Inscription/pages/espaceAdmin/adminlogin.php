<?php
session_start();
include ("../../data/sqlFunctions.php");
$message="";
if(isset($_POST['submit'])){
  switch (loginAdmin($_POST['email'],$_POST['mdp'],$_POST["remember"])) {
    case -1:
      $message="Coordonnées Invalides!";
      break;
    
    default:
      header("location:adminAcceuil.php");
      break;
    } 
}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administration</title>
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../images/BTS Logo white.svg"/>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-center mb-3">Administration</h3>
                <h4 class="card-title text-center mb-3"><?php echo $message?></h4>
                <form method="post">
                  <div class="form-group">
                    <label>Email *</label>
                    <input type="email" name="email" class="form-control p_input" value="<?php if(isset($_COOKIE['admin_login'])) { echo $_COOKIE['admin_login']; } ?>">
                  </div>
                  <div class="form-group">
                    <label>Mot de passe *</label>
                    <input type="password" name="mdp" class="form-control p_input" value="<?php if(isset($_COOKIE['admin_pass'])) { echo $_COOKIE['admin_pass']; } ?>">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> > Remember me </label>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" for="" name="submit" class="btn btn-primary btn-block enter-btn">Se connecter</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/js/misc.js"></script>

  </body>
</html>