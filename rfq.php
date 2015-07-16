<!DOCTYPE html>
<html lang="en">
	<head>
   	    <link rel="stylesheet" type="text/css" href="styles/style_main.css">
		<meta charset="utf-8">
	</head>
   	<body>
	    <table id="container">
   		    <tr>
		        <td colspan="2">
					<div>
						<img id="splash" src="media/images/splash.jpg">
					</div>
		            <div id="header"><h1>Request a Quote</h1></div>
				</td>
			</tr>
       		<tr>
		    <td id="sidebar">
				<div id="nav">
					<ul class="top_level">
						<li><a href="home.html">Home</a></li>
						<li><a href="products.html">Products</a>
							<ul class="sub_level">
								<li><a href="products_type.html">List by Product Type</a></li>
								<li><a href="products_mfg.html">List by Manufacturer</a></li>
								<li><a href="search.html">Search</a></li>
							</ul>
						</li>
						<li><a href="about.html">About Us</a></li>
						<li><a href="Resources.html">Resources</a>
							<ul class="sub_level">
								<li><a href="tech_info.html">Technical Info</a></li>
								<li><a href="selection_guide.html">Selection Guide</a></li>
								<li><a href="shop_info.html">Shopping Info</a></li>						
							</ul>
						</li>
						<li><a href="contact.html">Contact Us</a></li>
					</ul>
				</div>
				<div id="etc">
					<p>Powered by:</p>
					<a href="http://www.valin.com"><img id="valin_logo" src="media/images/valin-logo.png" width="120px"></a>
				</div>
				<div id="cart_btn">
					<form action="http://www.cartserver.com/sc/cart.cgi" method="POST">
                      <input TYPE="hidden" name="item" VALUE="b-5803">
                      <input class="cart_btn" type="submit"  name="view" border="0" alt="View Shopping Cart" Value="View Cart">
                    </form>
					<form action="http://www.cartserver.com/sc/cart.cgi" method="POST">
                      <input TYPE="hidden" name="item" VALUE="b-5803">
                      <input class="cart_btn" type="submit"  name="checkout" border="0" alt="View Shopping Cart" Value="Check Out">
                    </form>
				</div>
			</td>
          		<td>
				<div id="section">
					<div id="rfq">
						<?php
							//define variables and set to empty values
							$nameErr = $emailErr = $phoneErr = $descriptionErr = $cust_typeErr = "";
							$name = $email = $phone = $company = $part_number = $description = $cust_type = "";
							
							if ($_SERVER["REQUEST_METHOD"] == "POST") {
								//check to make sure name input contains data and is only letters and white space
								if (empty($_POST["name"])) {
									$nameErr = "Name is required";	
								}
								else {
									$name = test_input($_POST["name"]);
									if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
										$nameErr = "Only letters and white space allowed";
									}
								}
								//check to make sure email input is contains data and is valid
								if (empty($_POST["email"])) {
									$emailErr = "Email is required";	
								}
								else {
									$email = test_input($_POST["email"]);
									if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
										$emailErr = "Invalid Email format";
									}
								}
								//check to make sure phone input contains data and is valid
								if (empty($_POST["phone"])) {
									$phoneErr = "Phone number is required";	
								}
								else {
									$phone = test_input($_POST["phone"]);
									if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$phone)) {
										$phoneErr = "Phone number is invalid";
									}
								}
								
								$company = test_input($_POST["company"]);
								$part_number = test_input($_POST["part_number"]);
								
								if (empty($_POST["description"])) {
									$descriptionErr = "Description is required";	
								}
								else {
									$description = test_input($_POST["description"]);
								}
								
								if (empty($_POST["cust_type"])) {
									$cust_typeErr = "Customer Type is required";	
								}
								else {
									$cust_type = test_input($_POST["cust_type"]);
								}
							}
								
							function test_input($data) {
								$data = trim($data);
								$data = stripslashes($data);
								$data = htmlspecialchars($data);
								return $data;}
							
							$msg = "Quote Request:\nFrom: $name\nCustomer Email: $email\nCustomer Phone: $phone\nCompany: $company\nPart Number: $part_number\nDescription: $description\nCustomer Type: $cust_type";
							
							$msg = wordwrap($msg,70);
							
							$to = "jwalters@valin.com";
							
							$subject = "Quote Request from TVS";
							
							$headers = "From: Mailer-Daemon@two.5gbfree.com";
							
							mail($to,$subject,$msg,$headers);
						?>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
							Name:<input type="text" name="name" value="<?php echo $name;?>">
							<span class="error">*<?php echo $nameErr;?></span>
							<br>
							E-Mail:<input type="text" name="email" value="<?php echo $email;?>">
							<span class="error">*<?php echo $emailErr;?></span>
							<br>
							Phone:<input type="text" name="phone" value="<?php echo $phone;?>">
							<span class="error">*<?php echo $phoneErr;?></span>
							<br>
							Company:<input type="text" name="company" value="<?php echo $company;?>">
							<br>
							Part Number:<input type="text" name="part_number">
							<br>
							Description:<textarea name="description" rows="5" cols="40"></textarea>
							<span class="error">*<?php echo $descriptionErr;?></span>
							<br>
							<input type="radio" name="cust_type" <?php if (isset($cust_type) && $cust_type == "end_user") echo "checked";?> value="end user">End User
							<input type="radio" name="cust_type" <?php if (isset($cust_type) && $cust_type == "reseller") echo "checked"?> value="reseller">Reseller
							<span class="error">*<?php echo $cust_typeErr;?></span>
							<br>
							<input type="submit" name="submit" value="submit">
						</form>
						<?php
							echo "<h2>Your Input</h2>";
							echo $name;
							echo "<br>";
							echo $email;
							echo "<br>";
							echo $phone;
							echo "<br>";
							echo $company;
							echo "<br>";
							echo $part_number;
							echo "<br>";
							echo $description;
							echo "<br>";
							echo $cust_type;
						?>
					</div>
				</div>
				</td>
	        </tr>
            <tr>
				<td colspan="2"><div id="footer">This is a Footer</div>
				</td>
			</tr>
		</table>
	</body>
</html>
