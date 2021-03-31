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


        });
    })(jQuery)

</script>
