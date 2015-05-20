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
			url: '?page=' + page,
			success: function (data) {

				// Get the ajax response
				var response = data.data;

				// If response exists
				if (response.length) {
					for (var i = 0; i < response.length; i++) {
						var current_data = response[i];

						// Seconds ajax call to get Mediacontent
						$.ajax({
							current_data: current_data,
							url: 'mediacontent/' + current_data.media_content_id,

							success: function (data2) {

								// Get the ajax response
								var response = data2;

								// Start string for post
								var string = "<div class='post'><div class='post_mediacontent'>";

								// If post has mediacontent type video
								if (response.type === 'video') {
									string += " <video class='post_video' preload='metadata' controls>"
									+ "<source src='" + response.src + "' type='video/mp4' />"
									+ "</video>";
								}
								// Everything else are pictures
								else {
									string += "<img class='post_image' src='" + response.src + "'>";
								}

								// Get all post data
								string += "</div>"
								+ "<div class='post_content'>" + this.current_data.text + "</div>"
								+ "<a href='/hashtag/" + this.current_data.hashtag + "'>"
								+ "<div class='post_hashtag'>" + this.current_data.hashtag + "</div>"
								+ "</a>";

								// If the post belongs to current user show edit and delete buttons
								if (this.current_data.user_id == $('meta[name="user_id"]').attr('content')) {

									string += "<a href='../post/" + this.current_data.id + "/edit'>"
									+ "<div id='edit' class='btn btn-primary form-control'>edit</div>"
									+ "</a>"
									+ "<div id='delete' data-id='" + this.current_data.id + "' class=' btn btn-primary form-control'>delete</div>";
								}

								string += "</div>";

								// Output it in the current html
								content.append(string);
							}
						});
					}
				}
			}
		});
	}
}

// Setup ajax token
$.ajaxSetup({
	headers: {
		'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
	}
});

// Delete button on posts
$('.content').on('click', '#delete', function () {
	$.ajax({
		url: 'post/' + this.dataset.id,
		type: 'post',
		data: {_method: 'delete'},
		success: function (result) {
			location.reload();
		}
	});
});
