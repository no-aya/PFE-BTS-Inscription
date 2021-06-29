<?php 
session_start();
include_once ("../../data/sqlFunctions.php");
$user=getUserData();
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="adminAcceuil.php"><img src="../../images/BTS Logo white.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="adminAcceuil.php"><img src="../../images/BTS Logo white.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?=$user["nomComplet"]?></h5>
                  <span><?=$user["Label"]?></span>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="adminAcceuil.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Acceuil</span>
            </a>
          </li>
          <?php if($user['roleID']<2){ ?>
          <li class="nav-item menu-items">
            <a class="nav-link" href="adminCandidatures.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Candidatures</span>
            </a>
          </li>
          <?php } ?>
          <li class="nav-item menu-items">
            <a class="nav-link" href="adminArticles.php">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Articles</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="adminEmailing.php">
              <span class="menu-icon">
                <i class="mdi mdi-email"></i>
              </span>
              <span class="menu-title">Emails</span>
            </a>
          </li>
          <?php if($user['roleID']==0){?>
          <li class="nav-item menu-items">
            <a class="nav-link" href="adminUtilisateurs.php">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">Utilisateurs</span>
            </a>
          </li>
          <?php }?>
          <li class="nav-item menu-items">
            <a class="nav-link" href="logout.php">
              <span class="menu-icon">
                <i class="mdi mdi-close-circle-outline"></i>
              </span>
              <span class="menu-title">Se déconnecter</span>
            </a>
          </li>
        </ul>
      </nav>

