$('#currency_show').on('click', function () {
	if ($("#currency_div").css("display") == 'none') {
	 	$('#currency_div').css("display", "block");
	}
});

$('#currency_hide').on('click', function () {
	if ($("#currency_div").css("display") == 'block') {
	 	$('#currency_div').css("display", "none");
	}
});
