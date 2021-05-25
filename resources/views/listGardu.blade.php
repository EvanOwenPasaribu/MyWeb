@extends("layouts.app")

@push('list')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
@endpush

@section('main')
    <div class="main-content">
        <section class="section mt-4 list-gardu-section">
            <div class="list-gardu-title mb-4">
                <h4>List Data Gardu</h4>
            </div>
            <div class="gardu_table">
                <table id="listing_gardu" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode</th>
                            <th>Lat</th>
                            <th>Long</th>
                            <th>Alamat</th>
                            <th>Daya</th>
                            <th>Penyulang</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </section>
    </div>
@endsection

@push('main') 
<script type="text/javascript">
    var _token   = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function() {
        var arrayReturn = [];
        $.ajax({
            url: "/listGardu",
            type:"POST",
            data:{
                _token: _token
            },
            success: function(data) {
                console.log(data[0]);
                for (var i = 0, len = data.length; i < len; i++) {
                    var kode = data[i].kode;
                    var lat = data[i].lat;
                    var long = data[i].long;
                    var alamat = data[i].alamat;
                    var daya = data[i].daya;
                    var penyulang = data[i].penyulang;
                    arrayReturn.push([i + 1,kode ,lat, long, alamat, daya, penyulang]);
                }
                inittable(arrayReturn);
            }
        });

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();
        today = dd + '-' + mm + '-' + yyyy;

        function inittable(data) {
            $('#listing_gardu').DataTable({
                "aaData": data,
                "dom": 'lBfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    text: 'Export Ke Excel',
                    title: 'Data Gardu ' + today,
                    download: 'open',
                    orientation: 'landscape',
                    exportOptions: {
                        columns: ':visible'
                    }
                }]
            });
        }
    })
</script>
@endpush