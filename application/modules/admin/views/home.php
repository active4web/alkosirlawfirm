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
                        
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 bordered">
							<a href="<?= DIR?>admin/messages/messages_jobs/">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-green-sharp">
                                            <span data-counter="counterup" data-value="<?php
$job_messages=$this->db->get_where("jobs_from",array("view"=>'0'))->result();
echo count($job_messages);?>"></span>
                                            <small class="font-green-sharp"></small>
                                        </h3>
                                        <small style="font-size:13px">التوظيف والتدريب</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-envelope"></i>
                                    </div>
                                </div>
</a>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 bordered">
							<a href="<?= DIR?>admin/messages/messages_services">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-red-haze">
											<span data-counter="counterup" data-value="<?php $job_messages=$this->db->get_where("jobs_from",array("view"=>'0'))->result();
echo count($job_messages);?>"></span> </h3>
                <small style="font-size:13px"> نماذج التواصل مع المنشاءات</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-envelope"></i>
                                    </div>
                                </div>
</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 bordered">
							<a href="<?= DIR?>admin/messages/messages_contact">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-blue-sharp">
                                            <span data-counter="counterup" data-value="<?php
$job_messages=$this->db->get_where("messages",array("view"=>'0'))->result();
echo count($job_messages);?>"></span>
                                        </h3>
                                        <small style="font-size:13px">رسائل التواصل معانا</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-envelope"></i>
                                    </div>
                                </div>
</a>
                            </div>
                        </div>
                        
                         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 bordered">
							<a href="<?= DIR?>admin/news_letter/mylist">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-blue-sharp">
                                            <span data-counter="counterup" data-value="<?php
$job_messages=$this->db->get_where("news_letter")->result();
echo count($job_messages);?>"></span>
                                        </h3>
                                        <small style="font-size:13px">القائمة البريدية</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-envelope"></i>
                                    </div>
                                </div>
</a>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 bordered">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-purple-soft">
                                            <span data-counter="counterup" data-value="<?=count($total_final);?>"></span>
                                        </h3>
                                        <small style="font-size:13px">اجمالى  الزوار </small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                                 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 bordered">
								<?php
	$this->db->select_sum('visit_num');
    $this->db->from('visiting');
    $query = $this->db->get();
    $total_visitor_all= $query->row()->visit_num;
    
   	$day_d=date('d');
$month_d=date('m'); 
$year_d=date('Y');  

	$date=date_create(date("Y-m-d"));
date_sub($date,date_interval_create_from_date_string("7 days"));
$week_y=date_format($date,"Y");
$week_m=date_format($date,"m");
$week_d=date_format($date,"d");
	 	$this->db->select_sum('visit_num');
    $this->db->from('visiting');
    $this->db->where('day_t',$day_d);
    $query_day= $this->db->get();
    $total_visiting_day= $query_day->row()->visit_num;	
    
        	$this->db->select_sum('visit_num');
    $this->db->from('visiting');
     $this->db->where('month_d',$month_d);
    $query_monthy= $this->db->get();
    $total_visiting_month= $query_monthy->row()->visit_num;
    
    
          	$this->db->select_sum('visit_num');
    $this->db->from('visiting');
   $this->db->where('day_t>=',$week_d);
$this->db->where('month_d>=',$week_m);
$this->db->where('year_d>=',$week_y);
    $query_week= $this->db->get();
    $total_visiting_week= $query_week->row()->visit_num;
    



$this->db->select('*');
$this->db->from('visiting');
$this->db->where('day_t>=',$week_d);
$this->db->where('month_d>=',$week_m);
$this->db->where('year_d>=',$week_y);

$result_week = $this->db->get()->result_array();

								?>
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-purple-soft">
                                            <span data-counter="counterup" data-value="<?=$total_visitor_all;?>"></span>
                                        </h3>
                                        <small style="font-size:13px">اجمالى  الزيارات </small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-users"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
<div class="col-lg-12 dashboard-stat2 bordered">
    <form method="post" action="<?=base_url()?>admin/statistics">
<div class="form-group">
<div class="col-md-3">
<span class="help-block"> من تاريخ</span>
<input name="startdate"  value="<?=date("Y-m-d H:i");?>"  style="direction: ltr;width: 100%;" size="18" class="form-control" type="date" required>
</div>

<div class="col-md-3">
<span class="help-block">الى تاريخ</span>
<input name="enddate"  value="<?=date("Y-m-d H:i");?>"  style="direction: ltr;width: 100%;" size="18" class="form-control" type="date" required>
</div>
<div class="col-md-2">
    <span class="help-block"> <br> </span>
<button id="sample_editable_1_2_new" class="btn sbold green addbutton">بحث	<i class="fa fa-search"></i></button>
</div>
<div class="col-md-2"></div>

</div>
</form>
    
</div>                    
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
<th  style="text-align:right;padding-right:15px;direction:ltr;font-size:12px"> (<?=date("Y-m-d");?>) الزوار اليومية</th>
<th style="text-align:right;padding-right:15px;direction:ltr;font-size:12px;color: #1e5b13;"><?= count($total_visitor_day)?></th>
</tr>
<tr>
<th style="text-align:right;padding-right:15px;direction:ltr;font-size:12px"> (<?= $week_y."-".$week_m."-".$week_d.":".$year_d."-".$month_d."-".$day_d;?>) الزوار الاسبوعية</th>
<th style="text-align:right;padding-right:15px;direction:ltr;font-size:12px;color: #1e5b13;"> <?= count($result_week)?> </th>
</tr>
<tr>
<th style="text-align:right;padding-right:15px;direction:ltr;font-size:12px">  (<?=date("Y-m");?>) الزوار الشهرية</th>
<th style="text-align:right;padding-right:15px;direction:ltr;font-size:12px;color: #1e5b13;"><?= count($total_visitor_month)?></th>
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
</tfoot>
<tfoot>
<tr>
<th> </th>
<th> </th>
</tr>
<tr>
<th style="text-align:right;padding-right:15px;direction:ltr;font-size:12px"> (<?=date("Y-m-d");?>) الزيارات اليومية</th>
<th style="text-align:right;padding-right:15px;direction:ltr;font-size:12px;color: #1e5b13;"><?=$total_visiting_day;?></th>
</tr>
<tr>
<th style="text-align:right;padding-right:15px;direction:ltr;font-size:12px"> (<?=  $week_y."-".$week_m."-".$week_d.":".$year_d."-".$month_d."-".$day_d;?>) الزيارات الاسبوعية</th>
<th style="text-align:right;padding-right:15px;direction:ltr;font-size:12px;color: #1e5b13;"><?=$total_visiting_week?></th>
</tr>
<tr>
<th style="text-align:right;padding-right:15px;direction:ltr;font-size:12px"> (<?=date("Y-m");?>) الزيارات الشهرية</th>
<th style="text-align:right;padding-right:15px;direction:ltr;font-size:12px;color: #1e5b13;"><?=$total_visiting_month;?></th>
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