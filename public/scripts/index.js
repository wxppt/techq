$(document).ready(function() {
	var $selectedNav = $($(".indexNav:first")[0]);
	$(".indexNav").mouseover(function() {
		$(".indexNavSlct").animate({"margin-left":"" + parseInt($(this).offset().left - $(".indexNavCtn").offset().left)},200);
	});
	$(".indexNavCtn").mouseleave(function() {
		$(".indexNavSlct").animate({"margin-left":"" + parseInt($selectedNav.offset().left - $(".indexNavCtn").offset().left)},200);
	});
	$(".indexNav").click(function() {
		$selectedNav = $(this);
	});

	readyToLogin();
    $("#emailInput").bind("click",readyToLogin);
    $("#emailInput").bind("keyup",readyToLogin);
    $("#pwInput").bind("click",readyToLogin);
    $("#pwInput").bind("keyup",readyToLogin);

	$("#registerBtn").click(register);
});

var register = function() {
    var nickname = $("#unameInput").val();
    var pw1 = $("#pwInput1").val();
    var pw2 = $("#pwInput2").val();
    var email = $("#emailInput").val();
    
    if(pw1 != pw2) {
        alert("两次密码不一致！");
    }　else {
        $.post("/TechQ/user/register", {
            "nickname":nickname,
            "password":pw1,
            "email":email
        }, function(data) {
            alert(data);
        });
    }
}

var login = function() {
	var email = $("#emailInput").val();
    var password = $("#pwInput").val();

    
    if(email == "" || password == "") {     // 检测输入是否为空
        $("#loginBtn").removeClass().addClass("loginBtn_error").text("邮箱或密码不能为空！").attr("disabled","disabled").unbind();
    } else {
        $("#loginBtn").removeClass().addClass("loginBtn_loading").text("正在登录...").attr("disabled","disabled").unbind();
        $.post("/TechQ/user/login", {
            "email":email,
            "password":password
        }, function(data) {
            if(data["fbCode"] == -1) {
                $("#loginBtn").removeClass().addClass("loginBtn_error").attr("disabled","disabled").text(data["message"]).unbind();
            } else {
                window.location = window.location;
            }
        }, "json");
    }
    
}

var readyToLogin = function(event) {
    var email = $("#emailInput").val();
    var password = $("#pwInput").val();

    if(email != "" && password != "") {
        $("#loginBtn").removeClass().removeAttr("disabled").addClass("loginBtn").html("登&nbsp;&nbsp;&nbsp;录").unbind().bind("click",login);
         if(event.keyCode == 13) {
            login();
        }
        return true;
    } else {
        $("#loginBtn").removeClass().addClass("loginBtn_disabled").attr("disabled","disabled").unbind();
        return false;
    }
}