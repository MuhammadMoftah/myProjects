$(function () {
    var tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);

    var today = new Date();
    today.setDate(today.getDate());

    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY',
        clearButton: true,
        weekStart: 1,
        time: false,
        // maxDate: today,
    });

    $('.datetimepicker').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY - HH:mm',
        clearButton: true,
        weekStart: 1,
        // minDate: tomorrow
    });
});