<!-- jQuery -->
<script src="{{asset('admin/assets/js/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
<script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>

<!-- Slimscroll JS -->
<script src="{{asset('admin/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<script src="admin/assets/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('admin/assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('admin/assets/js/chart.morris.js')}}"></script>

<!---slect2 js -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Custom JS -->
<script  src="{{asset('admin/assets/js/script.js')}}"></script>
<script  src="{{asset('admin/assets/js/customjs/script.js')}}"></script>

<!--Ckeditor cdn-->
<script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>

<script  src="{{asset('admin/assets/js/fontawesome-all.min.js')}}"></script>




<script>

    (function ($){
        $(document).ready(function (){

            //Logout System
            $('button#logout-button').click(function (e){
                e.preventDefault();
                $('form#logout-form').submit();
            });

            //Ckeditor
            CKEDITOR.replace('text-editor');

            //Notification Msg display time
            setTimeout(function() {
                $('#msg').fadeOut('fast');
            }, 3000);



            //Category edit
            $(document).on('click','a#category_edit',function (e){
                e.preventDefault();

                let id=$(this).attr('edit_id');

                $.ajax({
                   url: 'post-category-edit/' +id,
                    dataType: "json",
                    success: function(data){
                       $('#edit_category_modal form input[name="name"]').val(data.name);
                       $('#edit_category_modal form input[name="id"]').val(data.id);
                    }
                });

            });

            //Tag edit
            $(document).on('click','a#tag',function (e){
                e.preventDefault();

                let id=$(this).attr('edit_id');

                $.ajax({
                    url: 'tag-edit/' +id,
                    dataType: "json",
                    success: function(data){
                        $('#edit_tag_modal form input[name="name"]').val(data.name);
                        $('#edit_tag_modal form input[name="id"]').val(data.id);
                    }
                });

            });

            //Post Featured Image change
            $(document).on('change',"input#fimg",function(event){
                event.preventDefault();
                let post_image_url = URL.createObjectURL(event.target.files[0]);
                $('img#featured_image_load').attr('src', post_image_url);


            });
            //Gallery post image load
            $(document).on('change',"input#gall_post_img_select",function(e){

                let img_gall = '';
                for(let i=0; i<e.target.files.length; i++){
                    let file_url_g = URL.createObjectURL(e.target.files[i]);
                    img_gall +='<img class="shadow" " src="'+file_url_g+'">';
                }

                $('.post_gallery_img').html(img_gall);


            });

            //Select2 select box
            $('.select-tag').select2();

            //Select post format
            $('#post_format').change(function (){
                let format = $(this).val();
                if ( format == 'image'){
                    $('.post-image').show();

                }else {
                    $('.post-image').hide();
                }
                if ( format == 'audio'){
                    $('.post-audio').show();

                }else {
                    $('.post-audio').hide();
                }
                if ( format == 'video'){
                    $('.post-video').show();

                }else {
                    $('.post-video').hide();
                }
                if ( format == 'gallery'){
                    $('.post-gallery-image').show();

                }else {
                    $('.post-gallery-image').hide();
                }
            });




        });
    })(jQuery)

</script>
