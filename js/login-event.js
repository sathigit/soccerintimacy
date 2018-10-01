$(document).ready(function (e){
	$('#rzp-button1').hide();
	$('#rzp-button3').hide();
$("#frmContact-login-event").on('submit',(function(e){
	e.preventDefault();
	var $form = $(this);
	if(! $form.valid()) return false;
	$('#loader-icon-login-event').show();
	$("#mail-status-login-event").show();
	$("#mail-status-login-event").html('');
	
	//var valid;	
	//valid = validateContact();
	//if(valid) {
		$.ajax({
		url: "login-event.php",
		type: "POST",
		data:  new FormData(this),
		contentType: false,
		cache: false,
		processData:false,
		success: function(data){
		$("#mail-status-login-event").html(data);
		$('#loader-icon-login-event').hide();
		setTimeout(function() {
    $('#mail-status-login-event').fadeOut('fast');
}, 3000);
		},
		error: function(){} 	        
		
		});
	//}
}));
$().ready(function() {
$("#frmContact-login-event").validate({
			rules: {
				usernameevents: {
					required: true,
					email: true
				},
				passevents: {
					required: true,
					minlength: 5
				}
			},
			messages: {
				
			}
		});

});

$().ready(function() {
$("#eventregister").validate({
			rules: {
				rtype: {
					required: true
				}
			},
			messages: {
				
			}
		});

});

});


$(document).ready(function (e){

$().ready(function() {
$("#frmContact-forgot").validate({
			rules: {
				forgot: {
					required: true,
					email: true
				}
			},
			messages: {
				
			}
		});

});

});

