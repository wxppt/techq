$(document).ready(function() {
	var urlSp = window.location.toString().split("/");
	try {
	$selectedNav = $("#" + urlSp[urlSp.length-2]+"-"+urlSp[urlSp.length-1].split("?")[0]+"-nav");
	if($selectedNav.length == 0) {
		$selectedNav = $($(".indexNav")[0]);
	} else {
		$(".indexNavSlct").animate({"margin-left":"" + parseInt($selectedNav.offset().left - $(".indexNavCtn").offset().left)},0);
	}
	}catch (e) {
		$selectedNav = $($(".indexNav")[0]);
	}
	

	$(".indexNav").mouseover(function() {
		$(".indexNavSlct").animate({"margin-left":"" + parseInt($(this).offset().left - $(".indexNavCtn").offset().left)},200);
	});
	$(".indexNavCtn").mouseleave(function() {
		$(".indexNavSlct").animate({"margin-left":"" + parseInt($selectedNav.offset().left - $(".indexNavCtn").offset().left)},200);
	});
	$(".indexNav").click(function() {
		window.location = "/TechQ/" + $(this).attr("id").split("-")[0] + "/" + $(this).attr("id").split("-")[1];
	});

	$("input[class!='searchInput'],textarea").focus(function() {
		$(this).css({"border":"1px solid #0c7adf"});
	}); 

	$("input[class!='searchInput'],textarea").blur(function() {
		$(this).css({"border":"1px solid #888888"});
	}); 
});
