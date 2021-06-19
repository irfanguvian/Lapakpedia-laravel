@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
    
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 mt-2">Gallery</h1>
            <a href="{{route('gallery.create')}}" class="btn btn-sm btn-primary shadow-sm mt-2">
               <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Photo
            </a>
            </div>
        
            <div class="row">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width ="100%">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Photo Orders</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>
                                    <td>{{ $item->item_details->item_name}}</td>
                                    <td>ke-{{ $item->photo_orders }}</td>
                                    <td><img src="{{ Storage::url($item->image)}}"  style=" width : 150px" class="img-thumbnail" alt="gambar"></td>
                                    <td>
                                        <a href="{{route('gallery.edit',$item->id)}}" class="btn btn-info">
                                             <i class="fa  fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{route('gallery.destroy',$item->id)}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                         </form>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <th colspan="7" class ="text-center">
                                            data kosong
                                        </th>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
        </div>
    </section>
</div>
@endsection