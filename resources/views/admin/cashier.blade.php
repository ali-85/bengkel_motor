@extends('layouts.dashboard')
@section('title')
    List Cashier
@endsection
@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('body-title')
    Cashier   
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
        <button data-toggle="modal" data-target="#addModal" class="btn btn-success">Add Cashier</button>
    </div>
    <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $row)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->username }}</td>
                        <td>
                            <img src="{{ url('img/'.$row->profile) }}" alt="profile" width="128" height="128">
                        </td>
                        <td>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#editModal" class="edit-user" data-id="{{ $row->id }}">Edit</a> |
                            <a href="{{ route('delete.cashier',['id' => $row->id]) }}" onclick="return confirm('Are You sure delete this user?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Cashier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('post.cashier') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="uname" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="profile" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="profile">Choose file</label>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Cashier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Cashier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update.cashier') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="uname" name="uname" placeholder="Username">
                        </div>
                        <input type="hidden" class="form-control" name="profile_name" id="profile_name">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="profile" id="profile" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="profile">Choose file</label>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Cashier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ url('js/app.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.edit-user').on('click',function(){
            const id = $(this).data('id');
            $('#name').val("");
            $('#uname').val("");
            $.ajax({
                type:'GET',
                url:"edit/"+id,
                data:{'id':id},
                dataType: 'json',
                success:function(data){
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#uname').val(data.username);
                    $('#profile_name').val(data.profile);
                }
            });
        });
    });
    </script>
@endsection