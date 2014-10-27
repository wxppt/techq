$(document).ready(function() {
	$(".user-result tr").click(function() {
		
		if($(this).hasClass("selectedRow")) {
			$(this).removeClass("selectedRow").siblings().removeClass("selectedRow");
		} else {
			$(this).addClass("selectedRow").siblings().removeClass("selectedRow");
		}
	});

	$("#admin-user-delete").click(function() {
		if($(".selectedRow").length == 0) {
			alert("您没有选择用户");
		} else {
			var uid = $($(".selectedRow").children("td")[1]).text();
			$.post("/TechQ/user/delete",{
				"uid":uid
			},function(data){
				if(data["fbCode"] == 0) {
					alert("删除成功");
					window.location = window.location;
				} else {
					alert(data["message"]);
				}
			},"json");
		}
		
	});
});