// Initialize Firebase
var config = {
    apiKey: "AIzaSyDkpMwX1WaT-oQNiIf15bqr_f62jYYlJ6Q",
    authDomain: "jobadge-237709.firebaseapp.com",
    databaseURL: "https://jobadge-237709.firebaseio.com",
    projectId: "jobadge-237709",
    storageBucket: "jobadge-237709.appspot.com",
    messagingSenderId: "878872054867"
};
firebase.initializeApp(config);
const messaging = firebase.messaging();

messaging.requestPermission()
    .then(function () {
        return messaging.getToken();
    })
    .then(function (token) {
        // console.log(token); // Display user token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'POST',
            data: { token: token },
        }).done(function (response) {
        });
    })
    .catch(function (err) { // Happen if user deney permission
        // $('#notification').slideUp();
        // $('#notify_head').html('JOBADGE');
        // $('#notify_body').html('You will not be notified!');
        // $('#notification').slideDown();
    });

messaging.onMessage(function (payload) {
    $('#notification').slideUp();
    $('#notify_head').html(payload.notification.title);
    $('#notify_body').html(payload.notification.body);
    $('#notification').slideDown();
})

// Callback fired if Instance ID token is updated.
messaging.onTokenRefresh(function () {
    messaging.getToken().then(function (refreshedToken) {
        console.log('Token refreshed.');
        // Indicate that the new Instance ID token has not yet been sent to the
        // app server.
        setTokenSentToServer(false);
        // Send Instance ID token to app server.
        sendTokenToServer(refreshedToken);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'POST',
            data: { token: refreshedToken },
        }).done(function (response) {
        });

    }).catch(function (err) {
        console.log('Unable to retrieve refreshed token ', err);
    });
});

//close notification bar
$('#notify_close').click(function () {
    $('#notification').slideUp();
});