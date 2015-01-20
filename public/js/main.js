$( document ).ready(function() {

    var getDataSelect = function(url, select, id_ses){
        $.ajax({
            url: url,
            dataType : "json",
            success: function (data) {
                console.log(data);
                $(select).html(data.html).val(id_ses);
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
            getDataSelect('/getCities/'+id, '#city_id', $('input[name=ses_city_id]').val());
        }else{
            $('#city_id option[value!=""]').remove();
        }
    });

    $('#brand_id').change(function(){
        var id = $(this).val();
        if (id > 0){
            getDataSelect('/getModels/'+id, '#model_id', $('input[name=ses_model_id]').val());
        }else{
            $('#model_id option[value!=""]').remove();
        }
    });

    $('#search-form').submit(function(){
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

    $('#city_id').change(function(){
        $('input[name=ses_city_id]').val($(this).val())
    });

    $('#model_id').change(function(){
        $('input[name=ses_model_id]').val($(this).val())
    });

});

function _add_publication_js(city,model){
    $('#area_id').trigger('change');
    $('#brand_id').trigger('change');
}