/**
 * Created by Jojo on 09.11.16.
 */


$(document).ready(function(ev){
    /*Funktion bei Item wechsel*/
    $('#custom_carousel').on('slide.bs.carousel', function (evt) {
        /* löscht den alten activen Bereich im Carousel*/
        $('#custom_carousel .controls li.active').removeClass('active');
        /* aktiverit den neuen activen Bereich im Carousel*/
        $('#custom_carousel .controls li:eq('+$(evt.relatedTarget).index()+')').addClass('active');
    })
});