//<!-- script auto completion  
// <!--- Autocomplete textbox jquery ajax --->
  $(document).ready(function(){
      $("#numcin").on("keyup", function(){
        var numcin = $(this).val();
        if (numcin !== "") {
          $.ajax({
            url:"../auto_search.php",
            type:"POST",
            cache:false,
            data:{numcin:numcin},
            success:function(data){
              $("#numcinlist").html(data);
              $("#numcinlist").fadeIn();
            }  
          });
        }else{
          $("#numcinlist").html("");  
          $("#numcinlist").fadeOut();
        }
      });

      // click one particular numcin  it's fill in textbox
      $(document).on("click","li", function(){
        $('#numcin').val($(this).text());
        $('#numcinlist').fadeOut("fast");
      });
  });