$( document ).ready(function() {

    var getDataSelect = function(url, select){
        $.ajax({
            url: url,
            dataType : "json",
            success: function (data) {
                console.log(data);
                $(select).html(data.html);
            },
            failure : function () {
                var el = $('<div id="error">').text('Error');
                $(select).append(el);
            }
        });
    }

    $('#area_id').change(function(){
        var id = $(this).val();
        if (id > 0){
            getDataSelect('/getCities/'+id, '#city_id');
        }else{
            $('#city_id option[value!=""]').remove();
        }
    });

    $('#brand_id').change(function(){
        var id = $(this).val();
        if (id > 0){
            getDataSelect('/getModels/'+id, '#model_id');
        }else{
            $('#model_id option[value!=""]').remove();
        }
    });

    $('#search-form').submit(function(e){
        var params  = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '/search',
            data: params,
            success: function(data) {
                $('#content').html(data.html);
            },
            error:  function(){
                alert('Возникла ошибка');
            }
        });
    });
});