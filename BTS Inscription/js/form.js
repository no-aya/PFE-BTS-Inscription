$(document).ready(function(){

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    
    setProgressBar(current);

    $(".next").click(function(){
        if(!checkInputs(current)) return false;
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        
        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;
        
        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        next_fs.css({'opacity': opacity});
        },
        duration: 500
        });
        
        setProgressBar(++current);
    });
    
    $(".previous").click(function(){
    
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    
    //Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    
    //show the previous fieldset
    previous_fs.show();
    
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;
    
    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    previous_fs.css({'opacity': opacity});
    },
    duration: 500
    });
    setProgressBar(--current);
    });
    
    function setProgressBar(curStep){
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar")
    .css("width",percent+"%")
    }
    
    $(".submit").click(function(){
    return false;
    })
    
    });

// Form Validation
    const form = document.getElementById('msform');
    const lname = document.getElementsByName('lname')[0];
    const fname = document.getElementsByName('fname')[0];
    const pwd = document.getElementsByName('pwd')[0];
    const email = document.getElementsByName('email')[0];
    const birthday = document.getElementsByName('birthday')[0];
    const cine = document.getElementsByName('cine')[0];
    const adresse = document.getElementsByName('adresse')[0];
    const ville = document.getElementById('ville').value;
    const bacYear=document.getElementsByName('bacyear')[0];
    const bacNote=document.getElementsByName('note')[0];
    const bacMention=document.getElementById('bacmention')[0];
    const imgScan=document.getElementsByClassName('files')[0];
    const bacScan=document.getElementsByClassName('files')[1];
    const recuScan=document.getElementsByClassName('files')[2];

    function quatriemeChoix(){
        if(document.getElementById('bactype').selectedIndex==7 || document.getElementById('bactype').selectedIndex==8) {
            document.getElementsByClassName('quatrieme-choix')[0].classList.add('unvalid-choix');
            document.getElementsByClassName('quatrieme-choix')[1].classList.add('unvalid-choix');
        }else{
            document.getElementsByClassName('quatrieme-choix')[0].classList.remove('unvalid-choix');
            document.getElementsByClassName('quatrieme-choix')[1].classList.remove('unvalid-choix');
        }
    }
    function setErrorFor(input, index, message) {
        input.className = 'error';
        document.getElementsByClassName('fas')[index].classList.add('error');
        document.getElementsByClassName('error-message')[index].innerHTML=message;
    }
    function setSuccessFor(input, index) {
        input.classList.remove('error');
        document.getElementsByClassName('fas')[index].classList.remove('error');
        document.getElementsByClassName('error-message')[index].innerHTML='';
    }
    function checkInputs(current) {
        let errorsCount=0;
        switch (current){
            case 1:
                if(lname.value.trim() === '' ) {
                    setErrorFor(lname, 0, "Obligatoire ");
                    errorsCount++;
                }else{
                    setSuccessFor(lname, 0);
                }
                if(fname.value.trim() === '' ) {
                    setErrorFor(fname, 1, "Obligatoire ");
                    errorsCount++;
                }else{
                    setSuccessFor(fname, 1);
                }
                if(!isPassword(pwd.value)){
                    setErrorFor(pwd, 2,"Mot de passe doit avoir au moins 8 caractères!");
                    errorsCount++;
                }else{
                    setSuccessFor(pwd, 2);
                }
                if(!isEmail(email.value.trim())) {
                    setErrorFor(email, 3, "Entrez un email valid ");
                    errorsCount++;
                }else{
                    setSuccessFor(email, 3);
                }
                if(!isDate(birthday.value.trim())) {
                    setErrorFor(birthday, 4,"Entrez une date valide ");
                    errorsCount++;
                }else{
                    setSuccessFor(birthday, 4);
                }
                if(!isCINE(cine.value.trim())) {
                    setErrorFor(cine, 5, "Numéro de CINE invalid ");
                    errorsCount++;
                }else{
                    setSuccessFor(cine, 5);
                }
                if(adresse.value.trim() === '' ) {
                    setErrorFor(adresse, 6, "Obligatoire ");
                    errorsCount++;
                }else{
                    setSuccessFor(adresse, 6);
                }
                if(errorsCount!=0) return false;
                return true;
    
            case 2 :
                if(!isValidYear(bacYear.value.trim())) {
                    setErrorFor(bacYear, 8, "Année d'obtention invalide ");
                    errorsCount++;
                }else{
                    setSuccessFor(bacYear, 8);
                }
                if(!isValidNote(bacNote.value.trim(),document.getElementById('bacmention').value)) {
                    setErrorFor(bacNote, 9, "Note invalide ou ne correspond pas à votre mention");
                    setErrorFor(bacMention, 10, "La mention ne correspond pas à votre note ");
                    errorsCount++;
                }else{
                    setSuccessFor(bacNote, 9);
                    setSuccessFor(bacMention, 10);
                }
                if(!isValidFile(imgScan.value)){
                    setErrorFor(imgScan, 11, "Fichiers de type .img .png ou .pdf uniquement ");
                    errorsCount++;
                }else{
                    setSuccessFor(imgScan, 11);
                }
                if(!isValidFile(bacScan.value)){
                    setErrorFor(bacScan, 12,  "Fichiers de type .img .png ou .pdf uniquement ");
                    errorsCount++;
                }else{
                    setSuccessFor(bacScan, 12);
                }
                if(!isValidFile(recuScan.value)){
                    setErrorFor(recuScan, 13,  "Fichiers de type .img .png ou .pdf uniquement ");
                    errorsCount++;
                }else{
                    setSuccessFor(recuScan, 13);
                }
                if(errorsCount!=0) return false;
                return true;
            default:
                return true;
        }   
    }

    function isPassword(pwd){
        return pwd !== undefined && pwd !== null && pwd.length>8 ;
    }
    function isCINE(cine){
        return /^[A-Za-z]?[A-Za-z][0-9]{6}$/.test(cine);
    }
    function isDate(date){
        return /^(0?[1-9]|[12][0-9]|3[01])[\/](0?[1-9]|1[012])[\/]\d{4}$/.test(date);
    }
    function isEmail(email) {
        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
    }
    function isValidYear(year){
        return /^20[0-9]{2}$/.test(year);
    }
    function isValidNote(note,mention){
        if(/^([0-1][0-9].[0-9]{2})|(20.00)$/.test(note)){
            if(parseFloat(note)<10){
                if(mention.localeCompare("ad")==0) return true;
            }else if(parseFloat(note)<12){
                if(mention.localeCompare("pas")==0) return true;
            }else if(parseFloat(note)<14){
                if(mention.localeCompare("ab")==0) return true;
            }else if(parseFloat(note)<16){
                if(mention.localeCompare("bi")==0) return true;
            }else{
                if(mention.localeCompare("tb")==0) return true;
            }
        }else{
            return false;
        }
    }
    function isValidFile(file){
        var allowed_extensions = ["jpg","png","pdf"];
        var file_extension = file.split('.').pop().toLowerCase();
        for(var i = 0; i <= allowed_extensions.length; i++){
            if(allowed_extensions[i]==file_extension) return true;
        }
        return false;
    }
