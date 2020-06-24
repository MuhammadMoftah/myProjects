$('select').on('change', function (e) {
    $('select').filter(function () { return !this.value; }).attr("disabled", "disabled");
    $('input').filter(function () { return !this.value; }).attr("disabled", "disabled");
    $('#searchForm').submit();
});

$("input").prop("disabled", false);
$("select").prop("disabled", false);
