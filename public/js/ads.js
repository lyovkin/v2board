$(document).ready(function(){
    var adsData;

    //$("#test_new").click(function(){
    setInterval(function(){
        var last_ads_id = $('.ads_id').first().val();

        console.log(last_ads_id);
        var count = $('#new_ads_count').val(); 
        $.ajax({
           type: 'GET',
           url: '/getNewAds',
           data: {
               last_id: last_ads_id
           },
           success: function(data)
           {
                if(data.ads.length > 0){
                    $('.new_ads_count').html(data.ads.length);
                    $('#new_ads').removeAttr('disabled')
                    adsData = data;
                    last_ads_id = data.ads[data.ads.legth - 1];
                }
           },
           async: false
       });
   }, 30000);

    $('#new_ads').on('click', function(){
        var source = $('#some-template').html(); 
        var template = Handlebars.compile(source); 
        $('.posts').prepend(template(adsData));
        $('.new_ads_count').html('');
        $(this).attr('disabled', 'disabled');
        
    });
});

