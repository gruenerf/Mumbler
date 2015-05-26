$('.content').on('click', '.story-panel-button', function(e)
{
	var resource = $(this).data("resource");
	$(".story-panel" + resource).toggle();
});

$('.story-panel-close').on('click', function(e)
{
	$(".sp").css("display", "none");
});

$('input[type="radio"]').on('click', function(e)
{
	$('.' + this.value).toggle();
});