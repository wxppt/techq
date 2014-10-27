$(document).ready(function() {
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