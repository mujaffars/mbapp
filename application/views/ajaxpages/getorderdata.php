<style type="text/css">
    .container-fluid{
        width: 100%;
    }
    #frmOrderDetail, .tblOrderItems {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th, .tblOrderItems td, .tblOrderItems th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    .tblOrderItems tr:nth-child(even){background-color: #f2f2f2;}
    
    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
    .form-field-box.even{
        background-color: white;
    }
    .clsBtnPrint{
        float: right;
        margin: 5px 0;
    }
    .dropdown{
        
    }
</style>

<input type="button" class="clsBtnPrint" onclick="printInvoice()" value="Print"/>

<div id="section-to-print">

    <div class="form-field-box even">

        <form id="frmOrderDetail" class="frmOrderDetail">
            <table class="tblOfficeDtl">
                <thead>
                    <tr class="trHeadOfficeDetail">
                        <th colspan="4"><?php echo $officeData->name; ?></th>
                    </tr>
                    <tr>
                        <th colspan="4"><?php echo $officeData->addressLine1 . ", " . $officeData->addressLine2; ?></th>
                    </tr>
                    <tr>
                        <th colspan="4"><?php echo $officeData->city . " " . $officeData->postalCode; ?></th>
                    </tr>
                </thead>                
            </table>

            <table class="tblCustomerDtl">
                <tbody>
                    <tr class="trHeadCustomerDetail">
                        <td><?php echo $orderData->contactFirstName . " " . $orderData->contactLastName; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $orderData->phone; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $orderData->addressLine1; ?></td>
                    </tr>
                </tbody>                
            </table>

            <table class="tblOrderDtl">
                <tbody>
                    <tr class="trHeadCustomerDetail">
                        <td>Invoice No: <?php echo $orderData->orderNumber; ?></td>
                    </tr>
                    <tr>
                        <td>Date: <?php echo date('d/m/Y', strtotime($orderData->orderDate)); ?></td>
                    </tr>
                    
                </tbody>                
            </table>

            <table class="tblOrderItems">
                <thead>
                    <tr>
                        <th>Sr.</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>M.R.P.</th>
                        <th>GST</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $itemCnt = 1;
                    $allTotal = 0;
                    foreach ($itemData As $rowItem) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $itemCnt; ?>
                            </td>
                            <td>
                                <?php echo $rowItem->itemname . "(" . $rowItem->brandname . ")"; ?>
                            </td>
                            <td>
                                <?php echo $rowItem->quantity; ?>
                            </td>
                            <td>
                                <?php echo $rowItem->price; ?>
                            </td>
                            <td>
                                <?php echo $rowItem->gst; ?>
                            </td>
                            <td>
                                <?php
                                $itemAmt = $rowItem->quantity * $rowItem->price;
                                $itemGST = ($itemAmt * $rowItem->gst) / 100;
                                $itemAmt = $itemAmt + $itemGST;
                                $allTotal = $allTotal + $itemAmt;
                                echo round($itemAmt, 2);
                                ?>
                            </td>
                        </tr>
                        <?php
                        $itemCnt++;
                    }
                    ?>
                    <tr>
                        <td colspan="4"></td>
                        <td>Total</td>
                        <td><b><?php echo round($allTotal, 2); ?></b></td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            Terms and conditions
                        </td>
                        <td colspan="2">
                            Authorized Signature
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>    
</div>

<?php
// echo '<pre>';
//print_r($officeData);
// print_r($orderData);
//print_r($itemData);
// echo '</pre>';
//exit;
?>