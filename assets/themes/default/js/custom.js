$(function () {

    var formsrc = $('form').attr('action');
    
//    formsrc = formsrc.replace("/", "#");
    console.log(formsrc);
    var substr_count = formsrc.split('orders_management/insert').length - 1;
    
    $('#field-mobile_id').change(function () {
        alert($(this).html());
    })
})