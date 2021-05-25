@extends("layouts.app")

@push('list')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
@endpush

@section('main')
<div class="main-content">
    <section class="section mt-4 list-pengukuran-section">
        <div class="list-pengukuran-title mb-4">
            <h4>List Data Pengukuran</h4>
        </div>
        <div class="tabel-pengukuran">
            <table id="listing_pengukuran" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode</th>
                        <th>Tgl</th>
                        <th>Waktu</th>
                        <th>Tim</th>
                        <th>Alamat</th>
                        <th>IndukN</th>
                        <th>JurA</th>
                        <th>JurAR</th>
                        <th>JurAS</th>
                        <th>JurAT</th>
                        <th>JurAN</th>
                        <th>JurB</th>
                        <th>JurBR</th>
                        <th>JurBS</th>
                        <th>JurBT</th>
                        <th>JurBN</th>
                        <th>JurC</th>
                        <th>JurCR</th>
                        <th>JurCS</th>
                        <th>JurCT</th>
                        <th>JurCN</th>
                        <th>TgRS</th>
                        <th>TgRT</th>
                        <th>TgST</th>
                        <th>TgRN</th>
                        <th>TgSN</th>
                        <th>TgTN</th>
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
            url: "/listPengukuran",
            type:"POST",
            data:{
                _token: _token
            },
            success: function(data) {
                console.log("TRA" + data);      
                for (var i = 0, len = data.length; i < len; i++) {
                    var kode = data[i].kode;
                    var tanggal = data[i].tanggal;
                    var waktu = data[i].waktu;
                    var tim = data[i].tim;
                    var daya = (data[i].dayaGardu);
                    var alamat = (data[i].alamat);
                    var indukN = (data[i].indukN);
                    var jurusanA = (data[i].jurusanA);
                    var jurusanAR = (data[i].jurusanAR);
                    var jurusanAS = (data[i].jurusanAS);
                    var jurusanAT = (data[i].jurusanAT);
                    var jurusanAN = (data[i].jurusanAN);
                    var jurusanB = (data[i].jurusanB);
                    var jurusanBR = (data[i].jurusanBR);
                    var jurusanBS = (data[i].jurusanBS);
                    var jurusanBT = (data[i].jurusanBT);
                    var jurusanBN = (data[i].jurusanBN);
                    var jurusanC = (data[i].jurusanC);
                    var jurusanCR = (data[i].jurusanCR);
                    var jurusanCS = (data[i].jurusanCS);
                    var jurusanCT = (data[i].jurusanCT);
                    var jurusanCN = (data[i].jurusanCN);
                    var teganganRS = (data[i].teganganRS);
                    var teganganRT = (data[i].teganganRT);
                    var teganganST = (data[i].teganganST);
                    var teganganRN = (data[i].teganganRN);
                    var teganganSN = (data[i].teganganSN);
                    var teganganTN = (data[i].teganganTN);

                    arrayReturn.push([i + 1,kode,tanggal,waktu,tim,daya,alamat,
                    indukN,jurusanA,jurusanAR,jurusanAS,jurusanAT,jurusanAN,
                    jurusanB,jurusanBR,jurusanBS,jurusanBT,jurusanBN,
                    jurusanC,jurusanCR,jurusanCS,jurusanCT,jurusanCN,
                    teganganRS,teganganRT,teganganST,teganganRN,teganganSN,teganganTN]);
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
            $('#listing_pengukuran').DataTable({
                "aaData": data,
                "dom": 'lBfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    text: 'Export Ke Excel',
                    title: 'Data Pengukuran ' + today,
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