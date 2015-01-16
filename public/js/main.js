$( document ).ready(function() {
    $('#area_id').change(function(e){
        var id = $(this).val();

        $.ajax({
            url: '/getCities/'+id,             // указываем URL и
            dataType : "json",                     // тип загружаемых данных
            success: function (data) { // вешаем свой обработчик на функцию success
                
            }
        });
    })
});