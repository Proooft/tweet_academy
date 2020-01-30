
function verifPseudo()   
{ 
 
 var url = 'database/test.php';  
 var pars=('username=' + document.getElementById('username').value);
 var username = new Ajax.Updater( 'update', url, { method: 'post', parameters: pars});  
}
function verifEmail(){
 var url = 'database/mail.php';  
 var pars=('mail=' + document.getElementById('mail').value);
 var mail = new Ajax.Updater( 'UPemail', url, { method: 'post', parameters: pars});
}



(function(window,document){
        window.onload =  init;// Une fois que la page est chargé..
        function init(){
            var btn = document.getElementById('test');
            btn.onclick = showAlert;
            var pseudo = document.getElementById('update');
            var mail = document.getElementById('UPemail');
        
        function showAlert(){
            if (pseudo.innerText !== ""){
                Swal.fire({
                    type: 'error',
                    title: 'Pseudo non disponible!',
                    width: 600,
                    padding: '3em',
                    background: '#fff',
                    backdrop: `
                            rgba(0,0,123,0.4)
                            url("https://www.animatedimages.org/data/media/196/animated-bat-image-0060.gif")
                            repeat
                        `
                })
                return false;}
            if (mail.innerText !== ""){
                Swal.fire({
                    type: 'error',
                    title: 'Email déjà utilisé !',
                    width: 600,
                    padding: '3em',
                    background: '#fff',
                    backdrop: `
                            rgba(0,0,123,0.4)
                            url("https://www.animatedimages.org/data/media/196/animated-bat-image-0060.gif")
                            repeat
                        `
                       
                })
                
                return false;
            
            }
            return true;
        }
    
}
    })(window, document);
