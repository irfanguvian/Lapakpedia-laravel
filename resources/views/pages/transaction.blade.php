@extends('layouts.transaction')
@section('title')
    Transaction Page
@endsection

@section('content')
<main>
  <div class="container">
    <h1>Transaksi</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
  @endif
    <form action="{{route('transaction.store')}}" method="POST" id="form-transaksi">
      @csrf
      <input type="hidden" name="user_id" value="{{ $user }}">
      <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama Penerima</label>
        <div class="col-sm-10">
          <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="{{ old('nama') }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
          <textarea name="alamat" class="alamat" id="alamat" form="form-transaksi" placeholder="Alamat" value="{{ old('alamat') }}"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
        <div class="col-sm-10">
          <input type="text" name="provinsi" class="form-control" id="provinsi" placeholder="Provinsi" value="{{ old('provinsi') }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="kota" class="col-sm-2 col-form-label">Kota</label>
        <div class="col-sm-10">
          <input type="text" name="kota" class="form-control" id="kota" placeholder="Kota" value="{{ old('kota') }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="jasa_pengiriman" class="col-sm-2 col-form-label">Jasa Pengiriman</label>
        <div class="col-sm-10">
          <select name="jasa_pengiriman" class="custom-select mr-sm-2">
            <option selected value="JNE">JNE EXPRESS</option>
            <option value="TIKI">TIKI</option>
            <option value="J&T">J&T</option>
            <option value="PI">Pos Indonesia</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="pembayaran" class="col-sm-2 col-form-label">Pembayaran</label>
        <div class="col-sm-10">
          <select name="pembayaran" class="custom-select mr-sm-2">
            <option selected value="Kredit">Kartu Kredit</option>
            <option value="Transfer">Transfer</option>
            <option value="COD">Cash On delivery</option>
          </select>
        </div>
      </div>
      <div class="d-flex justify-content-end mt-5 mr-4">
      <button type="submit" class="btn btn-primary px-2 btn-kirim">Kirim</button>
      </div>
    </form>
  </div>
</main>
@endsection