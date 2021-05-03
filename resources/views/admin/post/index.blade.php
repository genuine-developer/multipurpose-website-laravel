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
                            <li class="breadcrumb-item active">Post</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-10">
                    @include('validate')
                    <a class="btn btn-primary btn-sm"  href="{{route('post.create')}}">Add New Post</a>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Posts</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Post Title</th>
                                            <th>Slug</th>
                                            <th>Feautred Image</th>
                                            <th>Content</th>
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
                                                        <a href="#" class="btn btn-sm btn-success">Published</a>
                                                    @else
                                                        <a href="#" class="btn btn-sm btn-danger">UnPublished</a>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <a id="Post" edit_id="{{$data->id}}" data-toggle="modal" href="#edit_Post_modal" class="btn btn-primary btn-sm">Edit</a>
                                                <form style="display:inline;" action="#" method="POST">
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
{{-- Add New Post Modal --}}
            <div id="add_Post_modal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New Post</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('post.store')}}" method = "POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input name="title" class="form-control" type="text" placeholder="Enter Post Title">
                                </div>
                                <div class="form-group">
                                    <h6>Posts</h6>
                                        @foreach($posts as $post)
                                        <label>
                                            <input style="margin-right:5px;" type="checkbox" name="category[]" value="{{$post->id}}">{{$post->name}}
                                        </label>
                                            <br>
                                            @endforeach
                                </div>
                                <div class="form-group">
                                    <label style="font-size:80px;cursor:pointer;" for="fimg"><i class="fas fa-file-image"></i></label>
                                    <br>
                                    <input style="display:none;" name="fimage" type="file" id="fimg">
                                    <img style="max-width: 100%;" id="featured_image_load" src="" >
                                </div>
                                <div class="form-group">
                                    <textarea name="content" id="text-editor"></textarea>
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

            {{-- Edit Post  Modal --}}
            <div id="edit_Post_modal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Post</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="#" method = "POST">
                                @csrf
                                <div class="form-group">
                                    <input name="name" class="form-control" type="text" placeholder="Enter Post Name">
{{--                                    <input id="fimage" name="fimg" class="form-control" type="hidden" type="file">--}}
{{--                                    <img id="featured_image_load" src="" >--}}
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

