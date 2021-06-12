<?php 
include("espaceEtudiantHeader.php");
?>
    <div class="content-box">
       <div class="contact-title">
          <h1>Contactez l'Administration</h1>
            <div class="contact-Form">
                <form id="contact-form" method="POST" action="">
                    <input name="Email" type="email" class="form-control" placeholder="Votre code Massar" required><br>
                    <input name="name" type="text" class="form-control" placeholder="Votre nom complet" required><br>
                    <input name="class" type="text" class="form-control" placeholder="Votre classe" required><br>
                    <textarea name="message" class="form-control" placeholder="Message" raws="4" required></textarea><br>
                    <input type="submit" class="azure-button" style="width: 100%;" value="Envoyer">
                </form>
            </div>
      </div>
    </div>   
</body>
<script>
        var x=document.getElementsByClassName("menu-element")[3];
        x.classList.add("selected-menu");
        </script>
</html>
