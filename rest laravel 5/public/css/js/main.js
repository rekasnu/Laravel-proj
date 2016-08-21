$(document).ready(function () {
    $('.carousel').carousel({
        interval: 3000
    });

    $('.carousel').carousel('cycle');
});
$(window).load(function(){
        $('#msg').modal();
    });
