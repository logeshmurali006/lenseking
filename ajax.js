var lensking_processing = "process/process.php";

$(document).ready(function (e) {
  $("#imageupload").on('submit',(function(e) {
    e.preventDefault();
 

   var  imagetitle = $("#imagetitle").val();
   var  image = $("#image").val(); 
   $("#imageupload").submit(function(){
    var formdata =  new FormData(this); 
   });
   


   if(imagetitle == ""){
         $.notify({
          title: "Image Upload : ",
          message: "Image Title Required..!",
          icon: 'fa fa-exclamation-circle' 
            },{
              type: "danger"
           });
   }
   else if(image == ""){
      $.notify({
          title: "Image Upload : ",
          message: "Upload Image ..!",
          icon: 'fa fa-exclamation-circle' 
            },{
              type: "danger"
           });
   }

   else{
     
         $.ajax({
          url: "process/process.php",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
          cache: false,
      processData:false,
      success: function(data)
        {   
        // for triming space in text
        data = $.trim(data);
    
          if(data == "uploaded"){
         $.notify({
          title: "Image Upload : ",
          message: data,
          icon: 'fa fa-check-circle' 
            },{
              type: "success"
           });
         }
         else if(data == "Dberror"){
           $.notify({
          title: "Image Upload : ",
          message: data,
          icon: 'fa fa-exclamation-circle' 
            },{
              type: "danger"
           });
         }
         else if(data == "UploadingError"){
           $.notify({
          title: "Image Upload : ",
          message: data,
          icon: 'fa fa-exclamation-circle' 
            },{
              type: "danger"
           });
         }
        },
        error: function() 
        {
        }           
     });


   }




  }));
});

