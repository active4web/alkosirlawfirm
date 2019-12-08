<?php
$url=base_url();
ob_start();
if(!isset($_SESSION['admin_name'])||$_SESSION['admin_name']==""){ 
header("Location:$url"."admin/login"); 
}
else{
$id_admin=$_SESSION['id_admin'];
$admin_name=$_SESSION['admin_name'];
$last_login=$_SESSION['last_login'];
$curt='team_work';
}

foreach($data as $result){
$id = $result->id;
$title_eng = $result->title_eng;
$title_ar = $result->title_ar;
$details = $result->details;
$details_ar = $result->details_ar;
$jobtype_id = $result->jobtype_id;
$type = $result->type;
$user_name=get_table_filed("job_type",array("id"=>$jobtype_id),"name_ar");
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
<title>تعديل </title>
<?php include ("design/inc/header.php");?>
</head>
<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
		<!-- BEGIN HEADER -->
        <?php include ("design/inc/topbar.php");?>
		<script type="text/javascript" src="<?=$url?>design/ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="<?=$url?>design/ckfinder/ckfinder.js"></script>

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
			<div class="page-content" style="min-height: 1261px;">
                    <!-- BEGIN PAGE HEAD-->
                    
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
							<a href="<?=$url.'admin';?>"><?=lang('admin_panel');?></a>
							<i class="fa fa-circle"></i>
						</li>
						<li>
                        <a href="<?=$url.'admin/teamwork';?>">فريق العمل</a>
                        <i class="fa fa-circle"></i>
						</li>
                        <li>
                            <span class="active">تعديل منتج</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            <div class="profile-sidebar">
                                <!-- PORTLET MAIN -->

                                <!-- END PORTLET MAIN -->
                            </div>
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                       <!--Start from-->	
                                <div class="tab-content">					
                                    <div class="tab-pane active" id="tab_5">
                                        <div class="portlet box blue ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-gift"></i>تعديل</div>
                                            </div>
                                        <div class="portlet light bordered form-fit">
                                            <div class="portlet-title">
                                                <div class="caption"></div>
                                                <div class="actions"></div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
    <form action="<?=$url;?>admin/teamwork/edit_action" class="form-horizontal form-bordered"  method="post" enctype="multipart/form-data">
                                               <input type="hidden" name="id" value="<?= $id?>">
											   
											        <div class="form-body">

                                                    <div class="form-group">
														<div class="col-md-2"></div>
                                                            <div class="col-md-8">
                                                            <span class="help-block" style="float:right;width:100%;margin-bottom:20px">نوع الموظف</span>
                                                            <span style="float:right">
                                        <input type="radio" style="height:20px;float:right;width:80px;" name="type" value="1" class="form-control"  <?php if($type==1){?>checked <?php }?>>شريك</span>
                                                            <span style="float:right">
                                        <input type="radio" style="height:20px;float:right;width:80px;" name="type" value="2" class="form-control"  
<?php if($type==2){?>checked <?php }?> >غير ذلك
                                        </span>
															</div>
															<div class="col-md-2"></div>
                                                        </div>



                                                        <div class="form-group">
														<div class="col-md-2"></div>
                                                            <div class="col-md-8">
                                                            <span class="help-block" style="float:right">  الوظيفة &nbsp;&nbsp;(<?= $user_name;?>)</span>
                                                            <select class="form-control" name="jobtype_id">
                                                            <option value="">من فضلك الوظيفية</option>
                                                            <?php #endregion
                                                            foreach($job_type as $job_type){
                                                            ?>
                                                                <option value="<?=$job_type->id?>"><?=$job_type->name_ar?></option>
                                                            <?php }?>
                                                                <!--<option value="1">Admin</option>
                                                                <option value="2">Editor</option>-->
                                                            </select>
															</div>
															<div class="col-md-2"></div>
                                                        </div>


														
                                                        <div class="form-group">
														<div class="col-md-2"></div>
                                                            <div class="col-md-8">
                                                            <span class="help-block">الأسم</span>
                                                                <input type="text"  value="<?= $title_ar?>" placeholder="الأسم" class="form-control" name="title_ar">
                                                                <!--<span class="help-block"> This is inline help </span>-->
															</div>
															<div class="col-md-2"></div>
                                                        </div>
                                                        <div class="form-group">
														<div class="col-md-2"></div>
                                                            <div class="col-md-8">
                                                            <span class="help-block" style="float:left">Name</span>
                                <input type="text"  style="text-align:left" value="<?= $title_eng?>" placeholder="Name" class="form-control" name="title_eng">
                                                                <!--<span class="help-block"> This is inline help </span>-->
															</div>
															<div class="col-md-2"></div>
                                                        </div>
                                                        


														<div class="form-group">
																		<div class="col-md-2"></div>
																		<div class="col-md-12" style="text-align:center">
																		<span class="help-block" style="padding:20px;"> المحتوي </span>
																		<textarea  name="details_ar" id="details_ar"><?= $details_ar;?></textarea>
																		</div>
																	</div>

																	<div class="form-group">
																		<div class="col-md-2"></div>
																		<div class="col-md-12" style="text-align:center">
																		<span class="help-block" style="padding:20px;">Details</span>
																		<textarea  name="details_eng" id="details"><?= $details;?></textarea>
																		</div>
																	</div>

														
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green">
                                                                <i class="fa fa-check"></i>حفظ التعديل</button>
                                                                <button type="reset" class="btn default">الغاء</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                       
									</div>	
<!---END FROM-->
												
                                            
                                      
                                </div>
                            </div>
                            <!-- END PROFILE CONTENT -->
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php include ("design/inc/footer.php");?>
        <!-- END FOOTER -->

        <?php include ("design/inc/footer_js.php");?>
<?php 
if(isset($_SESSION['msg'])){
?>
<script>
$(document).ready(function(e) {
 toastr.success("<?php echo $_SESSION['msg']?>");
});
</script>
<?php }?>
<script type="text/javascript">
	//CKEDITOR.replace('description');
	var details = CKEDITOR.replace( 'details' );
	var details_ar = CKEDITOR.replace( 'details_ar' );
	CKFinder.setupCKEditor( details );
	CKFinder.setupCKEditor( details_ar );
</script>
</body></html>