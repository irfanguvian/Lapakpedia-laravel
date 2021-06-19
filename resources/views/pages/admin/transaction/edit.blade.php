@extends('layouts.admin')

@section('content')
<div class="content-wrapper">    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mt-2">Edit Item Details</h1>
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
            <form action="{{route('transaction-admin.update',$item->id)}}" method="POST">
                @method('PUT')
                @csrf
                <input type="hidden" name="user_id" value="{{$item->user_id}}">
                <input type="hidden" name="username" value="{{$item->username}}">
                <input type="hidden" name="items" value="{{$item->items}}">
                <input type="hidden" name="transaction_total" value="{{$item->transaction_total}}">
                <div class="form-group row">
                  <label for="transaction_status" class="col-sm-2 col-form-label">Status Pembayaran</label>
                  <div class="col-sm-10">
                    <select name="transaction_status" class="custom-select mr-sm-2">
                      <option value="Pending">Pending</option>
                      <option value="Success">Success</option>
                      <option value="Failed">Failed</option>
                    </select>
                  </div>
                </div>
                <div class="d-flex justify-content-end mt-5 mr-4">
                <button type="submit" class="btn btn-primary px-2 btn-kirim">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>    
@endsection