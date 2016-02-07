$(document).ready(function(){
    $('#gallery').on('click', '.del-attachment', function(){

        var id = $(this).data('id');
        var li = $(this).parents('li');
        var span = $(this).parent();

        span.addClass('pending');

        $.post(
            '/admin/gallery/attachment/' + id,
            {
                _method: 'delete'
            }
        ).done(function(data){
            if('ok' == data.status) {
                li.remove();
            } else {
                span.removeClass('pending');
                alert(data.status);
            }
        }).fail(function(){
            span.removeClass('pending');
            alert('Error');
        });


        return false;
    });
});