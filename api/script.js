$(document).ready(function(){
    console.log('App is ready');

    /**
     * connexion, ça marche ! pas touch
     */
    $('#login').click(function(){
        let mail = $('#mail').val();
        let password = $('#password').val();
        $.ajax({
            url: 'api/log.php',
            method: 'POST',
            dataType: 'json',
            data: {
                mail: mail,
                password: password
            },
            success: function (data) {
                console.table(data);
                var success = data['success']; //défini dans model.php
                if(success == true) {
                    $('#formlogin').submit();
                    console.table(data);
                    alert("vous etes connecté");
                    $(location).attr('href', 'todolist.php');
                }
                else if(success == false){
                    console.error('Erreur email ou mdp');
                    alert("Erreur mail ou mdp");
                    $('#mail').val('').focus();
                    $('#password').val('');
                }
            }
        })
    })


    /**
     * register, ça marche ! pas touch
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
                $('#password').val('').focus();
                $('#cpassword').val('');
            }
        }
        else{
            console.clear();
            console.error('Veuillez remplir tous les champs');
            alert("Veuillez remplir tous les champs");
            $('#prename').focus();
        }
    })


    /**
     * Déconnecxion, ca marche pas touch !
     */
    $('#deco').click(function (){
        $(location).attr('href', 'logout.php');
    })


    /*******************************************************/

    /**
     * Ajouté une tâche, ca marche, pas touch
     */
    $('#addtache').click(function(){
        if($('#description').val() != ''){
            let id = $('#id').val();
            let description = $('#description').val();


            //création de la date
            var now = new Date() ;
            var annee = now.getFullYear();
            var mois = ('0'+(now.getMonth()+1)).slice(-2);
            var jour = ('0'+now.getDate()).slice(-2);
            var heure = ('0'+now.getHours()).slice(-2);
            var min = ('0'+now.getMinutes()).slice(-2);
            var seconde = ('0'+now.getSeconds()).slice(-2);
            var date_complete = annee + '-' + mois + '-' + jour + ' ' + heure + ':' + min + ':' + seconde;

            console.log(id, description, date_complete);

            // je l'ajoute à la liste des taches d'abord et ensuite je l'envoi en bdd, pas trouvé autrement
            $("#list").append("<p>" + description + ', le '+ date_complete + " [<span class=\"done\">Terminer</span>]|[<span class=\"suppr\">Supprimer</span>]</p>");
            $.ajax({
                url: 'api/addtache.php',
                method: 'POST',
                data: {
                    id: id,
                    description: description,
                },
                success: function(){
                    $('#description').val('');
                    //alert("Tâche ajouté");
                    console.log("tache ajouté");
                },
                error: function(){
                    alert("Erreur lors de l'ajout de tâche");
                }
            })
        }
        else{
            console.clear();
            console.error('Veuillez remplir tous les champs');
            alert("Veuillez remplir tous les champs");
            $('#description').focus();
        }
    })

    /**
     * Ajouté une tache en appuyant sur Entrez,
     * ????
     * je sais pas comment finir ce truc
     */
    /**var desc = document.getElementById("description")
    desc.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("addtache").click();
        }});*/

    /**
     * Passer une tache terminé dans la liste done, en cours
     */
    $('.done').click(function(){
        let id = $(this).data('id'); // il a fallu mettre 'data-' devant id dans les span
        console.log(id);

        $.ajax({
            url: 'api/updatetache.php',
            method: 'POST',
            data: {
                id: id,
            },
            success: function(){
                /**
                 * enlever la ligne, ça marche pas
                 */
                 /**
                $("p span").click(deleteThisRow);

                function deleteThisRow() {
                    $(this).closest('p').fadeOut(400, function() {
                        $(this).remove();
                    });
                }*/

                // et la mettre dans "done".
                //$("#tache_termine").append(x);

            },
        })
    })

    /**
     * Supprimer une tache, en cours
     */
    $('.suppr').click(function(){
        let id = $(this).data('id'); // il a fallu mettre 'data-' devant id dans les span
        console.log(id);

        $.ajax({
            url: 'api/deletetache.php',
            method: 'POST',
            data: {
                id: id,
            },
            success: function(){
                //supprimer la ligne


            },
            error: function(){
                alert("Erreur lors de la suppression");
            }
        })
    })




})