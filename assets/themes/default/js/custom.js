var editingTrClass='';

$(function () {

    var formsrc=$('form').attr('action');
    var itemList='';

//    formsrc = formsrc.replace("/", "#");
    console.log(formsrc);
    var substr_count=formsrc.split('orders_management/insert').length-1;

    if (substr_count>0) {
        // Load the Add page Html

        $.ajax({
            url: siteUrl+'/ajaxpages/getitemslist',
            type: 'GET',
            dataType: 'json',
            async: true,
            error: function () {
            },
            success: function (itemList) {

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
                            source: itemList,
                            select: function (event, ui) {
                                $('#itemPrice').val(ui.item.price);
                                $('#itemGst').val(ui.item.gst);
                                $('#itemQuantity').val(1);
                                calculateItemTotal();

                                $('#itemQuantity, #itemPrice, #itemDiscount').keyup(function () {
                                    calculateItemTotal();
                                })
                                $("#orderItem").val(ui.item.label); //ui.item is your object from the array
                                $("#orderItem").attr("itemid", ui.item.value);
                                return false;
                            }
                        });

                        $('#itemSave').click(function () {
                            performAction();
                        })

                        $('#form-button-save').click(function () {
                            saveOrderItem();
                        })

                    }
                });
            }
        });
    }


//    ​$('#field-mobile_id').change(function () {
//        alert($(this).html());
//    });

});

function calculateItemTotal() {
    var itemPrice=$('#itemPrice').val();
    var itemQuantity=$('#itemQuantity').val();
    var itemDiscount=$('#itemDiscount').val();
    var itemGst=$('#itemGst').val();
    var itemPriceTotal=eval(eval(itemPrice*itemQuantity)-itemDiscount);
    $('#itemTotal').val(eval(eval(itemPriceTotal+eval(itemPriceTotal*itemGst)/100)));

    var grandTotal=0;

    $('.tblOrderAdd tbody tr').each(function () {
        if ($(this).hasClass('clsdynamictr')) {
            grandTotal=eval(grandTotal+parseFloat($(this).find('.tdItemTotal').text()));
            console.log('grandTotal '+grandTotal);
        }
    })

    grandTotal=Math.round((grandTotal+Number.EPSILON)*100)/100;
    $('.tblOrderAdd .thGrandTotal').text(grandTotal);
}

function saveViewOrderItem() {
    var itemid=$('#orderItem').attr('itemId');
    var itemPrice=$('#itemPrice').val();
    var itemQuantity=$('#itemQuantity').val();
    var itemGST=$('#itemGst').val();
    var itemDiscount=$('#itemDiscount').val();
    var randomClass=makeRandomStr(8);

    var forTr='<tr class="'+randomClass+' clsdynamictr" itemId="'+itemid+'" randomClass="'+randomClass+'">';
    forTr+='<td class="tdItemName">'+$('#orderItem').val()+'</td>';
    forTr+='<td class="tdItemPrice" itemPrice="'+itemPrice+'">'+itemPrice+'</td>';
    forTr+='<td class="tdItemQuantity" itemQuantity="'+itemQuantity+'">'+itemQuantity+'</td>';
    forTr+='<td class="tdItemGST" itemGST="'+itemGST+'">'+itemGST+'</td>';
    forTr+='<td class="tdItemDiscount" itemdiscount="'+itemDiscount+'">'+$('#itemDiscount').val()+'</td>';
    forTr+='<td class="tdItemTotal">'+$('#itemTotal').val()+'</td>';
    forTr+='<td><a href="javascript:void(0)" onclick="editViewItem(this)" title="Edit Record" class="edit_button"><span class="edit-icon"></span></a>';
    forTr+='<a href="javascript:void(0)" onclick="deleteViewItem(this)"  title="Delete Record" class="delete_button"><span class="delete-icon"></span></a></td>';

    $('.tblOrderAdd tbody').append(forTr);

    clearAddItemFields();
}

function performAction() {
    calculateItemTotal();
    if ($('.tblOrderAdd').attr('itemaction')==='edit') {
        updateViewOrderItem();
    } else if ($('.tblOrderAdd').attr('itemaction')==='add') {
        saveViewOrderItem();
    }
}

function updateViewOrderItem() {
    var itemid=$('#orderItem').attr('itemId');
    var itemName=$('#orderItem').val();
    var itemPrice=$('#itemPrice').val();
    var itemQuantity=$('#itemQuantity').val();
    var itemGST=$('#itemGst').val();
    var itemDiscount=$('#itemDiscount').val();
    var itemTotal=$('#itemTotal').val();
    var editingClass=$('.tblOrderAdd').attr('editclass');

    console.log("editingClass "+editingClass);
    $('.tblOrderAdd').find('.'+editingClass).find('.tdItemName').text(itemName);
    $('.tblOrderAdd').find('.'+editingClass).find('.tdItemName').attr('itemId', itemid);
    $('.tblOrderAdd').find('.'+editingClass).find('.tdItemPrice').text(itemPrice);
    $('.tblOrderAdd').find('.'+editingClass).find('.tdItemQuantity').text(itemQuantity);
    $('.tblOrderAdd').find('.'+editingClass).find('.tdItemGST').text(itemGST);
    $('.tblOrderAdd').find('.'+editingClass).find('.itemDiscount').text(itemDiscount);
    $('.tblOrderAdd').find('.'+editingClass).find('.tdItemTotal').text(itemTotal);

    $('.tblOrderAdd').attr('itemAction', 'add');
    $('.tblOrderAdd').attr('editClass', '');
    clearAddItemFields();
}

function saveOrderItem() {
    var itemsObj={};
    var itmCnt=1;

    $('.tblOrderAdd tbody tr').each(function () {
        if ($(this).hasClass('clsdynamictr')) {
            itemsObj[itmCnt]={
                'itemid': $(this).attr('itemid'),
                'itemprice': $(this).find('.tdItemPrice').attr('itemprice'),
                'itemquantity': $(this).find('.tdItemQuantity').attr('itemquantity'),
                'itemgst': $(this).find('.tdItemGST').attr('itemgst'),
                'discount': $(this).find('.tdItemDiscount').attr('itemdiscount')
            };
            itmCnt++;
        }
    })

    $.ajax({
        url: siteUrl+'/ajaxpages/createorder',
        type: 'POST',
        data: itemsObj,
        dataType: 'json',
        async: true,
        error: function () {
        },
        success: function (resp) {

        }
    })

}

function clearAddItemFields() {
    $('#orderItem').val('');
    $('#orderItem').attr('itemid', '');
    $('#itemPrice').val('');
    $('#itemQuantity').val('');
    $('#itemGst').val('');
    $('#itemDiscount').val('');
    $('#itemTotal').val('');

    calculateItemTotal();
}

function editViewItem(objLnk) {
    var parentTr=$(objLnk).parent().parent();
    editingTrClass=$(parentTr).attr('randomclass');

    $('#orderItem').val($(parentTr).find('.tdItemName').text());
    $('#itemPrice').val($(parentTr).find('.tdItemPrice').text());
    $('#itemQuantity').val($(parentTr).find('.tdItemQuantity').text());
    $('#itemGst').val($(parentTr).find('.tdItemGST').text());
    $('#itemDiscount').val($(parentTr).find('.tdItemDiscount').text());

    $('.tblOrderAdd').attr('itemAction', 'edit');
    $('.tblOrderAdd').attr('editClass', editingTrClass);

    calculateItemTotal();
    console.log($(parentTr).attr('itemid')+" "+editingTrClass);

}

function deleteViewItem(objLnk) {
    var r=confirm("Do you really want to remove this product?");
    if (r==true) {
        $(objLnk).parent().parent().remove();
    }
}

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

function makeRandomStr(idLenght) {
    var text="";
    var possible="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    for (var i=0; i<idLenght; i++)
        text+=possible.charAt(Math.floor(Math.random()*possible.length));
    return text;
}