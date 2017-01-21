$(document).ready(function() {

    $('#FormTransaksi').submit(function(e){

      e.preventDefault(); // Prevent Default Submission
	    $.post("submittransaksi.php", $(this).serialize())
        .done(function(data){
          $("#dis").fadeOut();
          $("#dis").fadeIn('slow', function(){
             $("#dis").html('<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="material-icons left">info</i> &nbsp;'+data+'</div>');
          $('#panel').fadeOut('slow', function(){
              $('#panel').fadeIn('slow').load('tampiltransaksi.php');
              $("#FormTransaksi")[0].reset();
            });
          });
		 });
	     return false;
    });

    $('#FormObat').submit(function(e){

      e.preventDefault(); // Prevent Default Submission
      $.post("submitobat.php", $(this).serialize())
      .done(function(data){
        $("#dis").fadeOut();
        $("#dis").fadeIn('slow', function(){
           $("#dis").html('<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> <i class="material-icons left">info</i> &nbsp;'+data+'</div>');
        $('#panel').fadeOut('slow', function(){
            $('#panel').fadeIn('slow').load('tampilobat.php');
            $("#FormObat")[0].reset();
          });
        });
   });
       return false;
    });

});
