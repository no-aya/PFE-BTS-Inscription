<?php
include("../../data/sqlFunctions.php");
$result=getLastAcceuil();
?>
<?php 
include("espaceEtudiantHeader.php");
?>
    <div class="img-slider">
        <?php 
        $i=0;
        while($row=mysqli_fetch_assoc($result)) {?>
        <div class="slide <?=($i==0)?"active":""?>">
          <img src="<?=$row['image']?>" alt="">
          <div class="info">
            <h2><?=$row['titre']?></h2>
            <p><?=$row['contenu']?></p>
          </div>
        </div>
        <?php $i++;} ?>
        <div class="navigation">
          <div class="btn active"></div>
          <div class="btn"></div>
        </div>
      </div>
  
      <script src="../../js/carousel.js"></script>
      <script>
        var x=document.getElementsByClassName("menu-element")[0];
        x.classList.add("selected-menu");
      </script>
</body>
</html>