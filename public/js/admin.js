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

$("#select-img").click(function() {
    $("#input-img").click();
    return false;
});

$("#input-img").change(function() {
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $("#demo-img").html("<img src=\"" + e.target.result +"\" />");
        }
        reader.readAsDataURL(this.files[0]);
    }
});