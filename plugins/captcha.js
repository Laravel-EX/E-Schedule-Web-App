var val = Math.floor(1000 + Math.random() * 9000);

$('#captcha').text(val);
$('.tombol').hide();
$('#captcha-compare').blur(function() {
	if($(this).val() == val ) {
		$('#cap1').html('<span class="label label-success">Success!!</span>');
		$('.tombol').show();
	} else {
		$('#cap1').html('<span class="label label-danger">Failed!!</span>');
		$('.tombol').hide();
	}
});