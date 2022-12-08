$( document ).ready(function() {

    $('[data-type="adhaar-number"]').keyup(function() {
        var value = $(this).val();
        value = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join("-");
        $(this).val(value);
      });
      
      $('[data-type="adhaar-number"]').on("change, blur", function() {
        var value = $(this).val();
        var maxLength = $(this).attr("maxLength");
        if (value.length != maxLength) {
          $(this).addClass("highlight-error");
        } else {
          $(this).removeClass("highlight-error");
        }
      });


  $( "#joinus-form" ).submit(function( event ) {
    alert( "Handler for .submit() called." );
    var birth = document.getElementById('dob')
    if(birth != "")
    {

        var dob=document.getElementById('dob').value.trim();
            dob = new Date(dob);
            var today = new Date();
            var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
               
        if(age < 5 )
        {

            $(".error ul").append("<li>Sorry ! You must be 5 or over to join. Please Select correct date of birth.</li>");
            $(".error").show();
            return false;
        }
        $(".error").hide();
        
        return true;
        
    } 

    $( "#donate-form" ).submit(function( event ) {

        var panVal = $('#panNumber').val();
        var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;

        if(!regpan.test(panVal)){
            $(".error ul").append("<li>Please Enter Valid PAN Card.</li>");
            $(".error").show();
            return false;
        } 
        $(".error").hide();
        
        return true;
    });

  });
});
  
