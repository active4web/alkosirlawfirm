<?php
ob_start();
$dd=base_url();
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
<title>تسجيل الدخول</title>
<?php include ("design/inc/header.php");?>
</head>
<body class=" login">
<?php if(!isset($_SESSION['admin_name'])){?>
	<!-- BEGIN LOGO -->
		<div class="logo">
			<a href="index.html">
				<img src="<?=$url;?>site/images/site_setting/logo1.png" alt="" /> </a>
		</div>
	<!-- END LOGO -->
	<div class="content">
			<!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="<?php echo base_url()?>admin/submit_login" method="post">
                <h3 class="form-title font-green">تسجيل الدخول</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> أدخل اسم المستخدم وكلمة مرور </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">الإســـم</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="الإســـم" name="user_name" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="كلمة المرور" name="password" /> </div>
                <div class="form-actions">
                    <button type="submit" class="btn green uppercase">تسجيل دخول</button>
                    <!--<label class="rememberme check mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" />تذكرني
                        <span></span>
                    </label>-->
                    <a href="javascript:;" id="forget-password" class="forget-password">نسيت كلمة المرور؟</a>
                </div>
            </form>
            <!-- END LOGIN FORM -->
			
			<!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="<?php echo base_url();?>admin/ForgotPassword" method="post" onsubmit ='return validate()'>
                <h3 class="font-green">نسيت كلمة المرور؟</h3>
                <p> أدخل عنوان بريدك الإلكتروني أدناه لإعادة تعيين كلمة المرور الخاصة بك. </p>
                <div class="form-group">
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="البريد الإلكتروني" name="email" /> </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn green btn-outline">رجوع</button>
                    <button type="submit" class="btn btn-success uppercase pull-right">إرسال</button>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
    </div>
		<div class="copyright"> <?=gmdate('Y');?> © لوحة التحكم </div>
        <!--[if lt IE 9]>
		<script src="<?=$url;?>design/assets/global/plugins/respond.min.js"></script>
		<script src="<?=$url;?>design/assets/global/plugins/excanvas.min.js"></script> 
		<script src="<?=$url;?>design/assets/global/plugins/ie8.fix.min.js"></script> 
		<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?=$url;?>design/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?=$url;?>design/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=$url;?>design/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?=$url;?>design/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?=$url;?>design/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?=$url;?>design/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
		<script src="<?=$url;?>design/assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?=$url;?>design/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?=$url;?>design/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?=$url;?>design/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
		<script src="<?=$url;?>design/assets/pages/scripts/ui-toastr.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?=$url;?>design/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?=$url;?>design/assets/pages/scripts/login.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
<?php 
if(isset($_SESSION['msg'])){
?>
<script>
$(document).ready(function(e) {
 toastr.error("<?php echo $_SESSION['msg']?>", "Check Error");
});
</script>
<?php }?>
<?php }else{
redirect(base_url().'admin/','refresh');
}  
?>
</body>
</html>
