$('.content').on('click', '.story-panel-button', function(e)
{
	console.log('asdas');
	var resource = $(this).data("resource");
	$(".story-panel" + resource).toggle();
});


$('input[type="radio"]').on('click', function(e)
{
	$('.' + this.value).toggle();
});