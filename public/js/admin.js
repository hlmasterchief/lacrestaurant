$(function() {
    $(".content").css("width", $(window).width() - 220);
    $("#datepicker").datepicker({
        dayNamesMin: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        onSelect: function(date, obj) {
            window.location.href = "/admin/menu/" + date;
        },
        dateFormat: "yy-mm-dd"
    });
});

$(window).resize(function() {
    $(".content").css("width", $(window).width() - 220);
});