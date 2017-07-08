var lensking_processing = "process/process.php";

function imageupload(){
 
   var  imagetitle = $("#imagetitle").val();
   var  image = $("#image").val();


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
         type:'POST',
         data: $('#imageupload').serialize(),
         success:function(rdata){
           alert(rdata);
           if(rdata == ok){
           $.notify({
          title: "Image Upload : ",
          message: "Upload Successfully!",
          icon: 'fa fa-check-circle' 
            },{
              type: "success"
           });       
          }
          else{
          	$.notify({
          title: "Image Upload : ",
          message: "Image Not Uploaded!",
          icon: 'fa fa-exclamation-circle' 
            },{
              type: "danger"
           });       
          }
         }
         

      });

   }

return false;

}