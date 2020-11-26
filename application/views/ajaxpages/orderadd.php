<div>
    <div class="form-field-box even" id="mobileNo_field_box">

        <form id="frmOrderAdd" class="frmOrderAdd" onsubmit="return false;">
            <table class="tblCustomerDtl">
                <thead>
                    <tr class="trHeadCustDetail">
                        <th colspan="4">Customer Detail</th>
                    </tr>
                    <tr>
                        <th>Mobile No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input id="customerMobile" class="form-control" name="customerMobile" required type="text" value=""/>
                        </td>
                        <td>
                            <input id="customerFirstName" class="form-control" name="customerFirstName" type="text" value=""/>
                        </td>
                        <td>
                            <input id="customerLastName" class="form-control" name="customerLastName" type="text" value=""/>
                        </td>
                        <td>
                            <textarea id="customerAddress" class="form-control" name="customerAddress"></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <table class="tblOrderAdd" itemaction="add">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>GST(%)</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input id="orderItem" class="form-control" required="" name="orderItem" type="text" value=""/></td>
                        <td><input id="itemPrice" class="form-control" required="" name="itemPrice" type="text" value=""/></td>
                        <td><input id="itemQuantity" class="form-control" required="" name="itemQuantity" type="text" value=""/></td>
                        <td><input id="itemGst" class="form-control" required="" name="itemGst" type="text" value=""/></td>
                        <td><input id="itemDiscount" class="form-control" required="" name="itemDiscount" type="text" value=""/></td>
                        <td><input id="itemTotal" class="form-control" required="" name="itemTotal" type="text" value=""/></td>
                        <td><input id="itemSave" class="form-control btn btn-success" required="" onclick="isFormValid()" name="itemSave" type="submit" value="Save"/></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">

                        </th>
                        <th colspan="">
                            Total
                        </th>
                        <th class="thGrandTotal">

                        </th>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <div class="form-button-box">
                                <input id="form-button-save" type="button" value="Save Order" class="btn btn-large">
                                <a href="<?php echo site_url("/examples/orders_management"); ?>" class="btn btn-large">Cancle</a>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>

        </form>
        <div class="clear"></div>
    </div>
</div>

<?php
//        echo '<pre>';
//        print_r($viewdata);
//        echo '</pre>';
//        exit;
?>