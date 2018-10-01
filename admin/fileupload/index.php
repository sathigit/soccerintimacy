<?php

include '../includes/connection.php';



if($_SESSION['adminid'] == '')

 {

   echo "<script>window.location='../index.php';</script>";

 }

 



$page_count  = $_REQUEST['page_count'];

$page        = $_REQUEST['page'];

$sea_key     = $_REQUEST['sea_key'];

$catds       = $_REQUEST['catds'];
$catid       = $_REQUEST['catid'];



 if(!$catds && !$catid)

 {

   echo "<script>window.location='../view_images.php';</script>";

 }

 

?>

<!DOCTYPE HTML>

<html lang="en">
<head>

<!-- Force latest IE rendering engine or ChromeFrame if installed -->

<!--[if IE]>

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<![endif]-->

<meta charset="utf-8">
<title>::<?php echo $sitename?></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Bootstrap styles -->

<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Generic page styles -->

<link rel="stylesheet" href="css/style.css">

<!-- blueimp Gallery styles -->

<link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">

<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->

<link rel="stylesheet" href="css/jquery.fileupload.css">
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">

<!-- CSS adjustments for browsers with JavaScript disabled -->

<noscript>
<link rel="stylesheet" href="css/jquery.fileupload-noscript.css">
</noscript>
<noscript>
<link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css">
</noscript>
</head>
<body>
<div class="container">
  <?php if($catds!=''){?>
  <?php $gname1	=	$F($Q($link,"SELECT * FROM `ex_mmenu` WHERE `id` = '$catds'")); ?>
  <h4 class="form-signin-heading" style="text-transform:uppercase;">Add Images For <?php echo $gname['title'];?></h4>
  <?php } ?>
  
  <?php if($catid!=''){?>
  <?php $gname	=	$F($Q($link,"SELECT * FROM `ex_mmenu` WHERE `id` = '$catds'")); ?>
  <h4 class="form-signin-heading" style="text-transform:uppercase;">Add Images For <?php echo $gname['title'];?></h4>
  <?php } ?>
  
  <!-- The file upload form used as target for the file upload widget -->
  
  <form id="fileupload" action="" method="POST" enctype="multipart/form-data">
    
    <!-- Redirect browsers with JavaScript disabled to the origin page -->
    
    <noscript>
    <input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/">
    </noscript>
    
    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
    
    <div class="row fileupload-buttonbar">
      <div class="col-lg-7"> 
        
        <!-- The fileinput-button span is used to style the file input field as button --> 
        <?php if($catds!=''){?>
   <a href="../view_images.php?page=<?php echo $page;?>&page_count=<?php echo $page_count;?>&catds=<?php echo $catds?>" class="btn btn-primary"> Back </a> 
  <?php } ?>
  
  <?php if($catid!=''){?>
   <a href="../view_images.php?page=<?php echo $page;?>&page_count=<?php echo $page_count;?>&catds=<?php echo $catid?>" class="btn btn-primary"> Back </a> 
  <?php } ?>
     
        
        <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add files...</span>
        <input type="file" name="files[]" multiple>
        </span>
        <button type="submit" class="btn btn-primary start"> <i class="glyphicon glyphicon-upload"></i> <span>Start upload</span> </button>
        <button type="reset" class="btn btn-warning cancel"> <i class="glyphicon glyphicon-ban-circle"></i> <span>Cancel upload</span> </button>
        <button type="button" class="btn btn-danger delete"> <i class="glyphicon glyphicon-trash"></i> <span>Delete</span> </button>
        <input type="checkbox" class="toggle">
        
        <!-- The global file processing state --> 
        
        <span class="fileupload-process"></span> </div>
      
      <!-- The global progress state -->
      
      <div class="col-lg-5 fileupload-progress fade"> 
        
        <!-- The global progress bar -->
        
        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar progress-bar-success" style="width:0%;"></div>
        </div>
        
        <!-- The extended global progress state -->
        
        <div class="progress-extended">&nbsp;</div>
      </div>
    </div>
    
    <!-- The table listing the files available for upload/download -->
    
    <table role="presentation" class="table table-striped">
      <tbody class="files">
      </tbody>
    </table>
  </form>
</div>

<!-- The template to display files available for upload --> 

<script id="template-upload" type="text/x-tmpl">

{% for (var i=0, file; file=o.files[i]; i++) { %}

    <tr class="template-upload fade">

        <td>

            <span class="preview"></span>

        </td>

        <td>

            <p class="name">{%=file.name%}</p>

            <strong class="error text-danger"></strong>

        </td>

        <td>

            <p class="size">Processing...</p>

            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>

        </td>

        <td>

            {% if (!i && !o.options.autoUpload) { %}

                <button class="btn btn-primary start" disabled>

                    <i class="glyphicon glyphicon-upload"></i>

                    <span>Start</span>

                </button>

            {% } %}

            {% if (!i) { %}

                <button class="btn btn-warning cancel">

                    <i class="glyphicon glyphicon-ban-circle"></i>

                    <span>Cancel</span>

                </button>

				

				<label class="title">

				  <span>Title:</span><br>

				  <input name="title[]" required class="form-control" >

			  </label>

			  <label class="description">

				  <span>Description:</span><br>

				  <input name="description[]" required class="form-control">

			  </label>

			  

			  <label class="catid">

				  <input type="hidden" name="catid[]"  value="<?php echo $catid; ?>" class="form-control">				  

			  </label>

			  

			  <label class="subcatid">

				  <input type="hidden" name="subcatid[]"  value="<?php echo $gname1['id'];?>" class="form-control">			  

			  </label>

			  

            {% } %}

        </td>

    </tr>

	

{% } %}

</script> 

<!-- The template to display files available for download --> 

<script id="template-download" type="text/x-tmpl">

{% for (var i=0, file; file=o.files[i]; i++) { %}

    <tr class="template-download fade">

        <td>

            <span class="preview">

                {% if (file.thumbnailUrl) { %}

                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>

                {% } %}

            </span>

        </td>

        <td>

            <p class="name">

                {% if (file.url) { %}

                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>

                {% } else { %}

                    <span>{%=file.name%}</span>

                {% } %}

            </p>

            {% if (file.error) { %}

                <div><span class="label label-danger">Error</span> {%=file.error%}</div>

            {% } %}

        </td>

        <td>

            <span class="size">{%=o.formatFileSize(file.size)%}</span>

        </td>

        <td>

            {% if (file.deleteUrl) { %}

                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>

                    <i class="glyphicon glyphicon-trash"></i>

                    <span>Delete</span>

                </button>

                <input type="checkbox" name="delete" value="1" class="toggle">

            {% } else { %}

                <button class="btn btn-warning cancel">

                    <i class="glyphicon glyphicon-ban-circle"></i>

                    <span>Cancel</span>

                </button>

            {% } %}

			

        </td>

		<td><p class="title">{%=file.title%}</p></td>

    </tr>

	

{% } %}

</script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 

<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included --> 

<script src="js/vendor/jquery.ui.widget.js"></script> 

<!-- The Templates plugin is included to render the upload/download listings --> 

<script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script> 

<!-- The Load Image plugin is included for the preview images and image resizing functionality --> 

<script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script> 

<!-- The Canvas to Blob plugin is included for image resizing functionality --> 

<script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script> 

<!-- Bootstrap JS is not required, but inc
	luded for the responsive demo navigation --> 

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 

<!-- blueimp Gallery script --> 

<script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script> 

<!-- The Iframe Transport is required for browsers without support for XHR file uploads --> 

<script src="js/jquery.iframe-transport.js"></script> 

<!-- The basic File Upload plugin --> 

<script src="js/jquery.fileupload.js"></script> 

<!-- The File Upload processing plugin --> 

<script src="js/jquery.fileupload-process.js"></script> 

<!-- The File Upload image preview & resize plugin --> 

<script src="js/jquery.fileupload-image.js"></script> 

<!-- The File Upload audio preview plugin --> 

<script src="js/jquery.fileupload-audio.js"></script> 

<!-- The File Upload video preview plugin --> 

<!-- The File Upload validation plugin --> 

<script src="js/jquery.fileupload-validate.js"></script> 

<!-- The File Upload user interface plugin --> 

<script src="js/jquery.fileupload-ui.js"></script> 

<!-- The main application script --> 

<script src="js/main.js"></script> 

<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 --> 

<!--[if (gte IE 8)&(lt IE 10)]>

<script src="js/cors/jquery.xdr-transport.js"></script>

<![endif]--> 

<script type="application/javascript">



$('#fileupload').fileupload({

    // The regular expression for allowed file types, matches

    // against either file type or file name:

    acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,

    // The maximum allowed file size in bytes:

    maxFileSize: 10000000, // 10 MB

    // The minimum allowed file size in bytes:

    minFileSize: undefined, // No minimal file size

    // The limit of files to be uploaded:

    maxNumberOfFiles:10,
	imageMaxWidth: 1024,
    imageMaxHeight: 800,
    imageCrop: true // Force cropped images

  }).bind('fileuploadsubmit', function (e, data) {

    

//	var inputs = data.context.find(':input');

//    if (inputs.filter(function () {

//            return !this.value && $(this).prop('required');

//        }).first().focus().length) {

//        data.context.find('button').prop('disabled', false);

//        return false;

//    }

//    data.formData = inputs.serializeArray();

});



</script>
</body>
</html>
