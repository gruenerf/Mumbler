$('.content').on('click', '.story-panel-button', function(e)
{
	var resource = $(this).data("resource");
	$(".story-panel" + resource).toggle();
});


$('input[type="radio"]').on('click', function(e)
{
	$('.' + this.value).toggle();
});