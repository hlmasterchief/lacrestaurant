$(function() {
    $(".content").css("width", $(window).width() - 220);
});

$(window).resize(function() {
    $(".content").css("width", $(window).width() - 220);
});