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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('post.store')}}" method = "POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input name="title" class="form-control" type="text" placeholder="Enter Post Title">
                                </div>
                                <div class="form-group">
                                    <h5>Choose Category</h5>
                                    @foreach($all_cat as $cat)
                                        <label>
                                            <input style="margin-right:5px;" type="checkbox" name="category[]" value="{{$cat->id}}">{{$cat->name}}
                                        </label>
                                        <br>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <h5>Select Tag</h5>
                                    <select class="form-control select-tag" name="tags[]" multiple="multiple">
                                        <option>-- Select --</option>
                                        @foreach($all_tag as $tag)
                                        <option value="{{$tag->name}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
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
                    </div>
                </div>
            </div>



            {{-- Edit Post  Modal --}}
{{--            <div id="edit_Post_modal" class="modal fade">--}}
{{--                <div class="modal-dialog modal-dialog-centered">--}}
{{--                    <div class="modal-content">--}}
{{--                        <div class="modal-header">--}}
{{--                            <h4 class="modal-title">Update Post</h4>--}}
{{--                            <button class="close" data-dismiss="modal">&times;</button>--}}
{{--                        </div>--}}
{{--                        <div class="modal-body">--}}
{{--                            <form action="#" method = "POST">--}}
{{--                                @csrf--}}
{{--                                <div class="form-group">--}}
{{--                                    <input name="name" class="form-control" type="text" placeholder="Enter Post Name">--}}
{{--                                    --}}{{--                                    <input id="fimage" name="fimg" class="form-control" type="hidden" type="file">--}}
{{--                                    --}}{{--                                    <img id="featured_image_load" src="" >--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <input class="btn-primary btn-sm btn" type="submit" value="Update">--}}
{{--                                </div>--}}

{{--                            </form>--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer">--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
    </div>
    <!-- /Page Wrapper -->


@endsection

