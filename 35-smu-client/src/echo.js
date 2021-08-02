import Echo from 'laravel-echo'

window.pusher = require('pusher-js');


export default ({_,inject}) => {
    const echo = new Echo({
        broadcast: 'pusher',
        key: 'eBcuPKNWBnfYkZQae6kOTzskBEoOFv3VTr7hTQGlWAiliopM7iOpeSaKMIg2',
        wsHost: window.location.hostname,
        wsPort: 6001,
        forceTls: false,
        disableStats: true
    })

    inject('echo', echo)
}
