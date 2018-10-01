$(document).ready(function (w){
$("#newsletterajax").on('submit',(function(w){
	w.preventDefault();
	var $form2 = $(this);
	if(! $form2.valid()) return false;
	$('#loader-icon2').show();
	$("#mail-status2").html('');
	$('#mail-status2').show();
	//var valid;	
	//valid = validateContact();
	//if(valid) {
		$.ajax({
		url: "newsletter.php",
		type: "POST",
		data:  new FormData(this),
		contentType: false,
		cache: false,
		processData:false,
		success: function(data){
		$("#mail-status2").html(data);
		$('#loader-icon2').hide();
		$('#nemail').val('');
		setTimeout(function() {
    $('#mail-status2').fadeOut('fast');
}, 3000);
		},
		error: function(){} 	        
		
		});
	//}
}));
$().ready(function() {
$("#newsletterajax").validate({
			rules: {
				newsemail: {
					required: true,
					email: true
				}
			},
			messages: {
			}
		});

});

});