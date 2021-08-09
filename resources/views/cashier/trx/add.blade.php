@extends('layouts.dashboard')
@section('title')
    Transaction
@endsection
@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">   
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('body-title')
    add transaction   
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">New Transaction</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('insert.trx') }}" method="POST">
                    {{ csrf_field() }}
                  <div class="card-body">
                    <div class="form-group">
                      <label for="customerName">Customer Name</label>
                      <input type="text" class="form-control" id="customerName" name="customer" placeholder="Enter Customer Name">
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="vehicleNumber">Vehicle Number</label>
                            <input type="text" class="form-control" id="vehicleNumber" name="serial" placeholder="Vehicle Number">
                        </div>
                        <div class="col-lg-6">
                            <label for="Brand">Brand</label>
                            <input type="text" class="form-control" id="Brand" name="type" placeholder="Motocycle Brand">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Spare Part</label>
                        <select class="select2" name="part[]" multiple="multiple" data-placeholder="Which Part?" style="width: 100%;">
                            @foreach ($part as $row)
                                <option value="{{ $row->id_part }}">{{ $row->title }} - @rupiah($row->price)</option>
                            @endforeach
                        </select>
                      </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
        </div>
    </div>
@endsection