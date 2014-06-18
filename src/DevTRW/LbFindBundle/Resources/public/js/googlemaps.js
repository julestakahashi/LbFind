function initializeMapManager(dataSource) {
    var map;
    var geocoder;
    var mapOptions = {
        center: new google.maps.LatLng(39.397, -98.579),
        zoom: 4
    };

    function initialize() {
        geocoder   = new google.maps.Geocoder();
        map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
        google.maps.event.addListenerOnce(map, 'idle', drawLongboarderMap);
    }

    function codeAddress(longboarderInfo, length) {
        for (var i = 0; i < length ; i++){
            var address    = longboarderInfo.location;
            console.log(address);
            var discipline = longboarderInfo.discipline;
            var age        = longboarderInfo.age;
            var username   = longboarderInfo.username;
            var iContent   = "<h1>username</h1>" + "<br />" + "<h2>discipline</h2>" + "<h2>age</h2>";
//            console.log(longboarderInfo);
        }
        geocoder.geocode(
            { 'address': address},
            function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location


                    });
                    map.setCenter(results[0].geometry.location);
                } else {
                    //alert('Geocode was not successful for the following reason: ' + status);
                }
            }
        );
    }

    function drawLongboarderMap() {
        console.log('requesting longboarders from:', dataSource);

        $.getJSON(dataSource, function (result) {
            var longboarderInfo;
            var length = result.length;
            for (var i = 0; i < result.length; i++) {
                longboarderInfo = result[i];
                codeAddress(longboarderInfo, length);
//                console.log(longboarderInfo.username);
            }
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
}
