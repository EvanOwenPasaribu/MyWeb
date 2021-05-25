@extends("layouts.app")

@push('style')
    <link rel="stylesheet" href="{{asset('css/validation-form.css')}}">
@endpush

@section('main')
<div class="main-content">
    <section class="section mt-4 input-pengukuran-section">
      <div class="card">
        <form method="" action="">
          <div class="card-header">
            <h4>Input Pengukuran</h4>
          </div>
          <div class="row">
            <div class="col-md-6 wrap-satu">
              <div class="card-body">
                <div class="form-group">
                  <label>Kode Gardu Trafo</label>
                  <input type="text" class="form-control" id="kode" name="kode">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <div class="invalid-input">Error message</div>
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" class="form-control" id="tanggal" name="tanggal">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <div class="invalid-input">Error message</div>
                </div>
                <div class="form-group">
                  <label>Waktu</label>
                  <input type="time" class="form-control" id="waktu" name="waktu">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <div class="invalid-input">Error message</div>
                </div>
                <div class="form-group">
                  <label>TIM</label>
                  <input type="text" class="form-control" id="tim" name="tim">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <div class="invalid-input">Error message</div>
                </div>
                <div class="form-group">
                  <label>Daya Trafo</label>
                  <input type="text" class="form-control" id="daya" name="daya">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <div class="invalid-input">Error message</div>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" id="alamat" name="alamat">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <div class="invalid-input">Error message</div>
                </div>

                <div class="form-group">
                  <label>Induk N</label>
                  <input type="text" class="form-control" id="indukN" name="indukN">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <div class="invalid-input">Error message</div>
                </div>

                <!-- Jurusan A -->
                <div class="form-group">
                  <label>Jurusan A</label>
                  <input type="text" class="form-control" id="jurusanA" name="jurusanA">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <div class="invalid-input">Error message</div>
                </div>
                <div class="row wrap-dua-A">
                  <div class="form-group col-md-6">
                    <label>A Jurusan R</label>
                    <input type="text" class="form-control" id="jurusanAR" name="jurusanAR">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <div class="invalid-input">Error message</div>
                  </div>
                  <div class="form-group col-md-6">
                    <label>A Jurusan S</label>
                    <input type="text" class="form-control" id="jurusanAS" name="jurusanAS">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <div class="invalid-input">Error message</div>
                  </div>
                  <div class="form-group col-md-6">
                    <label>A Jurusan T</label>
                    <input type="text" class="form-control" id="jurusanAT" name="jurusanAT">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <div class="invalid-input">Error message</div>
                  </div>
                  <div class="form-group col-md-6">
                    <label>A Jurusan N</label>
                    <input type="text" class="form-control" id="jurusanAN" name="jurusanAN">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <div class="invalid-input">Error message</div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-md-6 wrap-dua">
              <div class="card-body">
                <!-- Jurusan B -->
                <div class="form-group">
                  <label>Jurusan B</label>
                  <input type="text" class="form-control" id="jurusanB" name="jurusanB">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <div class="invalid-input">Error message</div>
                </div>

                <div class="row wrap-dua-A">
                  <div class="form-group col-md-6">
                    <label>B Jurusan R</label>
                    <input type="text" class="form-control" id="jurusanBR" name="jurusanBR">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <div class="invalid-input">Error message</div>
                  </div>
                  <div class="form-group col-md-6">
                    <label>B Jurusan S</label>
                    <input type="text" class="form-control" id="jurusanBS" name="jurusanBS">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <div class="invalid-input">Error message</div>
                  </div>
                  <div class="form-group col-md-6">
                    <label>B Jurusan T</label>
                    <input type="text" class="form-control" id="jurusanBT" name="jurusanBT">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <div class="invalid-input">Error message</div>
                  </div>
                  <div class="form-group col-md-6">
                    <label>B Jurusan N</label>
                    <input type="text" class="form-control" id="jurusanBN" name="jurusanBN">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <div class="invalid-input">Error message</div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Jurusan C</label>
                  <input type="text" class="form-control" id="jurusanC" name="jurusanC">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <div class="invalid-input">Error message</div>
                </div>

                <!-- Jurusan C -->
                <div class="row wrap-dua-A">
                  <div class="form-group col-md-6">
                    <label>C Jurusan R</label>
                    <input type="text" class="form-control" id="jurusanCR" name="jurusanCR">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <div class="invalid-input">Error message</div>
                  </div>
                  <div class="form-group col-md-6">
                    <label>C Jurusan S</label>
                    <input type="text" class="form-control" id="jurusanCS" name="jurusanCS">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <div class="invalid-input">Error message</div>
                  </div>
                  <div class="form-group col-md-6">
                    <label>C Jurusan T</label>
                    <input type="text" class="form-control" id="jurusanCT" name="jurusanCT">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <div class="invalid-input">Error message</div>
                  </div>
                  <div class="form-group col-md-6">
                    <label>C Jurusan N</label>
                    <input type="text" class="form-control" id="jurusanCN" name="jurusanCN">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <div class="invalid-input">Error message</div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Tegangan RS</label>
                  <input type="text" class="form-control" id="teganganRS" name="teganganRS">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <div class="invalid-input">Error message</div>
                </div>

                <div class="form-group">
                  <label>Tegangan RT</label>
                  <input type="text" class="form-control" id="teganganRT" name="teganganRT">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <div class="invalid-input">Error message</div>
                </div>

                <div class="form-group">
                  <label>Tegangan ST</label>
                  <input type="text" class="form-control" id="teganganST" name="teganganST">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <div class="invalid-input">Error message</div>
                </div>

                <div class="form-group">
                  <label>Tegangan RN</label>
                  <input type="text" class="form-control" id="teganganRN" name="teganganRN">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <div class="invalid-input">Error message</div>
                </div>

                <div class="form-group">
                  <label>Tegangan SN</label>
                  <input type="text" class="form-control" id="teganganSN" name="teganganSN">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <div class="invalid-input">Error message</div>
                </div>

                <div class="form-group">
                  <label>Tegangan TN</label>
                  <input type="text" class="form-control" id="teganganTN" name="teganganTN">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <div class="invalid-input">Error message</div>
                </div>

              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <button type="button" class="btn btn-primary" id="submit-pengukuran">Simpan</button>
          </div>
        </form>
      </div>
    </section>
  </div>

@endsection