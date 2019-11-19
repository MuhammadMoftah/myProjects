/*global $ , console , alert , document, window */
$(function () {
    'use strict';

    $('[data-toggle="popover"]').popover();

    $('[data-toggle="tooltip"]').tooltip();

    $(".modal form .input i").click(function () {
        if ($('.input-psswd').attr('psswd-shown') == 'false') {

            $('.input-psswd').removeAttr('type');
            $('.input-psswd').attr('type', 'text');

            $('.input-psswd').removeAttr('psswd-shown');
            $('.input-psswd').attr('psswd-shown', 'true');

            $('.button-psswd').html('Hide password');

        } else {

            $('.input-psswd').removeAttr('type');
            $('.input-psswd').attr('type', 'password');

            $('.input-psswd').removeAttr('psswd-shown');
            $('.input-psswd').attr('psswd-shown', 'false');

            $('.button-psswd').html('Show password');

        }

    });

    document.getElementById('buttonid').addEventListener('click', openDialog);
});

function openDialog(e) {
    e.preventDefault();
    document.getElementById('fileid').click();
}