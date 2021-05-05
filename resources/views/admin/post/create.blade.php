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
                                    <h5>Post Format</h5>
                                    <select id="post_format" name="post-format"  class="form-control post-format">
                                        <option>-- Select --</option>
                                        <option value="image">Image</option>
                                        <option value="gallery">Gallery</option>
                                        <option value="audio">Audio</option>
                                        <option value="video">Video</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <h5>Post Title</h5>
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

                                <div class="form-group post-image">
                                    <label style="font-size:80px;cursor:pointer;" for="fimg"><i class="fas fa-file-image"></i></label>
                                    <br>
                                    <input name="fimage" type="file" id="fimg">
                                    <img style="max-width: 100%;" id="featured_image_load" src="" >
                                </div>
                                <div class="form-group post-gallery-image">
                                   <h5>Post Gallery Image</h5>
                                    <div class="post_gallery_img"></div>
                                    <label style="font-size:80px;cursor:pointer;display:block;" for="gall_post_img_select"><i class="far fa-images"></i></label>
                                    <input style="display:none;" name="post-gallery[]" type="file" id="gall_post_img_select" multiple>
                                </div>

                                <div class="form-group post-video">
                                    <label for="fimg">Post Video Link</label>
                                    <label style="font-size:80px;cursor:pointer;display:block;" for="fimg_v"><i class="fas fa-video"></i></label>
                                    <br>
                                    <input style="display:none;" name="fimage" type="file" id="fimg_v">
                                    <img style="max-width: 100%;" id="featured_image_load" src="" >
                                </div>
                                <div class="form-group post-audio">
                                    <label for="fimg">Post Audio Link</label>
                                    <label style="font-size:80px;cursor:pointer;display:block;" for="fimg_a"><i class="fas fa-volume-up"></i></label>
                                    <br>
                                    <input style="display:none;" name="fimage" type="file" id="fimg_a">
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


            <div class="post-gallery">
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Post Gallery Image</label>
                    <div class="col-lg-9">
                        <div class="post-gallery-img"></div>
                        <br>
                        <br>

                        <label for="post_img_select_g"><img style="width:100px; cursor:pointer;" src="{{ URL::to('admin/assets/img/img.jpg') }}" alt=""></label>
                        <input style="display:none" name="post_gall[]" type="file" id="post_img_select_g" multiple>
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

