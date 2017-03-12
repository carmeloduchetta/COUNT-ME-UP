<?php
	 include_once 'definitions.php';
	include 'header.php';
	
?>
<script type="text/javascript">window.history.forward();function noBack(){window.history.forward();}</script>
<script>

		var uuidPatt = /^[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i;		
		
		jQuery.validator.addMethod("phone", function (phone_number, element) {
		      phone_number = phone_number.replace(/\s+/g, "");
		      return this.optional(element) || phone_number.length > 9 &&
		      //phone_number.match(/^\+[0-9]{9,12}$/);
		      phone_number.match(/^[0-9_ %\+\(\)]{7,}$/);
		}, "Please specify a valid phone number");

		function tempAlert(msg,duration)
		{
 			var el = document.createElement("div");
 			el.setAttribute("style","font-size: 25px; position:absolute;top:50%;right:1%;background-color:white;");
 			el.innerHTML = msg;
 			setTimeout(function(){
  				el.parentNode.removeChild(el);
 			},duration);
 			document.body.appendChild(el);
		}
							
		$(function() {

			$('#firstName').change(function () {
			
  				$('#fullName').val($('#fullName').val()+' '+$(this).val());

			});

    		$('#lastName').change(function () {
				
  				$('#fullName').val($('#fullName').val()+' '+$(this).val());
  				
			});
    	    	
        	$("#contact-details-form").validate({
				
				rules: {
                	
                	"firstName": {
                    	required: true,
                    	minlength: 3
               	 	},
                	"lastName": {
                    	required: true,
                    	minlength: 3
                	},
                	"email":{
                    	email:true,
                    	required: true
                    
                	},
                
                	"telephone1":{
                		phone: true
                	},
                	"telephone2":{
                		phone: true
                	},
                	"password" : {
                		required:true,
                     	minlength : 6
                 	},
                 	"confirmPassword" : {
                		required: function(element){
                 			return $("#password" ).val().length > 5;
             			},
                    	minlength : 6,
                    	equalTo : "#password"
                 	},

            	},
            
            	messages: {
                	email:{
                    	 required: "Please a valid Email is required",
           				 email: "Enter a valid Email"
                	}                	
            	},
            	
            	errorPlacement: function(error, element) {
                	error.insertAfter(element);
                	//return true;
           	 	},
           	 	
	           	 submitHandler: function (form) {    
						
						$.blockUI();
						
						$.ajax({ 
	         			
		         			type: 'POST', 
		                 	data: $("#contact-details-form").serialize(),
		                 	url: "<?php echo BBC_URL_PATH; ?>data.php", 
		                 	
		                 	success: function(data) {
		              	 		
		              	 		$.unblockUI();
		              	 		$("#contact-details-form :input").prop('readonly', true);
		              	 		
		              	 		tempAlert("User Successfully Added",5000);
		              	 		setTimeout(function(){
		              	 		    //do what you need here
		              	 			window.location='index.html';
		              	 		}, 5000);
		              	 		
		             		}	
	            		
	            		});
					
	             	return false;
	             	
	         	}             
            	      		
        	});
  			
		});
		
</script>
<body>	
	<div class="vessel narrow">
	    <form name="contact-details-form" id="contact-details-form" method="POST">
			<input type="hidden" name="call" id="call" value="edituser"/>
			<input type="hidden" name=userId id="userId" value="-1"/>
			<div class="warp">     
				<div class="left">
					<div class="left-fixed">
		                <ul class="tabs-edit" id="editTabs">
							<li class="active"><a href="#overview" data-toggle="tab">User Information</a></li>					
		                </ul>
					</div>
				</div>
		      	<div class="centre">
			      	<div class="tab-content">
				  		<div id="overview" class="tab-pane active">
				  			
				  			<!-- Essentials Info -->					
							<div class="category parent">
	
								<!-- Header -->
								<div class="header">
									<p>User details and requirements<br/>Please enter your user details below and save the form</p>
								</div>
								
								<!-- Field -->
								<div class="field titleOption">
									<div class="right">
										<label for="title">Title</label>
									</div>
									<div class="left">
										 <input type="text" id="title" name="title" value=""/>
									</div>
								</div>
								
								<!-- Field -->
								<div class="field firstName">
									<div class="right">
										<label for="firstName">Firstname</label>
									</div>
									<div class="left">
										 <input type="text" id="firstName" name="firstName" value=""/>
									</div>
								</div>	
								
								<!-- Field -->
								<div class="field lastName">
									<div class="right">
										<label for="lastName">Surname</label>
									</div>
									<div class="left">
										 <input type="text" id="lastName" name="lastName" value=""/>
									</div>
								</div>	
								
								<!-- Field -->
								<div class="field fullName">
									<div class="right">
										<label for="fullName">Full Name</label>
									</div>
									<div class="left">
										 <input type="text" id="fullName" name="fullName"  value=""/>
									</div>
								</div>	
								
								<!-- Field -->
								<div class="field companyOption">
									<div class="right">
										<label for="company">Company / Individual</label>
									</div>
									<div class="left">
										 <input type="text" id="company" name="company" value=""/>
									</div>
								</div>	
								
								<!-- Field -->
								<div class="field emailOption">
									<div class="right">
										<label for="email">Email</label>
									</div>
									<div class="left">
										 <input type="text" id="email" name="email" value=""/>
									</div>
								</div>		
								
								<!-- Field -->
								<div class="field telephone1">
									<div class="right">
										<label for="telephone1">Landline</label>
									</div>
									<div class="left">
										 <input type="text" id="telephone1" name="telephone1" value=""/>
									</div>
								</div>	
								
								<!-- Field -->
								<div class="field telephone2">
									<div class="right">
										<label for="telephone2">Mobile</label>
									</div>
									<div class="left">
										 <input type="text" id="telephone2" name="telephone2" value=""/>
									</div>
								</div>	

							</div>
							<!-- End Essentials Info -->
							
							<!-- Password -->
							<div class="category parent">
								<!-- Header -->
								<div class="header">
									<p>Login Info</p>									
								</div>
								
								<!-- Field -->
								<div class="field username">
									<div class="right">
										<label for="username">Username</label>
									</div>
									<div class="left">
										<input type="text" id="username" name="username" value=""/>
									</div>
								</div>
								
								<!-- Field -->
								<div class="field passwordp">
									<div class="right">
										<label for="password">Password<span>Password (Minium 6 characters)</span></label>
									</div>
									<div class="left">
										<input type="password" id="password" name="password" value=""/>
									</div>
								</div>
								
								<!-- Field -->
								<div class="field confirmPasswordp">
									<div class="right">
										<label for="confirmPassword">Confirm Password</label>
									</div>
									<div class="left">
										<input type="password" id="confirmPassword" name="confirmPassword" value=""/>
									</div>
								</div>							
							</div>
							<!-- End Password-->
							
						</div>
					
			    	</div>
			    </div>
	      		<div class="right">  
					<div class="right-fixed">
						<div class="aside">	   		
							<button type="submit" form="contact-details-form" id="save-contact-btn" class="button button-save">Save</button>
							<button type="button" class="button button-cancel" onClick="window.location='welcome.php'" data-toggle="modal" id="close-process">Cancel</button>
						</div>      
					</div>
				</div>
			</div>
	    </form>
	</div>
<?php include 'footer.php';?>