var nottification = (function() {
    return {
        delete: function (id, object) {
            $.ajax({
               url: 'nottifications/'+ id + '/delete/',
               type: 'GET',
               success: function() {
                   var nottificationsCount = $("#nottifications").html();
                   $("#nottification"+id).fadeOut('slow');
                   console.log(nottificationsCount--);
                   $("#nottifications").html(nottificationsCount--);

               }
            });
        }
    }

})();