@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-4">
        <h1 class="h3 mb-0 text-gray-800 mt-2">Tambah Item Details</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{route('itemDetails.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" required class="form-control">
                            <option value="OTOMOTIF">OTOMOTIF</option>
                            <option value="CLOTHES">CLOTHES</option>
                            <option value="GAME">GAME</option>
                            <option value="SHOES">SHOES</option>    
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="item_name">NAMA BARANG</label>
                        <input type="text" class="form-control" name="item_name" placeholder="NAMA BARANG" value="{{ old('item_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="d-block w-100 form-control" rows="10">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="QTY" >QUANTITY</label>
                        <input type="number" class="form-control" name="QTY" placeholder="Quantity" value="{{ old('QTY') }}">
                    </div>
                    <div class="form-group">
                        <label for="harga">HARGA</label>
                        <input type="number" class="form-control" name="harga" placeholder="Harga" value="{{ old('harga') }}">
                    </div>
                    <div class="form-group">
                        <label for="diskon">DISKON</label>
                        <input type="number" class="form-control" name="diskon" placeholder="Diskon" value="{{ old('diskon') }}">
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>    
@endsection