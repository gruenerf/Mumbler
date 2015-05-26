$('.content').on('click', '.story-panel-button', function(e)
{
	var resource = $(this).data("resource");
	$(".story-panel" + resource).toggle();
});

$('.content').on('click','.story-panel-close', function(e)
{
	$(".sp").css("display", "none");
});

$('.content').on('click', 'input[type="radio"]', function(e)
{
	$('.' + this.value).toggle();
});