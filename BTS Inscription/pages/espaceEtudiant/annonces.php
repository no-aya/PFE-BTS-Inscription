<?php 
include("espaceEtudiantHeader.php");
?>
    <div class="content-box content-box-two" >
        <div class="news-card">
            <div class="glide-contain multiple">
                <button class="glider-prev" style="left: 15px;">
                    <i class="fa fa-chevron-left"></i>
                </button>
                <div class="glider">
                    <figure>
                        <p class="news-title">Les classes BTS suspendus le 15/11/2020</p>
                        <p class="news-date">Jeudi 07 Janvier 2021</p>
                        <p class="news-text">La direction de l’établissement vous informe que les classes BTS seront suspendus <span class="news-text-imp">du 15/11/2020 au 20/11/2020</span> en raison des examens finals des classes de 2èmes années baccalauréat toutes les branches. </p>
                    </figure>
                    <figure>
                        <p class="news-title">Ouverture des inscriptions au club sportif du BTS</p>
                        <p class="news-date">Jeudi 07 Janvier 2021</p>
                        <p class="news-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus veritatis vel possimus nulla et tempore culpa voluptatem consequuntur quis! Tempora inventore, nostrum rem quae libero quisquam est sapiente animi quod!</p>
                    </figure>
                </div>

                <button class="glider-next" style="top:42%;right: 15px;">
                    <i class="fa fa-chevron-right"></i>
                </button>
                <div id="dots" class="glider-dots"></div>
            </div>
        </div>
        <div class="absentee-card">
            <p class="news-title">Professeurs en autorisation d’absence</p>
            <p class="news-date">Dernière mise à jour : Jeudi 07 Janvier 2021</p>
            <table>
                <tr><th>Professeur</th><th>Matière</th><th>Durée</th><th>Date</th></tr>
                <tr><td>Farah Ben</td><td></td><td></td><td></td></tr>
                <tr><td>Said Fadil</td><td></td><td></td><td></td></tr>
                <tr><td>Said Fadil</td><td></td><td></td><td></td></tr>
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