$(document).ready(function (e){
$("#frmContact-login").on('submit',(function(e){
	e.preventDefault();
	var $form = $(this);
	if(! $form.valid()) return false;
	$('#loader-icon-login').show();
	$("#mail-status-login").show();
	$("#mail-status-login").html('');
	
	//var valid;	
	//valid = validateContact();
	//if(valid) {
		$.ajax({
		url: "login.php",
		type: "POST",
		data:  new FormData(this),
		contentType: false,
		cache: false,
		processData:false,
		success: function(data){
		$("#mail-status-login").html(data);
		$('#loader-icon-login').hide();
		setTimeout(function() {
    $('#mail-status-login').fadeOut('fast');
}, 3000);
		},
		error: function(){} 	        
		
		});
	//}
}));
$().ready(function() {
$("#frmContact-login").validate({
			rules: {
				username: {
					required: true,
					email: true
				},
				pass: {
					required: true,
					minlength: 5
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

