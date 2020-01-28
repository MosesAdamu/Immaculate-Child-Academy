<?php

/*  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 	
	wizGrade V 1.1 (Formerly SDOSMS) is Developed by Igweze Ebele Mark | https://www.iem.wizgrade.com 
	https://www.wizgrade.com | Release Date � 2nd April, 2019
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 	
	Copyright 2014-2019 IGWEZE EBELE MARK | https://www.iem.wizgrade.com 
	
	Licensed under the Apache License, Version 2.0 (the "License");
	you may not use this file except in compliance with the License.
	You may obtain a copy of the License at

		http://www.apache.org/licenses/LICENSE-2.0

	Unless required by applicable law or agreed to in writing, software
	distributed under the License is distributed on an "AS IS" BASIS,
	WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
	See the License for the specific language governing permissions and
	limitations under the License	
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
	wizGrade School App is Dedicated To Almighty God, My Amazing Parents ENGR Mr & Mrs Igweze Okwudili Godwin, 
	To My Fabulous and Supporting Wife Mrs Igweze Nkiruka Jennifer
	and To My Inestimable Sons Osinachi Michael, Ifechukwu Othniel and My Unborn lil Child.  
	
	WEBSITE 					PHONES												EMAILS
	https://www.wizgrade.com	+234 - 80 - 30 716 751, +234 - 80 - 22 000 490 		info@wizgrade.com	
	
	
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Page/Code Explanation~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	This script handle school parent module
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

ob_start(); 

session_id();

session_start(); 

		define('wizGrade', 'igweze');  /* define a check for wrong access of file */	  
        
		require 'configwizGrade.php';  /* load wizGrade configuration files */	  
		
		 
		require_once ($wizGradeTemplate.'wizGradeHeader.php');  /* include template head */

		if (isset($_SESSION['lockScreen']) == 'IluvNkiruka') {  /* check if screen lock is activated */  
		
?>	

 
		<body class="lock-screen" onLoad="startTime()"> 

			<noscript> <?php echo $infMsg.$noscriptMsg.$msgEnd;  ?> </noscript>
			
			<div id="scrollBTarget" class="loader-background">	
				<img src="<?php echo $wizGradeTemplate?>images/loading.gif" alt="please wait. Page loading >>>>>>>>>>>>>>>" /><!-- loading image -->
			</div>
			
			<!--screen lock start-->
			<div class="lock-div">
				<div id="wizGradePagerMsg" style="display:none;"> </div><div id="wizGradePageContent"></div>
				<div id="timer-box"></div>
				
				<div id="timeOutMsg" class="pageRefresh"></div> 
				
				<!-- form --><form method="post"   role="form" class="text-center m-t-20" id="frmTimeOut">
					<div class="user-thumb">
						<img src="<?php echo $studentPicture; ?>" class="img-responsive img-circle img-thumbnail" alt="thumbnail">
					</div>
					<div class="form-group">
						<h3><?php echo $stuFullName.' ('.$regNum.')'; ?></h3>
						<h4><i class="fa fa-lock fa-lg"></i> Locked</h4>
						<p class="text-muted">Enter your password to access your dashboard</p><center><img alt="Please Wait" 
						class="timeOutLoader" style="display:none;" src="loading.gif"/></center>
						<div class="input-group m-t-30">
							<input type="password" name="password" class="form-control" placeholder="Enter Password">
							<input type="hidden" name="timeOutType" value="wizGradeTimeOut">
							<span class="input-group-btn wizGradeMenu"> <button type="submit" class="btn btn-email btn-info waves-effect waves-light" 
							id="timeOutLogin">
								<i class="fa fa-unlock fa-lg"></i> Unlock
							</button> </span>
						</div>
					</div>
					<div class="text-right wizGradeMenu">
						<a href="#" class="text-muted">Not <?php echo $stuFullName; ?> ?  <a href="javascript:;" id="wizGradeLogOuta">
							 <i class="fa fa-sign-out"></i> Log Out</a> </a>
							 
						<a href="javascript:;" style="color:black;" class="logo col-i-1 display-none"><?php echo $wizGradeVersion; ?></a>
						<div class="text-center display-none"> <?php echo $wizGradeVfooter; ?> </div>
						
					</div>
					
				</form> <!-- / form -->
			</div>
			<script>
				function startTime()
				{
					var today=new Date();
					var h=today.getHours();
					var m=today.getMinutes();
					var s=today.getSeconds();
					// add a zero in front of numbers<10
					m=checkTime(m);
					s=checkTime(s);
					document.getElementById('timer-box').innerHTML=h+":"+m+":"+s;
					t=setTimeout(function(){startTime()},500);
				}

				function checkTime(i)
				{
					if (i<10)
					{
						i="0" + i;
					}
					return i;
				}
			</script>
			<!--screen lock end -->		
			
		<?php }else{ ?>
	
	
		<body id="scrollBTarget">
  
                      
		<section id="container" >
		<!-- header start -->
		<header class="header top-header-bg">
	  
			<!-- logo start -->
            <div class="sidebar-toggle-box">
                  <div class="topSoftMenu logo-menu" id="wizGradeMenuTop" data-placement="right" 
                  data-original-title="wizGrade logo"><img src="<?php echo $wizGradeTemplate?>images/logo.png" 
				  height="40"  width="40" alt="wizGrade logo" /></div>
                  <div class="topSoftMenu logo-menu" id="wizGradeMenuTop2" style="display:none;" data-placement="right" 
                  data-original-title="wizGrade logo"><img src="<?php echo $wizGradeTemplate?>images/logo.png" 
				  height="40"  width="40" alt="wizGrade logo" />
                  </div>
            </div>
            <a href="javascript:;" class="logo col-i-1 bootstrap1"><?php echo $wizGradeVersion; ?></a>
            <!-- logo end -->
			
			<div class="top-nav top-school-info"> 
				<!-- school title and logo info start -->
				<button  class="btn btn-white pull-left" id="maxPageIcon" style="margin-right:8px !important;">
				<i class="fa fa-arrow-left text-info"></i>  </button>
                                  
                <button  class="btn btn-white display-none pull-left" id="minPageIcon" style="margin-right:8px !important;">
				<i class="fa fa-arrow-right text-info"></i> </button>		 						
			  
				<span id="top-school-pic"> <img src="<?php echo $sch_logo; ?>" height="30"  width="30" alt="School logo" /> </span>
				<span id="top-school-name"><?php echo $schoolNameTop; ?></span>
				<!-- school title and logo info end -->
            </div>
			
			<div class="nav notify-row dropdown-menu-top">
				<!-- dropdown menu start -->
				<ul class="nav  top-menu nav-top-accordion">  
					<li class="dropdown pull-right">
						
						<a href="javascript:;" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bars fa-lg dropdown-menu-icon"></i> </a> 
						<ul class="dropdown-menu dropdown-menu-up"> 

						<li class="wizGradeMenu">
						  <a class="active tpMenu" href="javascript:;" id="Dashboard">
							  <i class="fa fa-dashboard myDashboard" id="myDashboard"></i>
							  <span>My Dashboard</span>
						  </a>
						</li>

						<li class="wizGradeMenu">
						  <a class="tpMenu"  href="javascript:;" id="myProfile" >
							  <i class="fa fa-user"></i>
							  <span>My Profile</span>
						  </a>

						</li>

						<li class="sub-menu">
						  <a href="javascript:;" >
							  <i class="fa fa-dollar"></i>
							  <span>School Fess</span>
						  </a>
						  <ul class="sub">
							  <li class="wizGradeMenu"><a  class="tpMenu" href="javascript:;" id="payFee">
							  <i class="fa fa-chevron-right"></i> Pay  Fees</a></li>
							  <li class="wizGradeMenu"> <a  class="tpMenu" href="javascript:;" id="feeHistory">
							  <i class="fa fa-chevron-right"></i>My Fees History</a></li>
							 
						  </ul>
						</li> 
						<?php  if(trim($ewalletCheck) != trim($i_false)) {?>
						<li class="sub-menu">
						  <a href="javascript:;" >
							  <i class="fa fa-money"></i>
							  <span>My E-Wallet</span>
						  </a>
						  <ul class="sub">
							  <li class="wizGradeMenu"><a  class="tpMenu"  href="javascript:;" id="rechargeEWallet">
							  <i class="fa fa-chevron-right"></i> Recharge E-Wallet</a></li>
							  <li class="wizGradeMenu"> <a  class="tpMenu"  href="javascript:;" id="viewEWallet">
							  <i class="fa fa-chevron-right"></i> E-Wallet History</a></li>
							 
						  </ul>
						</li> 
						<?php  } ?>
						<li class="wizGradeMenu">
						  <a class="tpMenu"  href="javascript:;" id="myResult" >
							  <i class="fa fa-book"></i>
							  <span>View Results</span>
						  </a>
						  
						</li>
						<?php  if($rsType == $fiVal){ ?>
						<li class="wizGradeMenu">
						  <a class="tpMenu"  href="javascript:;" id="bestStudents" >
							  <i class="fa fa-users"></i>
							  <span>Best Student/s Result</span>
						  </a> 
						</li>
						<?php  } ?>
						<li class="sub-menu">
						  <a href="javascript:;" >
							  <i class="fa fa-check-square-o"></i>
							  <span>Daily Roll Call</span>
						  </a>
						  <ul class="sub">
							  
							  <li class="wizGradeMenu"><a  class="tpMenu"  href="javascript:;" id="rollCallList">
							  <i class="fa fa-chevron-right"></i> List View</a></li>
							  
							  <li class="wizGradeMenu"><a  class="tpMenu"  href="javascript:;" id="rollCall">
							  <i class="fa fa-chevron-right"></i> Calendar View</a></li>	 
							  
						  </ul>
						</li> 

						<li class="wizGradeMenu">
						  <a class="tpMenu"  href="javascript:;" id="shopping" >
							  <i class="fa fa-shopping-cart"></i>
							  <span>School Shop </span>
						  </a>

						</li>

						<li class="wizGradeMenu">
							<a class="tpMenu"  href="javascript:;" id="broadcast">
								<i class=" fa fa-bullhorn"></i>
								<span>Annoucements </span>
							</a>
						</li>

						<li class="wizGradeMenu">
						  <a class="tpMenu"  href="javascript:;" id="examTimeTable" >
							  <i class=" fa fa-calendar"></i>
							  <span>Exam TimeTable</span>
						  </a>
						 
						</li>
						<li class="wizGradeMenu">
						  <a class="tpMenu"  href="javascript:;" id="schoolEvents" >
							  <i class=" fa fa-calendar-o"></i>
							  <span>School Events</span>
						  </a>
						</li> 

						<li class="wizGradeMenu">
						  <a class="tpMenu"  href="javascript:;" id="lockScreen">
							  <i class="fa fa-lock"></i>
							  <span>Lock My Screen</span>
						  </a>

						</li>

						<li class="wizGradeMenu">
						  <a class="tpMenu"  href="javascript:;" id="wizGradeLogOuta">
							  <i class="fa fa-sign-out"></i>
							  <span>Sign Out</span>
						  </a>

						</li>
				  
					
						</ul>
					
					</li>
				
				</ul>
				<!-- dropdown menu end -->
			</div>

			
			<div class="top-nav dropdown-profile-top">
                <!-- user info start -->
                <ul class="nav pull-right top-menu">  
				
                    <li class="dropdown" style=" ">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
                             <img alt="" src="<?php echo $studentPicture; ?>" height="29" width="29" class="img-circle"> 
                            <b class="caret"></b>
                        </a> 
								  
						<ul class="dropdown-menu">
						<li>
							<div class="navbar-content">
								<div class="row">
									<div class="col-md-5">
										<img alt="" src="<?php echo $studentPicture; ?>" 
										height="120px" width="120px" class="img-circle" />
										 <p class="text-center small wizGradeMenu"> </p>		
										 
									</div>
									<div class="col-md-7 wizGradeMenu">
										
										<p class="text-primary">
											Parent Profile</p>
										<span><b><?php echo $studentName; ?></b></span>	
										<div class="divider">
										</div>
										 <a href="javascript:;" id="myProfile" 
										class="btn btn-primary btn-sm active">View Profile</a> 
									</div>
								</div>
							</div>
							<div class="navbar-footer">
								<div class="navbar-footer-content">
									<div class="row">
										<div class="col-md-6 wizGradeMenu">
											<a href="javascript:;" id="changeAccess" class="btn btn-danger btn-sm">Change Passowrd</a>
										</div>
										<div class="col-md-6 wizGradeMenu">
											<a href="javascript:;" id="wizGradeLogOuta" 
											class="btn btn-danger btn-sm pull-right">Sign Out</a>
										</div>
									</div>
								</div>
							</div>
						</li>
						</ul> 		
                         
                    </li> 
					
                </ul>
                <!-- user info  end-->
            </div>


            <div class="nav notify-row">
                <!--  tasks button and notification start -->
				
                <ul class="nav top-menu"> 
					
					<!-- shopping cart dropdown start -->

                    <li id="header_cart_bar" class="dropdown">					
					
						<div class="top-cart-wrapper"> </div>			 
                        <a data-toggle="dropdown" class="btn btn-danger dropdown-toggle" href="javascript:;"> 
							
							<span class="cart-box" id="cart-info" title="View Cart">
								<i class="fa fa-shopping-cart fa-lg" style="color:#000;"></i>
								<span class="badge bg-warning">
								<?php 
								
									if(isset($_SESSION["igweze_ebele"])){
									
										echo count($_SESSION["igweze_ebele"]); 
										
									}else{
										
										echo 0; 									
										
									}
																	
								?>
								</span>
							</span>

							<div class="shopping-cart-box">
								<a href="javascript:;" class="close-shopping-cart-box"> <i class="fa fa-times-rectangle-o"></i> Close</a>
								<h3>Your Shopping Cart</h3>
								<div id="shopping-cart-results"></div>
							</div>	
							 
                        </a>
                        
                    </li>
                     
                    <!-- shopping cart dropdown end -->
                    
                </ul>
                <!--  tasks button and notification  end -->
            </div>
			
			<div class="nav notify-row" id="top_menu">
                <!--  tasks button and notification start -->
               
				<ul class="nav nav-top-accordion top-menu"> 
					
					<!-- refresh page start -->
                    <li id="header_refresh_bar" class="dropdown pageRefresh">
                        <a data-toggle="dropdown" class="btn btn-danger dropdown-toggle" href="javascript:;">
                            <i class="fa fa-refresh fa-lg"></i>
                            <span class="badge bg-info"></span>
                        </a>
                    </li>
                    <!-- refresh page end -->
					
                     <!-- lock screen start -->
                    <li id="header_lock_bar" class="dropdown lockScreen wizGradeMenu">
                        <a data-toggle="dropdown" class="btn btn-danger dropdown-toggle" href="javascript:;" id="lockScreen">
                            <i class="fa fa-lock fa-lg"></i>
                            <span class="badge bg-info"></span>
                        </a>
                    </li>
                    <!-- lock screen end -->  
					
					<!--  translator start -->
					<li class="dropdown" style=" ">
						<a data-toggle="dropdown" class="btn btn-danger dropdown-toggle translateBtn" href="javascript:;">
							<i class="fa fa-flag fa-lg"></i>
							<b class="caret"></b>
						</a>   
						
						<ul class="dropdown-menu pull-right" style="width:230px !important;">
							<li>
								<div class="navbar-content">
									<!-- row -->	
									<div class="row">
										<div class="col-md-4"> 

										<div id="google_translate_element" class="pull-left col-md-2" style="margin: 4px !important;"></div>

										<script type="text/javascript">

											function googleTranslateElementInit() {
												new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
											} 

										</script>

										<script type="text/javascript" 
										src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
										 
										</div> 
									</div>
									<!-- / row -->	
								</div>												 
							</li>
						</ul>			
									 
					</li> 
					<!--  translator end -->
                    
                </ul>
                <!--  tasks button and notification  end -->
            </div> 
            
        </header>
		<!-- header end --> 
	  
		<!-- sidebar start -->
		<aside>
			<div id="sidebar"  class="nav-collapse mCustomScrollbar-O">
 
				<!-- sidebar menu start -->
				<ul class="sidebar-menu" id="nav-accordion">
			  
					<li class="wizGradeMenu">
					  <a class="active" href="javascript:;" id="Dashboard">
						  <i class="fa fa-dashboard myDashboard" id="myDashboard"></i>
						  <span>My Dashboard</span>
					  </a>
					</li>

					<li class="wizGradeMenu">
					  <a href="javascript:;" id="myProfile" >
						  <i class="fa fa-user"></i>
						  <span>My Profile</span>
					  </a>

					</li>

					<li class="sub-menu">
						  <a href="javascript:;" >
							  <i class="fa fa-dollar"></i>
							  <span>School Fess</span>
						  </a>
						  <ul class="sub">
							  <li class="wizGradeMenu"><a href="javascript:;" id="payFee">
							  <i class="fa fa-chevron-right"></i> Pay  Fees</a></li>
							  <li class="wizGradeMenu"> <a href="javascript:;" id="feeHistory">
							  <i class="fa fa-chevron-right"></i>My Fees History</a></li>
							 
						  </ul>
					</li> 

					<?php  if(trim($ewalletCheck) != trim($i_false)) {?>	
					<li class="sub-menu">
					  <a href="javascript:;" >
						  <i class="fa fa-money"></i>
						  <span>My E-Wallet</span>
					  </a>
					  <ul class="sub">
						  <li class="wizGradeMenu"><a  href="javascript:;" id="rechargeEWallet">
						  <i class="fa fa-chevron-right"></i> Recharge E-Wallet</a></li>
						  <li class="wizGradeMenu"> <a  href="javascript:;" id="viewEWallet">
						  <i class="fa fa-chevron-right"></i> E-Wallet History</a></li>
						 
					  </ul>
					</li>  
					<?php  } ?>
					<li class="wizGradeMenu">
					  <a href="javascript:;" id="myResult" >
						  <i class="fa fa-book"></i>
						  <span>View Results</span>
					  </a>
					  
					</li>
					<?php  if($rsType == $fiVal){ ?>
					<li class="wizGradeMenu">
					  <a href="javascript:;" id="bestStudents" >
						  <i class="fa fa-users"></i>
						  <span>Best Student/s Result</span>
					  </a>
					  
					</li>
					<?php  } ?>
					<li class="sub-menu">
					  <a href="javascript:;" >
						  <i class="fa fa-check-square-o"></i>
						  <span>Daily Roll Call</span>
					  </a>
					  <ul class="sub">
						   
						  <li class="wizGradeMenu"><a  href="javascript:;" id="rollCallList">
						  <i class="fa fa-chevron-right"></i> List View</a></li>
						  
						  <li class="wizGradeMenu"><a  href="javascript:;" id="rollCall">
						  <i class="fa fa-chevron-right"></i> Calendar View</a></li>	
						  
						  
					  </ul>
					</li>

					<li class="wizGradeMenu">
					  <a href="javascript:;" id="shopping" >
						  <i class="fa fa-shopping-cart"></i>
						  <span>School Shop </span>
					  </a>

					</li>

					<li class="wizGradeMenu">
						<a href="javascript:;" id="broadcast">
								<i class=" fa fa-bullhorn"></i>
								<span>Annoucements </span>
						</a>
					</li>

					<li class="wizGradeMenu">
					  <a href="javascript:;" id="examTimeTable" >
						  <i class=" fa fa-calendar"></i>
						  <span>Exam TimeTable</span>
					  </a>
					 
					</li>
					<li class="wizGradeMenu">
					  <a href="javascript:;" id="schoolEvents" >
						  <i class=" fa fa-calendar-o"></i>
						  <span>School Events</span>
					  </a>
					</li> 

					<li class="wizGradeMenu">
					  <a href="javascript:;" id="lockScreen">
						  <i class="fa fa-lock"></i>
						  <span>Lock My Screen</span>
					  </a>

					</li>

					<li class="wizGradeMenu">
					  <a href="javascript:;" id="wizGradeLogOuta">
						  <i class="fa fa-sign-out"></i>
						  <span>Sign Out</span>
					  </a> 
					</li>
                  

				</ul>
				<!-- sidebar menu end-->
			</div>
		</aside>
		<!--sidebar end-->
		
		
		<!--main content start-->
		<section id="main-content">
			<section class="wrapper site-min-height" id="scrollTargetMPage" >
          
				<!-- 
				<div class="wizGrade-preloader">
					<div class="wizGrade-status">&nbsp;</div>
					 <div class="wizGrade-preload">	
					 
					</div>

				</div>
				--> 
				
				<noscript> <?php echo $infMsg.$noscriptMsg.$msgEnd;  ?> </noscript>
				
				<div class="loader-background">	

					<img src="<?php echo $wizGradeTemplate?>images/loading.gif" alt="please wait. Page loading >>>>>>>>>>>>>>>" /><!-- loading image -->
				 
				</div>
				<div id="wizGradePageMsg" style="display:none;"> </div><div id="wizGradePagerMsg" style="display:none;"> </div>
				<div id='wizGradePageContent' style="margin-top:10px; margin-bottom: 30px;">  
					 		
				 
				</div>		 

			</section>
		</section>
		<script> $( window ).load(function() { $('.myDashboard').trigger('click'); /* trigger click */ }); </script>
		<!-- main content end -->
      
		<?php }	?>
		<!-- footer start -->
		<?php require_once ($wizGradeTemplate.'wizGradeFooter.php');   /* include template footer */ ?>
		<script src="https://checkout.simplepay.ng/simplepay.js"></script>	<!-- simple pay checkout script  -->
		<!-- footer end -->