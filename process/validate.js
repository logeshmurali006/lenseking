function login(){

var uname = $("#uname").val();
var upass = $("#upass").val();


if(uname == "" &&  upass == ""){

          	$.notify({
      		title: "Login : ",
      		message: "Please Enter username & password",
      		icon: 'fa fa-exclamation-circle' 
		      	},{
		      		type: "danger"
		      	});

          	$("#uname").focus();
}
else if(upass ==""){

          	$.notify({
      		title: "Login : ",
      		message: "Please Enter Password",
      		icon: 'fa fa-exclamation-circle' 
		      	},{
		      		type: "danger"
		      	});
          	$("#upass").focus();
}
else if(uname == ""){
   $.notify({
      		title: "Login : ",
      		message: "Please Enter Username",
      		icon: 'fa fa-exclamation-circle' 
		      	},{
		      		type: "danger"
		      	});
          	$("#uname").focus();	
}
else{

var formdata = $("#loginform").serialize();
    $.ajax({
       type: 'post',
       url:'process/validate.php',
       data: formdata,
       success:function(rdata){

          if(rdata == "ok"){

           $.notify({
      		title: "Login : ",
      		message: " Succesfull!!",
      		icon: 'fa fa-check' 
	      	},{
	      		type: "success"
	      	});  
             
             window.location.href = "dashboard.php";
          }
          else{

          	$.notify({
      		title: "Login : ",
      		message: "username or password is wrong",
      		icon: 'fa fa-exclamation-circle' 
		      	},{
		      		type: "danger"
		      	});

          }


       }


    })
}

    return false;

}
/*
  function imageupload(){

     var image = $('#image').val();
     var imagetitle = $('#imagetitle').val();

     if( imagetitle == "")
       {
          $.notify({
          title: "Image Upload : ",
          message: "Please Enter Image Title",
          icon: 'fa fa-exclamation-circle' 
            },{
              type: "danger"
            });
          
       }
     else if(image =="")
       {
          
          $.notify({
          title: "Image Upload : ",
          message: "Please Upload Image",
          icon: 'fa fa-exclamation-circle' 
            },{
              type: "danger"
            });   
       }



 return false;

}*/
