function MM_preloadImages() { //v3.0
var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

$(document).ready(function(){
$(".c1").hover(function() {
$(this).stop().animate({opacity: "0.8"}, 10);
},
function() {
$(this).stop().animate({opacity: "1"}, 10);
});
});


eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(2($){$.c.f=2(p){p=$.d({g:"!@#$%^&*()+=[]\\\\\\\';,/{}|\\":<>?~`.- ",4:"",9:""},p);7 3.b(2(){5(p.G)p.4+="Q";5(p.w)p.4+="n";s=p.9.z(\'\');x(i=0;i<s.y;i++)5(p.g.h(s[i])!=-1)s[i]="\\\\"+s[i];p.9=s.O(\'|\');6 l=N M(p.9,\'E\');6 a=p.g+p.4;a=a.H(l,\'\');$(3).J(2(e){5(!e.r)k=o.q(e.K);L k=o.q(e.r);5(a.h(k)!=-1)e.j();5(e.u&&k==\'v\')e.j()});$(3).B(\'D\',2(){7 F})})};$.c.I=2(p){6 8="n";8+=8.P();p=$.d({4:8},p);7 3.b(2(){$(3).f(p)})};$.c.t=2(p){6 m="A";p=$.d({4:m},p);7 3.b(2(){$(3).f(p)})}})(C);',53,53,'||function|this|nchars|if|var|return|az|allow|ch|each|fn|extend||alphanumeric|ichars|indexOf||preventDefault||reg|nm|abcdefghijklmnopqrstuvwxyz|String||fromCharCode|charCode||alpha|ctrlKey||allcaps|for|length|split|1234567890|bind|jQuery|contextmenu|gi|false|nocaps|replace|numeric|keypress|which|else|RegExp|new|join|toUpperCase|ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('|'),0,{}));



//contact
$(document).ready(function() {

	$('.error').hide(); //Hide error messages 
	$('.error2').hide(); 
	$('.error3').hide(); 
	$('.error4').hide(); 
	$('#MainResult').show(); //we will hide this right now
	$("#contactbut").click(function() { //User clicks on Submit button
	 
	 // Fetch data from input fields.
	 var js_name = $("#name").val();
	 var js_email = $("#email").val();
	 var js_phone = $("#phone").val();
	 var js_message = $("#message").val();
	 var emailReg21 = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	 
	 // Do a simple validation
	 if(js_name==""){
	 	 $("#nameLb .error").show();
		 $('.error2').hide(); 
	     $('.error3').hide(); 
	     $('.error4').hide();
		 return false;}
		 
	 if(js_email=="" || !emailReg21.test(js_email)){
	 	 $("#emailLb .error2").show();
		 $('.error').hide(); 
	     $('.error3').hide(); 
	     $('.error4').hide();
		 return false;}
		 
	 if(js_phone==""){
	 	 $("#phoneLb .error3").show();
		 $('.error2').hide(); 
	     $('.error').hide(); 
	     $('.error4').hide();
		 return false;}
		 
	 if(js_message==""){
	 	$("#messageLb .error4").show();
		$('.error2').hide(); 
	    $('.error3').hide(); 
	    $('.error').hide();
		return false;}
	
		//let's put all data together
	  var myData = 'postName='+ js_name + '&postEmail=' + js_email + '&postPhone=' + js_phone + '&postMessage=' + js_message;
	  
            jQuery.ajax({
                type: "POST",
                url: "contactform.php",
                dataType:"html",
                data:myData,
                success:function(response){
					$(".error").hide();
					$("#MainResult").html('<fieldset class="response">'+response+'</fieldset>');
					$("#MainResult").slideDown("slow");
					$(".error").hide();
					$(".error2").hide();
					$(".error3").hide();
					$(".error4").hide();
					$("#name").val("");
					$("#email").val("");
					$("#phone").val("");
					$("#message").val("");
					$('#MainResult').delay(9000).fadeOut(300);
					
					
                },
                error:function (xhr, ajaxOptions, thrownError){
					$("#ErrResults").html(thrownError);
					$(".error").hide();
					$(".error2").hide();
					$(".error3").hide();
					$(".error4").hide();
					$("#name").val("");
					$("#email").val("");
					$("#phone").val("");
					$("#message").val("");
					$('#ErrResults').delay(9000).fadeOut(300);
					
                }    
            });
		return false;
	});
	
});

