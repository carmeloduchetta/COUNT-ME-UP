<?php 
	include "usercheck.php"; 
	include 'header.php';  
?>
</head>

<body class="preload animated fadeIn" onLoad="">
<div class="vessel full">
	<div class="warp">
		<section class="welcome">
			<div id="welcome" class="section-header">
				<h1>Welcome back! <span>What would you like to do?</span></h1>
			</div>
			<ul class="smart-list welcome-board">
				
				<li>
					<a href="show-results.php">
						<span class="icon-Inbox"></span>
						<label>Show Results</label>
					</a>
				</li>
				<li>
					<a href="add-vote.php">
						<span class="icon-User"></span>
						<label>Add Vote</label>
					</a>
				</li>
			</ul>
		</section>
		
	</div>
</div>
<?php include 'footer.php';?>