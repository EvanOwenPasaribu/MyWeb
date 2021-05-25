@extends("layouts.app")

@push('style')
    <link rel="stylesheet" href="{{asset('css/validation-form.css')}}">
@endpush

@section('main')

<div class="main-content">  
    <section class="section mt-4 input-gardu-section">
      <div class="map-input">
      <div class="card">
      <!-- <form class="needs-validation" novalidate=""> -->
        <form method="" action="">
          <div class="card-header">
            <h4>Input Pengguna</h4>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" id="nama" name="nama">
              <i class="fas fa-check-circle"></i>
              <i class="fas fa-exclamation-circle"></i>
              <div class="invalid-input">Error message</div>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" id="email" name="email">
              <i class="fas fa-check-circle"></i>
              <i class="fas fa-exclamation-circle"></i>
              <div class="invalid-input">Error message</div>
            </div>
            <div class="form-group">
                <label>Nomor HP</label>
                <input type="number" class="form-control" id="nomorHp" name="nomorHp">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <div class="invalid-input">Error message</div>
              </div>               
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" id="lk" value="1" checked>
                <label class="form-check-label" for="lk">
                  Laki-Laki
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" id="pr" value="0">
                <label class="form-check-label" for="pr">
                  Perempuan
                </label>
              </div>
            </div>

            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat">
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="text" class="form-control" id="password" name="password">
              <i class="fas fa-check-circle"></i>
              <i class="fas fa-exclamation-circle"></i>
              <div class="invalid-input">Error message</div>
            </div>

          </div>
          <div class="card-footer text-right">
            <button type="button" class="btn btn-primary" id="submit-user">Simpan</button>
          </div>
        </form>

      </div>
      </div>
    </section>

@endsection