function upload(path, oneFile, hash){

        $("#drop").find('input').click();

        var ul = $('#files');



        // Initialize the jQuery File Upload plugin
        $('#upload').fileupload({

            url: path,
            // This element will accept file drag/drop uploading
            dropZone: $('#drop'),
            dataType: 'json', 
            // This function is called when a file is added to the queue;
            // either via the browse button, or via drag/drop:
            add: function (e, data) {

                data.submit();

            },

            progress: function(e, data){
                //..
            },

            fail:function(e, data){
                alert('Error');
            },

            done: function(e, data){

                var source = $("#entry-template").html();

                var template = Handlebars.compile(source); 
                var data = data.result.attachment;
                if(hash)
                {
                    $("input[name=hash]").val(data.hash);
                }
                if(oneFile)
                {
                    $("#files").html(template(data));
                }
                else
                {
                    $("#files").append(template(data));
                }
             

            }


        });


        // Prevent the default action when a file is dropped on the window
        $(document).on('drop dragover', function (e) {
            e.preventDefault();
        });

        // Helper function that formats the file sizes
        function formatFileSize(bytes) {
            if (typeof bytes !== 'number') {
                return '';
            }

            if (bytes >= 1000000000) {
                return (bytes / 1000000000).toFixed(2) + ' GB';
            }

            if (bytes >= 1000000) {
                return (bytes / 1000000).toFixed(2) + ' MB';
            }

            return (bytes / 1000).toFixed(2) + ' KB';
        }


}
