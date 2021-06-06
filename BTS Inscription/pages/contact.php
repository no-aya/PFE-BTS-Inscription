<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        require_once("../components/pageStart.html");
    ?>
    <title>Contact</title>
</head>
<body>
    <div class="main-container">
        <?php 
            require_once("../components/header.html");
        ?>
    </div>
    <div class="main-content main-content-3">
        <div class="page-title" style="margin-bottom: 0.5em;">Contactez-nous</div>
        <div class="coordinates-box">
            <iframe class="map-box" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13589.87540608463!2d-8.0536789!3d31.6210109!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc724f60008c4e517!2sLyc%C3%A9e%20Mohamed%20VI!5e0!3m2!1sen!2sma!4v1607688398427!5m2!1sen!2sma" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            <div>
                <table>
                    <tr>
                        <th>Adresse :</th> <td>Centre des BTS - Lycée Mohammed VI, Avenue Mohammadia, Azli - Marrakech 40150</td>
                    </tr>
                    <tr>
                        <th>Horaire :</th> <td>Lundi - Jeudi : 8h30 - 12h30 | 2h30 - 6h30<br/>Vendredi - Samedi : 8h30 - 12h30<br/>*Sauf jours fériés ou vacances scolaires. </td>
                    </tr>
                    <tr>
                        <th>Télephone :</th> <td>0651-869827</td>
                    </tr>
                    <tr>
                        <th>Email :</th> <td>btsm6@contact</td>
                    </tr>
                    
                </table>
            </div>
        </div>
        <?php include("../components/credits.html")?>
    </div>
</body>
<script>
    var x=document.getElementsByClassName("menu-element")[3];
    x.classList.add("active-page");
    x.href = "javascript:void(0)";
</script>
</html>