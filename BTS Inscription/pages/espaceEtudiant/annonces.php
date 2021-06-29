<?php
include("../../data/sqlFunctions.php");
$result=getLastAnonces();
$abs=getAbsence();
include("espaceEtudiantHeader.php");
?>
    <div class="content-box content-box-two" >
        <div class="news-card">
            <div class="glide-contain multiple">
                <button class="glider-prev" style="left: 15px;">
                    <i class="fa fa-chevron-left"></i>
                </button>
                <div class="glider">
                <?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <figure>
                        <p class="news-title"><?=$row['titre']?></p>
                        <p class="news-date"><?=$row['date']?></p>
                        <p class="news-text"><?=$row['contenu']?></p>
                    </figure>
                <?php } ?>
                </div>

                <button class="glider-next" style="top:42%;right: 15px;">
                    <i class="fa fa-chevron-right"></i>
                </button>
                <div id="dots" class="glider-dots"></div>
            </div>
        </div>
        <div class="absentee-card">
            <p class="news-title">Professeurs en autorisation d’absence</p>
            <p class="news-date">Dernière mise à jour : 29-06-2021</p>
            <table>
                <tr><th>Professeur</th><th>Matière</th><th>Date départ</th><th>Date retour</th></tr>
                <?php while ($row=mysqli_fetch_assoc($abs)) {?>
                <tr><td><?=$row["nomProf"]?></td><td><?=$row["matiere"]?></td><td><?=$row["dateDep"]?></td><td><?=$row["dateRet"]?></td></tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script>
        new Glider(document.querySelector('.glider'), {
            slidesToShow: 1,
            dots: '#dots',
            draggable: false,
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
        });
    </script>
        <script>
        var x=document.getElementsByClassName("menu-element")[1];
        x.classList.add("selected-menu");
        </script>
</body>
</html>