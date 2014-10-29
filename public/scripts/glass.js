$(document).ready(function () {
    $(window).resize(function () {
        $(".glassDiv").css({
            "left": parseInt(($(window).width() - $(".glassDiv").width()) / 2) + "px",
            "top": parseInt(($(window).height() - $(".glassDiv").height()) / 2) + "px"
        });
    });
});

var initGlassDiv = function() {
    $(".glassDiv-cancel").click(hideGlassDiv);

    $(".glassDiv select").click(function() {
        if($(this).val() != null && $(this).val() != "default") {
            $(this).css({"color":"black"});
        } else {
            $(this).css({"color":"#a9a9a9"});
        }
    });

    $(".uploadCtn").mouseover(function() {
        $(".uploadCtn>button").css({"background-color":"#222222"});
    });

    $(".uploadCtn").mouseleave(function() {
        $(".uploadCtn>button").removeAttr("style");
    });

    $(".fileInput").change(function(){
        if($(".imgPreview>img").length > 0) {
            $(".uploadPicCtn>img").remove("img[name='" + $(".imgPreview>img").attr('name') + "']");
            $.post("/TechQ/Question/cancelUpload",{
                'url': $(".imgPreview>img").attr('name')
            },function(data) {
                if(data['fbCode'] != 1) {
                    alert(data['message']);
                }
            },'json');
        }
        if (!/\.(gif|jpg|jpeg|png|bmp)$/.test($(this).val().toLowerCase())) {
            //alert("图片类型必须是gif,jpeg,jpg,png中的一种");
            $(this).val("");
        } else {
            $(".uploadDiv>input[type='text']").val($(this).val().split("\\")[($(this).val().split("\\").length-1)]);
            $(".glassDiv-ok").removeAttr("disabled");
            initCanvasLoader();
            $("#pictureForm").submit();
        }
    })
}

var showGlassDiv = function () {
    $(".glassDiv").css({
        "left": parseInt(($(window).width() - $(".glassDiv").width()) / 2) + "px",
        "top": parseInt(($(window).height() - $(".glassDiv").height()) / 2) + "px"
    });
    $(".smokeDiv").fadeIn(200);
    $(".glassDiv").fadeIn(200);

}

var hideGlassDiv = function () {
    $(".smokeDiv").fadeOut(200);
    $(".glassDiv").fadeOut(200,function() {
        $(".glassDiv input").val("");
        $(".glassDiv select").val("default");
    });
}

var relocateGlass = function () {
    $(".glassDiv").animate({
        "left": parseInt(($(window).width() - $(".glassDiv").width()) / 2) + "px",
        "top": parseInt(($(window).height() - $(".glassDiv").height()) / 2) + "px"
    },500);
}

var initCanvasLoader = function () {
    var cl = new CanvasLoader('canvasloader-container');
    cl.setShape('spiral');
    cl.setDiameter(31);
    cl.setDensity(60);
    cl.setRange(1);
    cl.setFPS(30);
    cl.show();
}

var showUploadFeedback = function(fbCode, url, message) {
    //alert(fbCode+ url+ message);
    $(".imgPreview").html("<img name='" + url + "' style='display:none;' src='/TechQ/" + url + "' />");
    $(".imgPreview>img").load(function() {
        $("#canvasloader-container").hide();
        $(this).fadeIn(500);
        relocateGlass();
        var tmp = $(".uploadPicCtn").html();
        $(".uploadPicCtn").html("<img name='" + url + "' style='display:none;' src='/TechQ/" + url + "' />").append(tmp);
    });
}

var finishUpload = function() {
    hideGlassDiv();
    $(".uploadPicCtn>img").fadeIn(300);
    $(".glassDiv").html("");
    if($(".uploadPicCtn>img").length < 4) {
        $(".addPicture").click(function() {
            $(".glassDiv").load("/TechQ/Glass/upLoadPicture",function() {
                initGlassDiv();
                showGlassDiv();
            });
        });
    } else {
        $(".addPicture").hide();
    }
}

var cancelUpload = function() {
    if($(".imgPreview>img").length > 0) {
        $(".uploadPicCtn>img").remove("img[name='" + $(".imgPreview>img").attr('name') + "']");
        $.post("/TechQ/Question/cancelUpload",{
            'url': $(".imgPreview>img").attr('name')
        },function(data) {
            if(data['fbCode'] != 1) {
                alert(data['message']);
            } else {
                hideGlassDiv();
                $(".addPicture").click(function() {
                $(".glassDiv").load("/TechQ/Glass/upLoadPicture",function() {
                    initGlassDiv();
                    showGlassDiv();
                });
        });
            }
        },'json');
    }
}