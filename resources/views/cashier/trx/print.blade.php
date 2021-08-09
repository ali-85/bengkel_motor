@extends('layouts.dashboard')
@section('title')
    Print Transaction
@endsection
@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('body-title')
    Print Transaction   
@endsection
@section('content')
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="page-header">
            <i class="fas fa-globe"></i> Bengkel, Inc.
            <small class="float-right">Date : {{  date('d-F-Y') }}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Bengkel, Inc.</strong><br>
            Jln.Pangkal Perjuangan<br>
            By.Pass<br>
            Phone: (088) 222 - 222<br>
            Email: smkn1karawang@sch.id
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          @foreach ($trx as $row)
          <address>
            <strong>{{$row->customer}}</strong><br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #IN-{{ date('my') }}-{{ rand(01,999) }}</b><br>
          <br>
            <b>Order ID:</b> {{ $row->order_id }}<br>
            <b>Kasir:</b> {{ Auth::user()->name }}<br>
        </div>
        <!-- /.col -->
      </div>
      @endforeach
      <!-- /.row -->
  
      <!-- Table row -->
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Qty</th>
              <th>Part</th>
              <th>Vehicle Number </th>
              <th>Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($trx as $row)
                @foreach ($row->part as $get)
                    <tr>
                        <td>1</td>
                        <td>{{ $get->title }}</td>
                        <td>{{ $row->serial }}</td>
                        <td>@rupiah($get->price)</td>
                    </tr>
                    @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  
      <div class="row">
        <!-- /.col -->
        <div class="col-6">
  
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Total:</th>
                <td>@rupiah($row->part->sum('price'))</td>
              </tr>
          @endforeach
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
</div>
    <!-- /.content -->
  </div>
  <!-- ./wrapper -->
@endsection
@section('script')
    <script type="text/javascript"> 
        window.addEventListener("load", window.print());
    </script>
@endsection