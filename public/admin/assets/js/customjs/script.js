(function ($){
    $(document).ready(function (){
        /**
         * Logout system customization
         */
        $('a#logout-button').click(function (e){
           e.preventDefault();
           $('form#logout-form').submit();
        });

    });
})(jQuery)
