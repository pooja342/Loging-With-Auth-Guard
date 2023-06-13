<!DOCTYPE html>
<html>
<head>
    <title>Results</title>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="map"></div>
    <ul>
        @foreach ($results as $result)
            <li>{{ $result['name'] }} - {{ $result['formatted_address'] }}</li>
        @endforeach
    </ul>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXIPyXxfaxrHeB2cCqFsQ790RnwGF59uU&libraries=places"></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 8
            });

            var bounds = new google.maps.LatLngBounds();

            @foreach ($results as $result)
                var marker = new google.maps.Marker({
                    position: {lat: {{ $result['geometry']['location']['lat'] }}, lng: {{ $result['geometry']['location']['lng'] }}},
                    map: map,
                    title: "{{ $result['name'] }} - {{ $result['formatted_address'] }}"
                });
                bounds.extend(marker.getPosition());
            @endforeach

            map.fitBounds(bounds);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXIPyXxfaxrHeB2cCqFsQ790RnwGF59uU&callback=initMap"></script>
</body>
</html>





