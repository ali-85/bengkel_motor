@extends('layouts.dashboard')
@section('title')
    List Part
@endsection
@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('body-title')
    Part   
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
        <button data-toggle="modal" data-target="#addModal" class="btn btn-success">Add New Part</button>
    </div>
    <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($part as $row)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $row->title }}</td>
                        <td>@rupiah($row->price)</td>
                        <td>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#editModal" class="edit-user" data-id="{{ $row->id }}">Edit</a> |
                            <a href="{{ route('delete.part',['id' => $row->id]) }}" onclick="return confirm('Are You sure delete this part?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
        <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item">{{ $part->links() }}</li>
        </ul>
    </div>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Part</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('post.part') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Part">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="price" placeholder="Price">
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add new part</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Part</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update.part')}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Part">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="price" name="price" placeholder="Price">
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Part</button>
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
            $('#id').val("");
            $('#title').val("");
            $('#price').val("");
            $.ajax({
                type:'GET',
                url:"part/edit/"+id,
                data:{'id_part':id},
                dataType: 'json',
                success:function(data){
                    $('#id').val(data.id);
                    $('#title').val(data.title);
                    $('#price').val(data.price);
                }
            });
        });
    });
    </script>
@endsection