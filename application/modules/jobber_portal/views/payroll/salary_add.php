<?php
/**
 * Coded by: Pran Krishna Das
 * Social: https://sketchmeglobal.com
 * CI: 3.0.6
 * Date: 21-02-2020
 * Time: 11:30 am
 * Last updated on 25-Feb-2021 at 11:30 am
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contractor Salary Add | <?=WEBSITE_NAME;?></title>
    <meta name="description" content="Order Status">

    <!--Data Table-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin_panel/js/DataTables/DataTables-1.10.18/css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin_panel/js/DataTables/Buttons-1.5.6/css/buttons.bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin_panel/js/DataTables/Responsive-2.2.2/css/responsive.bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <!-- common head -->
    <?php $this->load->view('components/_common_head'); ?>
    <!-- /common head -->
    <!--Select2-->
    <link href="<?=base_url();?>assets/admin_panel/css/select2.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/admin_panel/css/select2-bootstrap.css" rel="stylesheet">
    <style>
        .jobber_type {
        border: 1px solid #cac8c8;
        padding: 6px;
        }
        input[type="submit"] {
            margin-top: 26px;
        }
        input[type="text"], input[type="number"] {
            text-align: right;
        }
        .hidden {
            display: none;
        }
    </style>
</head>

<body class="sticky-header">

<span style="display:none" id="selected_dept"><?=$selected_dept?></span>

<section>
    <!-- sidebar left start (Menu)-->
    <?php $this->load->view('components/left_sidebar'); //left side menu ?>
    <!-- sidebar left end (Menu)-->

    <!-- body content start-->
    <div class="body-content" style="min-height: 1500px;">

        <!-- header section start-->
        <?php $this->load->view('components/top_menu'); ?>
        <!-- header section end-->

        <!-- page head start-->
        <div class="page-head">
            <h3 class="m-b-less">New Salary Add</h3>
            <div class="state-information">
                <ol class="breadcrumb m-b-less bg-less">
                    <li><a href="<?=base_url('admin/dashboard');?>">Transaction</a></li>
                    <li class="active">New Salary Add</li>
                </ol>
            </div>
        </div>
        <!-- page head end-->

        <!--body wrapper start-->
        <div class="wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="row">
                <form method="post" class="container" id="insert_form">
               <div class="col-sm-11">
                   <div class="col-sm-8" style="border: 1px solid #000; border-radius: 2%;height:275px">
                       <div class="row">
                           <div class="col-sm-3">
                               <label>Month/Year</label>
                               <select name="month" id="month" class="form-control select2" required>
                                   <option value="">--Select Month--</option>
                                   <?php
                                   for ($mon = 1; $mon <= 12; $mon++) {
                                       $full_month = date('F', mktime(0, 0, 0, $mon, 1)) .'~'. cal_days_in_month(CAL_GREGORIAN,$mon,date('Y'))  .'~'. $mon;
                                   ?>
                                    <option <?= ($selected_month == $full_month) ? 'selected' : '' ?> value="<?= $full_month ?>"><?= $full_month ?></option>
                                   <?php
                                   }
                                   ?>
                               </select>
                           </div>
                           <div class="col-sm-3">
                               <label>Select Department</label>
                                <select id="group" name="group" class="form-control select2" required>
                                    <option value="">Select From The List</option>
                                    <option <?= ($selected_dept == 'Jobber') ? 'selected' : '' ?> value="Jobber">Jobber</option>
                                    <option <?= ($selected_dept == 'Cutter') ? 'selected' : '' ?> value="Cutter">Cutter</option>
                                </select>
                           </div>
                           <div class="col-sm-6" style="overflow: hidden">
                               <label>Select Employee</label>
                               <select class="form-control select2" name="emp_id" id="emp_select" style="width: 100%">
                                   <option>Select from the list</option>
                                   <?php
                                   foreach($fetch_all_employee as $emps){
                                       ?>
                                       <option classs="form-control" value="<?= $emps->e_id ?>"><?= $emps->name . ' ['. $emps->e_code .']' ?></option>
                                       <?php
                                   }
                                   ?>
                               </select>
                           </div>
                           </div>
                           <div class="row">
                               <div class="col-sm-9">
                                   <div class="row">
                                        <div class="col-sm-6">
                                           <label>Name:</label>
                                           <span class="dept"></span>
                                       </div>
                                       <div class="col-sm-6">
                                           <label>Father Name / Husband Name:</label>
                                           <span class="father_name"></span>
                                       </div>
                                       <div class="col-sm-6">
                                           <label>Date of Birth:</label>
                                           <span class="dob"></span>
                                       </div>
                                       
                                       <div class="col-sm-6">
                                           <label>Date of Joining:</label>
                                           <span class="doj"></span>
                                       </div>
                                       <div class="col-sm-6">
                                            <label>ESI Applicable?:</label>
                                           <span class="esiapp"></span>
                                       </div>
                                       <div class="col-sm-6">
                                            <label>PF Applicable?:</label>
                                           <span class="pfapp"></span>
                                       </div>
                                       
                                       <div class="col-sm-6">
                                            <label>PF?:</label>
                                           <span class="pf"></span>
                                       </div>
                                       
                                       
                                       <div class="col-sm-6">
                                            <label>Actual HRA:</label>
                                           <span class="achra"></span>
                                       </div>
                                       <div class="col-sm-6">
                                            <label>Conveyance:</label>
                                           <span class="convey"></span>
                                       </div>
                                       <div class="col-sm-6">
                                            <label>CL Taken (so far):</label>
                                           <span class="cl_taken"></span>
                                       </div>
                                       <div class="col-sm-6">
                                            <label>EL Taken (so far):</label>
                                           <span class="el_taken"></span>
                                       </div>
                                       
                                   </div>
                               </div>
                               <div class="col-sm-3">
                                   <img style="height:100px;border:1px solid tomato" class="img-responsive emp_img" src="" alt="" />
                               </div>
                          
                       </div>
                   </div>
                   <div class="col-sm-4" style="border: 1px solid #000; border-radius: 2%;">
                       <div class="col-sm-6">
                                            <label>CL Pending:</label>
                                           <span class="cl_pending_show_val"></span>
                                       </div>
                                       <div class="col-sm-6">
                                            <label>EL Pending:</label>
                                           <span class="el_pending_show_val"></span>
                                       </div>
                       <div class="col-sm-8"><label>Working Days</label></div>
                       <div class="col-sm-4"><input value="0" type="text" id="wd" name="wd" class="form-control" /></div>
                       
                       <?php
                            $sundays=0;
                            $total_days=cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
                            for($i=1;$i<=$total_days;$i++){
                                if(date('N',strtotime(date('Y').'-'.date('m').'-'.$i))==7)
                                $sundays++;
                            }
                       ?>
                       <div class="col-sm-8"><label>Holidays</label></div>
                       <div class="col-sm-4"><input value="0" type="text" id="hol" name="hol" class="form-control" />
                       <input value="" type="hidden" id="cl_geanted_value" name="cl_geanted_value" class="form-control"/>
                       <input value="" type="hidden" id="el_geanted_value" name="el_geanted_value" class="form-control"/></div>

                        <div class="col-sm-8"><label>Casual Leave</label></div>
                       <div class="col-sm-4"><input value="0" type="text" id="cl" name="cl" class="form-control" /></div>
                       
                        <div class="col-sm-8"><label>Earn Leave</label></div>
                       <div class="col-sm-4"><input value="0" type="text" id="el" name="el" class="form-control" /></div>
                       
                        <div class="col-sm-8"><label>E.S.I Leave</label></div>
                       <div class="col-sm-4"><input value="0" type="text" id="esil" name="esil" class="form-control" /></div>
                       
                       <div class="col-sm-8"><label>Absent</label></div>
                       <div class="col-sm-4"><input value="0" type="text" id="abs" name="abs" class="form-control" /></div>
                       
                        <div class="col-sm-8"><label>Total Days</label></div>
                       <div class="col-sm-4"><input value="0" readonly type="text" id="td" name="td" class="form-control" /></div>
                       
                       <div class="col-sm-8"><label>Actual Days Worked</label></div>
                       <div class="col-sm-4"><input value="0" type="text" id="adw" name="adw" class="form-control" readonly /></div>
                       
                   </div>
               </div>
               
               <div class="row"><div class="clearfix"></div></div>
               
               <div class="col-sm-11">
                   <div class="col-sm-6" style="border: 1px solid #000; border-radius: 2%; margin-top:10px;">
                       <h5>Income</h5>
                       
                       
                       <div class="col-sm-8"><label style="margin-top: 10px; margin-bottom: 18px;">No. of part cutted</label></div>
                       <div class="col-sm-4"><input value="0" type="text" id="no_of_part" name="no_of_part" class="form-control" /></div>  
                       
                       <div class="col-sm-8"><label style="margin-top: 10px; margin-bottom: 18px;">Rate / Part</label></div>
                       <div class="col-sm-4"><input value="0" type="text" id="rate_per_part" name="rate_per_part" class="form-control" /></div>  

                       <div class="col-sm-8"><label style="font-weight: bold; margin-top: 10px; margin-bottom: 18px;">Piece wages earned</label></div>
                       <div class="col-sm-4"><input value="0" readonly type="text" id="wages_earned" name="wages_earned" style="border: 1px solid black;" class="form-control" /></div>
                       
                       <div class="col-sm-8"><label style="margin-top: 10px; margin-bottom: 18px;">Pay for holiday</label></div>
                       <div class="col-sm-4"><input readonly value="0" type="text" id="pay_for_holiday" name="pay_for_holiday" class="form-control" /></div>  
                       
                       <div class="col-sm-8"><label style="margin-top: 10px; margin-bottom: 18px;">Pay for leave</label></div>
                       <div class="col-sm-4"><input value="0" type="text" id="pay_for_leave" name="pay_for_leave" class="form-control" /></div>  
                       
                       <div class="col-sm-8"><label style="margin-top: 10px; margin-bottom: 18px;"><b>Total wages earned</b></label></div>
                       <div class="col-sm-4"><input readonly value="0" type="text" id="total_wages_earned" name="total_wages_earned" style="border: 1px solid black;" class="form-control" /></div>  
                       
                       <div class="col-sm-6"><label style="margin-top: 10px; margin-bottom: 18px;">Actual HRA % & Amount</label></div>
                       <div class="col-sm-6">
                            <input type="text" name="hraper" value="0" id="hraper" style="width:35%;float:left" class="form-controls"/>
                            <input type="text" name="hraamnt" value="0" id="hraamnt" style="width:65%;float:right" class="form-controls"/>
                       </div>
                       
                   </div>
                   <div class="col-sm-6" style="border: 1px solid #000; border-radius: 2%;margin-top:10px;">
                        <h5>Deductions and Final</h5>
                        
                        <div class="col-sm-6"><label>P.F. % & Amount</label></div>
                        <div class="col-sm-6">
                            <input type="text" name="pfper" value="0" id="pfper" style="width:35%;float:left" class="form-controls"/>
                            <input type="text" name="pfamnt" value="0" id="pfamnt" style="width:65%;float:right" class="form-controls"/>
                        </div>
                        <div class="row"></div>
                        <div class="col-sm-6"><label>E.S.I. % & Amount</label></div>
                        <div class="col-sm-6">
                            <input type="text" name="esiper"  value="0" id="esiper" style="width:35%;float:left" class="form-controls"/>
                            <input type="text" name="esiamnt"  value="0" id="esiamnt" style="width:65%;float:right" class="form-controls"/>
                        </div>
                        <div class="row"></div>
                        
                       <div class="col-sm-8"><label>Professional Tax</label></div>
                       <div class="col-sm-4"><input type="text"  value="0" id="ptax" name="ptax" class="form-control" /></div>
                       
                       <div class="col-sm-8"><label>Insurance</label></div>
                       <div class="col-sm-4"><input type="text"  value="0" id="insur" name="insur" class="form-control" /></div>
                       
                       <div class="col-sm-8 hiddenX"><label>Loan/Advance Taken</label></div>
                       <div class="col-sm-4 hiddenX">
                           <input type="text" readonly="" name="loan_taken" value="0" id="loan_taken" class="form-control" />
                        </div>
                       
                       <div class="col-sm-8"><label>Loan/Advance Adjusted So Far</label></div>
                       <div class="col-sm-4">
                           <input type="text" readonly="" name="loan_adj_till" value="0" id="loan_adj_till" class="form-control" />
                        </div>
                        
                       <div class="col-sm-8 hiddenX"><label>Loan/Advance Monthly Installment</label></div>
                       <div class="col-sm-4 hiddenX">
                           <input type="text" readonly="" value="0" id="loan_mon_adj" name="loan_mon_adj" class="form-control" />
                        </div>
                        
                        <div class="col-sm-8"><label>Loan/Advance Adjusted (This month)</label></div>
                        <div class="col-sm-4">
                           <input type="text" name="loan_adj" value="0" step="0.01" min="0" id="loan_adj" class="form-control" />
                        </div>
                        
                       <hr />
                   </div>
               </div>
               
               <div class="row"><div class="clearfix"><br /></div></div>
               <div class="row"><div class="clearfix"><br /></div></div>
               
               <div class="">
                    <div class="col-sm-11" style="border: 1px solid #000; border-radius: 2%;">
                       <div class="col-sm-2"><label>Gross Salary</label></div>
                       <div class="col-sm-2"><input type="number" value="0" step="0.01" min="0" id="gross" name="gross" class="form-control" readonly /></div>
                       
                       <div class="col-sm-2"><label>Total Deductions</label></div>
                       <div class="col-sm-2"><input type="number" value="0" step="0.01" min="0" id="ded" name="ded" class="form-control" readonly /></div>
                       
                       <div class="col-sm-2"><label>Net Salary</label></div>
                       <div class="col-sm-2"><input type="number" value="0" step="0.01" min="0" name="net" id="net" class="form-control" readonly /></div>
                    </div>
               </div>
                
                <div class="row"><div class="clearfix"><br></div></div>
                <div class="row"><div class="clearfix"><br /></div></div>
                
                <input type="submit"  class="final_sub btn btn-sm btn-success" value="Save" name="save" />
                <input type="submit"  class="final_sub btn btn-sm btn-success" value="Save & Go Back To List" name="savengo" />
               
               
           </form>    
            </div>
                        </div>
                    </section>
                </div>
            </div>

        </div>
        <!--body wrapper end-->

        <!--footer section start-->
        <?php $this->load->view('components/footer'); ?>
        <!--footer section end-->

    </div>
    <!-- body content end-->
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="<?=base_url()?>assets/admin_panel/js/jquery-1.10.2.min.js"></script>

<!-- common js -->
<?php $this->load->view('components/_common_js'); //left side menu ?>

<!--Data Table-->
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/JSZip-2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/DataTables-1.10.18/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/Buttons-1.5.6/js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/Buttons-1.5.6/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/Buttons-1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/Buttons-1.5.6/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/Responsive-2.2.2/js/responsive.bootstrap.min.js"></script>
<!--data table init-->
<script src="<?=base_url()?>assets/admin_panel/js/data-table-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!--Select2-->
<script src="<?=base_url();?>assets/admin_panel/js/select2.js" type="text/javascript"></script>
<script>
    $('.select2').select2();
    if($("#selected_dept").text() == ''){
        // $("#group").select2("open");
    }else{
        // $("#group").select2("val", $("#selected_dept").text()).trigger('change');
        $('#emp_select').select2("open");
    }
    
</script>
<script>

    $('#group').change(function(){
       $gr_id = $(this).val();
        // alert($gr_id);
        
       $.ajax({
           method: 'post',
           dataType: 'json',
           url: "<?= base_url('salary_portal/emp-on-dept-id-new-multiple') ?>",
           data: {gr_id:$gr_id},
           success: function(items){
               // console.log(items);
               $('#emp_select').html('');
               $.each(items, function(index, itemData){
                   $apnd_val = '<option value="'+ itemData.e_id +'">'+ itemData.name +'</option>';
                   $("#emp_select").append($apnd_val);
               });
              $('#emp_select').select2("open");
           },
           error: function(e){
               console.log(e);
           }
       });
       
   });

    $("#emp_select").change(function(){
        
        time_effort();
        
        $emp_id = $(this).val();
        $month = $("#month").val();
        
        if($month != '' && $emp_id != '') {
            
            $.ajax({
            
            url: "<?= base_url('salary_portal/if-salary-slip-made-or-not') ?>",
            method: 'post',
            dataType: 'json',
            data:{id: $emp_id, month: $month},
            success: function(data){
                console.log(data);
                if(data == 0){
                    $(':input[type="submit"]').prop('disabled', false);
                    var emp_img = '';
                    $.ajax({
                        
                        url: "<?= base_url('salary_portal/payroll-emp-search-on-id') ?>",
                        method: 'post',
                        dataType: 'json',
                        data:{id: $emp_id},
                        success: function(emp_details){
                            console.log('emp_details starts');
                            console.log(emp_details);
                            console.log('emp_details ends');
                            $gender = emp_details[0].gender;
                            
                            $("#hraper").val(emp_details[0].hra_percentage)
                            
                            if($gender == "Male" && emp_details[0].picture == ''){
                                emp_img = "<?= base_url() ?>assets/admin_panel/img/employee_img/nopic.png";    
                            }else if($gender == "Female" && emp_details[0].picture == ''){
                                emp_img = "<?= base_url() ?>assets/admin_panel/img/employee_img/nopicf.png";    
                            }else{
                                emp_img = "<?= base_url() ?>assets/admin_panel/img/employee_img/" + emp_details[0].picture;
                            }
                            
                            $esi_stng = emp_details[0].esi;
                            if(emp_details[0].esi_percentage > 0) {
                            $esi_stng1 = 'Yes'; 
                            } else {
                            $esi_stng1 = 'No'; 
                            }
                            
                            $pf_stng = emp_details[0].pf;
                            if(emp_details[0].pf_percentage > 0) {
                            $pf_stng1 = 'Yes'; 
                            } else {
                            $pf_stng1 = 'No'; 
                            }
                            
                            if(emp_details[0].pf_percentage > 0) {
                                var pf_actual_value = (parseFloat(emp_details[0].basic_pay) + parseFloat(emp_details[0].da_amout) + parseFloat(emp_details[0].convenience) + parseFloat(emp_details[0].medical_allowance) + parseFloat(emp_details[0].special_allowance));
                                if(pf_actual_value <= 15000) {
                                var pf = (parseFloat(emp_details[0].basic_pay) + parseFloat(emp_details[0].da_amout) + parseFloat(emp_details[0].convenience) + parseFloat(emp_details[0].medical_allowance) + parseFloat(emp_details[0].special_allowance)) * (parseFloat(emp_details[0].pf_percentage)/100);
                                } else {
                                var pf = (15000 * (parseFloat(emp_details[0].pf_percentage)/100));   
                                }
                            } else {
                            var pf = 0;  
                            }
                            
                            var gross_salary = (parseFloat(emp_details[0].basic_pay) + parseFloat(emp_details[0].da_amout) + parseFloat(emp_details[0].convenience) + parseFloat(emp_details[0].hra_amount) + parseFloat(emp_details[0].medical_allowance) + parseFloat(emp_details[0].special_allowance));

                            $tax_amount = 0;
                            if(gross_salary <= 10000) {
                                $tax_amount = 0;
                            } else if(gross_salary > 10000 && gross_salary <= 15000) {
                                $tax_amount = 110;
                            } else if(gross_salary > 15000 && gross_salary <= 25000) {
                                $tax_amount = 130;
                            } else if(gross_salary > 25000 && gross_salary <= 40000) {
                                $tax_amount = 150;
                            } else {
                                $tax_amount = 200;
                            }

                            // alert(emp_details[0].NAME);
                            $('.dept').text(emp_details[0].name);
                            $('.father_name').text(emp_details[0].father_name);
                            $('.dob').text(emp_details[0].dob);
                            $('.doj').text(emp_details[0].doj);
                            $('.esiapp').text($esi_stng1);
                            $('.pfapp').text($pf_stng1);
                            $('.pf').text(Math.round(pf));
                            $('.pf_percentage_calculation').val(emp_details[0].pf_percentage_calculation);
                            $('.emp_img').attr('src', emp_img);
                            
                            $('.achra').text(Math.round(emp_details[0].hra_amount));
                            $('.convey').text(Math.round(emp_details[0].convenience));
                            $('#cl_geanted_value').val(Math.round(emp_details[0].cl_granted));
                            $('#el_geanted_value').val(Math.round(emp_details[0].el_granted));
                            $('.dept').text(emp_details[0].name);

                            $('#rate_per_part').val(emp_details[0].cutting_rate);
                            $('#ada').val(Math.round(emp_details[0].da_amout));
                            $('#ahra_perctg').val(Math.round(emp_details[0].hra_percentage));
                            $('#ahra').val(Math.round(emp_details[0].hra_amount));
                            $('#con').val(Math.round(emp_details[0].convenience));
                            
                            $('#ptax').val(Math.round($tax_amount));
                            
                            $('#insur').val(Math.round(emp_details[0].insurance));
                            
                            $('#pfper').val(emp_details[0].pf_percentage);
                            $('#pfamnt').val(pf);
                            
                            $('#esiper').val(emp_details[0].esi_percentage);
                            $('#esiamnt').val('0');
                            
                            
                        },
                        error: function(e){
                            console.log(e);
                        }
            
        });
        
        $.ajax({
            
            url: "<?= base_url('salary_portal/payroll-emp-leave-on-id') ?>",
            method: 'post',
            dataType: 'json',
            data:{id: $emp_id},
            success: function(emp_leave_details){
                console.log(emp_leave_details);
                $cl_granted = emp_leave_details[0].cl_granted;
                $el_granted = emp_leave_details[0].el_granted;
                if(emp_leave_details.length == 0){
                    $('.cl_taken').text('0');   
                    $('.el_taken').text('0');
                    $('.cl_pending_show_val').text($cl_granted);   
                    $('.el_pending_show_val').text($el_granted);
                }else{
                    if(emp_leave_details[0].all_cl == '' || emp_leave_details[0].all_cl == null){
                        $('.cl_taken').text('0');
                        $('.cl_pending_show_val').text($cl_granted);
                    }else{
                        $('.cl_taken').text(emp_leave_details[0].all_cl);
                        $cll_blnc = parseInt(emp_leave_details[0].cl_granted) - parseInt(emp_leave_details[0].all_cl);
                        if($cll_blnc > 0) {
                           $('.cl_pending_show_val').text($cll_blnc); 
                        } else {
                        $('.cl_pending_show_val').text(0);  
                        }
                    }
                    
                    if(emp_leave_details[0].all_el == '' || emp_leave_details[0].all_el == null){
                        if($el_granted > 0) {
                        $('.el_taken').text('0');
                        } else {
                        $('.el_taken').text('N/A');   
                        }
                        $('.el_pending_show_val').text($el_granted);
                    }else{
                        if($el_granted > 0) {
                        $('.el_taken').text(emp_leave_details[0].all_el);
                        $ell_blnc = parseInt(emp_leave_details[0].el_granted) - parseInt(emp_leave_details[0].all_el);
                        if($ell_blnc > 0) {
                           $('.el_pending_show_val').text($ell_blnc); 
                        } else {
                        $('.el_pending_show_val').text(0);  
                        }
                        } else {
                        $('.el_taken').text('N/A');
                        $('.el_pending_show_val').text('N/A');
                        }
                    }    
                }
            },
            error: function(e){
                console.log(e);
            }
            
        });
        
         $.ajax({
            
            url: "<?= base_url('salary_portal/payroll-emp-advance-on-id') ?>",
            method: 'post',
            dataType: 'json',
            data:{id: $emp_id},
            success: function(emp_advance_taken){
                console.log(emp_advance_taken);
                if(emp_advance_taken.length == 0){
                    $('#loan_taken').val('0'); 
                    $('#loan_mon_adj').val('0'); 
                }else{
                    $('#loan_taken').val(Math.round(emp_advance_taken[0].amount_total));    
                    $('#loan_mon_adj').val(Math.round(emp_advance_taken[0].monthly_advance_adjustment)); 
                }
            },
            error: function(e){
                console.log(e);
            }
            
        });
        
         $.ajax({
            
            url: "<?= base_url('salary_portal/payroll-emp-advance-paid-on-id') ?>",
            method: 'post',
            dataType: 'json',
            data:{id: $emp_id},
            success: function(emp_advance_paid){
                console.log(emp_advance_paid);
                if(emp_advance_paid.length == 0){
                    $('#loan_adj_till').val(0);    
                    $paid = 0;
                }else{
                    $('#loan_adj_till').val(Math.round(emp_advance_paid[0].loan_paid));    
                    $paid = emp_advance_paid[0].loan_paid;
                }
                
                 
            },
            error: function(e){
                console.log(e);
            }
            
        });
        
       $(document).ajaxStop(function () {
          // 0 === $.active
          // adjustment calc
        
                $loan_taken = $("#loan_taken").val();
                $loan_adj_till = $("#loan_adj_till").val();
                
                // alert($loan_taken + '...' + $loan_adj_till);

                if(+$loan_taken == +$loan_adj_till){
                    $("#loan_adj").val('0');
                    $("#loan_mon_adj").val('0');
                    $("#loan_taken").val('0');
                    $("#loan_adj_till").val('0');
                }else{
                    $loan_pending = parseFloat($loan_taken) - parseFloat($loan_adj_till);
                    $instl_amnt = parseFloat($("#loan_mon_adj").val());
    
                    // alert($loan_pending + '...' + $instl_amnt);
                        
                    if($loan_pending >= $instl_amnt){
                        $("#loan_adj").val($instl_amnt);
                    }else if($loan_pending < $instl_amnt){
                        $("#loan_adj").val($loan_pending);
                    }else{
                        $("#loan_adj").val('0');
                    }
                }
       
    //   days calculation
        $val = parseInt($("#hol").val()) + parseInt($("#cl").val()) + parseInt($("#el").val()) + parseInt($("#esil").val()) + parseInt($("#abs").val());
        $actual_d_w = parseInt($("#wd").val()) - parseInt($("#hol").val()) - parseInt($("#cl").val()) - parseInt($("#el").val()) - parseInt($("#esil").val()) - parseInt($("#abs").val());
        $("#td").val($val);
        $("#adw").val($actual_d_w);
        
        // CL area -- fetch already taken cl for the current session
        
        var total_cl_taken_no = parseInt($("#cl_geanted_value").val());
        var total_el_taken_no = parseInt($("#el_geanted_value").val());
        var cl_leave_day = 0;
        var cl = parseInt($("#cl").val());
        var el = parseInt($("#cl").val());
        var cl_taken = parseInt($(".cl_taken").text());
        var el_taken = parseInt($(".el_taken").text());
        var tot_cl = (cl + cl_taken);
        var tot_el = (el + el_taken);
        var tot_cl_el = (cl + el);
        var tot_cl_el_granted = (parseInt(tot_cl) + parseInt(tot_el));
        
        // if(tot_cl > total_cl_taken_no) {
        //     alert("Casual Leave exceeds Maximum Alloted");
        //     var cl_leave_day = (total_cl_taken_no - tot_cl);
        //     if(cl_leave_day > 0) {
        //         $("#cl").val(cl_leave_day);
        //     } else {
        //     $("#cl").val(0);
        //     }
        // }
        
        // if(tot_el > total_el_taken_no) {
        //     alert("Earn Leave exceeds Maximum Alloted");
        //     var el_leave_day = (total_el_taken_no - tot_el);
        //     if(el_leave_day > 0) {
        //         $("#el").val(el_leave_day);
        //     } else {
        //     $("#el").val(0);
        //     }
        // }
        
        var total_wages = parseInt($('#no_of_part').val() * $('#rate_per_part').val());
        $("#wages_earned").val(Math.round(total_wages));
        
        
        // ABSENT CALCULATION and D.A. Calculation
        
        
        $val = parseInt($("#hol").val()) + parseInt($("#cl").val()) + parseInt($("#el").val()) + parseInt($("#esil").val()) + parseInt($("#abs").val());
        $actual_d_w = parseInt($("#wd").val()) - parseInt($("#hol").val()) - parseInt($("#cl").val()) - parseInt($("#el").val()) - parseInt($("#esil").val()) - parseInt($("#abs").val());
        $("#td").val($val);
        $("#adw").val($actual_d_w);
        
        // HRA calc
        
        var ahra = (parseFloat($("#abasic").val())) * (parseFloat($("#ahra_perctg").val())/100); // 15% is static here should come from db
        $("#ahra").val(Math.round(ahra));
        
        // PF ded. calc
        if(($("#pfper").val()) > 0) {
            var actual_pf_amnt = (parseFloat($("#abasic").val()));
            if(actual_pf_amnt <= 15000) {
            var pfamnt = (parseFloat($("#abasic").val()) ) * (parseFloat($("#pfper").val())/100);
            } else {
            var pfamnt = (15000 * (parseFloat($("#pfper").val())/100));    
            }
                } else {
                   var pfamnt = 0;  
                }
        $("#pfamnt").val(Math.round(pfamnt));
        
        // ESI ded calc
        
        var esiamnt = (parseFloat($("#abasic").val()) + + parseFloat($("#ahra").val()) ) * (parseFloat($("#esiper").val())/100); 
        $("#esiamnt").val(Math.round(esiamnt));
        
        // gross salary and ded and net
        var gross = +$("#abasic").val() + +$("#ahra").val();
        $("#gross").val(Math.round(gross));  
        // alert(gross);
        $tax_amount = 0;
        if(gross <= 10000) {
            $tax_amount = 0;
        } else if(gross > 10000 && gross <= 15000) {
            $tax_amount = 110;
        } else if(gross > 15000 && gross <= 25000) {
            $tax_amount = 130;
        } else if(gross > 25000 && gross <= 40000) {
            $tax_amount = 150;
        } else {
            $tax_amount = 200;
        }
        $('#ptax').val(Math.round($tax_amount));
        
        // alert($("#esiamnt").val())
        final_esi_amnt = Math.ceil($("#esiamnt").val());

        var ded = +$("#pfamnt").val() + +final_esi_amnt + +$("#ptax").val() + +$("#insur").val() + +$("#loan_adj").val();
        var net = gross - ded;
        
        $("#ded").val(Math.round(ded));
        $("#net").val(Math.round(net));
        
    });
       
   $("#ded").on('blur', function(){
    //   alert();
        $g = $("#gross").val();
        $d = $("#ded").val();
        $res = +$g - +$d;
        $("#net").val(Math.round($res));
   });
                       
                }else{
                    
                    alert('Salary slip has already made.');
                    $('#emp_select').val(null).trigger('change');
                    $(':input[type="submit"]').prop('disabled', true);
                        
                }
            },
            error: function(e){
                console.log(e);
            }
            
        });
        
        } else {
            alert('Please select month first.');
            // $('#emp_select').val(null).trigger('change');
        }
    });
</script>

<script>
    $(document).ready(function(){
        
        $("#month").change(function(){
            time_effort();
        });
        
        //   days calculation
    
        $("#cl, #el, #esil, #abs").blur(function(){
            // $val = parseInt($("#hol").val()) + parseInt($("#cl").val()) + parseInt($("#el").val()) + parseInt($("#esil").val()) + parseInt($("#abs").val());
            // $actual_d_w = parseInt($("#wd").val()) - parseInt($("#hol").val()) - parseInt($("#cl").val()) - parseInt($("#el").val()) - parseInt($("#esil").val()) - parseInt($("#abs").val());
            // $("#td").val($val);
            // $("#adw").val($actual_d_w);
            
            // CL area -- fetch already taken cl for the current session
            
            var month1 = parseInt($("#month").find(":selected").text().split('~')[1]);
            
            var total_cl_taken_no = parseInt($("#cl_geanted_value").val());
            var total_el_taken_no = parseInt($("#el_geanted_value").val());
            var cl_leave_day = 0;
            var cl = parseInt($("#cl").val());
            var el = parseInt($("#el").val());
            var cl_taken = parseInt($(".cl_taken").text());
            var el_taken = parseInt($(".el_taken").text());
            var tot_cl = (cl + cl_taken);
            var tot_el = (el + el_taken);
            var tot_cl_el = (cl + el);
            var tot_cl_el_granted = (parseInt(tot_cl) + parseInt(tot_el));
            
            // if(tot_cl > total_cl_taken_no) {
            //     alert("Casual Leave exceeds Maximum Alloted");
            //     var cl_leave_day = (total_cl_taken_no - tot_cl);
            //     if(cl_leave_day > 0) {
            //         $("#cl").val(cl_leave_day);
            //     } else {
            //     $("#cl").val(0);
            //     }
            // }
            
            // if(tot_el > total_el_taken_no) {
            //     alert("Earn Leave exceeds Maximum Alloted");
            //     var el_leave_day = (total_el_taken_no - tot_el);
            //     if(el_leave_day > 0) {
            //         $("#el").val(el_leave_day);
            //     } else {
            //     $("#el").val(0);
            //     }
            // }
            
            // ESI CALCULATION and D.A. Calculation
            if($("#esil").val() > 0){
                var esi_leave_day = parseInt($('#esil').val());
                var abasic = parseFloat($("#abasic").val()) - ((parseFloat($("#abasic").val()) / month1) * esi_leave_day);
    
                $("#abasic").val(Math.round(abasic));
            }
            
            // ABSENT CALCULATION and D.A. Calculation
            if($("#abs").val() > 0){
                var absent_leave_day = parseInt($('#abs').val());
                var abasic1 = parseFloat($("#abasic").val()) - ((parseFloat($("#abasic").val()) / month1) * absent_leave_day);
    
                $("#abasic").val(Math.round(abasic1));
            }
            
            $val = parseInt($("#hol").val()) + parseInt($("#cl").val()) + parseInt($("#el").val()) + parseInt($("#esil").val()) + parseInt($("#abs").val());
            $actual_d_w = parseInt($("#wd").val()) - parseInt($("#hol").val()) - parseInt($("#cl").val()) - parseInt($("#el").val()) - parseInt($("#esil").val()) - parseInt($("#abs").val());
            $("#td").val($val);
            $("#adw").val($actual_d_w);
            
            // HRA calc
            
            var ahra = (parseFloat($("#abasic").val())) * (parseFloat($("#ahra_perctg").val())/100); // 15% is static here should come from db
            $("#ahra").val(Math.round(ahra));
            
            // PF ded. calc
            if(($("#pfamnt").val() == 0) || ($("#pfamnt").val() == '')) {
            if(($("#pfper").val()) > 0) {
                var actual_pf_amnt = (parseFloat($("#abasic").val()));
                if(actual_pf_amnt <= 15000) {
                var pfamnt = (parseFloat($("#abasic").val())) * (parseFloat($("#pfper").val())/100);
                } else {
                var pfamnt = (15000 * (parseFloat($("#pfper").val())/100));    
                }
                    } else {
                        var pfamnt = 0;  
                    }
            } else {
                var pfamnt = $("#pfamnt").val();  
            }
            $("#pfamnt").val(Math.round(pfamnt));
            
            // ESI ded calc
            
            var esiamnt = (parseFloat($("#abasic").val())) * (parseFloat($("#esiper").val())/100); 
            $("#esiamnt").val(Math.round(esiamnt));
            
            // gross salary and ded and net
            var gross = +$("#abasic").val() + +$("#ahra").val();
            $("#gross").val(Math.round(gross));  
            // alert(gross);
            
            $tax_amount = 0;
            if(gross <= 10000) {
            $tax_amount = 0;
            } else if(gross > 10000 && gross <= 15000) {
            $tax_amount = 110;
            } else if(gross > 15000 && gross <= 25000) {
            $tax_amount = 130;
            } else if(gross > 25000 && gross <= 40000) {
            $tax_amount = 150;
            } else {
            $tax_amount = 200;
            }
            $('#ptax').val(Math.round($tax_amount));
    
            // var ded = +$("#pfamnt").val() + +$("#esiamnt").val() + +$("#ptax").val() + +$("#insur").val() + +$("#loan_adj").val();
            // var net = gross - ded;
            
            // $("#ded").val(Math.round(ded));
            // $("#net").val(Math.round(net));
            
            
        });
        
        $("#no_of_part, #rate_per_part, #pay_for_holiday, #pay_for_leave, #hraper, #hraamnt, #pfper, #esiper, #ptax, #insur, #loan_adj").blur(function(){
           
           no_of_part = $("#no_of_part").val();
           rate_per_part = $("#rate_per_part").val();
           pay_for_holiday = $("#pay_for_holiday").val();
           pay_for_leave = $("#pay_for_leave").val();
           hraper = $("#hraper").val();
           hraamnt = $("#hraamnt").val();
           
           wages_earned = parseFloat(no_of_part) * parseFloat(rate_per_part);
           $("#wages_earned").val(wages_earned);

           $sub_holidays = parseFloat($("#hol").val()) + parseFloat($("#cl").val()) + parseFloat($("#el").val()) + parseFloat($("#esil").val());
           pay_for_holiday = Math.round((parseFloat(wages_earned) / parseFloat($("#adw").val()) * $sub_holidays))
           $("#pay_for_holiday").val(pay_for_holiday);
           
           total_wages_earned = parseFloat(pay_for_holiday) + parseFloat(pay_for_leave) + wages_earned
           $("#total_wages_earned").val(total_wages_earned.toFixed(2))


            
            // HRA calc
            
            var ahra = (parseFloat(total_wages_earned) * (parseFloat($("#hraper").val())/100)); 
            $("#hraamnt").val(Math.round(ahra))
    
            gross = parseFloat(ahra) + total_wages_earned;
            $("#gross").val(Math.round(gross))
    
            // PF ded. calc
            
            if(total_wages_earned <= 15000) {
                var pfamnt = (parseFloat(total_wages_earned)) * (parseFloat($("#pfper").val())/100);
            } else {
                var pfamnt = (15000 * (parseFloat($("#pfper").val())/100));    
            }
            $("#pfamnt").val(Math.round(pfamnt));
            
            // ESI ded calc
            
            var esiamnt = (parseFloat($("#gross").val())) * (parseFloat($("#esiper").val())/100); 
            $("#esiamnt").val(Math.ceil(esiamnt));
    
            $tax_amount = 0;
            if(gross <= 10000) {
                $tax_amount = 0;
            } else if(gross > 10000 && gross <= 15000) {
                $tax_amount = 110;
            } else if(gross > 15000 && gross <= 25000) {
                $tax_amount = 130;
            } else if(gross > 25000 && gross <= 40000) {
                $tax_amount = 150;
            } else {
                $tax_amount = 200;
            }
            
            $('#ptax').val(Math.round($tax_amount));
    
            var ded = parseFloat(pfamnt) + parseFloat($("#esiamnt").val()) + parseFloat($tax_amount) + parseFloat($("#insur").val()) + parseFloat($("#loan_adj").val());
            var net = gross - ded;
            
            $("#ded").val(Math.round(ded));
            $("#net").val(Math.round(net));
            
            
        });
    
    
    });
</script>

<script>

    function time_effort(){
        mday = $("#month").find(":selected").text().split('~')[1];
        // $("#wd").val(mday);

        var d = new Date();
        var year = parseInt(d.getFullYear());
        var month = parseInt($("#month").find(":selected").text().split('~')[2]) - 1;
        var month1 = parseInt($("#month").find(":selected").text().split('~')[2]);
        var day = 1;
        // alert(year + 'vv' + month);
        var c= 0;
        var date = new Date(year, month, day);
        while(date.getMonth() === month) {
            if(date.getDay() === 0) {
                c++;
            }
            day++;
            date = new Date(year, month, day);
        }
        // alert(c);

        $.ajax({
        
            url: "<?= base_url('salary_portal/payroll-emp-leave-from-holiday-list') ?>",
            method: 'post',
            dataType: 'json',
            data:{month: month1, year: year},
            success: function(emp_advance_paid){
                // alert(emp_advance_paid);
                if(emp_advance_paid > 0) {
                    c += parseInt(emp_advance_paid);
                } else {
                    c += 0;   
                }
                
                // $("#hol").val(c);
                $("#wd").val((parseInt(mday) - parseInt(c)) + emp_advance_paid);
                $("#hol").val(emp_advance_paid);
                $actual_days_worked = parseInt(mday) - parseInt(c);
                $("#adw").val($actual_days_worked);
                
                
            },
            done: function(e){
              $("#cl").trigger('focus');  
            },
            error: function(e){
                console.log(e);
            }
            
        });
    }

        // $(document).on('keyup keypress', 'input[type="text"]', function(e) {
        //   if(e.which == 13) {
        //   e.preventDefault();
        //   return false;
        //   }
        // });
        // $(document).on('keyup keypress', 'input[type="number"]', function(e) {
        //   if(e.which == 13) {
        //   e.preventDefault();
        //   return false;
        //   }
        // });
</script>

</body>
</html>