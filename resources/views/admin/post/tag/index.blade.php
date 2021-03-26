@extends('layouts.app')

@section('main-content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome User !</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Tags</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-10">
                    @include('validate')
                    <a class="btn btn-primary btn-sm" data-toggle="modal" href="#add_tag_modal">Add New Tag</a>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Tags</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Tag Name</th>
                                            <th>Slug</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($all_data as $data)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data ->slug}}</td>
                                            <td>
                                                <div class="form-group">
                                                @if($data->status == 1)
                                                        <a href="{{route('tag.unpublished',$data->id)}}" class="btn btn-sm btn-success">Published</a>
                                                    @else
                                                        <a href="{{route('tag.published',$data->id)}}" class="btn btn-sm btn-danger">UnPublished</a>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <a id="tag" edit_id="{{$data->id}}" data-toggle="modal" href="#edit_tag_modal" class="btn btn-primary btn-sm">Edit</a>
                                                <form style="display:inline;" action="{{route('tag.destroy',$data->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form>


                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{-- Add New Tag Modal --}}
            <div id="add_tag_modal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New Tag</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('tag.store')}}" method = "post">
                                @csrf
                                <div class="form-group">
                                    <input name="name" class="form-control" type="text" placeholder="Enter Tag Name">
                                </div>
                                <div class="form-group">
                                    <input class="btn-primary btn-sm btn" type="submit" value="Add">
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>

            {{-- Edit Tag  Modal --}}
            <div id="edit_tag_modal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Tag</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('tag.update')}}" method = "POST">
                                @csrf
                                <div class="form-group">
                                    <input name="name" class="form-control" type="text" placeholder="Enter Tag Name">
                                    <input name="id" class="form-control" type="hidden">
                                </div>
                                <div class="form-group">
                                    <input class="btn-primary btn-sm btn" type="submit" value="Update">
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->


@endsection

