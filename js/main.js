/**
 * Created by Alex on 20.09.2016.
 */

/* add_more_files */
$(function(){
    $('.add_more').click(function (e) {
        e.preventDefault();
        $(this).before("<input name='images[]' type='file' multiple />");
    });
});