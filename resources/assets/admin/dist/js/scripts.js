$(document).ready(function (){
    $("#example1").DataTable();
    $(".select2").select2();
    //Date picker
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'dd/mm/yy'
    });
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
    $('.offer_values_edit_add').click(function () {
        var input = '<input type="text" name="values[]" class="offer_edit_values" value="">';
        $(input).appendTo($('.offer_values_wrapper'));
    });
    // view relatedProduct Offers

        // $(document).on('click','.killed_offer', function () {
        //     $(this).removeClass('killed_offer');
        //     $(this).addClass('kill_select');
        //     $(this).parent().find('.related_product_name-value').removeProp('disabled');
        //     $(this).parent().find('.related_product_values-value').removeProp('disabled');
        //     $(this).text('Убрать ТП');
        // });

        $('.kill_select').click(function () {
            var text = $(this).text();
            var nameDisabled = $(this).parent().find('.related_product_name-value');
            var valueDisabled = $(this).parent().find('.related_product_values-value');
            if(nameDisabled.prop('disabled')) {
                nameDisabled.removeAttr('disabled');
                valueDisabled.removeAttr('disabled');
                $(this).text('Убрать ТП');
            } else {
                nameDisabled.prop('disabled', 'disabled');
                valueDisabled.prop('disabled', 'disabled');
                $(this).text('Вернуть ТП');
            }
            console.log(text + ' text');
            console.log(nameDisabled + ' nameDisabled');
            console.log(valueDisabled + ' valueDisabled');

        });



    
});