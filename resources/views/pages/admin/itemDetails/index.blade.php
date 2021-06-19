@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
    
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 mt-2">Item Details</h1>
            <a href="{{route('itemDetails.create')}}" class="btn btn-sm btn-primary shadow-sm mt-2">
               <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Item
            </a>
            </div>
        
            <div class="row">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width ="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Nama Barang</th>
                                    <th>Quantity</th>
                                    <th>Harga</th>
                                    <th>Diskon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->category }}</td>
                                    <td>{{ $item->item_name }}</td>
                                    <td>{{ $item->QTY }}</td>
                                    <td>@rupiah($item->harga)</td>
                                    <td>{{ $item->diskon }}%</td>
                                    <td>
                                        <a href="{{route('itemDetails.edit',$item->id)}}" class="btn btn-info">
                                             <i class="fa  fa-pencil-alt"></i>
                                        </a>
                                         <form action="{{route('itemDetails.destroy',$item->id)}}" method="POST" class="d-inline">
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