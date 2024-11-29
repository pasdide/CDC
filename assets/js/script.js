
$(document).ready(function() {
    var suggestions = [
        "Jules",
        "Pierre",
        "David",
        "Alexia",
        "Max",
        "Projet"
    ];
    $("#search").autocomplete({
        source: suggestions, 
        minLength: 1,
        autoFocus: false, 
        select: function(event, ui) {
            console.log("Suggestion sélectionnée : " + ui.item.value);
        }
    });
});
