$(document).ready(function() {
	$(".user-result tr").click(function() {
		
		if($(this).hasClass("selectedRow")) {
			$(this).removeClass("selectedRow").siblings().removeClass("selectedRow");
		} else {
			$(this).addClass("selectedRow").siblings().removeClass("selectedRow");
		}
	});
});