$(document).ready(function(){
    console.log('App is ready');

    /**
     * connexion, ça marche pas, on passe sur accueil sur faux email et faux mdp
     */
    $('#login').click(function(){
        let mail = $('#mail').val();
        let password = $('#password').val();
        $.ajax({
            url: 'api/log.php',
            type: 'POST',
            dataType: 'json',
            data: {
                mail: mail,
                password: password
            },
            success: function(data){
                console.table(data);
                alert("vous etes connecté");
                $(location).attr('href', 'todolist.php');
            },
            error: function(){
                console.error('Erreur email ou mdp');
                alert("Erreur mail ou mdp");
                $('#mail').val('').focus();
                $('#password').val('');
            }
        })
    })


    /**
     * register, ça marche !
     */
    $('#register').click(function(){
        if($('#prename').val() != '' && $('#name').val() != '' && $('#mail').val() != '' && $('#password').val() != '' && $('#cpassword').val() != ''){
            let prename = $('#prename').val();
            let name = $('#name').val();
            let mail = $('#mail').val();
            let password = $('#password').val();
            let cpassword = $('#cpassword').val();

            if(password === cpassword){
                console.log(prename, name, mail, password, cpassword);
                $.ajax({
                    url: 'api/reg.php',
                    method: 'POST',
                    data: {
                        name: name,
                        prename: prename,
                        mail: mail,
                        password: password
                    },
                    success: function(){
                        alert("vous etes inscrit");
                        $(location).attr('href', 'login.php');
                    },
                    error: function(){
                        alert("Erreur lors de l'inscription");
                    }
                })
            }
            else{
                console.error('Les mots de passes ne correspondent pas');
                alert("Les mots de passes ne correspondent pas");
                $('#password').val('');
                $('#cpassword').val('');
                $('#password').focus();
            }
        }
        else{
            console.clear();
            console.error('Veuillez remplir tous les champs');
            alert("Veuillez remplir tous les champs");
            $('#prename').focus();
        }
    })
})