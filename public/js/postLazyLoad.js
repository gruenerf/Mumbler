// Page counter
var page = 2;

$(window).scroll(function () {

	// When bottom is reached
	if ($(window).scrollTop() + $(window).height() == $(document).height()) {
		lazyLoad(page++);
	}

});


function lazyLoad(page) {
	var content = $('#content');

	// Check if page contains posts
	if (content.has('.post').length) {

		// First ajax call for the next posts
		$.ajax({
			timeout: 1000,
			url: '?page=' + page
		})
			.done(function (data) {

				// Get the ajax response
				var response = data.data;

				// If response exists
				if (response.length) {
					for (var i = 0; i < response.length; i++) {
						var current_data = response[i];

						if (current_data.user_id !== 0 && current_data.user_id !== undefined) {

							// Second ajax call to get posthtml
							$.ajax({
								timeout: 1000,
								current_data: current_data,
								url: $('meta[name="baseurl"]').attr('content')+'/post/postAjax/' + current_data.id
							})
								.done(function (data) {
									content.append(data);

									// Third ajax to get the storyforms
									$.ajax({
										timeout: 1000,
										url: $('meta[name="baseurl"]').attr('content')+"/story/storyForm/" + this.current_data.id
									})
										.done(function (data) {
											content.append(data);
										});
								});
						}
					}
				}
			});
	}
}