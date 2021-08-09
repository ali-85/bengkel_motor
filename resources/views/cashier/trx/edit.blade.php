@extends('layouts.dashboard')
@section('title')
    Edit Transaction
@endsection
@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">   
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('body-title')
    Edit transaction   
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit Transaction</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @foreach ($trx as $row)
                <form role="form" action="{{ route('update.trx') }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                  <div class="card-body">
                    <input type="hidden" name="id" value="{{ $row->id }}">
                    <div class="form-group">
                      <label for="customerName">Customer Name</label>
                        <input type="text" class="form-control" id="customerName" name="customer" placeholder="Enter Customer Name" value="{{ $row->customer }}">
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="vehicleNumber">Vehicle Number</label>
                            <input type="text" class="form-control" id="vehicleNumber" name="serial" placeholder="Vehicle Number" value="{{ $row->serial }}">
                        </div>
                        <div class="col-lg-6">
                            <label for="Brand">Brand</label>
                            <input type="text" class="form-control" id="Brand" name="type" placeholder="Motocycle Brand" value="{{ $row->type }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Spare Part</label>
                        <select class="select2" name="part[]" multiple="multiple" data-placeholder="Which Part?" style="width: 100%;">
                            @foreach ($part as $prt)
                                @foreach (unserialize($row->part) as $item)
                                    <option 
                                    @if ($prt->id_part == $item->id_part)
                                        {{ 'selected' }}
                                    @endif 
                                @endforeach value="{{ $prt->id_part }}">{{ $prt->title }} - @rupiah($prt->price)</option>
                            @endforeach
                        </select>
                      </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
                @endforeach
              </div>
              <!-- /.card -->
        </div>
    </div>
@endsection