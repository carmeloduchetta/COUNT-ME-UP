<?php
	include_once "definitions.php";
	include "usercheck.php";
	include 'header.php';
	
	$page="voteInfo";
	
?>
	
	<script>
   						
		$(function() {

			$("#create-enquiry-form").bind("keypress", function (e) {
	    		if (e.keyCode == 13) {
	        		$("#save-contact-btn").attr('value');
	        		//add more buttons here
	        		return false;
	    		}
			});
	
			$("#create-enquiry-form").validate({
	    		ignore: "",
				rules: {
					
					"userid": {
	               		required:true
	               	},
					
	            	"candidate": {
	                	required: true
	               	 }
	 	
	            },
	            
	            messages: {
	
	        		sessionId: {
	        				 required: "Permission Denied. Need to login"
	            		}
	                    
	    		},
	
	    		errorPlacement: function(error, element) {
	            	error.insertAfter(element);
	            	//return true;
	       	 	},
	       	 	
	    		submitHandler: function(form){
	            	
	            	$.blockUI();
	            	form.submit();
	        	
	        	}    	     
	
			});
			
		});
	
	
	</script>
	<body>
		<form id="create-enquiry-form" name="create-enquiry-form" method="POST" action="<?php echo BBC_URL_PATH; ?>data.php?status=0">  
			<div class="vessel narrow">
				<div class="warp">
					<div class="left">
						<div class="left-fixed">
							<ul id="tabs-edit">
								<li class="active"><a href="#overview" data-toggle="tab">New Vote</a></li>
							</ul>
						</div>
					</div>			
					<div class="centre">
						<div class="tab-content">		
							<div class="tab-pane active" id="overview">
								<!--  <input type="hidden" id="call" name="call" value="addrequirementreview">-->
								<input type="hidden" id="call" name="call" value="addvote">
								<input type="hidden" id="key" name="key" value="-1"/>
								<input type="hidden" id="userid" name="userid" value="<?php echo urldecode($_SESSION['plususerid']); ?>">
								<input type="hidden" id="userdisplayname" name="userdisplayname" value="<?php echo urldecode($_SESSION['plususerdisplayname']); ?>">
								
								<div class="category parent">
									<div class="header">
										<p>Note (*):</p>
									</div>
									<!-- Header -->
									<div class="field">
										<div>
											<label for="fieldDescription"><span>Please not exceeded the maximum allowed number of votes. Maximum of 3 times.</span></label>
										</div>
									</div>
								</div>
								
								<div class="category parent">
									<!-- Header -->
									<div class="header">
										<p>Votes<br/>Please vote individually. After 3 times the vote will be ignored.</p>
									</div>
																																
									<!-- Field -->
									<div class="field req-country">
										<div class="right">
											<label for="country">Candidates</label>
										</div>
										<div class="left">
											<select id="candidate" name="candidate" class="input-half">
												<!--  <option value="">Select Country</option> -->
												<option value="daa61da2-0422-11e7-93ae-92361f002671:CANDIDATE 1">CANDIDATE 1</option>
												<option value="daa61fdc-0422-11e7-93ae-92361f002671:CANDIDATE 2">CANDIDATE 2</option>
												<option value="daa621f8-0422-11e7-93ae-92361f002671:CANDIDATE 3">CANDIDATE 3</option>
												<option value="daa622ca-0422-11e7-93ae-92361f002671:CANDIDATE 4">CANDIDATE 4</option>
												<option value="daa624be-0422-11e7-93ae-92361f002671:CANDIDATE 5">CANDIDATE 5</option>
											</select>
										</div>
									</div>
									
								</div>
							</div>
						</div>						
					</div>
					<div class="right">
						<div class="right-fixed">
							<div class="aside">						 		
							 	<button type="submit" form="create-enquiry-form" id="save-contact-btn" class="button button-save">Vote</button>								
								<button type="button" class="button button-cancel" onClick="window.location='welcome.php'">Cancel</button>	 		
						 	</div>
						 </div>		
					</div>      		
				</div>	
			</div>
		</form>
	
<?php include 'footer.php';?>