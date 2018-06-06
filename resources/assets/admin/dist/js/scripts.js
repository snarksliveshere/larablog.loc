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
    
});