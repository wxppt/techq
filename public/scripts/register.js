$(document).ready(function() {
	$("#registerBtn").click(register);
    $("#backBtn").click(function() {
        window.location = "/TechQ   ";
    });
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
            if(data["fbCode"] == 1) {
                window.location = "/TechQ/";
            } else {
                alert(data["message"]);
            }
        },"json");
    }
}