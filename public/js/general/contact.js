/**
 * Created by Jojo on 07.11.16.
 */
$(document).ready(function() {
    var height = $(".getheightleft").height();
    var test = 54;

    $(".setheightright").css("height",height);
    $(".sendtextfeld").css("min-height",height-test);
});