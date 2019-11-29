<?php
//session_start();
?>
<script src="https://unpkg.com/vue"></script>
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Fixed Asset Master</b></h3>
        </div>
        <form name= "form1" role="form" class="form-horizontal">

            <div class="box-body">


                <input type="hidden" id="tmpno" class="form-control">

                <input type="hidden" id="item_count" class="form-control">

                <div class="form-group-sm">

                    <a onclick="newent();" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; NEW
                    </a>

                    <a  onclick="save_inv();" class="btn btn-success btn-sm">
                        <span class="fa fa-save"></span> &nbsp; SAVE
                    </a>
                    <!-- <a  id="save_inv_top" class="btn btn-success btn-sm">
                        <span class="fa fa-save"></span> &nbsp; SAVE
                    </a> -->

                 

                 

                    <a onclick="//delete1();" class="btn btn-danger btn-sm" disabled="disabled">
                        <span class="glyphicon glyphicon-trash"></span> &nbsp; DELETE
                    </a>

                    <a onclick="NewWindow('search_deliverynote.php?stname=code', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                    </a>

                    <a onclick="print();" class="btn btn-primary btn-sm">
                        <span class="glyphicon glyphicon-print"></span> &nbsp; PRINT
                    </a>

            
                </div>
                <hr>
                <div id="msg_box" class="span12 text-center"></div>



                <div class="form-group"></div>
                <div class="form-group-sm">
                    <label class="col-sm-2" for="c_code">Item Code</label>
                    <div class="col-sm-2">
                        <input type="text" placeholder="Reference No."  id="itemno" class="form-control  input-sm" disabled="">
                        <input type="text" placeholder="Uniq"  id="uniq" class="form-control hidden input-sm" disabled="">
                    </div>

                     <label class="col-sm-2" for="c_code">Item Category</label>

                    <div class="col-sm-2">
                        <input type="text" placeholder="Date" onchange="" id="itemctgry_txt" class="form-control  input-sm">
                    </div>
                </div>
               
              


                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Dep. Rate Per Year(%)</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Dep. Rate Per Year(%)" onchange="" id="deprate_txt" class="form-control  input-sm">
                        </div>
                        
                       
                        <label class="col-sm-2" for="c_code">Depreciation Rate Per Year(%)</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Depreciation Rate Per Year(%)" onchange="" id="manref_txt" class="form-control  input-sm">
                        </div>
                    </div>




                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Depreciation Year</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Depreciation Year" onchange="" id="depyears_txt" class="form-control  input-sm">
                        </div>
                        </div>

                         <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-2" for="c_code">Depreciation Months</label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Depreciation Months" onchange="" id="depmonths_txt" class="form-control  input-sm">
                        </div>
                        </div>


                       

                      
                    </div>

                   
               

                    
                 

                   
     

                 
                    

                </div>
        </form>






<script src="js/advance_allocation.js"></script>




<script>newent();</script>
