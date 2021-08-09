@extends('layouts.dashboard')
@section('title')
    Report Transaction
@endsection
@section('body-title')
    Report Transaction   
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
            <div class="col-lg-2">
                <a href="{{ route('export.trx') }}" class="btn btn-success">Export Excel</a>
            </div>
            <div class="col-lg-4 mx-auto">
                <form action="{{ route('search.trx') }}" method="get">
                    <div class="form-group">
                        <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Search">
                    </div>
                </form>
            </div>
            <div class="col-lg-2 ml-auto">
                <form action="{{ route('month.trx') }}" method="get">
                    <div class="form-group">
                        <select name="month" id="month" class="form-control" onchange="this.form.submit()">
                            <option selected disabled>-- Select month --</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Order Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Serial Number</th>
                            <th scope="col">Type /Brand</th>
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
                            <td>{{ $row->created_at->format('H:i:s') }} <br> {{ $row->created_at->format('d/m/Y') }}</td>
                            <td>{{ $row->customer }}</td>
                            <td>{{ $row->serial }}</td>
                            <td>{{ $row->type }}</td>
                            <td>
                                <ul class="list-group">
                                    @foreach (unserialize($row->part) as $part)
                                    <li class="list-group-item"> {{ $part['title'] }}  <b>@rupiah($part->price)</b></li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                @rupiah(unserialize($row->part)->sum('price'))
                            </td>
                            <td><a href="{{ route('dlte.trx',['id' => $row->id]) }}" class="badge badge-danger" onclick="return confirm('are you sure want delete this data?')">Delete</a></td>
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