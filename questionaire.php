<!DOCTYPE html>
<html lang='en'>

	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js" type="text/javascript"></script>
	 	<script src="js/java.js" type="text/javascript"></script>


		<script src="js/ion.rangeSlider.min.js" type="text/javascript"></script>

	    <script type="text/javascript" src="js/jquery.form.js"></script>
	    <script type="text/javascript" src="js/jquery.validate.js"></script>
	    <script type="text/javascript" src="js/bbq.js"></script>
	    <script type="text/javascript" src="js/jquery.form.wizard.js"></script>

	    <link rel="stylesheet" href="css/normalize.min.css" />
	    <link rel="stylesheet" href="css/ion.rangeSlider.css" />
	    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />

		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,100,300,400italic,500,700,900' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.css">

	</head>

	<body id='background_dots'>

	<div class="navbar navbar-inverse">
		<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" style="color:#414141; font-family:'Roboto Slab'; font-size: 26" href="./index.html"><img style="max-height: 30px" src="./assets/unnamedtiny.png"> TechRekt</a>
		</div>

		<div class="navbar-collapse collapse navbar-inverse-collapse">

		<ul class="nav navbar-nav navbar-right">
			<li><a href="./about.html">ABOUT</a></li>
			<li><a href="./faq.html">FAQ</a></li>
			<li><a href="./contact.html">CONTACT</a></li>

		</ul>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div id='roboto_font'>Looking for your next</div>
			</div>
			<div id = 'fitted' class="col-md-5">
				<?php
					$result = $_GET['varname'];	
					if ($result == "12855") {
						$category = "Laptop";
					}
					else if ($result == "16329") {
						$category = "Smartphone";
					}
					else if ($result == "23042") {
						$category = "Tablet";
					}
					else {
						$category = "eReader";
					}
					echo "<div id='roboto_font_orange'>" . $category . "</div>";
				?>
			</div>
			<div class="col-md-1">
				<div id='roboto_font'></div>
			</div>
			
		</div>

		<div class="row" id="last">
			<div style="margin-bottom: 5px" class="col-md-12 well color_main_upper">

				<div id='questionaire'>
					<?php
						// Quiz if search query is 'Laptop'
						if ($result == "12855") {
					?>
						
						<form id='demoForm' name='getresults' method='post' action='./cgi-bin/process.cgi'>	

							<div id='1' class='step'>	
								Q1. Price Range: 		
								<div id='center_div'>
									<input id='price_slider' type='text' name='price'> 
									<br/><br/>
								</div>
							</div>

							<div id='2' class='step'>	
								Q2. Diagonal Size: 		 			
								<div id='center_div'>
									<input type='text' name='size' id='size_slider'>					
									<br/><br/>
								</div>
							</div>

							<div id='3' class='step'>	
								Q3. OS:	
								<div id='center_div' class='smaller_font'>													
									<br/><br/>
									<input type='radio' name='OS' value='No Preference' checked> No Preference 	
									 	<br/>
									<input type='radio' name='OS' value='iOS'> iOS				
										<br/>
									<input type='radio' name='OS' value='Windows'> Windows			
										<br/>
									<input type='radio' name='OS' value='Other'> Other 			
										<br/>
								</div>
							</div>

							<div id='4' class='step'>	
								Q4. Brand: 			
								<div id='center_div'>
									<?php
										$brands_laptops = fopen("data/brands_laptops.txt", "r");
										echo "<ul id='columned'>";
										while (!feof($brands_laptops)) {
											$brand = fgets($brands_laptops);
											echo 	"<li><input type='checkbox' name='brand' value='" . $brand . 
												 	"'>" . $brand . "</li>";
										}
										fclose($brands_laptops);
										echo "</ul><input type='hidden' name='cat_id' value='" . $result . "'>";
									?>
									<br/>
								</div>	
							</div>

							<div id='5' class='step'>	
								Q5.	Memory:				
								<div id='center_div'>
									<input type='text' name='Memory' id='memory_slider'>				
									<br/><br/>
								</div>
							</div>

							<div id='6' class='step'>
								Q6. Screen Resolution:		
								<div id='center_div' class='smaller_font'>								
										<br/>
									<input type='radio' name='Screen Resolution' value='low' checked> Low 			
										<br/>
									<input type='radio' name='Screen Resolution' value='med'> Med 				
										<br/>
									<input type='radio' name='Screen Resolution' value='high'> High			
										<br/>
								</div>																
							</div>

							<div id='7' class='step'>	
								Q7. Touchscreen:		
								<div id='center_div' class='smaller_font'>										
										<br/>
									<input type='radio' name='Touchscreen' value='yes'> Yes 			
										<br/>
									<input type='radio' name='Touchscreen' value='no'> No 				
										<br/>
									<input type='radio' name='Touchscreen' value='either' checked> Either			
										<br/>
								</div>																	
							</div>

							<div id='8' class='step'>	
					 			Q8.	Battery Life:		
								<div id='center_div'>
									<input type='text' name='Battery Life' id='battery_slider'>
								</div>
							</div>
							
							<br/><br/>

							<input id="back" value="Back" type="reset" />
							<input id="next" value="Next" type="submit" />

						</form>

					<?php
						}
						// Quiz if search query is 'Cell Phones'
						else if ($result == "16329") {
					?>


						<form id='demoForm' name='getresults' method='post' action='cgi-bin/process.cgi'>		
							
							<div id='1' class='step'>	
								Q1. Price Range: 		
								<div id='center_div'>
									<input type='text' name='price' id='price_slider'>					
										<br/><br/>
								</div>
							</div>

							<div id='2' class='step'>	
								Q2. Diagonal Size: 		 			
								<div id='center_div'>
									<input type='text' name='size' id='size_slider'>					
										<br/><br/>
								</div>
							</div>

							<div id='3' class='step'>	
								Q3. OS:   				
								<div id='center_div' class='smaller_font'>
									<input type='radio' name='OS' value='No Preference' checked> No Preference 	
										<br/>
									<input type='radio' name='OS' value='Android'> Android 		
										<br/>
									<input type='radio' name='OS' value='iOS'> iOS				
										<br/>
									<input type='radio' name='OS' value='Windows'> Windows 		
										<br/>
									<input type='radio' name='OS' value='Other'> Other 			
										<br/>
								</div>
							</div>

							<div id='4' class='step'>	
								Q4. Brand: 			
								<div id='center_div'>
									<?php
										$brands_phones = fopen("data/brands_phones.txt", "r");
										echo "<ul id='columned'>";
										while (!feof($brands_phones)) {
											$brand = fgets($brands_phones);
											echo 	"<li><input type='checkbox' name='brand' value='" . $brand . 
												 	"'>" . $brand . "</li>";
										}
										fclose($brands_phones);
										echo "</ul><input type='hidden' name='cat_id' value='" . $result . "'>";
									?>
									<br/>		
								</div>
							</div>

							<div id='5' class='step'>	
								Q5. Memory:				
								<div id='center_div'>
									<input type='text' name='Memory' id='memory_slider'>			
										<br/><br/>
								</div>
							</div>

							<div id='6' class='step'>	
								Q6. Screen Resolution:		
								<div id='center_div' class='smaller_font'>	
									<input type='radio' name='Screen Resolution' value='low' checked> Low 			
										<br/>
									<input type='radio' name='Screen Resolution' value='med'> Med 				
										<br/>
									<input type='radio' name='Screen Resolution' value='high'> High			
										<br/>
								</div>																
							</div>

							<div id='7' class='step'>	
								Q7. Touchscreen:			
								<div id='center_div' class='smaller_font'>	
									<input type='radio' name='Touchscreen' value='yes'> Yes 		
										<br/>
									<input type='radio' name='Touchscreen' value='no'> No 			
										<br/>
									<input type='radio' name='Touchscreen' value='either' checked> Either		
										<br/>
								</div>															
							</div>

							<div id='8' class='step'>			
					 			Q8.	Battery Life:		
								<div id='center_div'>
									<input type='text' name='Battery Life' id='battery_slider'>
								</div>				
							</div>

							<br/><br/>

							<input id="back" value="Back" type="reset"/>
							<input id="next" value="Next" type="submit"/>	
						
						</form>

					<?php
						}
						// Quiz if search query is 'Tablet'
						else if ($result == "23042") {
					?>


						<form id='demoForm' name='getresults' method='post' action='cgi-bin/process.cgi'>		
							
							<div id='1' class='step'>	
								Q1. Price Range: 		
								<div id='center_div'>
									<input type='text' name='price' id='price_slider'>					
										<br/><br/>
								</div>
							</div>

							<div id='2' class='step'>	
								Q2. Diagonal Size: 		 			
								<div id='center_div'>
									<input type='text' name='size' id='size_slider'>					
										<br/><br/>
								</div>
							</div>

							<div id='3' class='step'>	
								Q3. OS:   				
								<div id='center_div' class='smaller_font'>	
									<input type='radio' name='OS' value='No Preference' checked> No Preference 	
										<br/>
									<input type='radio' name='OS' value='Android'> Android 		
										<br/>
									<input type='radio' name='OS' value='iOS'> iOS				
										<br/>
									<input type='radio' name='OS' value='Windows'> Windows 		
										<br/>
									<input type='radio' name='OS' value='Other'> Other 			
										<br/>
								</div>
							</div>

							<div id='4' class='step'>	
								Q4. Brand: 			
								<div id='center_div'>
									<?php
										$brands_phones = fopen("data/brands_phones.txt", "r");
										echo "<ul id='columned'>";
										while (!feof($brands_phones)) {
											$brand = fgets($brands_phones);
											echo 	"<li><input type='checkbox' name='brand' value='" . $brand . 
												 	"'>" . $brand . "</li>";
										}
										fclose($brands_phones);
										echo "</ul><input type='hidden' name='cat_id' value='" . $result . "'>";
									?>
									<br/>		
								</div>
							</div>

							<div id='5' class='step'>	
								Q5. Memory:				
								<div id='center_div'>
									<input type='text' name='Memory' id='memory_slider'>			
										<br/><br/>
								</div>
							</div>

							<div id='6' class='step'>	
								Q6. Screen Resolution:		
								<div id='center_div' class='smaller_font'>	
									<input type='radio' name='Screen Resolution' value='low' checked> Low 			
										<br/>
									<input type='radio' name='Screen Resolution' value='med'> Med 				
										<br/>
									<input type='radio' name='Screen Resolution' value='high'> High			
										<br/>
								</div>																
							</div>

							<div id='7' class='step'>	
								Q7. Touchscreen:			
								<div id='center_div' class='smaller_font'>		
									<input type='radio' name='Touchscreen' value='yes'> Yes 		
										<br/>
									<input type='radio' name='Touchscreen' value='no'> No 			
										<br/>
									<input type='radio' name='Touchscreen' value='either' checked> Either		
										<br/>
								</div>															
							</div>

							<div id='8' class='step'>			
					 			Q8.	Battery Life:		
								<div id='center_div'>
									<input type='text' name='Battery Life' id='battery_slider'>
								</div>				
							</div>

							<br/><br/>

							<input id="back" value="Back" type="reset"/>
							<input id="next" value="Next" type="submit"/>	
						
						</form>

					<?php	
						}
						// Quiz if search query is 'eBook Reader'
						else {
					?>

						<form id='demoForm' name='getresults' method='post' action='cgi-bin/process.cgi'>	

							<div id='1' class='step'>
								Q1. Price Range: 		
									<div id='center_div'>
										<input type='text' name='price' id='price_slider'>				
											<br/><br/>
									</div>
							</div>

							<div id='2' class='step'>
								Q2. Diagonal Size: 		 			
									<div id='center_div'>
										<input type='text' name='size' id='size_slider'>				
											<br/><br/>
									</div>
							</div>

							<div id='3' class='step'>
								Q3. Brand: 			
									<div id='center_div'>
										<?php
											$brands_ereaders = fopen("data/brands_ereaders.txt", "r");
											echo "<ul id='columned'>";
											while (!feof($brands_ereaders)) {
												$brand = fgets($brands_ereaders);
												echo 	"<li><input type='checkbox' name='brand' value='" . $brand . 
													 	"'>" . $brand . "</li>";
											}
											fclose($brands_ereaders);
											echo "</ul><input type='hidden' name='cat_id' value='" . $result . "'>";
										?>
									<br/>
									</div>
							</div>				

							<div id='4' class='step'>
								Q4. Memory:				
										<div id='center_div'>
											<input type='text' name='Memory' id='memory_slider'>			<br/><br/>
										</div>
							</div>	

							<div id='5' class='step'>
								Q5. Screen Resolution:		
									<div id='center_div' class='smaller_font'>
										<input type='radio' name='Screen Resolution' value='low' checked> Low 			
											<br/>
										<input type='radio' name='Screen Resolution' value='med'> Med 				
											<br/>
										<input type='radio' name='Screen Resolution' value='high'> High			
											<br/>
									</div>																
							</div>	

							<div id='6' class='step'>
								Q6. Touchscreen:		
									<div id='center_div' class='smaller_font'>
										<input type='radio' name='Touchscreen' value='yes'> Yes 		
											<br/>
										<input type='radio' name='Touchscreen' value='no'> No 			
											<br/>
										<input type='radio' name='Touchscreen' value='either' checked> Either		
											<br/>
									</div>					
							</div>	


							<div id='7' class='step'>			
					 			Q7.	Battery Life:		
								<div id='center_div'>
									<input type='text' name='Battery Life' id='battery_slider'>
								</div>				
							</div>

							<br/><br/>

							<input id="back" value="Back" type="reset"/>
							<input id="next" value="Next" type="submit"/>	
						
						</form>

					<?php
						}
					?>

					</div>			


			</div>
		</div>

	</div>

<script>
    $(window).bind("load", function(){  
        	$("#price_slider").css("width", "500px");
    	}, 	function(){  
        	$("#size_slider").css("width", "500px");
    	},	function(){  
        	$("#memory_slider").css("width", "500px");
    	},	function(){  
        	$("#battery_slider").css("width", "500px");
    });
</script>

</body>
</html>