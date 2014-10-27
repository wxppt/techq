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
});
