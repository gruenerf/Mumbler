$(document).ready(function(){
	$('#search_submit').click(function(e){
		e.preventDefault();

		$url = window.location.href + 'search/' + $('#search_text').val();
		window.location.href = $url;
	})
});