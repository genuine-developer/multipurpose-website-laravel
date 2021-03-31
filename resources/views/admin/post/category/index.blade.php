@extends('layouts.app')

@section('main-content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome Admin!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-10">
                    @include('validate')
                    <a class="btn btn-primary btn-sm" data-toggle="modal" href="#add_category_modal">Add New Category</a>
                    <a href="{{route('category.trash')}}" class="btn btn-sm btn-warning float-right"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Striped Rows</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category Name</th>
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
                                                        <a href="{{route('category.unpublished',$data->id)}}" class="btn btn-sm btn-success">Published</a>
                                                    @else
                                                        <a href="{{route('category.published',$data->id)}}" class="btn btn-sm btn-danger">UnPublished</a>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <a id="category_edit" edit_id="{{$data->id}}" data-toggle="modal" href="#edit_category_modal" class="btn btn-primary btn-sm">Edit</a>
                                                <form style="display:inline;" action="{{route('post-category.destroy',$data->id)}}" method="POST">
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
{{-- Add New Category Modal --}}
            <div id="add_category_modal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New Category</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('post-category.store')}}" method = "post">
                                @csrf
                                <div class="form-group">
                                    <input name="name" class="form-control" type="text" placeholder="Enter Category Name">
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

            {{-- Edit Category  Modal --}}
            <div id="edit_category_modal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Category</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('category.update')}}" method = "POST">
                                @csrf
                                <div class="form-group">
                                    <input name="name" class="form-control" type="text" placeholder="Enter Category Name">
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

