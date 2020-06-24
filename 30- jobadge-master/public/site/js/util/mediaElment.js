// __________________
// getHTMLMediaElement.js



function createVedio(event){
    if (!event.stream.isVideo) {
        return createAudio(event);
    }
    var existing    = document.getElementById(event.streamid),
        mediaStream = event.stream,
        mediaElement = document.createElement(event.stream.isVideo ? 'video' : 'audio');    

   
    if(existing && existing.parentNode) {
            existing.parentNode.removeChild(existing);
    }
    
    try {
        mediaElement.setAttributeNode(document.createAttribute('autoplay'));
        mediaElement.setAttributeNode(document.createAttribute('playsinline'));
        // mediaElement.setAttributeNode(document.createAttribute('controls'));
    } catch (e) {
        mediaElement.setAttribute('autoplay', true);
        mediaElement.setAttribute('playsinline', true);
        mediaElement.setAttribute('controls', false);
        
    }
    
    if(event.type === 'local') {
        mediaElement.volume = 0;
        try {
            mediaElement.setAttributeNode(document.createAttribute('muted'));
        } catch (e) {
            mediaElement.setAttribute('muted', true);
        }
    }

    if ('srcObject' in mediaElement) {
        mediaElement.srcObject = mediaStream;
    } else {
        mediaElement[!!navigator.mozGetUserMedia ? 'mozSrcObject' : 'src'] = !!navigator.mozGetUserMedia ? mediaStream : (window.URL || window.webkitURL).createObjectURL(mediaStream);
    }
    mediaElement.style.width="100%";
    mediaElement.style.maxWidth="100%";
    mediaElement.style.height="100%";
    mediaElement.style.maxHeight="100%";
    mediaElement.id = event.streamid;
   
    return mediaElement;
}


function createAudio(event){
    var mediaStream = event.stream,
        mediaElement = document.createElement('audio'),
        existing    = document.getElementById(event.streamid);

        if(existing && existing.parentNode) {
            existing.parentNode.removeChild(existing);
        }
    

        try {
            mediaElement.setAttributeNode(document.createAttribute('autoplay'));
            // mediaElement.setAttributeNode(document.createAttribute('controls'));
        } catch (e) {
            mediaElement.setAttribute('autoplay', true);
            mediaElement.setAttribute('controls', false);
        }

        if(event.type === 'local') {
            mediaElement.volume = 0;
            try {
                mediaElement.setAttributeNode(document.createAttribute('muted'));
            } catch (e) {
                mediaElement.setAttribute('muted', true);
            }
        }

        if ('srcObject' in mediaElement) {
            mediaElement.mediaElement = mediaStream;
        } else {
            mediaElement[!!navigator.mozGetUserMedia ? 'mozSrcObject' : 'src'] = !!navigator.mozGetUserMedia ? mediaStream : (window.URL || window.webkitURL).createObjectURL(mediaStream);
        }
        mediaElement.style.maxWidth="100%";
        mediaElement.id = event.streamid
        console.log(mediaElement)
    return mediaElement;
}