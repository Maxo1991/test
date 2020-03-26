(function($){
    $(document).ready(function(){

        var countComment = $(".single-comment").length;
        console.log(countComment);
        // Show first 3 comment
        $('.single-comment').slice(3).hide();

        //on click list all comments and button disappear
        $('#more-comments').click(function(){
            $('.single-comment').show();
            $("#more-comments").remove();
        });

        $('#show-list-product').click(function() {
            $('#hidden-list-product').css('display', 'block');
            $('#table-list-products').css('display', 'block');
            $('#show-list-product').css('display', 'none');
        });

        $('#hidden-list-product').click(function() {
            $('#show-list-product').css('display', 'block');
            $('#table-list-products').css('display', 'none');
            $('#hidden-list-product').css('display', 'none');
        });
    });
})(jQuery);
