<?php
//session_start();
ob_start();
if(!isset($_SESSION['admin_name'])||$_SESSION['admin_name']==""){ 
header("Location:$url"."admin/login"); 
}
else{
$id_admin=$_SESSION['id_admin'];
$admin_name=$_SESSION['admin_name'];
$last_login=$_SESSION['last_login'];
$curt='home';
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8">
<title>لوحة التحكم</title>
<?php include ("design/inc/header.php");?>
</head>
<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
        <!-- BEGIN HEADER -->
        <?php include ("design/inc/topbar.php");?>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <?php include ("design/inc/sidebar.php");?>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>لوحة التحكم الرئيسية<small></small></h1>
                        </div>
                        <!-- END PAGE TITLE -->
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <!--<ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">Dashboard</span>
                        </li>
                    </ul>-->
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
<?php
$startdate=$this->input->post("startdate");
$enddate=$this->input->post("enddate");


$this->db->select('*')
->from('visiting')
->where('date >= ',$startdate)
->where('date <= ',$enddate);
$q = $this->db->get();
$array['userDetails'] = $q->result_array();
//echo $this->db->last_query();
 //print_r($array);
 $total_visitor=count($q->result_array());

$this->db->select_sum('visit_num');
$this->db->from('visiting');
$this->db->where('date>=',$startdate);
$this->db->where('date<=',$enddate);
$query_week= $this->db->get();
//echo $this->db->last_query();
//die();
 $total_visiting_week= $query_week->row()->visit_num;
    
?>
                      
                       
                        
                        
                      
                
            <div class="col-lg-12 dashboard-stat2 bordered">
                            <div class="">
								
                                <div class="display">
                                    <div class="number">
                                       
                                        <small style="font-size:13px"> تفاصيل احصائيات الزوار والزيارات  </small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-users"></i>
                                    </div>
                                </div>
                                
                         
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_2">
<thead>
<tr>
<th style="text-align:right;padding-right:15px">العنوان</th>
<th  style="text-align:right;padding-right:15px">القيمة</th>
</tr>
</thead>
<tfoot>
<tr>
<th> </th>
<th> </th>
</tr>
<tr>
<th  style="text-align:right;padding-right:15px;direction:ltr;font-size:12px"> (<?= $enddate ."____".$startdate;?>) الزوار </th>
<th style="text-align:right;padding-right:15px;direction:ltr;font-size:12px;color: #1e5b13;"><?= ($total_visitor)?></th>
</tr>

</tfoot>
</table>

              </div>
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
 <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_2">
<thead>
<tr>
<th style="text-align:right;padding-right:15px">العنوان</th>
<th style="text-align:right;padding-right:15px">القيمة</th>
</tr>
</thead>

<tfoot>
<tr>
<th> </th>
<th> </th>
</tr>
<tr>
<th style="text-align:right;padding-right:15px;direction:ltr;font-size:12px">(<?= $enddate ."____".$startdate;?>)  الزيارات </th>
<th style="text-align:right;padding-right:15px;direction:ltr;font-size:12px;color: #1e5b13;"><?=$total_visiting_week;?></th>
</tr>

</tfoot>

</table>

                   
               </div>             
                        </div>
                           </div>
                        
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php include ("design/inc/footer.php");?>
        <!-- END FOOTER -->

        <?php include ("design/inc/footer_js.php");?>
    </body>
</html>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
</script> 