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
	This script handle change password
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

session_id();

session_start();

     define('wizGrade', 'igweze');  /* define a check for wrong access of file */

        require 'configwizGrade.php';  /* load wizGrade configuration files */
		
      	if($_REQUEST['studentPass'] = 'changePass') {	 

            $old_pass = strip_tags($_REQUEST['old_pass']);
			$new_pass = strip_tags($_REQUEST['new_pass']);
	        $confirm_new = strip_tags($_REQUEST['confirm_new']);
			
			/* script validation */ 
	         
 			try { 

			 	$studentParentPass =  studentParentPassword($conn, $regNum);
			 
			 	list ($studentPass, $parentPass) =  explode ("{<?..?>}", $studentParentPass); 
             
				if ($old_pass == '') {

					$msg_e = '* Please enter your old password ';

				}elseif ($new_pass == '') {

					$msg_e = '* Please enter your new password ';

				}elseif ((strlen($new_pass) <= 7) || (!ctype_alnum($new_pass))){

					$msg_e = '* Please new password should be more than 7 characters and numbers e.g wizGrade004';

				}elseif ($confirm_new == "") {

					$msg_e = '* Please confirm your new password ';

				}elseif ($confirm_new != $new_pass) {         

					$msg_e = "*Error, Your new  and  confirmation password dose not match. please try again  ";

				}elseif ($parentPass != $old_pass) {

					$msg_e = '* Error, Your Old password Is Incorrect, please try again ';


				} else {  /* update information */  
						 

					$ebele_mark = "UPDATE $i_student_tb SET
								 
								i_sponsor_p = :i_sponsor_p 
													
								WHERE ireg_id = :ireg_id";
													
					$igweze_prep = $conn->prepare($ebele_mark);	
					$igweze_prep->bindValue(':i_sponsor_p', $new_pass); 
					$igweze_prep->bindValue(':ireg_id', $regID);

					if ($igweze_prep->execute()) {  /* if sucessfully */ 
											 
						$msg_s = "Your password was sucessfully change. 
						Please always remember keep your password secret only to yourself. Thanks";
						echo "<script type='text/javascript'>   $('.wizGradeSectionDiv').slideUp(300); hidePageLoader();  /* hide page loader */ </script>";
						 
						 
					}else{  /* display error */ 
						 
						$msg_e = "Oooooooops, your password was not change, please try again";
						 
					}

				}

			}catch(PDOException $e) {
  			
					wizGradeDie( 'Ooops Database Error: ' . $e->getMessage());
			 
			}	 

		}else{
			
			echo $userNavPageError; exit;  /* else exit or redirect to 404 page */
			
		}
 
			
		if ($msg_s) {

			echo $succesMsg.$msg_s.$sEnd ; 
			echo "<script type='text/javascript'> hidePageLoader();  /* hide page loader */ </script>";	exit; 				
									
        }	


		if ($msg_e) {

			echo $errorMsg.$msg_e.$eEnd; 
			echo "<script type='text/javascript'> hidePageLoader();  /* hide page loader */ </script>";				
			exit; 	 
									
        }	
			
exit;
?>