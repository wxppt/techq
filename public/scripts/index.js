$(document).ready(function() {
	readyToLogin();
    $("#emailInput").bind("click",readyToLogin);
    $("#emailInput").bind("keyup",readyToLogin);
    $("#pwInput").bind("click",readyToLogin);
    $("#pwInput").bind("keyup",readyToLogin);

	$("#registerBtn").click(register);
});

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