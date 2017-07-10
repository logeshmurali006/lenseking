var lensking_processing = "process/process.php";

/*********** gallery upload ************/
$(document).ready(function (e) {
  $("#imageupload").on('submit',(function(e) {
    e.preventDefault();
 

   var  imagetitle = $("#imagetitle").val();
   var  image = $("#image").val(); 
   $("#imageupload").submit(function(){
    var formdata =  new FormData(this); 
   });
   


   if(imagetitle == ""){
    $("#imagetitle").focuss();
         $.notify({
          title: "Image Upload : ",
          message: "Image Title Required..!",
          icon: 'fa fa-exclamation-circle' 
            },{
              type: "danger"
           });
   }
   else if(image == ""){
    $("#image").focuss();
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
          url: lensking_processing /*"process/process.php"*/,
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

          $("#uploadformreset").click();

      

         $.notify({
          title: "Image Upload : ",
          message: data,
          icon: 'fa fa-check-circle' 
            },{
              type: "success"
           });
           //reload data without reloading page
           setTimeout(function() { location.reload(); }, 1500);
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
/*********** gallery upload ************/

/********* gallery Fetch ************/

function deleteimage(id){


var imageid = $("#img"+id).serialize();




    swal( {
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
          },
           function(isConfirm) 
           {
              if (isConfirm) 
              {
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
                   
                    $.ajax(
                    {
                      url: lensking_processing,
                      type: "POST",
                      data: imageid,
                      success: function(data)
                      {   
                       
                        // for triming space in text
                        data = $.trim(data);
                       
                           if(data == "Deleted")
                          {
                            
                            //reload data without reloading page
                             setTimeout(function() { location.reload(); }, 1500);
                                 $.notify({

                                  title: "Image Deleted : ",
                                  message: data,
                                  icon: 'fa fa-check-circle' 
                                    },{
                                      type: "success"
                                   });
                          }
                         else
                         {
                                $.notify({

                                title: "Image Not Deleted : ",
                                message: data,
                                icon: 'fa fa-exclamation-circle' 
                                  },{
                                    type: "danger"
                                 });
                        }
                      }
                    });
              }
               else {
                      swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
        });

return false;



}
 

/********* gallery Fetch ************/

