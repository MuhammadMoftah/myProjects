 
$(document).ready(function(){
    // $Spelling.SpellCheckAsYouType('input');
    // $Spelling.SpellCheckAsYouType('textarea');
    $('input').change(function() {
       
        $(this).removeClass('is-invalid')
        $(this).next('.invalid-feedback').hide();

    })

    $('select').change(function() {
       
        $(this).removeClass('is-invalid')
        $(this).next('.invalid-feedback').hide();

    })

    $('textarea').change(function() {
       
        $(this).removeClass('is-invalid')
        $(this).next('.invalid-feedback').hide();

    })

    

    //    ==== Disable the input When Check Currntly work ====
    //    ==== Disable the input When Check Currntly work ====
    $('.currently-work').change(function() {
         if ($(this)[0].checked == true) {
            $('.end-date').prop('disabled', true);
            // $(".end-date").attr('disabled','disabled');
     

        } else  {
            $('.end-date').prop('disabled' , false)
            // $(".end-date").attr('disabled','');
  
        }
    })





});