<!DOCTYPE html>
<html>
 <head>
  <title>Upload Image in Laravel using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Upload Image in Laravel using Ajax</h3>
   <br />
   <div class="alert" id="message" style="display: none"></div>
   <form method="post" id="upload_form" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
     <table class="table">
      <tr>
       <td width="40%" align="right"><label>Select File for Upload</label></td>

       <td width="30"><input   type="file" name="select_file" id="select_file" /></td>

       <td width="30%" align="left"><input type="submit" name="upload" id="upload" class="btn btn-primary" value="Upload"></td>
      </tr>
      <tr>
       <td width="40%" align="right"></td>
       <td width="30"><span class="text-muted">jpg, png, gif</span></td>
       <td width="30%" align="left"></td>
      </tr>
     </table>
    </div>
   </form>
   <br />

   <div  id="progress"></div>

   <span id="uploaded_image"></span>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
    //
    var myForm = document.getElementById('upload_form');
 $('#select_file').on('change', function(event){
  event.preventDefault();
  $.ajax({
   url:"{{ route('ajaxupload.action') }}",
   xhr: function() { // custom xhr (is the best)

var xhr = new XMLHttpRequest();
var total = 0;

// Get the total size of files
$.each(document.getElementById('select_file').files, function(i, file) {
       total += file.size;
});

// Called when upload progress changes. xhr2
xhr.upload.addEventListener("progress", function(evt) {
       // show progress like example
       var loaded = (evt.loaded / total).toFixed(2)*100; // percent

       $('#progress').text('Uploading... ' + loaded + '%' );
}, false);

return xhr;
},
   method:"POST",
   data: new FormData(myForm)  , // $('#upload_form').serialize()
   dataType:'JSON',
   contentType: false,
   cache: false,
   processData: false,
   success:function(data)
   {
    $('#message').css('display', 'block');
    $('#message').html(data.message);
    $('#message').addClass(data.class_name);
    $('#uploaded_image').html(data.uploaded_image);
   }
  })
 });

});
</script>
