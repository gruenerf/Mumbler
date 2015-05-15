$(window).scroll(function () {
	lazyLoad(2);
});

function lazyLoad(page) {
	var content = $('#content');

	if ($(window).scrollTop() + $(window).height() == $(document).height()) {

		if (content.has('.post')) {
			var request = $.ajax('?page=' + page)
				.done(function () {
					var response = JSON.parse(request.responseText);

					if (response.data.length) {
						for (var i = 0; i < response.data.length; i++) {
							content.append(response.data[i].hashtag);
						}
					}

					lazyLoad(page++);
				})
		}

	}
}