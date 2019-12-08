        <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                    <li class="nav-item start <?php if($curt=='home'){echo'active open';}?>">
                        <a href="<?=$url;?>admin" class="nav-link ">
                            <i class="icon-home"></i>
                                        <span class="title">لوحة التحكم</span>
                                        <span class="selected"></span>
                                    </a>
                    </li>
                    
<li class="nav-item start <?php if($curt=='setting'){echo'active open';}?>">
<a href="<?=$url;?>admin/setting" class="nav-link ">
<i class="icon-settings"></i>
<span class="title">الاعدادات</span>
<span class="selected"></span></a></li>


 <li class="nav-item start <?php if($curt=='translate'){echo'active open';}?>">
<a href="<?=$url;?>admin/translate" class="nav-link ">
<i class="icon-note"></i>
<span class="title">الترجمة</span>
<span class="selected"></span>
</a></li>

                      
<li class="nav-item start <?php if($curt=='team_work'){echo'active open';}?>">
<a href="<?=$url;?>admin/team_work" class="nav-link ">
<i class="icon-users"></i>
<span class="title">المشرفين</span>
<span class="selected"></span>
</a>
</li>
				
                    
					<li class="nav-item start <?php if($curt=='homepage'){echo'active open';}?>">
                        
						<a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
								<span class="title">الصفحة الرئيسية</span>
                                <span class="arrow"></span>
                            </a>
							<ul class="sub-menu">
                                <li class="nav-item  ">
                              
                                    <a href="<?=base_url()?>admin/slider_home" class="nav-link ">
                                        <span class="title">الاسليدر</span>
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="<?=base_url()?>admin/pages/home_background" class="nav-link ">
                                        <span class="title"> صورة الاسليدر</span>
                                    </a>
                                </li>
								
                                <li class="nav-item  ">
                                    <a href="<?=base_url()?>admin/pages/home_intro" class="nav-link ">
                                        <span class="title">المقدمة</span>
                                    </a>
                                </li>
							<!--	<li class="nav-item">
                                    <a href="<?=base_url()?>admin/pages/home_doctor" class="nav-link ">
                                        <span class="title">مقدمة الطقم الطبى</span>
                                    </a>
                                </li>--->
                            </ul>
                    </li>
					<li class="nav-item start <?php if($curt=='about_us'){echo'active open';}?>">
                        
						<a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-info"></i>
								<span class="title">عن المجموعة</span>
                                <span class="arrow"></span>
                            </a>
							<ul class="sub-menu">
							<li class="nav-item  ">
							
							<a href="<?=base_url()?>admin/about/show" class="nav-link ">
                            <i class="icon-note"></i>
								<span class="title">من نحن</span>
							</a>
						</li>

							<li class="nav-item  ">
							
								<a href="<?=base_url()?>admin/about/vision" class="nav-link">
                                <i class="icon-eye"></i>
									<span class="title">الرؤية</span>
								</a>
							</li>
                              
						<!--<li class="nav-item  ">
						
						<a href="<?=base_url()?>admin/about/message" class="nav-link ">
                        <i class="fa fa-sticky-note"></i>
							<span class="title">الرسالة</span>
						</a>
					</li>-->
			
                        <li class="nav-link">
                                    <a href="<?=base_url()?>admin/Clients/customers" class="nav-link ">
                                        <i class="icon-users"></i>
                                        <span class="title">عملائنا</span>
                                    </a>
								</li>
						
                            </ul>
                    </li>
					<li class="nav-item <?php if($curt=='our_files'){echo'active open';}?>">
                                    <a href="<?=base_url()?>admin/Files/" class="nav-link ">
                                        <i class="fa fa-file"></i>
                                        <span class="title">الملفات التعريفية عن خدمات المجموعة</span>
                                    </a>
                                </li>
							

                                <li class="nav-item  <?php if($curt=='products'){echo'active open';}?>">
                                    <a href="<?=base_url()?>admin/products/" class="nav-link ">
                                        <i class="icon-basket"></i>
                                        <span class="title">الخدمات القانونية</span>
                                    </a>
								</li>

							
                                <li class="nav-item start <?php if($curt=='regulation_service'){echo'active open';}?>">
						<a href="javascript:;" class="nav-link nav-toggle"><i class="fa-sticky-note"></i>
								<span class="title">خدمة إعتماد لوائح </span>
                                <span class="arrow"></span>
                            </a>
							<ul class="sub-menu">
                            <li class="nav-item">
                                    <a href="<?=base_url()?>admin/regulations/intro" class="nav-link ">
                                        <i class="icon-note"></i>
                                        <span class="title">المقدمة</span>
                                    </a>
								</li>

                                <li class="nav-item">
                                    <a href="<?=base_url()?>admin/regulations/regulation_service" class="nav-link ">
                                    <i class="fa-sticky-note"></i>
                                        <span class="title">خدمة إعتماد لوائح </span>
                                    </a>
								</li>

                                </ul>
                    </li>


                                <li class="nav-item start <?php if($curt=='teamwork'){echo'active open';}?>">
						<a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
								<span class="title">فريق العمل</span>
                                <span class="arrow"></span>
                            </a>
							<ul class="sub-menu">
                            <li class="nav-item  <?php if($curt=='messages'){echo'active open';}?>">
                                    <a href="<?=base_url()?>admin/teamwork/intro" class="nav-link ">
                                        <i class="icon-note"></i>
                                        <span class="title">المقدمة</span>
                                    </a>
								</li>
                                <li class="nav-item <?php if($curt=='faq'){echo'active open';}?>">
                                    <a href="<?=base_url()?>admin/teamwork/job_type" class="nav-link ">
                                        <i class="icon-users"></i>
                                        <span class="title">الوظائف المتاحة</span>
                                    </a>
                                </li>

                                <li class="nav-item <?php if($curt=='faq'){echo'active open';}?>">
                                    <a href="<?=base_url()?>admin/teamwork/" class="nav-link ">
                                        <i class="icon-users"></i>
                                        <span class="title">فريق  العمل</span>
                                    </a>
                                </li>
					
						

                            </ul>
                    </li>


                      <li class="nav-item start <?php if($curt=='pages'){echo'active open';}?>">
						<a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-info"></i>
								<span class="title">صفحات المجموعة</span>
                                <span class="arrow"></span>
                            </a>
							<ul class="sub-menu">
                            <li class="nav-item">
                                    <a href="<?=base_url()?>admin/pages/international_cooperation/" class="nav-link ">
                                        <i class="icon-notebook"></i>
                                        <span class="title">التعاون الدولى</span>
                                    </a>
                                </li>

                                <li class="nav-item <?php if($curt=='faq'){echo'active open';}?>">
                                    <a href="<?=base_url()?>admin/faq/" class="nav-link ">
                                        <i class="icon-question"></i>
                                        <span class="title">اهم الأنجازات</span>
                                    </a>
                                </li>
							
                                <li class="nav-item <?php if($curt=='pages'){echo'active open';}?>">
                                    <a href="<?=base_url()?>admin/regulations/" class="nav-link ">
                                        <i class="icon-question"></i>
                                        <span class="title">انظمة ولوائح</span>
                                    </a>
                                </li>
						
                            </ul>
                    </li>


                    <li class="nav-item start <?php if($curt=='messages'){echo'active open';}?>">
						<a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-envelope"></i>
								<span class="title">الرسائل</span>
                                <span class="arrow"></span>
                            </a>
							<ul class="sub-menu">
                            <li class="nav-item">
                                    <a href="<?=base_url()?>admin/messages/messages_contact" class="nav-link ">
                                        <i class="icon-envelope"></i>
                                        <span class="title">رسائل تواصل معانا</span>
                                    </a>
								</li>

                                <li class="nav-item">
                                    <a href="<?=base_url()?>admin/messages/messages_jobs" class="nav-link ">
                                        <i class="icon-envelope"></i>
                                        <span class="title">التوظييف و التدريب</span>
                                    </a>
                                </li>
							
                                <li class="nav-item">
                                    <a href="<?=base_url()?>admin/messages/messages_services" class="nav-link ">
                                        <i class="icon-envelope"></i>
                                        <span class="title">خدمة اعتماد اللوائح</span>
                                    </a>
                                </li>
						
                          
                                <li class="nav-item">
                                    <a href="<?=base_url()?>admin/news_letter/" class="nav-link ">
                                        <i class="icon-envelope"></i>
                                        <span class="title">القائمة البريدية</span>
                                    </a>
								</li>

                            </ul>
                    </li>
           

							



								<li class="nav-item  <?php if($curt=='update_contact'){echo'active open';}?>">
                                    <a href="<?=base_url()?>admin/update_contact" class="nav-link ">
                                        <i class="icon-call-end"></i>
                                        <span class="title">تواصل معانا </span>
                                    </a>
                                </li>
                             	
                            </ul>
                        </li>
                        
                            </ul>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
