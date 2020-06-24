// handle errors 
let handlefail = function (err) {
    console.log(err);
}

let remoteContainer = document.getElementById('remote-container');
let canvasContainer = document.getElementById('canvas-container');

// add video stream
function addVideoStream(streamId) {
    let streamDiv = document.createElement('div');
    streamDiv.id = streamId;
    streamDiv.style.height = "250px";
    streamDiv.style.width = "250px";
    remoteContainer.appendChild(streamDiv);
}

// remove video stream
function removeVideoStream(evt) {
    let stream = evt.stream;
    // stream.stop;
    $('#remote-container').empty();
    // console.log('stream has been removed ' + stream.getId());
}

// add canvas
function addCanvas(streamId) {
    let video = document.getElementById(`video${streamId}`);
    let canvas = document.createElement("canvas");
    canvasContainer.appendChild(canvas);
    let ctx = canvas.getContext('2d');

    video.addEventListener('loadmetadata', function () {
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
    });

    video.addEventListener('play', function () {
        var $this = this; // cache

        (function loop() {
            if (!$this.paused && !$this.ended) {
                if ($this.width !== canvas.width) {
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                }
                ctx.drawImage($this, 0, 0);
                setTimeout(loop, 1000 / 30);
            }
        })();
    }, 0)
}

function makeid(l) {
    var text = "";
    var char_list = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    for (var i = 0; i < l; i++) {
        text += char_list.charAt(Math.floor(Math.random() * char_list.length));
    }
    return text;
}

let client = AgoraRTC.createClient({
    mode: 'live',
    codec: "h264"
});

client.init("f1a2f7b8226b4b0081d99d71ef76a06d", function () {
    // console.log("AgoraRTC client initialized");
}, function (err) {
    console.log("AgoraRTC client init failed", err);
});

client.join(null, channel_name, null, function (uid) {
    let stream_id = makeid(25);
    // console.log("User " + uid + " join channel successfully");

    let localStream = AgoraRTC.createStream({
        streamID: stream_id,
        audio: true,
        video: true,
        screen: false
    });

    localStream.init(function () {
        localStream.play('me');
        client.publish(localStream, handlefail);

        // client.on('stream-removed', removeVideoStream);

        client.on('peer-leave', removeVideoStream);
    }, handlefail)

    client.on('stream-added', function (evt) {
        // console.log('me subscribed to channel');
        client.subscribe(evt.stream, handlefail);
    });

    client.on('stream-subscribed', function (evt) {
        // console.log('user subscribed to channel');
        let stream = evt.stream;
        // console.log(stream.getId());
        addVideoStream(stream_id);
        stream.play(stream_id);
        addCanvas(stream_id);
    });
}, function (err) {
    console.log("Join channel failed", err);
});