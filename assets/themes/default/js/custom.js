$(function () {

    var formsrc=$('form').attr('action');

//    formsrc = formsrc.replace("/", "#");
    console.log(formsrc);
    var substr_count=formsrc.split('orders_management/insert').length-1;

    if (substr_count>0) {
        // Load the Add page Html
        $.ajax({
            url: siteUrl+'/ajaxpages/orderadd',
            type: 'GET',
            dataType: 'html',
            async: true,
            error: function () {
            },
            success: function (resp) {

                $('#main-table-box').html(resp);

                $("#orderItem").autocomplete({
                    source: [{
                            label: 'Prateek',
                            value: 'hello'
                        }, {
                            label: 'James',
                            value: 'android'
                        }],
                    select: function (event, ui) {
                        console.log(ui.item);
                        $("#orderItem").val(ui.item.label); //ui.item is your object from the array
                        return false;
                    }
                });

            }
        });
    }


//    ​$('#field-mobile_id').change(function () {
//        alert($(this).html());
//    });

});

/* When the user clicks on the button,
 toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick=function (event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns=document.getElementsByClassName("dropdown-content");
        var i;
        for (i=0; i<dropdowns.length; i++) {
            var openDropdown=dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

$('.child').hide(); //Hide children by default

$('.parent').children().click(function () {
    event.preventDefault();
    $(this).children('.child').slideToggle('slow');
    $(this).find('span').toggle();
});