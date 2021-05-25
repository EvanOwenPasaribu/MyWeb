@extends("layouts.app")

@section('main')
<div class="main-content">  
    <section class="section mt-4 input-gardu-section">
      <div class="map-input">
        <div id="map-input"></div>
      </div>
    </section>
  </div>
@endsection

@push('main')
<script>
    var infowindow;
    var map;
    var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
    var purple_icon =  'http://maps.google.com/mapfiles/ms/icons/purple-dot.png' ;
    var locations = []
    @foreach($locations as $loc)
      var temp = []
      temp.push("{{$loc['lat']}}");
      temp.push("{{$loc['long']}}");
      temp.push("{{$loc['kode']}}");
      temp.push("{{$loc['alamat']}}");
      temp.push("{{$loc['daya']}}");
      temp.push("{{$loc['penyulang']}}");
      locations.push(temp)
    @endforeach
    var myOptions = {
        zoom: 14,
        center: new google.maps.LatLng(3.595311171263469, 98.67124943065626),
        mapTypeId: 'roadmap'
    };
    map = new google.maps.Map(document.getElementById('map-input'), myOptions);
    var markers = {};

    var getMarkerUniqueId= function(lat, lng) {
        return lat + '_' + lng;
    };

    var getLatLng = function(lat, lng) {
        return new google.maps.LatLng(lat, lng);
    };

    var addMarker = google.maps.event.addListener(map, 'click', function(e) {
        var lat = e.latLng.lat();
        var lng = e.latLng.lng();
        var markerId = getMarkerUniqueId(lat, lng);
        var marker = new google.maps.Marker({
            position: getLatLng(lat, lng),
            map: map,
            animation: google.maps.Animation.DROP,
            id: 'marker_' + markerId,
            html: "    <div id='info_"+markerId+"'>\n" +
            "        <table class=\"map1\">\n" +
            "            <tr>\n" +
            "                <td><a>Kode Gardu Trafo:</a></td>\n" +
            "                <td><input type='text' id='kode'></td>\n </tr>" +
            "            <tr>\n" +
            "                <td><a>Alamat Gardu Trafo:</a></td>\n" +
            "                <td><input type='text' id='alamat'></td>\n </tr>" +                    
            "             <tr>\n" +
            "                <td><a>Daya Gardu Trafo:</a></td>\n" +
            "                <td><input type='number' id='daya' min='0'></td>\n </tr>" +
            "             <tr>\n" +
            "                <td><a>Penyulang Gardu Trafo:</a></td>\n" +
            "                <td><input type='text' id='penyulang'></td>\n </tr>" +            
            "            <tr><td></td><td><input type='button' value='Save' onclick='saveData("+lat+","+lng+")'/></td></tr>\n" +
            "        </table>\n" +
            "    </div>"
        });
        markers[markerId] = marker;
        bindMarkerEvents(marker);
        bindMarkerinfo(marker);
    });

    var bindMarkerinfo = function(marker) {
        google.maps.event.addListener(marker, "click", function (point) {
            var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
            var marker = markers[markerId];
            infowindow = new google.maps.InfoWindow();
            infowindow.setContent(marker.html);
            infowindow.open(map, marker);
            // removeMarker(marker, markerId); // remove it
        });
    };

    var bindMarkerEvents = function(marker) {
        google.maps.event.addListener(marker, "rightclick", function (point) {
            var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
            var marker = markers[markerId]; // find marker
            removeMarker(marker, markerId); // remove it
        });
    };

    var removeMarker = function(marker, markerId) {
        marker.setMap(null); // set markers setMap to null to remove it from map
        delete markers[markerId]; // delete marker instance from markers object
    };

    var confirmed = 0;
    generate_map()
    function generate_map(){
        for (var i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][0], locations[i][1]),
                map: map,
                icon :  red_icon,
                html: "    <div>\n" +
                "        <table class=\"map1\">\n" +
                "            <tr>\n" +
                "                <td><a>Kode Gardu Trafou:</a></td>\n" +
                "                <td><input type='text' id='kode' value='" + locations[i][2] + "'></td>\n </tr>" +
                "            <tr>\n" +
                "                <td><a>Alamat Gardu Trafo:</a></td>\n" +
                "                <td><input type='text' id='alamat' value='" + locations[i][3] + "'></td>\n </tr>" +                    
                "             <tr>\n" +
                "                <td><a>Daya Gardu Trafo:</a></td>\n" +
                "                <td><input type='number' id='daya' value='" + locations[i][4] + "' min='0'></td>\n </tr>" +
                "             <tr>\n" +
                "                <td><a>Penyulang Gardu Trafo:</a></td>\n" +
                "                <td><input type='text' id='penyulang' value='" + locations[i][5] + "'></td>\n </tr>" +            
                "        </table>\n" +
                "    </div>"
            });

            // bindMarkerinfo(marker);

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow = new google.maps.InfoWindow();
                    infowindow.setContent(marker.html);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }

    function saveData(lat,long) {
        var kode = $('#kode').val().trim()
        var alamat = $('#alamat').val().trim()
        var daya = $('#daya').val().trim()
        var penyulang = $('#penyulang').val().trim()
        var _token   = $('meta[name="csrf-token"]').attr('content');

        if(kode != "" && alamat != "" && penyulang != "" && daya != "") {
            locations.push([lat,long,kode,alamat,daya,penyulang]);
            $.ajax({
                url: "/addGardu",
                type:"POST",
                data:{
                    kode:kode,
                    alamat:alamat,
                    daya:daya,
                    penyulang:penyulang,
                    lat:lat,
                    long:long,
                    _token:_token
                },
                success:function(response){
                console.log(response);
                if(response) {
                    set(lat, long)
                }
                },
            });
        }else {
            swal("", "Input Data Masing Ada Yang Kosong" , "error");
        }
    }

    function set(lat, long){
        var markerId = getMarkerUniqueId(lat,long);
        var manual_marker = markers[markerId];
        manual_marker.setIcon(red_icon);
        infowindow.close();
        infowindow.setContent("<div style=' color: purple; font-size: 25px;'> lokasi Sudah Tersimpan!!</div>");
        infowindow.open(map, manual_marker);
        console.log(locations);
        generate_map()
    }

</script>

@endpush