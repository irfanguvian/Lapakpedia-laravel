@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
    
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 mt-2">Transaction History</h1>
            </div>
        
            <div class="row">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width ="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User ID</th>
                                    <th>Username</th>
                                    <th>Items QTY</th>
                                    <th>Transaction Total</th>
                                    <th>Transaction Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user_id}}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->items }}</td>
                                    <td>@rupiah($item->transaction_total)</td>
                                    <td>{{ $item->transaction_status }}</td>
                                    <td>
                                        <a href="{{route('transaction-admin.edit',$item->id)}}" class="btn btn-info">
                                             <i class="fa  fa-pencil-alt"></i>
                                        </a>
                                         <form action="{{route('transaction-admin.destroy',$item->id)}}" method="POST" class="d-inline">
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