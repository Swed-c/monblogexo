window.addEventListener('DOMContentLoaded', (event) => {
    let keys = new Array();

    document.getElementById('password').setAttribute('autocomplete', 'off');

    document.getElementById('password').addEventListener('keydown', (event) => {
        key = new Object();
        key.altKey = event.altKey;
        key.ctrlKey = event.ctrlKey;
        key.shiftKey = event.shiftKey;
        key.key = event.key;
        key.code = event.code;
        keys.push(key);        
    });

    document.querySelector('form .btn').addEventListener('click', (event) =>{
        event.preventDefault();

        console.log(keys);
        if (keys != []){
            let sentence = 'Vous avez été hacké :D :D :D !!!!\n';
            sentence    += 'Vous ne me croyez pas ! Regardez dans la console ! Mouhahahaha !\n';
            sentence    += 'Votre mot de passe doit ressembler à quelque chose comme ceci : \n'
            sentence    += guessPassword() + '\n';
            sentence    += 'Et si ce n\'est pas tout à fait ça, j\'ai assez d\'infos pour deviner moi-même ! ';
            sentence    += 'Mouhahahaha !! À moi la fortune et les piña-colada sous les tropiques ! Mouhahahahahahahahaha ! \n Signé : le codeur masqué.';
            alert(sentence);
        }

    });

    function guessPassword(){
        let pwd = '';
        keys.forEach((key)=>{

            switch(key.key) {
            case 'Enter' :
            case 'Shift' :
            case 'Alt' :
            case 'Ctrl' :
            case undefined :
                break;
            default :
                pwd += key.key;
                break;
            }

        });
        return pwd;
    }
  });