<?php
	include_once "definitions.php";
	include "usercheck.php";
	include 'header.php';
	
	$page="show-result";	
?>
	
	<script>

		function getActivityResults(dateFrom,dateTo){
	
			//alert(dateFrom+" "+dateTo);
			resetValues();
			var xmlhttp;
		
		    var result="";
		    var parameters = "";
			    
		    if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
		    	xmlhttp=new XMLHttpRequest();
		    }
		    else
		    {// code for IE6, IE5
		    	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		    }
		            
		    xmlhttp.onreadystatechange=function()
		    {
		    	if (xmlhttp.readyState==4 && xmlhttp.status==200){                        
		    	
		        	result = xmlhttp.responseText;   
		        	//alert(result);
		        	formatResults(result);      
		        }
		    }
		            
		    xmlhttp.open("POST", "<?php echo BBC_URL_PATH; ?>data.php", false);
			xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			
			parameters = "call=getresults&dateFrom="+dateFrom+"&dateTo="+dateTo;
			
		  	xmlhttp.send(parameters);
		
			return result;
	
	    }

		function formatResults(xmlResults){
			//alert(xmlOffers);
			var xmlResultsDoc = $.parseXML(xmlResults);
			var $xmlCandidate = $(xmlResultsDoc);
			
			$xmlCandidate.find('candidate').each(function(){	
	 
	    		$candidateName = $(this).children('candidateName').text();
				$numberVotes = $(this).children('numberVotes').text();

				//alert("candidateName: "+$candidateName+" numberVotes: "+$numberVotes);
				var checking = $candidateName.indexOf("1") > -1;
				if(checking == true)
					document.getElementById('report-candidate-1').innerHTML = $numberVotes;
				
				var checking = $candidateName.indexOf("2") > -1;
				if(checking == true)
					document.getElementById('report-candidate-2').innerHTML = $numberVotes;

				var checking = $candidateName.indexOf("3") > -1;
				if(checking == true)
					document.getElementById('report-candidate-3').innerHTML = $numberVotes;

				var checking = $candidateName.indexOf("4") > -1;
				if(checking == true)
					document.getElementById('report-candidate-4').innerHTML = $numberVotes;

				var checking = $candidateName.indexOf("5") > -1;
				if(checking == true)
					document.getElementById('report-candidate-5').innerHTML = $numberVotes;
											
	        });

			var totalResults = '';
			$xmlCandidate.find('results').each(function(){
				totalResults = $(this).children('totalResults').text(); 
			});
			document.getElementById('report-total-candidates').innerHTML = totalResults; 
			//alert(totalResults);
			
		}

		function resetValues(){

			$numberVotes = '0';
			
			document.getElementById('report-candidate-1').innerHTML = $numberVotes;
			document.getElementById('report-candidate-2').innerHTML = $numberVotes;
			document.getElementById('report-candidate-3').innerHTML = $numberVotes;
			document.getElementById('report-candidate-4').innerHTML = $numberVotes;
			document.getElementById('report-candidate-5').innerHTML = $numberVotes;
			document.getElementById('report-total-candidates').innerHTML = $numberVotes;
			
		}

		
		$(function() {

	  		function split( val ) {
				return val.split( /\s/ );
			}
			function extractLast( term ) {
				return split( term ).pop();
			}

		  	$("#activity-report").bind("click", (function () {

				var dateFrom = document.getElementById('date-report-from').value;
				var dateTo = document.getElementById('date-report-to').value;
					
		  		if(dateFrom != '' && dateTo != '')
		  			getActivityResults(dateFrom,dateTo);
		  		else
			  		alert("Please Select a Range dates");
			  		
		  					
		  	}));
			
			
		});
		
	</script>
	<body>
		  
			<div class="vessel narrow">
				<div class="warp">
					<div class="left">
						
					</div>			
					<div class="centre">
											
					<!-- Tab - @Other -->
					<div id="reporting" class="tab-pane">
						<!-- Parent Category -->
						<div class="category parent">
							<!-- Header -->
							<div class="header">
								<p>Results</p>
							</div>
							
							<div class="category child" style="margin:auto auto auto auto;border:0px;">                          
		                            <div class="grid flex horizontal">
										<div class="field date-report-range" style="background: #ffffff;">	
											<label for="date-range" style="color:#3278a1;text-align:left;font-weight: bold;padding-left:20px;">Date</label>															
										</div>
			                            <div class="item">
			                            	<div class="field date-report-from" style="background: #ffffff;">			
												<input type="text" class="datepicker-function" id="date-report-from" name="date-from" placeholder="from" onclick="$('#date-report-from').datepicker({showButtonPanel: true,changeMonth: true,changeYear: true,dateFormat: 'yy-mm-dd'});$('#date-report-from').datepicker('show');">													
											</div>
										</div>
										<div class="item">
			                            	<div class="field date-report-to" style="background: #ffffff;">																	
												<input type="text" class="datepicker-function" id="date-report-to" name="date-report-to" placeholder="to" onclick="$('#date-report-to').datepicker({showButtonPanel: true,changeMonth: true,changeYear: true,dateFormat: 'yy-mm-dd'});$('#date-report-to').datepicker('show');">													
											</div>
										</div>
										<div class="item">
			                            	<div class="field date-report-button" style="background: #ffffff;">																	
												<button type="button" id="activity-report" class="button button-save" style="display: block;line-height:18px;width:80%;">Real Time</button>									
											</div>
										</div>
									</div>
							</div>	
							
							<script>
								// pre-fill the report to and from dates
								// get current date
								var dateTo = new Date();
								var dayTo = dateTo.getDate();
								var monthTo = dateTo.getMonth() + 1; // getMonth starts from 0, so to get the correct month, add 1
								var yearTo = dateTo.getFullYear();
	
								// derive dateFrom date
								var dateFrom = new Date();
								dateFrom.setMonth(monthTo); // subtract one month to calculate the default from date
								dateFrom.setDate(dayTo-1); // subtract one month to calculate the default from date
	
								var dayFrom = dateFrom.getDate();
								var monthFrom = dateFrom.getMonth();
								var yearFrom = dateFrom.getFullYear();
			
								var strDateFrom = yearFrom + '-' + monthFrom + '-' + dayFrom;
								var strDateTo = yearTo + '-' + monthTo + '-' + dayTo;
			
								document.getElementById('date-report-from').value = strDateFrom;
								document.getElementById('date-report-to').value = strDateTo;
							</script>
																					
							<div class="category child" style="margin:auto auto auto auto;border:0px;">
	                            <div class="grid flex horizontal">
		                            <div class="item">
		                            	<div class="field web-counting" style="background: #ffffff;padding-left:20px;">	
											<div class="right"><label for="desc" style="visibility:hidden;">Space</label><label for="desc" style="visibility:hidden;">Space</label></div>												
											<div><label for="desc" style="font-weight:500;">This Period</label></div>
											<div><label for="desc" style="font-weight:500;">Total</label></div>
										</div>
									</div>
									<div class="item">
		                            	<div class="field web-counting" style="background:#ffffff;text-align:center;">
		                            		<div><label for="desc" style="font-weight:500;font-size:13px;">Candidate 1</label></div>
											<div class="right"><label for="desc" style="visibility:hidden;">Space</label></div>
											<div><label for="desc" id="report-candidate-1">0</label></div>
											<div><label for="desc" id="report-total-candidates">0</label></div>
										</div>
									</div>
									<div class="item">
		                            	<div class="field web-counting" style="background:#ffffff;text-align:center;">
		                            		<div><label for="desc" style="font-weight:500;font-size:13px;">Candidate 2</label></div>
											<div class="right"><label for="desc" style="visibility:hidden;">Space</label></div>
											<div><label for="desc" id="report-candidate-2">0</label></div>											
										</div>
									</div>
									<div class="item">
		                            	<div class="field web-counting" style="background:#ffffff;text-align:center;">
		                            		<div><label for="desc" style="font-weight:500;font-size:13px;">Candidate 3</label></div>
											<div class="right"><label for="desc" style="visibility:hidden;">Space</label></div>
											<div><label for="desc" id="report-candidate-3">0</label></div>
										</div>
									</div>
									<div class="item">
		                            	<div class="field web-counting" style="background:#ffffff;text-align:center;">
		                            		<div><label for="desc" style="font-weight:500;font-size:13px;">Candidate 4</label></div>
											<div class="right"><label for="desc" style="visibility:hidden;">Space</label></div>
											<div><label for="desc" id="report-candidate-4">0</label></div>
										</div>
									</div>
									<div class="item">
		                            	<div class="field web-counting" style="background:#ffffff;text-align:center;">
		                            		<div><label for="desc" style="font-weight:500;font-size:13px;">Candidate 5</label></div>
											<div class="right"><label for="desc" style="visibility:hidden;">Space</label></div>
											<div><label for="desc" id="report-candidate-5">0</label></div>
										</div>
									</div>
								</div>
							</div>
							
																						
						</div>
					</div> 
										
					</div>
					      		
				</div>	
			</div>
		
	
<?php include 'footer.php';?>