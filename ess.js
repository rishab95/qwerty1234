$(document).ready(function() {
    $("input").focus(function() {
		var strLength= $(this).val().length;
		$(this).focus();
		$(this)[0].setSelectionRange(strLength, strLength);
	});
});