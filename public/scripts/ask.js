$(window).ready(function() {
	$(".addPicture").click(function() {
		$(".glassDiv").load("/TechQ/Glass/upLoadPicture",function() {
			initGlassDiv();
			showGlassDiv();
		});
	});
});