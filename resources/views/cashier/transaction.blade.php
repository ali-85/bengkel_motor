@extends('layouts.dashboard')
@section('title')
    Transaction
@endsection
@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('body-title')
    transaction   
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('success') }}
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
            @endif
            @if(count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            </div>
        </div>
        <div class="row mb-3">
            <a href="{{ route('add.trx') }}" class="btn btn-success">Add Transaction</a>
        </div>
        <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Order Id</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Serial Number</th>
                            <th scope="col">Motocycle type</th>
                            <th scope="col">Part</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trx as $row)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <th scope="row">{{ $row->order_id }}</th>
                            <td>{{ $row->customer }}</td>
                            <td>{{ $row->serial }}</td>
                            <td>{{ $row->type }}</td>
                            <td>
                                <ul class="list-group">
                                    @foreach ($row->part as $part)
                                    <li class="list-group-item"> {{ $part['title'] }}  <b>@rupiah($part->price)</b></li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                @rupiah($row->part->sum('price'))
                            </td>
                            <td>
                                <a href="{{ route('print.trx',['id' => $row->id]) }}" target="_blank">Print</a> |
                                <a href="{{ route('edit.trx',['id' => $row->id]) }}">Edit</a> | 
                                <a href="{{ route('delete.trx',['id' => $row->id]) }}" onclick="return confirm('are you sure to delete this data?')">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item">{{ $trx->links() }}</li>
            </ul>
        </div>
    </div>
@endsection