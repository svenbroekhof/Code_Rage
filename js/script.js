$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

$(function () {
    $("sidebar-collapse").click(function () {
        var $spin = $("#menu-toggle");
        $spin.removeClass("spinEffect");
        setTimeout(function () {
            $spin.addClass("spinEffect")
        }, 0);
    });
});