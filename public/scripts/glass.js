$(document).ready(function () {
    $(window).resize(function () {
        $(".glassDiv").css({
            "left": parseInt(($(window).width() - $(".glassDiv").width()) / 2) + "px",
            "top": parseInt(($(window).height() - $(".glassDiv").height()) / 2) + "px"
        });
    });

    $(".glassDiv-cancel").click(hideGlassDiv);

    $(".glassDiv select").click(function() {
        if($(this).val() != null && $(this).val() != "default") {
            $(this).css({"color":"black"});
        } else {
            $(this).css({"color":"#a9a9a9"});
        }
    });
});

var showGlassDiv = function () {
    $(".glassDiv").css({
        "left": parseInt(($(window).width() - $(".glassDiv").width()) / 2) + "px",
        "top": parseInt(($(window).height() - $(".glassDiv").height()) / 2) + "px"
    });
    $(".smokeDiv").show();
    $(".glassDiv").show();

}

var hideGlassDiv = function () {
    $(".smokeDiv").hide();
    $(".glassDiv").hide();
    $(".glassDiv input").val("");
    $(".glassDiv select").val("default");
}