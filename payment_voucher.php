<?php
include './connection_sql.php';
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<section class="content">
    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title"><?php
                $sql = "SELECT docname from doc_acc WHERE name = '" . $_GET['url'] . "'";
                $result = $conn->query($sql);
                $row = $result->fetch();

                echo $row['docname'];
                ?>      </h3>
        </div>

        <form role="form" name ="form1" class="form-horizontal">
            <div class="box-body">


                <div class="form-group">
                    <a style="margin-left: 10px;"  onclick="new_inv()" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; New
                    </a>

                    <a  id="savebtn"  onclick="save_inv();" class="btn btn-success btn-sm">
                        <span class="fa fa-save"></span> &nbsp; Save
                    </a>

                    <a onclick="NewWindow('search_payment_voucher.php?stname=code', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                    </a>

                    <!--                    <a style="float: right;margin-right: 10px;" onclick="NewWindow('list_Manuel_AOD.php', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                                            <span class="glyphicon glyphicon-search"></span> &nbsp; List
                                        </a>
                                        <a onclick="NewWindow('Search_Manuel_AOD.php', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                                            <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                                        </a>-->

                    <a  onclick="print();" class="btn btn-default btn-sm">
                        <span class="fa fa-print"></span> &nbsp; Print
                    </a> 


                </div>
                <div id="msg_box"></div>

                <div class='form-group'></div>
                <div class='form-group-sm'>
                    <label class='col-sm-2' for='c_code'>PY No.</label>
                    <div class='col-sm-2'>
                        <input type='text' placeholder='PY No.'  id='py_no' class='form-control Name  input-sm' disabled="">
                        <input type='text' placeholder='Receipt Ref'  id='uniq' class='form-control Name hidden input-sm ' disabled="">
                    </div>
                </div>

                <div class='form-group'></div>
                <div class='form-group-sm'>
                    <label class='col-sm-2' for='c_code'>Manual Ref</label>
                    <div class='col-sm-2'>
                        <input type='text' placeholder='Manual Ref'  id='manual_ref' class='form-control Name  input-sm'>
                    </div>
                    <label class='col-sm-2' for='c_code'>Date</label>
                    <div class='col-sm-2'>
                        <input type='date' placeholder='date'  id='date' value='<?php echo date("Y-m-d"); ?>' class='form-control Name  input-sm'>
                    </div>
                </div>

                <!--                <div class='form-group'></div>
                                <div class='form-group-sm'>
                                   
                                </div>-->




                <div class='form-group'></div>
                <div class='form-group-sm'>
                    <label class='col-sm-2' for='c_code'>Payment Cash Book</label>
                    <div class='col-sm-2'>
                        <input type='text' placeholder='Payment Cash Book'  id='payment_cash_book' class='form-control Name  input-sm'>
                    </div>
                    <div class='col-sm-1'>
                        <a  href="search_ledg.php?stname=payment_voucher"   onClick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                                return false" class="btn btn-default btn-sm"> <span class="fa fa-circle-o"></span> &nbsp; </a>
                    </div>
                </div>


                <div class='form-group'></div>
                <div class='form-group-sm'>
                    <label class='col-sm-2' for='c_code'></label>
                    <div class='col-sm-2'>
                        <input type="text" placeholder="Description" id="txt_gl_name" class="form-control input-sm">
                    </div>

                </div>

                <div class='form-group'></div>
                <div class='form-group-sm'>
                    <label class='col-sm-2' for='c_code'>Currency code</label>
                    <!--                    <div class='col-sm-2'>
                                            <input type='text' placeholder='Currency code'  id='currency_code' class='form-control Name  input-sm'>
                                        </div>-->
                    <div class='col-sm-2'>
                        <select class="form-control form-control input-sm" id='currency_code'>
                            <option value="LKR">LKR</option>
                            <option value="USD">USD</option> 
                        </select>
                    </div>
                    <label class='col-sm-2' for='c_code'>Rate</label>
                    <div class='col-sm-2'>
                        <input type='text' placeholder='Rate'  id='rate' class='form-control Name  input-sm'>
                    </div>
                </div>

                <!--                <div class='form-group'></div>
                                <div class='form-group-sm'>
                                    
                                </div>-->

                <div class='form-group'></div>
                <div class='form-group-sm'>
                    <label class='col-sm-2' for='c_code'>Payment Type</label>
                    <!--                    <div class='col-sm-2'>
                                            <input type='text' placeholder='Payment Type'  id='payment_type' class='form-control Name  input-sm'>
                                        </div>-->

                    <div class='col-sm-2'>
                        <select class="form-control form-control input-sm" id='payment_type'>
                            <option value="Cash">Cash</option>
                            <option value="Cheque">Cheque</option>
                            <option value="Direct Debit">Direct Debit</option>
                            <option value="Credit Card">Credit Card</option> 
                            <option value="TT">TT</option> 
                        </select>
                    </div>
                    <label class='col-sm-2' for='c_code'>Cheque No./Ref</label>
                    <div class='col-sm-2'>
                        <input type='text' placeholder='Cheque No./Ref'  id='cheque_no_ref' class='form-control Name  input-sm'>
                    </div>
                </div>



                <div class='form-group'></div>
                <div class='form-group-sm'>
                    <div class='col-sm-4'></div>
                    <label class='col-sm-2' for='c_code'>Chq. Date/Ref</label>
                    <div class='col-sm-2'>
                        <input type='text' placeholder='Chq. Date/Ref'  id='chq_date_ref' class='form-control Name  input-sm'>
                    </div>
                </div>

                <div class='form-group'></div>
                <div class='form-group-sm'>
                    <label class='col-sm-2' for='c_code'>Chq. Bank/Ref</label>
                    <div class='col-sm-2'>
                        <input type='text' placeholder='Chq. Bank/Ref'  id='chq_bank_ref' class='form-control Name  input-sm'>
                    </div>
                </div>

                <div class='form-group'></div>
                <div class='form-group-sm'>
                    <label class='col-sm-2' for='c_code'>Allocation Percentage</label>
                    <!--                    <div class='col-sm-2'>
                                            <input type='text' placeholder='allocation_percentage'  id='allocation_percentage' class='form-control Name  input-sm'>
                                        </div>-->
                    <div class='col-sm-2'>
                        <select class="form-control form-control input-sm" id='allocation_percentage'>
                            <option value="20">20%</option>
                            <option value="40">40%</option>
                            <option value="60">60%</option>
                            <option value="80">80%</option> 
                            <option value="100">100%</option> 
                        </select>
                    </div>
                </div>

                <div class='form-group'></div>
                <div class='form-group-sm'>
                    <label class='col-sm-2' for='c_code'>Total amount of Payment</label>
                    <div class='col-sm-2'>
                        <input type='text' placeholder='Total amount of Payment' onkeyup="resCal();"  id='total_amount_of_payment' class='form-control Name  input-sm'>
                    </div>
                    <label class='col-sm-2' for='c_code'>Allocated</label>
                    <div class='col-sm-2'>
                        <input type='text' placeholder='allocated'  id='allocated' class='form-control Name  input-sm'>
                    </div>
                </div>

                <!--                <div class='form-group'></div>
                                <div class='form-group-sm'>
                                    
                                </div>-->

                <div class='form-group'></div>
                <div class='form-group-sm'>
                    <div class='col-sm-4'></div>
                    <label class='col-sm-2' for='c_code'>to_be_allocated</label>
                    <div class='col-sm-2'>
                        <input type='text' placeholder='to_be_allocated'  id='to_be_allocated' class='form-control Name  input-sm'>
                    </div>
                </div>

                <div class='form-group'></div>
                <div class='form-group-sm'>
                    <label class='col-sm-2' for='c_code'>Payee Name</label>
                    <!--                    <div class='col-sm-4'>
                                            <input type='text' placeholder='payee_name'  id='payee_name' class='form-control Name  input-sm'>
                                        </div>-->
                    <div class='col-sm-2'>
                        <input id="payee_name" class='col-sm-12 form-control input-sm' list="temp1" name="temp1">
                        <datalist id="temp1">
                            <option value="Firefox">
                            <option value="Chrome">
                        </datalist>

                    </div>
                </div>

                <div class='form-group'></div>
                <div class='form-group-sm'>
                    <label class='col-sm-2' for='c_code'>Remark</label>
                    <div class='col-sm-6'>
                        <input type='text' placeholder='remark'  id='remark' class='form-control Name  input-sm'>
                    </div>
                </div>

            </div>  

            <div id="itemdetails">
                <div id='getTable'>
                    <table id='myTable' class='table table-bordered'>
                        <thead>
                            <tr>
                                <th style="width: 10%;">Debit Account</th>
                                <th style="width: 15%;">Account Name</th>
                                <th style="width: 3%;"></th>
                                <th style="width: 10%;">Percentage Apply</th>
                                <th style="width: 10%;">Amount</th>
                                <th style="width: 10%;">Job No</th>
                                <th style="width: 3%;"></th>
                                <th style="width: 10%;">Supplier In No.</th>
                                <th style="width: 10%;">Supplier Inv Date</th>
                                <th style="width: 3%;">Add/Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                        <td>
                            <input type='text' placeholder='Debit Account' id='debitaccount' class='form-control input-sm'>
                        </td>
                        <td>
                            <input type='text' placeholder='Account Name'  id='accountname' class='form-control input-sm'>
                        </td>
                        <td> 
                            <a  onclick="NewWindow('search_ledg.php?stname=payment_voucher_table', 'mywin', '800', '700', 'yes', 'center');
                                    return false" onfocus="this.blur()">
                                <input type="button"  value="..." class="btn btn-default btn-sm">
                            </a>
                        </td>
                        <td>
                            <input  type='text' placeholder='Percentage Apply'  onkeyup="perCal('per',event);"  id='percentage_apply' class='form-control input-sm'>
                        </td>
                        <td>
                            <input  type='text' placeholder='Amount'   onkeyup="perCal('am',event);" id='amount' class='form-control input-sm'>
                        </td>
                        <td>
                            <input type='text' placeholder='Job No' id='jobno' class='form-control input-sm'>
                        </td>
                        <td>
                            <a  onclick="NewWindow('search_joborder.php?stname=rec_payment', 'mywin', '800', '700', 'yes', 'center');
                                    return false" onfocus="this.blur()">
                                <input type="button"  value="..." class="btn btn-default btn-sm">
                            </a>
                        </td>
                        <td>
                            <input type='text' placeholder='Supplier In No.'  id='supplier_in_no' class='form-control input-sm'>
                        </td>
                        <td>
                            <input  type='text' placeholder='Supplier Inv Date' value='<?php echo date("Y-m-d"); ?>' id='supplier_inv_date' class='form-control input-sm'>
                        </td>
                        <td><a onclick='add_tmp();' class='btn btn-default btn-sm'> <span class='fa fa-plus'></span> &nbsp; </a></td>


                        </tr>
                        </tbody>


                    </table>
                </div>
            </div>
        </form>


        <br>
        <br>
        <br>
        <br>

    </div>    

</section>
<script src="js/payment_voucher.js"</script>
<!--<script src="js/payment_voucher.js"</script>-->



<!--<script src="js/Manuel_aod_table.js">
</script>-->
<?php
include 'login.php';
include './cancell.php';
?>
<script>
                            new_inv();
</script> 