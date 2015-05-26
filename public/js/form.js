$("input.hashtag").on("keydown", function (e) {
    return e.which !== 32;
});

function countChar(val)
{
	var len = val.value.length;
	
	if (len >= 140) {
		$('#charNum').text(140 - len).css("color", "red");
	} else {
		$('#charNum').text(140 - len).css("color", "black");
	}
};