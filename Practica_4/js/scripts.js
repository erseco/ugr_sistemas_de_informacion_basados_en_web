/*********************************************************
 *
 * 2016 - Sistemas de Informacion Basados en Web
 * Grado en Ingeniería Informática
 *
 * Ernesto Serrano <erseco@correo.ugr.es>
 * Nikolai Giovanni González López <nigolo@correo.ugr.es>
 *
 *********************************************************
 *
 * para cargar la galeria
 *
 **********************************************************/
window.onload = function() {

    // Inicializamos el scrip de galería solo si la pagina contiene alguna
	var galleries = document.getElementsByClassName("baguetteBox");

	if (galleries.length > 0)
    	baguetteBox.run('.baguetteBox');
};


// Este código se activa al cargar la página y hace que empiece a funcionar la extensión tablesorter
  $(function(){
	$("#dev-table").tablesorter();
  });

 $(function() {

$('input[name="date_range"].booking').daterangepicker({
    "showDropdowns": false,
    "autoApply": true,
    "locale": {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Apply",
        "cancelLabel": "Cancel",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "Mo",
            "Tu",
            "We",
            "Th",
            "Fr",
            "Sa",
            "Su"
        ],
        "monthNames": [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ],
        "firstDay": 0
    },
    "alwaysShowCalendars": true,
    "startDate": moment(),
    "endDate": moment().add(2, 'days')
}, function(start, end, label) {
  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
});

$('input[name="date_range"].bookings').daterangepicker({
    "showDropdowns": false,
    "autoApply": false,
    "locale": {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Apply",
        "cancelLabel": "Cancel",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "Mo",
            "Tu",
            "We",
            "Th",
            "Fr",
            "Sa",
            "Su"
        ],
        "monthNames": [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ],
        "firstDay": 0
    },
    "alwaysShowCalendars": true,
    // "startDate": moment(),
    // "endDate": moment().add(2, 'days')
}, function(start, end, label) {
  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
});


// Este codigo es para recalcular el precio

  $(function(){

    $('#id_room, #date_range').change(function() {


        var price = $('option:selected',$('select[name="id_room"]')).attr('attr-price');
        var startDate = $('#date_range').data('daterangepicker').startDate;
        var endDate = $('#date_range').data('daterangepicker').endDate;

        var ms = moment(endDate).diff(startDate);
        var duration = moment.duration(ms);
        var days = duration.get("days") + 1;

        var total = price * days;

        $('#total_price').text(total);

    });

  });

});