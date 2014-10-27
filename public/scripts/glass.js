$(document).ready(function () {
    $(window).resize(function () {
        $(".glassDiv").css({
            "left": parseInt(($(window).width() - $(".glassDiv").width()) / 2) + "px",
            "top": parseInt(($(window).height() - $(".glassDiv").height()) / 2) + "px"
        });
    });
    showGlassDiv();
});

var showGlassDiv = function () {
    $(".glassDiv").css({
        "left": parseInt(($(window).width() - $(".glassDiv").width()) / 2) + "px",
        "top": parseInt(($(window).height() - $(".glassDiv").height()) / 2) + "px"
    });
    $(".glassDiv").show();
}

var hideGlassDiv = function () {
    $(".glassDiv").hide();
}