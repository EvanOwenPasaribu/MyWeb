@extends("layouts.app")

@push('list')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
@endpush

@section('main')
<div class="main-content">
    <section class="section mt-4 list-user-section">
        <div class="list-user-title mb-4">
            <h4>List Data Pengguna</h4>
        </div>
        <div class="tabel-user">
            <table id="listing_user" class="display list-user" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Nomor HP</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
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
            url: "/listUser",
            type:"POST",
            data:{
                _token: _token
            },
            success: function(data) {
                for (var i = 0, len = data.length; i < len; i++) {
                    var nama = data[i].nama;
                    var email = data[i].email;
                    var nomor_hp = (data[i].id);
                    var jenis_kelamin = "Wanita"
                    if (data[i].jenis_kelamin == "1") {
                        jenis_kelamin = "Pria"
                    }
                    var alamat = (data[i].alamat);
                    arrayReturn.push([i + 1, nama, email, nomor_hp, jenis_kelamin, alamat]);
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
            $('#listing_user').DataTable({
                "aaData": data,
                "dom": 'lBfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    text: 'Export Ke Excel',
                    title: 'Data Pengguna ' + today,
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