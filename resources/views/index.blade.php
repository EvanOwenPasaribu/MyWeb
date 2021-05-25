@extends("layouts.app")

@section('main')
<div class="main-content">
    <section class="section mt-4 dashboard-section">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <a href="list_data_gardu.php">
            <div class="card card-statistic data-gardu bg-shadow">
              <h3>Gardu</h3>
              <div class="box-content">
                <div class="card-wrap">
                  <div class="sum-data">
                    {{count($locations)}}
                  </div>
                  <div class="tanggal data">
                    13-Apr-21
                  </div>
                </div>
                <div class="card-icon">
                  <i class="fas fa-bolt statistic-icon"></i>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4">
          <a href="list_data_pengukuran.php">
            <div class="card card-statistic data-pengukuran">
              <h3>Pengukuran</h3>
              <div class="box-content">
                <div class="card-wrap">
                  <div class="sum-data">
                    {{$sum_pengukuran}}
                  </div>
                  <div class="tanggal data">
                    13-Apr-21
                  </div>
                </div>
                <div class="card-icon">
                  <i class="fas fa-weight-hanging statistic-icon"></i>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4">
          <a href="list_data_user.php">
            <div class="card card-statistic data-pengguna">
              <h3>Pengguna</h3>
              <div class="box-content">
                <div class="card-wrap">
                  <div class="sum-data">
                    {{$sum_user}}
                  </div>
                  <div class="tanggal data">
                    13-Apr-21
                  </div>
                </div>
                <div class="card-icon">
                  <i class="fas fa-users statistic-icon"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div id="map"></div>    

    </section>
  </div>

@endsection

@push('main')
  <script>
    var map;
    var marker;
    var infowindow;
    var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
    var purple_icon =  'http://maps.google.com/mapfiles/ms/icons/purple-dot.png' ;
    var locations = [];
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
                position: new google.maps.LatLng(locations[i][0], locations[i][1]),
                map: map,
                icon : red_icon,
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
@endpush