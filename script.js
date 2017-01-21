$('document').ready(function()
{
     /* validation */
	 $("#login-form").validate({
      rules:
	  {
			password: {
			required: true,
			},
			username: {
            required: true,
            },
	   },
       messages:
	   {
            password:{
                      required: "please enter your password"
                     },
            username: "please enter your username",
       },
	   submitHandler: submitForm
       });
	   /* validation */

	   /* login submit */
	   function submitForm()
	   {
			var data = $("#login-form").serialize();

			$.ajax({

			type : 'POST',
			url  : 'login_process.php',
			data : data,
			beforeSend: function()
			{
				$("#error").fadeOut();
				$("#btn-login").html('<i class="material-icons left">cached</i>LOGGING IN');
			},
			success :  function(response)
			   {
					if(response=="ok"){

						$("#btn-login").html('<i class="material-icons left">autorenew</i>LOGGING IN WITH RESPONSE');
						setTimeout(' window.location.href = "home.php"; ',4000);
					}
					else{

						$("#error").fadeIn(1000, function(){
				$("#error").html('<div class="alert alert-dismissible alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button> <i class="material-icons left">info</i> &nbsp; '+response+' !</div>');
											$("#btn-login").html('<i class="material-icons left">send</i> LOGIN');
									});
					}
			  }
			});
				return false;
		}
});
