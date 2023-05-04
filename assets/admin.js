
$('#installation').submit(function(e){
        e.preventDefault();
        var username = $("#username").val();
        var password = $("#password").val();
        var email = $("#email").val();
        $.ajax({
       type:'POST',
       beforeSend: function(){
         $.LoadingOverlay("show");
            },
       url: '../assets/setupadmin.php',
    
         data:{
            username:username,
            password:password,
            email:email
                    },
       dataType: 'json',
       success: function (response) {
               if (response.status == 500){
                   $.LoadingOverlay("hide");
                            swal({
                              title: "Successful!",
                              text: "you have successfully install surplus data api key script. delete the Adex folder for security purpose",
                              icon: "success",
                              button: "Continue",
                            })
                            $('.swal-button--confirm').click(function(){
                                  $.ajax({
                                        beforeSend: function(){
                                            $.LoadingOverlay("show");
                                        },
            success: window.location.href = '../admin/'
                                  });
                            });
             }   else {
                  $.LoadingOverlay("hide");
             swal("Oops!",response.message,"error") 
               }
            
        },
       complete: function(){
         $.LoadingOverlay("hide");
        

  } 
     });
          });
  