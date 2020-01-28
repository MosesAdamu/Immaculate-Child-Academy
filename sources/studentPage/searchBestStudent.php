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
	This page search for best student in a or all class
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */ 


		if (!defined('wizGrade')) /* This checks if this page was wrongly access by users */

		die('Hahahaha, Hacking attempt . . . . Be Careful . . . . You Are Been Warned !!!!');
				
		require_once $wizGradeIconPage; /* This include top middle global icon page eg go back, print buttons etcs */

?>
                 	<!-- row -->	
					<div class="row">  
     				  <div class="col-lg-7">
                      <section class="panel wizGradeSectionDiv">                      	
							<header class="panel-heading">
								<i class="fa fa-book fa-lg"></i>  View Best Student/s Results
								<span class="tools pull-right">
									<a href="javascript:;" class="fa fa-chevron-down"></a>
									<a href="javascript:;" class="fa fa-times"></a>
								</span>
							</header>
							<div class="panel-body wizGrade-line"> 
                              <!-- form --><form class="form-horizontal" id="frmbestStudents" role="form"> 

									<div class="form-group">
                                    <label for="level" class="col-lg-4 col-sm-4 control-label">* School Level</label>
                                     
									<div class="col-lg-8">
                                          <div class="iconic-input">
                                              <i class="fa fa-level-up"></i>
                                              
                                              <select class="form-control"  id="level" name="level" required>
                                              
                                				<option value = "">Please select One</option>
												<?php 
													try {
													
														studentLevel($conn);  /* retrieve student level */
											 
													}catch(PDOException $e) {
						
													wizGradeDie( 'Ooops Database Error: ' . $e->getMessage());
						 
													} 
												?> 
                                              </select>
                                          </div>
                                      </div>
									</div> 

									<div class="form-group">
                                    <label for="term" class="col-lg-4 col-sm-4 control-label">* School Class</label>
                                     
									<div class="col-lg-8">
                                          <div class="iconic-input">
                                              <i class="fa fa-level-up"></i>
                                              
                                              <select class="form-control"  id="sr-class" name="sr-class" required>
                                              
                                				<option value = "">Please select One</option>
                                                <option value = "1">My Class</option>
                                                <option value = "2">Overall Classes</option>
                               
                                              
                                              </select>
                                          </div>
                                      </div>
									</div> 		 

									<div class="form-group">
                                    <label for="term" class="col-lg-4 col-sm-4 control-label">* School Term</label>
                                     
										<div class="col-lg-8">
                                          <div class="iconic-input">
                                              <i class="fa fa-level-up"></i>
                                              
                                              <select class="form-control"  id="term" name="term" required>
                                              
                                				<option value = "">Please select One</option>
                                
												<?php

													foreach($term_list as $term_key => $term_value){    /* loop array */

														if ($term_list == $term_value){
														$selected = "SELECTED";
														} else {
														$selected = "";
														}

														echo '<option value="'.$term_key.'"'.$selected.'>'.$term_value.'</option>' ."\r\n";
														

													}
													
													//echo '<option value="all"'.$selected.'>All Term Result</option>' ."\r\n";

												?>

                                              
                                              </select>
                                          </div>
										</div>
									</div> 

									<div class="form-group">                                      
                                          <input name="rsData" value="bestStudentRS" type="hidden"  />
                                          <center><button type="submit" class="btn btn-danger buttonMargin" id="bestStudents">
                                          <i class="fa fa-eye"></i> View Result/s </button></center>                                      
									</div> 

                              </form><!-- / form -->
                          </div>
                         
						</section>
                      
					</div>
				
				</div>
				<!-- / row -->
                    
                		
				<!-- row -->	
				<div class="row">  
					<div class="col-lg-12">						  
					  
						<div id="wizGradePageDiv"> </div> <!-- This a div where jquery loads its contents -->					 
					 
					</div>
				</div>
				<!-- / row -->		