/*global $ , console , alert , document, window */
$(function () {
    'use strict';
    $('#usersTable').DataTable();
    $("#compDelete").click(function () {
        swal({
                title: "You are about to delete your company, Are you sure?",
                text: "Once deleted, you will not be able to recover this Company",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Your Company has been deleted!", {
                        icon: "success",
                    });
                } else {
                    swal("Your company still with us");
                }
            });
    })

    $("#userDelete").click(function () {
        swal({
                title: "You are about to delete your Account, Are you sure?",
                text: "Once deleted, you will not be able to recover this Account",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Your Account has been deleted!", {
                        icon: "success",
                    });
                } else {
                    swal("Your Account still with us");
                }
            });
    })

    $('#skills-form').on('keyup keypress', function (e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
});
