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
$curt='setting';
}
$site_info=$this->db->get_where('site_info')->result();
foreach($site_info as $site_info){
	$logo=$site_info->logo;
	$favicon=$site_info->favicon;
	$site_name_eng=$site_info->name_site;
	$name_site_ar=$site_info->name_site_ar;
	$face=$site_info->facebook;
	$twitter=$site_info->twitter;
	$instagram=$site_info->instagram;
	$key_words=$site_info->keywords;
	$meta_desc=$site_info->description;
	$header_email=$site_info->header_email;
	$header_phone=$site_info->header_phone;
	$footer_email=$site_info->footer_email;
	$footer_phone=$site_info->footer_phone;
	$link_url=$site_info->pdf;
	$address_eng=$site_info->address_eng;
	$address_ar=$site_info->address_ar;
    $message_email=$site_info->message_email;
    $about_footer_ar=$site_info->about_footer_ar;
    $about_footer_en=$site_info->about_footer_en;
	$intor_pdf=$site_info->intor_pdf;
	$header_image=$site_info->header_image;
	$work_hrs_en=$site_info->work_hrs_en;
	$work_hrs_ar=$site_info->work_hrs_ar;
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
<title>الاعدادات</title>
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
			<div class="page-content" style="min-height: 1261px;">
                    <!-- BEGIN PAGE HEAD-->
                    
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="<?=$url.'admin';?>">لوحة التحكم</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">الاعدادات</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            <div class="profile-sidebar">
                                <!-- PORTLET MAIN -->                                <!-- END PORTLET MAIN -->
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
                                                    <i class="fa fa-gift"></i>الاعدادات</div>
                                            </div>
                                        <div class="portlet light bordered form-fit">
                                            <div class="portlet-title">
                                                <div class="caption"></div>
                                                <div class="actions"></div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?=$url;?>admin/update_setting" class="form-horizontal form-bordered"  method="post" enctype="multipart/form-data">
                                                    <div class="form-body">
                                                        
<div class="form-group">
<div class="col-md-5" style="text-align:center">
<div class="fileinput fileinput-new" data-provides="fileinput">
<div class="fileinput-new thumbnail" style="width: 250px; height: 75px;">
<img src="<?=$url;?>uploads/site_setting/<?php echo $logo?>" alt="" />
</div>
<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> 
<img src="<?=$url;?>uploads/site_setting/default-placeholder.png" alt="" />
</div>
<div>
<span class="btn default btn-file">
<span class="fileinput-new">اللوجو<?=get_img_size("logo");?></span>
<span class="fileinput-exists">تغيير</span>
<input type="file" name="file"> </span>
<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
</div>
</div>
</div>

<div class="col-md-2" style="text-align:center"></div>
<div class="col-md-5" style="text-align:center">
<div class="fileinput fileinput-new" data-provides="fileinput">
<div class="fileinput-new thumbnail" style="width:32px; height:32px;">
<img src="<?=$url;?>uploads/site_setting/<?php echo $favicon?>" alt="" /> </div>
<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
<img src="<?=$url;?>uploads/site_setting/default-placeholder.png" alt="" />
</div>
<div>
<span class="btn default btn-file">
<span class="fileinput-new">ايقونة الموقع<?=get_img_size("favicon");?></span>  
<span class="fileinput-exists"> تغيير </span>
<input type="file" name="file1"> </span>
<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
</div>
</div>

</div>
</div>

<div class="form-group">       
<div class="col-md-6" style="text-align:center">
<div class="fileinput fileinput-new" data-provides="fileinput">
<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
<img src="<?=$url;?>uploads/site_setting/<?php echo $header_image?>" alt="" />
</div>
<div class="fileinput-preview fileinput-exists thumbnail" style="max-width:200px; max-height: 150px;"> 
<img src="<?=$url;?>uploads/site_setting/default-placeholder.png" alt="" />
</div>
<div>
<span class="btn default btn-file">
<span class="fileinput-new">البنر الداخلى</span>
<span class="fileinput-exists">تغيير</span>
<input type="file" name="header_image"> </span>
<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
</div>
</div>
</div>                                                   
                                                       
<!--<div class="col-md-4" style="text-align:center">
<div class="fileinput fileinput-new" data-provides="fileinput">
<div class="fileinput-new thumbnail" style="width:120px; height: 120px;">
<a href="<?=$url;?>uploads/site_setting/<?=$link_url?>" target="_blank" title="الملف التعريفى عن خدمات المجموعة">
<img src="<?=$url;?>uploads/site_setting/download.png" alt=""  />
</a>
</div>
<div>
<span class="btn default btn-file">
<span class="fileinput-new">الملف التعريفي (PDF|DOC)</span>
<span class="fileinput-exists">تغيير</span>
<input type="file" name="pdf"> </span>
<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
</div>
</div>
</div>-->
                                                        
                                                        
                                                        
<div class="col-md-6" style="text-align:center">
<div class="fileinput fileinput-new" data-provides="fileinput">
<div class="fileinput-new thumbnail" style="width:80px; height:80px;">
<a href="<?=$url;?>uploads/site_setting/<?=$intor_pdf?>" target="_blank" title="ملف خدمة اعتماد اللوائح">
<img src="<?=$url;?>uploads/site_setting/download.png" alt=""  />
</a></div>	<div>
<span class="btn default btn-file">
<span class="fileinput-new">ملف خدمة اعتماد اللوائح (PDF|DOC)</span>
<span class="fileinput-exists">تغيير</span>
<input type="file" name="pdf_intro"> </span>
<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> حذف </a></div></div></div>
</div>                        

<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block">إسم الموقع</span>
<input type="text" placeholder="إسم الموقع" class="form-control" name="site_name_ar" value="<?php echo $name_site_ar?>">
</div><div class="col-md-2"></div></div>


<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block" style="float:left;">site name</span>
<input type="text" placeholder="site name" class="form-control" name="site_name" style="text-align:left" value="<?= $site_name_eng?>">
<!--<span class="help-block"> This is inline help </span>-->
</div>
<div class="col-md-2"></div>
</div>

<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block">رابط الفيس بوك</span>
<input type="text" placeholder="رابط الفيس بوك" class="form-control" name="facebook" value="<?php echo $face?>">
<!--<span class="help-block"> This is inline help </span>-->
</div>
<div class="col-md-2"></div>
</div>


<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block">رابط تويتر</span>
<input type="text" placeholder="رابط تويتر" class="form-control" name="twitter" value="<?php echo $twitter?>">
<!--<span class="help-block"> This is inline help </span>-->
</div>
<div class="col-md-2"></div>
</div>

<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block">رابط لينكد ان</span>
<input type="text" placeholder="رابط لينكد ان" class="form-control" name="instagram" value="<?php echo $instagram?>">
<!--<span class="help-block"> This is inline help </span>-->
</div>
<div class="col-md-2"></div>
</div>
													
<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block">ايميل الهيدر</span>
<input type="text" placeholder="ايميل الهيدر" class="form-control" name="header_email" value="<?php echo $header_email?>">
<!--<span class="help-block"> This is inline help </span>-->
</div>
<div class="col-md-2"></div>
</div>

<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block">موبايل الهيدر</span>
<input type="text" placeholder="موبايل الهيدر" class="form-control" name="header_phone" value="<?php echo $header_phone?>">
</div>
<div class="col-md-2"></div>
</div>


<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block">ايميل الفوتر</span>
<input type="text" placeholder="ايميل الفوتر" class="form-control" name="footer_email" value="<?php echo $header_email?>">
<!--<span class="help-block"> This is inline help </span>-->
</div>
<div class="col-md-2"></div>
</div>

<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block">موبايل الفوتر</span>
<input type="text" placeholder="موبايل الفوتر" class="form-control" name="footer_phone" value="<?php echo $header_phone?>">
</div>
<div class="col-md-2"></div>
</div>

<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block">عنوان فى الفوتر</span>
<textarea class="form-control autosizeme" rows="4" placeholder="عنوان فى الفوتر" data-autosize-on="true"
style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 60px;" name="address_ar"><?=$address_ar?></textarea>															</div>
<div class="col-md-2"></div>
</div>


<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block" style="float:left">Address in footer</span>
<textarea class="form-control autosizeme" rows="4" placeholder="Address in footer"
data-autosize-on="true" style="overflow: hidden;    text-align: left; resize: horizontal; height:60px;" name="address_eng">
<?=$address_eng?></textarea>															</div>
<div class="col-md-2"></div>
</div>

<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block">عن المجموعة فى الفوتر</span>
<textarea class="form-control autosizeme" rows="4" placeholder="عن المجموعة فى الفوتر" data-autosize-on="true" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 60px;" name="about_footer_ar"><?=$about_footer_ar?></textarea>
<!--<span class="help-block"> This is inline help </span>-->
</div>
<div class="col-md-2"></div>
</div>

<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block" style="float:left">About in footer</span>
<textarea class="form-control" rows="4" placeholder="About in footer"
data-autosize-on="true" style="overflow: hidden;text-align: left; resize: horizontal; height:60px;" name="about_footer_en"><?=$about_footer_en?></textarea></div>
<div class="col-md-2"></div>
</div>


  
<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block"> ايميل الرسائل</span>
<input type="text" placeholder="ايميل الرسائل" class="form-control" name="message_email" value="<?php echo $message_email?>">
<!--<span class="help-block"> This is inline help </span>-->
</div>
<div class="col-md-2"></div>
</div>


<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block">وصف ميتا</span>
<textarea class="form-control autosizeme" rows="4" placeholder="وصف ميتا" data-autosize-on="true" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 90px;" name="meta_desc"><?=$meta_desc?></textarea>
<!--<span class="help-block"> This is inline help </span>-->
</div>
<div class="col-md-2"></div>
</div>
                                                       
<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block">كلمات دلالية</span>
<textarea class="form-control autosizeme" rows="4" placeholder="كلمات دلالية" data-autosize-on="true" style="overflow: hidden; 
word-wrap: break-word; resize: horizontal; height: 90px;" name="key_words"><?php echo  $key_words?></textarea>
<!--<span class="help-block"> This is inline help </span>-->
</div>
<div class="col-md-2"></div>
</div>

<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block"> مواعيد العمل</span>
<input type="text" placeholder="مواعيد العمل" class="form-control" name="work_hrs_ar" value="<?php echo $work_hrs_ar?>">
<!--<span class="help-block"> This is inline help </span>-->
</div>
<div class="col-md-2"></div>
</div>



<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block">Working hours</span>
<input type="text" placeholder="Working hours" class="form-control" name="work_hrs_en" value="<?php echo $work_hrs_en?>" 
style="text-align: left;">
<!--<span class="help-block"> This is inline help </span>-->
</div>
<div class="col-md-2"></div>
</div>


                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green">
                                                                <i class="fa fa-check"></i>تحديث</button>
                                                                <button type="reset" class="btn default">إلغاء</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- END FORM-->
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
</body></html>
