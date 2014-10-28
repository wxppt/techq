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
			alert("请选择用户");
		} else {
			deleteUser();
		}
	});

	$("#admin-user-add").click(function() {
		$(".glassDiv").load("/TechQ/glass/addUser", function() {
			initGlassDiv();
			showGlassDiv();
		});
	});

	$("#admin-user-update").click(function() {
		if($(".selectedRow").length == 0) {
			alert("请选择用户");
		} else {
			$(".glassDiv").load("/TechQ/glass/updateUser", function() {
				initGlassDiv();
				$(".glass-title").append($($(".selectedRow").children()[3]).text());
				$("input[name='email']").val($($(".selectedRow").children()[2]).text());
				$("input[name='nickname']").val($($(".selectedRow").children()[3]).text());
				$("select[name='role']").css({"color":"black"}).val($($(".selectedRow").children()[4]).css({"color":"black"}).text().trim() == "管理员" ? 777:0);
				$("input[name='points']").val($($(".selectedRow").children()[5]).text());
				$("select[name='status']").css({"color":"black"}).val($($(".selectedRow").children()[7]).text().trim() == "正常" ? 0:-1);
				showGlassDiv();
			});
		}
	});

	$("#admin-tag-add").click(function() {
		$(".glassDiv").load("/TechQ/glass/addTag", function() {
			initGlassDiv();
			showGlassDiv();
		});
	});

	$("#admin-tag-delete").click(function() {
		if($(".selectedRow").length == 0) {
			alert("请选择用户");
		} else {
			deleteTag();
		}
	});

	$("#admin-tag-update").click(function() {
		if($(".selectedRow").length == 0) {
			alert("请选择用户");
		} else {
			$(".glassDiv").load("/TechQ/glass/updateTag", function() {
				initGlassDiv();
				$(".glass-title").append($($(".selectedRow").children()[1]).text());
				$("input[name='tagName']").val($($(".selectedRow").children()[1]).text());
				showGlassDiv();
			});
		}
	});
});


var addUser = function() {
	$.post("/TechQ/user/add",{
		"email":$("input[name='email']").val(),
		"password":$("input[name='password']").val(),
		"nickname":$("input[name='nickname']").val(),
		"role":$("select[name='role']").val(),
		"points":$("input[name='points']").val(),
		"status":$("select[name='status']").val()
	},function(data){
		alert(data["message"]);
		if(data["fbCode"] == 1) {
			window.location = window.location;
		}
	},"json");
}

var updateUser = function() {
	$.post("/TechQ/user/update",{
		"uid":$($(".selectedRow").children()[1]).text(),
		"email":$("input[name='email']").val(),
		"nickname":$("input[name='nickname']").val(),
		"role":$("select[name='role']").val(),
		"points":$("input[name='points']").val(),
		"status":$("select[name='status']").val()
	},function(data){
		alert(data["message"]);
		if(data["fbCode"] == 1) {
			window.location = window.location;
		}
	},"json");
}

var deleteUser = function() {
	var uid = $($(".selectedRow").children("td")[1]).text();
	$.post("/TechQ/user/delete",{
		"uid":uid
	},function(data){
		alert(data["message"]);
		if(data["fbCode"] == 1) {
			window.location = window.location;
		}
	},"json");
}

var addTag = function() {
	$.post("/TechQ/tag/add",{
		"tagName":$("input[name='tagName']").val()
	},function(data){
		
		if(data["fbCode"] == 1) {
			window.location = window.location;
		} else {
			alert(data["message"]);
		}
	},"json");
}

var updateTag = function() {
	var tid = $($(".selectedRow").children("td")[0]).text();
	$.post("/TechQ/tag/delete",{
		"tid":tid,
		"tagName":$("input[name='tagName']").val()
	},function(data){
		alert(data["message"]);
		if(data["fbCode"] == 1) {
			window.location = window.location;
		}
	},"json");
}

var deleteTag = function() {
	var tid = $($(".selectedRow").children("td")[0]).text();
	$.post("/TechQ/tag/delete",{
		"tid":tid
	},function(data){
		alert(data["message"]);
		if(data["fbCode"] == 1) {
			window.location = window.location;
		}
	},"json");
}