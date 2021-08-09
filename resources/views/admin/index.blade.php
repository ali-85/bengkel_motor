@extends('layouts.dashboard')
@section('title')
    Dashboard
@endsection
@section('body-title')
    Dashboard
@endsection
@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3>{{ $countrx }}</h3>
        
                        <p>Transactions</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                      <a href="{{ route('show.trx') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3>{{ $countuser }}</h3>
        
                        <p>Cashiers</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                      <a href="{{ route('admin.cashier') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3>{{ $countpart }}</h3>
        
                        <p>Parts</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-cog"></i>
                      </div>
                      <a href="{{ route('admin.part') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
            </div>
        </div>
    </section>
@endsection