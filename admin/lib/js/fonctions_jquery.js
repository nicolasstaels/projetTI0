$(document).ready(function () {

    //GESTION_PRODUIT
    $('span[id]').click(function () {
        //text() : récupérer le contenu quand ce n'est pas un champ de formulaire
        //val() : contenu d'un champ de formulaire
        var valeur1 = $.trim($(this).text());
        //récupération des attributs name et id de la zone cliquée
        var ident = $(this).attr("id");//valeur de l'id
        var name = $(this).attr("name");//champ à modifier
        //alert("ident =" + ident + " et name=" + name);
        $(this).blur(function () {
            var valeur2 = $.trim($(this).text());
            //alert("valeur 1 :"+valeur1+" valeur 2 : "+valeur2);
            if (valeur1 != valeur2) {
                //écriture des paramètres de l'URL
                var parametre = 'champ=' + name + '&id=' + ident + '&nouveau=' + valeur2;
                //alert(parametre);
                $.ajax({
                    type: 'GET',
                    data: parametre,
                    datatype: 'text',
                    url: './lib/php/ajax/ajaxUpdateProduit.php',
                    success: function (data) {
                        console.log(data);
                    }
                });
            }
        });
    });

    $('#editer_ajouter').text('Mettre à jour ou Nouveau produit')

    //blur : perte de focus
    $('#reference').blur(function () {
        var ref = $(this).val();
        if (ref != '') {
            var parametre = "reference=" + ref;
            $.ajax({
                type: 'GET',
                data: parametre,
                dataType: 'json',
                url: './lib/php/ajax/ajaxDetailProduitref.php',
                success: function (data) {
                    console.log(data);
                    $('#denomination').val(data[0].nom_produit);
                    if ($('#denomination').val() != '') {
                        $('#editer_ajouter').text('Mettre à jour');
                        $('#action').attr('value', 'editer');
                        $('#id_produit').attr('value', data[0].id_produit);
                    } else {
                        $('#editer_ajouter').text('Insérer');
                        $('#action').attr('value', 'inserer');
                    }
                    $('#description').val(data[0].description);
                    $('#prix').val(data[0].prix);
                    $('#stock').val(data[0].stock);
                    $('#cat').val(data[0].id_cat)
                }
            });
            $('#reference').click(function () {
                $('#reference').val('');
                $('#denomination').val('');
                $('#description').val('');
                $('#prix').val('');
                $('#stock').val('');
            })
        }

    });


});