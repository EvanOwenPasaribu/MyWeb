<?php
include(app_path().'/includes/locations_model.php');
?>

<!------ Include the above in your HEAD tag ---------->
<script>
    var map;
    var marker;
    var infowindow;
    var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
    var purple_icon =  'http://maps.google.com/mapfiles/ms/icons/purple-dot.png' ;
    // var locations = <?php get_all_locations() ?>;

    function initMap() {
        var indo= {lat: 3.595311171263469, lng: 98.67124943065626};
        infowindow = new google.maps.InfoWindow();
        map = new google.maps.Map(document.getElementById('map'), {
            center: indo,
            zoom: 14
        });

        var i;
        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                icon : red_icon,
                html: "    <div>\n" +
                    "        <table class=\"map1\">\n" +
                    "            <tr>\n" +
                    "                <td><a>Kode Gardu Trafou:</a></td>\n" +
                    "                <td><input type='text' id='kode' value='" + locations[i][3] + "'></td>\n </tr>" +
                    "            <tr>\n" +
                    "                <td><a>Alamat Gardu Trafo:</a></td>\n" +
                    "                <td><input type='text' id='alamat' value='" + locations[i][4] + "'></td>\n </tr>" +                    
                    "             <tr>\n" +
                    "                <td><a>Daya Gardu Trafo:</a></td>\n" +
                    "                <td><input type='number' id='daya' value='" + locations[i][5] + "' min='0'></td>\n </tr>" +
                    "             <tr>\n" +
                    "                <td><a>Penyulang Gardu Trafo:</a></td>\n" +
                    "                <td><input type='text' id='penyulang' value='" + locations[i][6] + "'></td>\n </tr>" +            
                    "        </table>\n" +
                    "    </div>"
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(marker.html);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyA-AB-9XZd-iQby-bNLYPFyb0pR2Qw3orw&callback=initMap">
</script>