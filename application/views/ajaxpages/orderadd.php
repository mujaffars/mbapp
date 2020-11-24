<div>
    <div class="form-field-box even" id="mobileNo_field_box">

        <form id="frmOrderAdd" class="frmOrderAdd">
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
                        <td><input id="orderItem" class="form-control" name="orderItem" type="text" value=""/></td>
                        <td><input id="itemPrice" class="form-control" name="itemPrice" type="text" value=""/></td>
                        <td><input id="itemQuantity" class="form-control" name="itemQuantity" type="text" value=""/></td>
                        <td><input id="itemGst" class="form-control" name="itemGst" type="text" value=""/></td>
                        <td><input id="itemDiscount" class="form-control" name="itemDiscount" type="text" value=""/></td>
                        <td><input id="itemTotal" class="form-control" name="itemTotal" type="text" value=""/></td>
                        <td><input id="itemSave" class="form-control btn btn-success" name="itemSave" type="button" value="Save"/></td>
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