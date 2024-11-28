aData = {}
$( "#compétences").autocomplete({
    source: function(request, response){
    $.ajax({
        url: 'http://localhost/search.php',
        type: 'GET',
        dataType: 'json',
        success:function(data){
            console.log(data)
            aData= $.map(data, function(value, key) {
                return {
                    id:value.id,
                    label: value.compétences,
                    capital: value.nom
                };
            });
            var results = $.ui.autocomplete.filter(aData, request.term);
            response(results);
        },
        error: function(xhr, status, error) {
            console.log("Erreur de la requête AJAX : " + error);
        }
    });
},
minLength: 2,  // Nombre minimum de caractères avant d'effectuer la recherche
select: function(event, ui) {
    console.log("Sélectionné: " + ui.item.label);
    }
});