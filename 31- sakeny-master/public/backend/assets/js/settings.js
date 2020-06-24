$('[data-toggle="datepicker"]').datepicker({
    format: "yyyy-mm-dd",
    "setDate": new Date(),
});

$('.datatable').DataTable({
  "order": [[ 0, "desc" ]]
});

$(".select2").select2();

$('.summernote').summernote({
    height: 200,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,             // set maximum height of editor
    focus: false                 // set focus to editable area after initializing summernote
});


function toggleFullscreen(elem) {
          elem = elem || document.documentElement;
          if (!document.fullscreenElement && !document.mozFullScreenElement &&
              !document.webkitFullscreenElement && !document.msFullscreenElement) {
              if (elem.requestFullscreen) {
                elem.requestFullscreen();
              }
             else if (elem.msRequestFullscreen) {
                elem.msRequestFullscreen();
              }
              else if (elem.mozRequestFullScreen) {
                elem.mozRequestFullScreen();
              }
              else if (elem.webkitRequestFullscreen) {
                elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
              }
          }
          else {
              if (document.exitFullscreen) {
                  document.exitFullscreen();
              } else if (document.msExitFullscreen) {
                  document.msExitFullscreen();
              } else if (document.mozCancelFullScreen) {
                  document.mozCancelFullScreen();
              } else if (document.webkitExitFullscreen) {
                  document.webkitExitFullscreen();
              }
        }
}

document.getElementById('btn-fullscreen').addEventListener('click', function() {
  toggleFullscreen();
});


function PrintElem(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write('<h1>' + document.title  + '</h1>');
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}
