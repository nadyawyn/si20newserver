<div class="ad__base">
					<h3 class="ad__title">Database</h3>
						<div class="ad__base-line add">
							<input type="text" name="foodins" placeholder="Product name"
								class="ad__base-input ad__base-input_food" id="addtobalbaseprod">
							<input type="text" name="foodins" placeholder="Cal" class="ad__base-input ad__base-input_cal" id="addtobalbasecal">
							<button class="button button_em ad__base_button" id="addtocalbase">ADD</button>
						</div>
					<div class="ad__base-list">

						
						<!-- ! OUTPUT FROM DATABASE  -->

						<?php
						$thisdatabasename = 'si__'.$myname.'_calorbase';
						//Getting PRODUCTS from database
							$sql_prod = 'SELECT * FROM `'.$thisdatabasename.'` ORDER BY `productname`';
							$result_prod = mysqli_query($link, $sql_prod);

							$i = 0;
							
							while ($row_prod = mysqli_fetch_array($result_prod)) {
								print('<div class="ad__base-line'); 
								if($i % 2){
								print(' even');
								}
								print('">');
								print('<input type="text" name="foodins" value="'. $row_prod['productname'] .'"
								class="ad__base-input ad__base-input_foodready" id="product'. $row_prod['recid'] .'">');
								print('<input type="text" name="foodins" value="'. $row_prod['productcal'] .'" class="ad__base-input ad__base-input_calready" id="calor'. $row_prod['recid'] .'">');
								print('</div>');

								$i++;
								
							}   
						
						?>
					</div>

				</div>