$(function(){
   let room       = $("#room")
   let room_join  = $("#room-num").text()
   var connection = new RTCMultiConnection();
   let remote     = $("#remote-call");
   let local      = $("#locat-call") 
   let streamid   = null
   let sendChat   = $("#send")
   let message    = $("#message")  
   let chat       = $("#chat-message")
//    var sound      = new Pizzicato.Sound("notify.mp3")
 // this line is VERY_important
  connection.socketURL =    linkSocket;
  connection.socketCustomParameters  = `&user_id=${info.id}`

  //max user 
  connection.maxParticipantsAllowed = 2;
  connection.enableLogs = true;
  


  

 // if you want audio+video conferencing
    connection.session = {
        audio: true,
        video: true
    };


    connection.mediaConstraints = {
        audio: true,
        video: true
    };

   connection.sdpConstraints.mandatory = {
        OfferToReceiveAudio: true,
        OfferToReceiveVideo: false
    };

    connection.socketOptions.query = {'user_id':5};

    // connextion extre data
    connection.extra = info;
    
    
    // conextion test ========
    connection.iceServers = [];

    // second step, set STUN url
    connection.iceServers.push({
        urls:  'stun:' + turnServerIPAddress + ':' + turnServerPort,
    });

    var multiUrls = [
        {
            urls:"stun:stun.l.google.com:19302",
        },
        {
            urls:"stun:stun1.l.google.com:19302",
        },
        {
            urls:"stun:stun2.l.google.com:19302",
        },
        {
            urls:"stun:stun.l.google.com:19302?transport=udp",
        }

    ]
    connection.iceServers.push(...multiUrls)

    // last step, set TURN url (recommended)
    connection.iceServers.push({
        urls: 'turn:' + turnServerIPAddress + ':' + turnServerPort,
        credential: turnServerPassword,
        username: turnServerUserName
    });

    // =================================================================


    connection.videosContainer = document.getElementById('videos-container');

    connection.onstream = function(event) {
       // console.log(event)
        let mediaElement = createVedio(event)
        initHark({
            stream: event.stream,
            streamedObject: event,
            connection: connection
        });

        
        if(event.type === 'local') {
            streamid = event.streamid
            local.append(mediaElement)
        }
        else{
            playAlert('morse')
            var remoteUserFullName = event.extra.fullName;
            toastr.success(`${remoteUserFullName} join now !`)
            remote.append(mediaElement)
        }
        
        // console.log(event.mediaElement)
    }


    // handle error 
    connection.onMediaError = function(e) {
        if (e.message === 'Concurrent mic process limit.') {
            if (connection.DetectRTC.audioInputDevices.length <= 1) {
                alert('Please select external microphone. Check github issue number 483.');
                return;
            }

            var secondaryMic = Dconnection.DetectRTC.audioInputDevices[1].deviceId;
            connection.mediaConstraints.audio = {
                deviceId: secondaryMic
            };
            connection.join(connection.sessionid);
        }
    };

    // handle event muted
    connection.onmute  = function(e) {
        console.log(e)
        let vedio    = document.getElementById(`${e.streamid}`);
        let poster   = vedio.previousElementSibling;
        poster.src   = e.extra.photo
        poster.style.display="inline-block"
        vedio.style.display = "none"
     };

     connection.onunmute  = function(e) {
        let vedio    = document.getElementById(`${e.streamid}`);
        let poster   = vedio.previousElementSibling;
        poster.style.display="none"
        vedio.style.display = "inline-block"
     };



    connection.onleave = function(event) {
        playAlert('morse')
        var remoteUserFullName = event.extra.fullName;
        toastr.warning(`${remoteUserFullName} leave now !`)
    };

     
    

    connection.onstreamended = function(event) {
        var mediaElement = document.getElementById(event.streamid);
        if (mediaElement) {
            mediaElement.parentNode.removeChild(mediaElement);
        }
    };

    // speaking
    connection.onspeaking = function (e) {
    
       // e.streamid, e.userid, e.stream, etc.
       let vedio    = document.getElementById(`${e.streamid}`);
       if(vedio){
        let parent   = vedio.parentElement
        parent.style.borderColor = ' red';
       }
    };


    connection.onsilence  = function (e) {
    
        // e.streamid, e.userid, e.stream, etc.
        let vedio    = document.getElementById(`${e.streamid}`);
        if(vedio){
            let parent   = vedio.parentElement
            parent.style.borderColor =  "#ccc";
        }
     };

        

    // init 
    function initHark(args) {
        if (!window.hark) {
            throw 'Please link hark.js';
            return;
        }
    
        var connection = args.connection;
        var streamedObject = args.streamedObject;
        var stream = args.stream;
    
        var options = {};
        var speechEvents = hark(stream, options);
    
        speechEvents.on('speaking', function() {
            connection.onspeaking(streamedObject);
        });
    
        speechEvents.on('stopped_speaking', function() {
            connection.onsilence(streamedObject);
        });
    
    
    }
   



    $("#btn ").click(function(){
      
       
    })


    // event muted
    $("#mute").click(function(){
        var _el = $(this)
        var localStream = connection.attachStreams[0];
        // console.log(connection.socket)
        // console.log('ss',localStream)
        if(_el.data('type') == "muted")
        {
            if( connection.socket && localStream ){
                localStream.mute("vedio");
                connection.socket.emit("mount-action",{streamid,type:"munte"})
                // connection.StreamsHandler.onSyncNeeded(streamid, 'mute', 'both');
                _el.data("type","unmuted")
                _el.html(`<span ><i class="fas fa-video"></i></span>`)
            }

        }
        else{
           
            localStream.unmute("vedio");
            // connection.socket.emit(`chat_unmute-${room_join}`, streamid)
            connection.socket.emit("mount-action",{streamid,type:"unmunte"})
            _el.html(`<span ><i class="fas fa-video-slash"></i></span>`)
            _el.data("type", "muted")
        }
       
       
    })

    

    connection.DetectRTC.load(function() {
        //test ==========

    //    console.log(connection.DetectRTC)
        if (connection.DetectRTC.hasMicrophone === true) {
            // enable microphone
            connection.mediaConstraints.audio = true;
            connection.session.audio = true;
        }
    
        if (connection.DetectRTC.hasWebcam === true) {
            // enable camera
            connection.mediaConstraints.video = true;
            connection.session.video = true;
        }
    
        if (connection.DetectRTC.hasMicrophone === false &&
            connection.DetectRTC.hasWebcam === false) {
            // he do not have microphone or camera
            // so, ignore capturing his devices
            connection.dontCaptureUserMedia = true;
        }
    
        if (connection.DetectRTC.hasSpeakers === false) { // checking for "false"
            alert('Please attach a speaker device. You will unable to hear the incoming audios.');
        }
    
        connection.openOrJoin(room_join, function (isRoomCreated, roomid, error) {
            if (isRoomCreated == false &&  error == "Room full") {
                sendChat.remove();
                alert("the room full ")
               
            }
        });
    })
    // connection.openOrJoin('your-room-id');

  

    connection.connectSocket(function() {
          // chat 
        connection.setCustomSocketEvent(`chat-${room_join}`);
        connection.setCustomSocketEvent(`chat_mute-${room_join}`);
        connection.setCustomSocketEvent(`chat_unmute-${room_join}`);
        connection.setCustomSocketEvent(`test`);
        // alert(`chat-${room_join}`)
        // console.log(`chat-${room_join}`)
        //event 
        connection.socket.on(`chat-${room_join}`, function(data) {
            appendMessage(data, false)
            play()
        });

        //mute event
        connection.socket.on(`chat_mute-${room_join}`, function(streamid) {
            connection.onmute(connection.streamEvents[streamid])
        });

        // unmute event
        connection.socket.on(`chat_unmute-${room_join}`, function(streamid) {
         
            connection.onunmute(connection.streamEvents[streamid])
        });

        connection.socket.on('mount-action', function({streamid, type}) {
            if(type == "munte")
            {
                if(connection.streamEvents[streamid])
                 connection.onmute(connection.streamEvents[streamid])
            }else{
                if(connection.streamEvents[streamid] )
                   connection.onunmute(connection.streamEvents[streamid])
            }

         });

        // event send essage
        sendChat.click(function(){
            if(message.val())
            {
                
                let dataSend = {
                    message:message.val(),
                    extre  :connection.extra
                }
                if(connection.socket)
                    connection.socket.emit(`chat-${room_join}`,dataSend );
                
                appendMessage(dataSend, true)
                message.val('')
            }
            
        })

        function appendMessage(data ,me = false)
        {
            let html = `
                <div  class=" message ${me ? 'right-msg' : 'left-msg'}">
                    <div claa="info">
                        <span class="img-user">
                            ${ !me ? "<img src='"+data.extre.photo+"' width='40' height='40' class=' rounded-circle'>"  : '' }
                        </span>
                        <span class="user_name">${data.extre.fullName}</span>
                    </div>
                    <p class="lead content">${data.message}</p>
                </div>
            `
            chat.append(html);
            playAlert('pop')    
            chat.scrollTop($('#chat-message')[0].scrollHeight);
        }

    });


    function play() {
        
        // sound.currentTime = 0;
        // sound.play();
    }

    $("#fullscreen").click(function(){
        var video = remote.find("video").get()[0]
        console.log(video)
        // v.requestFullscreen();
        if(video.requestFullScreen){
            video.requestFullScreen();
        } else if(video.webkitRequestFullScreen){
            video.webkitRequestFullScreen();
        } else if(video.mozRequestFullScreen){
            video.mozRequestFullScreen();
        }
    })
   
    
    

})