$(window).ready(function() {
	$(".addPicture").click(function() {
		$(".glassDiv").load("/TechQ/Glass/upLoadPicture",function() {
			initGlassDiv();
			showGlassDiv();
		});
	});
});

var askQuestion = function() {
	var title = $("input[name='title']").val();
	var content = $("textarea[name='content']").val();
	var points = $("input[name='points']").val();
	var tags = new Array();
    $("input[name='goodAt']:checked").each(function() {
        tags.push($(this).val());
    });

    if(title != "" && content != "" && points != "" && tags.join(",") != "") {
    	$.post("/TechQ/question/askQuestion", {
            "title":title,
            "content":content,
            "points":points,
            "tags":tags.join(",")
        }, function(data) {
        	alert(data);
            // if(data["fbCode"] == 1) {
            //     alert(data["message"]);
            // } else {
            //     alert(data["message"]);
            // }
        });
    } else {
    	alert("信息不全");
    }

}