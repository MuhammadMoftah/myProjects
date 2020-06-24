<script>
    var map = new google.maps.Map(document.getElementById('map-{{$branch->id}}'), {
        center: {
            lat: JSON.parse($('#lat_{{$branch->id}}').val()),
            lng: JSON.parse($('#lng_{{$branch->id}}').val()),
        },
        zoom: 15
    });
    var marker = new google.maps.Marker({
        position: {
            lat: JSON.parse($('#lat_{{$branch->id}}').val()),
            lng: JSON.parse($('#lng_{{$branch->id}}').val()),
        },
        map: map,
        draggable: true
    });

    var searchBox = new google.maps.places.SearchBox(document.getElementById('search_on_map_{{$branch->id}}'));
    google.maps.event.addListener(searchBox, 'places_changed', function() {
        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;
        for (i = 0; place = places[i]; i++) {
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location);
        }
        map.fitBounds(bounds);
        map.setZoom(15);
    });

    google.maps.event.addListener(marker, 'position_changed', function() {
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();
        $('#lat_{{$branch->id}}').val(lat);
        $('#lng_{{$branch->id}}').val(lng);
    });

    var searchBox = new google.maps.places.SearchBox(document.getElementById('search_on_map_{{$branch->id}}'));
    google.maps.event.addListener(searchBox, 'places_changed', function() {
        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;
        for (i = 0; place = places[i]; i++) {
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location);
        }
        map.fitBounds(bounds);
        map.setZoom(15);
    });

    google.maps.event.addListener(marker, 'position_changed', function() {
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();
        $('#lat_{{$branch->id}}').val(lat);
        $('#lng_{{$branch->id}}').val(lng);
    });
</script>