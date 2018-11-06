<!-- Template Name: Products -->
<!--	This is a main product page: /products/  -->

<?php get_header(); ?>
<div class='prod-tocatalogs'>
	<a href='<?php echo home_url();?>/catalogs/'>Click here to view our catalogs.</a>
	<div class='prod-tocatalogs-underline'>
	</div>
</div>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
				<?php
					global $wpdb;

					// $main_category2 = $wpdb->get_results("SELECT DISTINCT m0 From wp_prod0;");
					// $main_category2 = $wpdb->get_results("SELECT DISTINCT m0 FROM wp_prodlegend;");
          // $allHeight = sizeof($main_category2)+sizeof($distinct_s1)+sizeof($distinct_s2);

					echo "<div id='product-main-page'>";

						echo "<div class='cat-bar'>";	//This begins accordion.
							include 'phpsnippet/productaccordion.php';
						echo "</div>";	// end cat-bar div tag; ends accordion.



						echo "<div class='prod-display'>";
						// print_r($main_category[2]);

						for ($m0p = 0; $m0p < 3; $m0p++){
							// print_r($main_category[$m0p]);

							$mPos = 0;

							foreach ($main_category[$m0p] as $main_category2) {
								echo "<div class='group-container'>";

									echo "<div class='m-title'>";
										echo "<a href='./categories/?m0=".urlencode($main_category2->m0)."'>".$main_category2->m0."</a>";
									echo "</div>";	//end class m-title.

									$qm0 = addslashes($main_category2->m0); //Slash escape is required for special character such as " , ' , \ to search in query.
									$s1_category2 = $wpdb->get_results("SELECT DISTINCT s1 FROM wp_prodlegend WHERE m0 = '$qm0';");
									$s1j_category2 = $wpdb->get_results("SELECT DISTINCT s1 FROM wp_prodlegend WHERE jointcat = '$qm0';");

									// print_r($s1_category2);
									echo "<div class='s1-box-background'>";
									echo "<div class='s1-box-flex-container'>";
									$counter = 0;
									$counter4 = 0;

										if(!empty($s1_category2[0]->s1)) {	//s1 category is not empty.

										foreach($s1_category2 as $s1_category2) {	//loop through each s1 category.

											$qs1 = addslashes($s1_category2->s1);	//Slash escape is required for special character such as " , ' , \ to search in query.

											$img = $wpdb->get_results("SELECT DISTINCT cat1img FROM wp_prodlegend WHERE m0 = '$qm0' AND s1 = '$qs1' AND cat1img IS NOT NULL");	//Get s1 image.

											$s2_check = $wpdb->get_var("SELECT COUNT(DISTINCT s2) FROM wp_prodlegend WHERE m0='$qm0' AND s1='$qs1';");	//Check for s2.

											if(!$s2_check){
												$item_check = $wpdb->get_results("SELECT DISTINCT item FROM wp_prod0 WHERE m0='$qm0' AND s1='$qs1';");
											} else {
												$item_check = null;
											}

											if($counter < 4) {

												if(sizeof($item_check) == 1){
													//This will determine if link should take user to individual item page or table page.
													echo "<a href='./item/?id=".urlencode($item_check[0]->item)."&m0=".urlencode($main_category2->m0)."&s1=".urlencode($s1_category2->s1)."' class='s1-box'>";
												} else {
													echo "<a href='./categories/?m0=".urlencode($main_category2->m0)."&s1=".urlencode($s1_category2->s1)."' class='s1-box'>";
												}

												echo "<div class='item-img'>";
												if (sizeof($img) >= 1) {

													echo "<img src='".$img[0]->cat1img."'>";

												} else {
													echo "<img src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
												};

												echo "</div>";
												echo "<div class='s1-cat'>".$s1_category2->s1."</div>";
												echo "</a>";
												$counter++;
												$counter4++;
											} else {
												// if sub category is more than 4, this add class to hide.
												if(sizeof($item_check)==1){
													//This will determine if link should take user to individual item page or table page.
													echo "<a href='./item/?id=".urlencode($item_check[0]->item)."&m0=".urlencode($main_category2->m0)."&s1=".urlencode($s1_category2->s1)."' class='s1-box extra-box pos".$mPos."'>";
												} else {
													echo "<a href='./categories/?m0=".urlencode($main_category2->m0)."&s1=".urlencode($s1_category2->s1)."' class='s1-box extra-box pos".$mPos."'>";
												}

												echo "<div class='item-img'>";
												if (sizeof($img) > 1) {
													echo "<img src='".$img[0]->cat1img."'>";
												}
												elseif (sizeof($img)===1) {
													// print_r($img->img0);
													echo "<img src='".$img[0]->cat1img."'>";
												}
												else {
													echo "<img src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
												};
												// echo "<img src='https://s3.amazonaws.com/files.coda.com/content/prod/categories/193-brandedcableties.jpg' height='100' widht='100'>";
												echo "</div>";
												echo "<div class='s1-cat'>".$s1_category2->s1."</div>";
												echo "</a>";
												$counter++;
												$counter4++;
											}
										}	// end foreach.

										if(!empty($s1j_category2[0]->s1)){	//display joint category after displaying all s1 from m0.
											foreach($s1j_category2 as $s1j_category2){
												$jqs1 = addslashes($s1j_category2->s1);	//Slash escape is required for special character such as " , ' , \ to search in query.
												$jimg = $wpdb->get_results("SELECT DISTINCT cat1img FROM wp_prodlegend WHERE jointcat = '$qm0' AND s1 = '$jqs1' AND cat1img IS NOT NULL");
												$s2j_check = $wpdb->get_var("SELECT COUNT(DISTINCT s2) FROM wp_prodlegend WHERE jointcat='$qm0' AND s1='$jqs1';");

												if(!$s2j_check) {
													$itemj_check = $wpdb->get_results("SELECT DISTINCT item FROM wp_prod0 WHERE jointcat='$qm0' AND s1='$jqs1';");
												} else {
													$itemj_check = null;
												}

												if($counter < 4) {

													// print_r($itemj_check);

													if(sizeof($itemj_check) == 1){
														//This will determine if link should take user to individual item page or table page.
														echo "<a href='./item/?id=".urlencode($itemj_check[0]->item)."&m0=".urlencode($main_category2->m0)."&s1=".urlencode($s1j_category2->s1)."' class='s1-box'>";
													} else {
														echo "<a href='./categories/?m0=".urlencode($main_category2->m0)."&s1=".urlencode($s1j_category2->s1)."' class='s1-box'>";
													}

													echo "<div class='item-img'>";
													if (sizeof($jimg) >= 1) {

														echo "<img src='".$jimg[0]->cat1img."'>";

													} else {
														echo "<img src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
													};

													echo "</div>";
													echo "<div class='s1-cat'>".$s1j_category2->s1."</div>";
													echo "</a>";
													$counter++;
													$counter4++;
												} else {
													// if sub category is more than 4, this add class to hide.
													if(sizeof($itemj_check)==1){
														//This will determine if link should take user to individual item page or table page.
														echo "<a href='./item/?id=".urlencode($itemj_check[0]->item)."&m0=".urlencode($main_category2->m0)."&s1=".urlencode($s1j_category2->s1)."' class='s1-box extra-box pos".$mPos."'>";
													} else {
														echo "<a href='./categories/?m0=".urlencode($main_category2->m0)."&s1=".urlencode($s1j_category2->s1)."' class='s1-box extra-box pos".$mPos."'>";
													}

													echo "<div class='item-img'>";
													if (sizeof($jimg) > 1) {
														echo "<img src='".$jimg[0]->cat1img."'>";
													}
													elseif (sizeof($jimg)===1) {
														// print_r($img->img0);
														echo "<img src='".$jimg[0]->cat1img."'>";
													}
													else {
														echo "<img src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
													};
													// echo "<img src='https://s3.amazonaws.com/files.coda.com/content/prod/categories/193-brandedcableties.jpg' height='100' widht='100'>";
													echo "</div>";
													echo "<div class='s1-cat'>".$s1j_category2->s1."</div>";
													echo "</a>";
													$counter++;
													$counter4++;
												}

											}	// end foreach loop for joint cat.


										}

										for($k=$counter4; $k%4!=0; $k++){
											if($k < 4){
												echo "<a class='s1-box s1-box-filler'></a>";
											} else {
												echo "<a class='s1-box s1-box-filler extra-box pos".$mPos."'></a>";
											}
										}

										echo "</div>";	// end s1-box-flex-container

										if($counter > 4) {
											echo "<div class='show-hide'>";
												echo "<span class='sh-chev'><img class='chev' src='https://storage.codacambridge.com/files/icons/chev_down_blue.png'></span>";
												echo "<span class='display-extra pos".$mPos." toggle-class'>SHOW ALL ".strtoupper($main_category2->m0)." CATEGORIES</span>";
											echo "</div>";
										}

										echo "</div>";	// end s1-box-background

									} else {
										//s1 is empty. get item data.
										// echo "THERE IS NO CATEGORY IN HERE!";
										// discussion with miriam: if there is no sub category, web should display main category, clicking on main category should take user to table, then to item page.

										$m0_images = $wpdb->get_results("SELECT img0 FROM wp_prod0 WHERE m0 = '$qm0';");
										$m0_imgarray = array();
										echo "<div class='s1-box-background'>";
											echo "<div class='s1-box-flex-container'>";
												foreach ($m0_images as $tempimg) {
													if($tempimg->img0 != '' || $tempimg->img0 != ' '){
														$m0_imgarray[] = $tempimg->img0;
													}
												}
												$m0_imgarray = array_values(array_filter($m0_imgarray));
												// print_r($m0_imgarray);
												echo "<a href='./categories/?m0=".urlencode($qm0)."' class='s1-box'>";
													echo "<div class='item-img'>";
														if(in_array('',$m0_imgarray) || in_array(' ',$m0_imgarray)) {
															echo "<img src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
														} else {
															echo "<img src='".$m0_imgarray[array_rand($m0_imgarray,1)]."'>";
														}
													echo "</div>";	// end item-img class.
													echo "<div class='s1-cat'>".$main_category2->m0."</div>";
												echo "</a>";	// end a tag s1-box class.
												// print_r($m0_images);
												// print_r($m0_imgarray);
												$counter4++;
												for($k=$counter4; $k%4!=0; $k++){
													echo "<a class='s1-box s1-box-filler'></a>";
												}
											echo "</div>";	// end s1-box-flex-container;
										echo "</div>";	// end s1-box-background container;

										/*
										$m0_items = $wpdb->get_results("SELECT item,img0,img1,img2,img3,img4,img5 FROM wp_prod0 WHERE m0 = '$qm0';");
										echo "<div class='s1-box-background'>";
											echo "<div class='s1-box-flex-container'>";
												$counter = 0;
												$counter4 = 0;
												foreach($m0_items as $m0_item_inner) {
													if($counter < 4){
														echo "<a href='./item/?id=".urlencode($m0_item_inner->item)."&m0=".urlencode($main_category2->m0)."' class='s1-box'>";
														echo "<div class='item-img'>";
														$prodimgtracker = 0;
														for($x=0; $x <= 5; $x++) {
															$prodimg = 'img'.$x;
															// print_r($m0_item_inner);

															if(!empty($m0_item_inner->$prodimg)) {
																echo "<img src='".$m0_item_inner->$prodimg."'>";
																break;
															} else {
																$prodimgtracker++;
															}
														}
														if($prodimgtracker > 0) {
															//no image available...
															echo "<img src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
														}
														echo "</div>";	// end item-img tag.
														echo "<div class='s1-cat'>".$m0_item_inner->item."</div>";
														echo "</a>";	// end anchor tag of class s1-box
														$counter++;
														$counter4++;

														// end if counter < 4;
													}	else{
														echo "<a href='./item/?id=".urlencode($m0_item_inner->item)."&m0=".urlencode($main_category2->m0)."' class='s1-box extra-box pos$mPos'>";
														echo "<div class='item-img'>";
														$prodimgtracker = 0;
														for($x=0; $x <= 5; $x++) {
															$prodimg = 'img'.$x;
															// echo $prodimg;
															if(!empty($m0_item_inner->$prodimg)) {
																echo "<img src='".$m0_item_inner->$prodimg."'>";
																break;
															} else {
																$prodimgtracker++;
															}
														}
														if($prodimgtracker > 0) {
															//no image available...
															echo "<img src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
														}
														echo "</div>";	// end item-img tag.
														echo "<div class='s1-cat'>".$m0_item_inner->item."</div>";
														echo "</a>";	// end anchor tag of class s1-box
														$counter++;
														$counter4++;
													}
												}	// end foreach loop.
												for($k=$counter4; $k%4!=0; $k++){
													if($k < 4){
														echo "<a class='s1-box s1-box-filler'></a>";
													} else {
														echo "<a class='s1-box s1-box-filler extra-box pos".$mPos."'></a>";
													}
												}
											echo "</div>";	// end s1-box-flex-container
											if($counter > 4) {
												echo "<div class='show-hide'>";
													echo "<span class='sh-chev'><img class='chev' src='https://storage.codacambridge.com/files/icons/chev_down_blue.png'></span>";
													echo "<span class='display-extra pos".$mPos." toggle-class'>SHOW ALL ".strtoupper($main_category2->m0)." CATEGORIES</span>";
												echo "</div>";
											}
										echo "</div>";	// end s1-box-background

										*/

									}
									$mPos++;

								echo "</div>";	// end group-container div.
							}	// end foreach maincategory loop.
						}	// end for loop for m0priority.

						echo "</div>";	// end pro-display div tag.

					echo "</div>";		// end product-main-page id div tag.

				?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .container -->

<?php get_footer();
