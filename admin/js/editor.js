tinymce.init({
selector: "textarea",
editor_selector : "editor1",
    theme: "modern",
    width:1024,
    height: 500,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor filemanager fullscreen"
   ],
   image_advtab: true,
   toolbar: "undo redo | bold italic underline | fontsizeselect |  alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect forecolor backcolor | link unlink anchor | image media | print  preview code | fullscreen",
   
 }); 