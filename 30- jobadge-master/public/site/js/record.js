var recorder;
var camera;
var file;
// capture camera and/or microphone

function videoTimeOut() {
    var milliSeconds = 62 * 1000;
    setTimeout(function () {
        stopRecording();
    }, milliSeconds);
}

function countDown() {
    var counter = 59;
    var timer = setInterval(function () {
        $('#counter').html(counter + ' Secs');
        --counter;
        if (counter == -1) {
            $('#counter').html('your time is Over!');
            clearInterval(timer);
        }
    }, 1000);

}

function start_record() {
    navigator.mediaDevices.getUserMedia({
        video: true,
        audio: true
    }).then(function (camera) {
        camera = camera;
        // preview camera during recording
        document.getElementById('your-video-id').muted = true;
        document.getElementById('your-video-id').srcObject = camera;
        // recording configuration/hints/parameters
        var recordingHints = {
            type: 'video'
        };
        // initiating the recorder
        recorder = RecordRTC(camera, recordingHints);
        // starting recording here
        recorder.startRecording(camera);
        countDown();
        $('#start_record').prop('disabled', true);
        $('#stop_record').prop('disabled', false);
        $('#new_video').prop('disabled', false);
    });
}

function showAlert(msg) {
    hideMsg();
    $('.alert-danger').html(msg);
    $('.alert-danger').show();
}

function hideAlert() {
    $('.alert-danger').html('');
    $('.alert-danger').hide();
}

function showMsg(msg) {
    hideAlert();
    $('.alert-info').html(msg);
    $('.alert-info').show();
}

function hideMsg() {
    $('.alert-info').html('');
    $('.alert-info').hide();
}

$('#start_record').click(function () {
    start_record();
    videoTimeOut();
});

$('#new_video').click(function () {
    location.reload();
});



function uploadVideo(fileObject) {
    if (!fileObject) {
        showAlert('please record your video!');
        return;
    }

    $('.loader').show();

    var formData = new FormData();
    // recorded data
    formData.append('video', fileObject);
    // file name
    formData.append('video-filename', fileObject.name);
    // upload using jQuery
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: upload_link,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        success: function (response) {
            window.location.replace(redirect_url);
        },
        error: function (error) {
            $('.loader').hide();
            showAlert('your video must not exceed 1 min');
            $('#new_video').prop('disabled', false);
        }
    });
}

function stopRecording() {
    // stop recording
    recorder.stopRecording(function () {

        // get recorded blob
        var blob = recorder.getBlob();
        // generating a random file name
        var fileName = getFileName('mp4');
        // we need to upload "File" --- not "Blob"
        var fileObject = new File([blob], fileName, {
            type: 'video/mp4'
        });

        file = fileObject;
        document.getElementById('your-video-id').srcObject = document.getElementById('your-video-id').src = null;
        $('#stop_record').prop('disabled', true);
        $('#upload_btn').prop('disabled', false);
        showMsg('your record is ready to be uploaded Or Start new one');
    });
}
// this function is used to generate random file name
function getFileName(fileExtension) {
    var d = new Date();
    var year = d.getUTCFullYear();
    var month = d.getUTCMonth();
    var date = d.getUTCDate();
    return 'RecordRTC-' + year + month + date + '-' + getRandomString() + '.' + fileExtension;
}

function getRandomString() {
    if (window.crypto && window.crypto.getRandomValues && navigator.userAgent.indexOf('Safari') === -1) {
        var a = window.crypto.getRandomValues(new Uint32Array(3)),
            token = '';
        for (var i = 0, l = a.length; i < l; i++) {
            token += a[i].toString(36);
        }
        return token;
    } else {
        return (Math.random() * new Date().getTime()).toString(36).replace(/\./g, '');
    }
}

$('#upload_btn').click(function () {
    if (!file) {
        showAlert('please record your video!');
        return;
    }
    // disable buttons
    $('#upload_btn').prop('disabled', true);
    $('#start_record').prop('disabled', true);
    $('#new_video').prop('disabled', true);
    $('#stop_record').prop('disabled', true);

    uploadVideo(file);
});

$('#stop_record').click(function () {
    stopRecording();
});