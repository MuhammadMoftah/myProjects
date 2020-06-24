$(document).ready(function() {
    // init ajax
    $.ajaxSetup({
        cache: false,
        data: {_token: $('input[name="csrf_token"]').val() }
    });


    /*$(document).on('click','.pagination a',function(event){
        event.preventDefault();
        if ($(this).parent().parent().parent().hasClass('dataTables_paginate')) {
            return false;
        }
        var str =window.location.href;
        var res = str.split("?");
        var pageinate = $(this).attr('href')+"&"+res[1];
        $.get(pageinate, function(data) {
            $('table tbody').html(data);
        });
        return false;
    });//pagination*/

    $(document).on('keyup', 'input[name="search"]', function(event) {
        event.preventDefault();
        var thisInput = $(this);
        var thisForm = $(this).closest('form');
        var formAction = thisForm.attr('action');
        var formMethod = thisForm.attr('method');
        var formData = thisForm.serialize();
        $.ajax({
            url: formAction,
            type: formMethod,
            dataType: 'json',
            data: formData,
            success: function(data) {
                $('table tbody').html(data);
            },
        });
        return false;
    });
});

console.log($('input[name="csrf_token"]').val());
