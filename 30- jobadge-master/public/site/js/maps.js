
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
            },
            zoom: 15
        });
        var marker = new google.maps.Marker({
            position: {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
            },
            map: map,
            draggable: true
        });
        $('#lat').val(position.coords.latitude);
        $('#lng').val(position.coords.longitude);

        // var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
        // google.maps.event.addListener(searchBox, 'places_changed', function() {
        //     var places = searchBox.getPlaces();
        //     var bounds = new google.maps.LatLngBounds();
        //     var i, place;
        //     for (i = 0; place = places[i]; i++) {
        //         console.log(place); //set marker position new...
        //     }
        //     map.fitBounds(bounds);
        //     map.setZoom(15);
        // });

        google.maps.event.addListener(marker, 'position_changed', function () {
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $('#lat').val(lat);
            $('#lng').val(lng);
        });
    }, function (error) {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 30.06263,
                lng: 31.24967,
            },
            zoom: 15
        });
        var marker = new google.maps.Marker({
            position: {
                lat: 30.06263,
                lng: 31.24967,
            },
            map: map,
            draggable: true
        });
        $('#lat').val(30.06263);
        $('#lng').val(31.24967);

        // var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
        // google.maps.event.addListener(searchBox, 'places_changed', function() {
        //     var places = searchBox.getPlaces();
        //     var bounds = new google.maps.LatLngBounds();
        //     var i, place;
        //     for (i = 0; place = places[i]; i++) {
        //         console.log(place); //set marker position new...
        //     }
        //     map.fitBounds(bounds);
        //     map.setZoom(15);
        // });

        google.maps.event.addListener(marker, 'position_changed', function () {
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $('#lat').val(lat);
            $('#lng').val(lng);
        });
    });
}