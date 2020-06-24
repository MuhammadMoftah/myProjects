$('#city').change(function () {
    $('#search_projects').submit();
});

$('#developer').change(function () {
    $('#search_projects').submit();
});

$('#district').change(function () {
    $('#search_projects').submit();
});

var myDiv = $('#project-title');
myDiv.text(myDiv.text().substring(0, 60))