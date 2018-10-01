$(document).ready(function (e){
$("#frmContact").on('submit',(function(e){
	e.preventDefault();
	var $form = $(this);
	if(! $form.valid()) return false;
	$('#loader-icon').show();
	$('#mail-status').show();
	//$("#mail-status").html('');
	//var valid;	
	//valid = validateContact();
	//if(valid) {
		$.ajax({
		url: "register.php",
		type: "POST",
		data:  new FormData(this),
		contentType: false,
		cache: false,
		processData:false,
		success: function(data){
		$("#mail-status").html(data);
		$('#loader-icon').hide();
		setTimeout(function() {
    $('#mail-status').fadeOut('fast');
}, 3000);
		},
		error: function(){} 	        
		
		});
	//}
}));
$().ready(function() {
$("#frmContact").validate({
			rules: {
				firstname: "required",
				lastname: "required",
				email: {
					required: true,
					email: true
				},
				mobile: {
					required: true,
					number: true
				},
				password: {
					required: true,
					minlength: 5
				},
				confirmpassword: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				age: "required",
				gender: "required",
				filefl: {
					required: true
					//filesize: 1
				}
			},
			messages: {
				filefl:{
					required:"Please upload a photo.",
                    filesize:"File size not more than 1 MB."
                }
			}
		});

});

$("#frmContact_update").validate({
			rules: {
				firstname: "required",
				lastname: "required",
				mobile: {
					required: true,
					number: true
				},
/*				password: {
					required: true,
					minlength: 5
				},
				confirmpassword: {
					required: true,
					minlength: 5,
					equalTo: "#passwordupdate"
				},*/
				age: "required",
				gender: "required"
			},
			messages: {
				
			}
		});


});
