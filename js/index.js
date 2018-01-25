


//Opening the form
$open=0
toggleForm()
    $('#form-container').click( function(e) {
        e.preventDefault();
        if($open==0){
            toggleForm()
        }


    });



    //Closing the form
    $('#form-close, .form-overlay').click(function(e) {
        e.stopPropagation();
        e.preventDefault();

        $('#form-container').toggleClass('expand');
        $('#form-container').children().toggleClass('expand');
        $('body').toggleClass('show-form-overlay');
        $('.form-submitted').removeClass('form-submitted');
    });


function toggleForm(){


      $('#form-container').toggleClass('expand');
      $('#form-container').children().toggleClass('expand');
      $('body').toggleClass('show-form-overlay');
      $('.form-submitted').removeClass('form-submitted');
     $open++;


}

