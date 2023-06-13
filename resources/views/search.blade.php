<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Google Autocomplete Address Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
  
<body>
    <div class="container mt-5">
        <h2>Laravel Google Autocomplete Address Example</h2>
  
        <div class="form-group">
            <label>Location/City/Address</label>
            <input type="text" name="autocomplete" id="location_input" value="Ludhiana, Punjab, India" class="form-control" placeholder="Choose Location">
        </div>
  
        <div class="form-group" id="latitudeArea">
            <label>Latitude</label>
            <input type="text" id="latitude" name="latitude" class="form-control">
        </div>
  
        <div class="form-group" id="longtitudeArea">
            <label>Longitude</label>
            <input type="text" name="longitude" id="longitude" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <div id="map" style="height: 400px;"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFD41Eo74QOEdWplQb3vFNlpWRQYHiqtM&libraries=places"></script>
    <script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', function () {
        var mapOptions = {
            center: { lat: 0, lng: 0 },
            zoom: 12
        };
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        var marker;

        var places = new google.maps.places.Autocomplete(document.getElementById('location_input'));
        google.maps.event.addListener(places, 'place_changed', function () {
            var place = places.getPlace();
            var lat = place.geometry.location.lat();
            var lng = place.geometry.location.lng();
            console.log("Latitude: " + lat);
            console.log("Longitude: " + lng);

            // Clear the previous marker, if any
            if (marker) {
                marker.setMap(null);
            }

            marker = new google.maps.Marker({
                position: { lat: lat, lng: lng },
                map: map,
                title: place.name
            });

            map.setCenter(marker.getPosition());

            // Add click event listener to the marker
            marker.addListener('click', function() {
                // Perform the desired action when the marker is clicked
                console.log("Marker clicked!");
                // Add your code here to handle the marker click event
            });
        });

        // Show the map without any marker at the default center
        map.setCenter(mapOptions.center);
        
    });
</script>


</body>
</html>