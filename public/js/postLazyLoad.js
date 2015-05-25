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
			url: '?page=' + page,
		})
			.done(function (data) {

				// Get the ajax response
				var response = data.data;

				// If response exists
				if (response.length) {
					for (var i = 0; i < response.length; i++) {
						var current_data = response[i];

						if (current_data.user_id !== 0 && current_data.user_id !== undefined) {

							// Second ajax call to get Username
							$.ajax({
								timeout: 1000,
								current_data: current_data,
								url: 'user/' + current_data.user_id,
							})
								.done(function (data) {
									// Get the ajax response
									var response = data;
									var current_data2 = this.current_data;
									current_data2['username'] = response.name;

									if (current_data2.media_content_id !== 0 && current_data2.media_content_id !== undefined) {

										// Third ajax call to get Mediacontent
										$.ajax({
											timeout: 1000,
											current_data2: current_data2,
											url: 'mediacontent/' + current_data2.media_content_id,
										})
											.done(function (data) {
												// Get the ajax response
												var response = data;

												// Start string for post
												var string = "<div class='post'>" +
													"<div class='top_content'>" +
													"<div class='username'>" +
													"<a href='/" + this.current_data2.username + "'>" +
													this.current_data2.username +
													"</a>" +
													"</div>" +

													"<div class='date'>" +
													$.formatDateTime('hh:ii:ss dd.mm.y', new Date(this.current_data2.created_at)) +
													"</div>" +
													"</div>" +
													"<div class='post_mediacontent'>";

												// If post has mediacontent type video
												if (response.type === 'video') {
													string += " <video class='post_video' preload='none' controls>"
													+ "<source src='" + response.src + "' type='video/mp4' />"
													+ "</video>";
												}
												// Everything else are pictures
												else {
													string += "<img class='post_image' src='" + response.src + "'>";
												}

												// Get all post data
												string += "</div>"
												+ "<div class='post_content'>" + this.current_data2.text + "</div>"
												+ "<div class='bottom_content'><a href='/hashtag/" + this.current_data2.hashtag + "'>"
												+ "<div class='post_hashtag'>" + this.current_data2.hashtag + "</div>"
												+ "</a>";

												// If the post belongs to current user show edit and delete buttons
												if (this.current_data2.user_id == $('meta[name="user_id"]').attr('content')) {

													string += "<a href='../post/" + this.current_data2.id + "/edit'>"
													+ "<div id='edit' class='btn btn-primary form-control'>edit</div>"
													+ "</a>"
													+ "<div id='delete' data-id='" + this.current_data2.id + "' class=' btn btn-primary form-control'>delete</div>";
												}

												if ($('meta[name="user_id"]').attr('content')) {
													string += "<button type='button' class='story-panel-button btn btn-primary'" +
													"data-resource='" + this.current_data2.id + "'>&#43; Add to story" +
													"</button>";
												}

												string += "</div></div>";

												// Output it in the current html
												content.append(string);
											});
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
		url: '../post/' + this.dataset.id,
		type: 'post',
		data: {_method: 'delete'},
		success: function (result) {
			location.reload();
		}
	});
});
