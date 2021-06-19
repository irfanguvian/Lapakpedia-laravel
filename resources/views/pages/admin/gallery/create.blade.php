@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-4">
        <h1 class="h3 mb-0 text-gray-800 mt-2">Tambah Photo Items</h1>
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
            <form action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="item_id">Item name</label>
                        <select name="item_id" required class="form-control">
                            <option value="">Pilih Item</option>
                            @foreach ($itemDetails as $item)
                                <option value="{{$item->id}}">{{$item->item_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="photo_orders">Photo Orders</label>
                        <select name="photo_orders" required class="form-control">
                            <option value="">Pilih Item</option>
                            @for ($i = 1; $i <= 4; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" placeholder="Masukan File">
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>    
@endsection