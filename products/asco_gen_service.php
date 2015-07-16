<!DOCTYPE html>
<html lang="en">
	<head>
		<script type="text/javascript" language="javascript" src="TableFilter/tablefilter.js"></script>
   	    <link rel="stylesheet" type="text/css" href="../styles/style_main.css">
		<meta charset="utf-8">
	</head>
   	<body>
	    <table id="container">
   		    <tr>
		        <td colspan="2">
					<div>
						<img id="splash" src="/media/images/splash.jpg">
					</div>
		            <div id="header"><h1>ASCO General Service Solenoid valves</h1></div>
				</td>
			</tr>
       		<tr>
		    <td id="sidebar">
				<div id="nav">
					<ul class="top_level">
						<li><a href="/home.html">Home</a></li>
						<li><a href="/products.html">Products</a>
							<ul class="sub_level">
								<li><a href="/products_type.html">List by Product Type</a></li>
								<li><a href="/products_mfg.html">List by Manufacturer</a></li>
								<li><a href="/search.html">Search</a></li>
							</ul>
						</li>
						<li><a href="/about.html">About Us</a></li>
						<li><a href="/Resources.html">Resources</a>
							<ul class="sub_level">
								<li><a href="/tech_info.html">Technical Info</a></li>
								<li><a href="/selection_guide.html">Selection Guide</a></li>
								<li><a href="/shop_info.html">Shopping Info</a></li>						
							</ul>
						</li>
						<li><a href="/contact.html">Contact Us</a></li>
					</ul>
				</div>
				<div id="etc">
					<p>Powered by:</p>
					<a href="http://www.valin.com"><img id="valin_logo" src="/media/images/valin-logo.png" width="120px"></a>
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
						<div class="mfg_info">
							<div class="mfg_image"><img src="/media/images/asco-logo.jpg"></div>
							<div class="mfg_desc">ASCO is the worldwide leader in the design and manufacture of quality solenoid valves. ASCO products are designed to control the flow of air, gas, water, oil and steam. ASCO's heritage of innovation has resulted in an extensive line of ASCO products that range from two position on/off valves to entire flow control solutions designed to meet requirements of thousands of customers.</div>
						</div>
						<div class="instructions">
							<h3>Instructions:</h1>
							<p>Use the drop down menus to filter valve specifications. Use the "Add to Cart" button on the far right to add your selected product to the cart. Product data sheets are available in the  "Data Sheet" column. You can page through the search results by using the forward and back arrows at the top of the table.</p>
						</div>
						<?php
							$xml=simplexml_load_file("data/asco_gen_service.xml") or die("Error: Cannot create object");
							echo "<table id='product_table'>";
							echo "<tr><thead><th>Configuration</th><th>Operation</th><th>Size</th><th>Cv</th><th>Pressure - Air(psi)</th><th>Temperature</th><th>Prefix</th><th>Part Number</th><th>Suffix</th><th>Body Material</th><th>Voltage</th><th>Data Sheet</th><th>Price</th><th>Buy</th></thead></tr>";
							foreach($xml->children() as $parent) {
								foreach($parent->children() as $valves) {
								  echo "<form action='http://www.cartserver.com/sc/cart.cgi' method='POST'>";
								  echo "<input type='hidden' name='item' value='b-5803^" . $valves->part_num . " " . $valves->volt . "^" . $valves->size . " - " . $valves->body_mat . " - " . $valves->op . " - ASCO^" . $valves->price . "^1^^^^" . $valves->weight . "^'>";
								  echo "<tr>";
								  echo "<td>" . $valves->config . "</td>";
								  echo "<td>" . $valves->op . "</td>";
								  echo "<td>" . $valves->size . "</td>";
								  echo "<td>" . $valves->cv . "</td>";
								  echo "<td>" . $valves->pressure . "</td>";
								  echo "<td>" . $valves->temp . "</td>";
								  echo "<td>" . $valves->prfx . "</td>";
								  echo "<td>" . $valves->part_num . "</td>";
								  echo "<td>" . $valves->sfx . "</td>";
								  echo "<td>" . $valves->body_mat . "</td>";
								  echo "<td>" . $valves->volt . "</td>";
								  echo "<td><a href='" . $valves->spec . "'><img src='/media/images/pdf_icon.png'></a></td>";
								  echo "<td>$" . $valves->price . "</td>";
								  echo "<td><input type='submit' name='add' value='Add to Cart'></td>";
								  echo "</tr></form>";
								}    
							}
							echo "</table>";
						?>
					</div>
				</td>
	        </tr>
            <tr>
				<td colspan="2">
					<div id="footer">This is a Footer</div>
				</td>
			</tr>
		</table>
		<script language="javascript" type="text/javascript">
   			var tableFilters = {
   				col_0: "select",
   				col_1: "select",
   				col_2: "select",
   				col_3: "select",
   				col_4: "select",
   				col_5: "select",
   				col_6: "none",
   				col_8: "none",
   				col_9: "select",
				col_10: "select",
				col_11: "none",
				col_12: "none",
				col_13: "none",
				paging:true,
				paging_length: 11,
				rows_counter: true,
				loader: true
				};
   			var tf03 = setFilterGrid("product_table",1,tableFilters);
   		</script>
	</body>
</html>
