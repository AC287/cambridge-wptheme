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
					$main_category2 = $wpdb->get_results("SELECT DISTINCT m0 FROM wp_prodlegend;");

          // $allHeight = sizeof($main_category2)+sizeof($distinct_s1)+sizeof($distinct_s2);

					echo "<div id='product-main-page'>";

						echo "<div class='cat-bar'>";	//This begins accordion.
							include 'phpsnippet/productaccordion.php';
						echo "</div>";	// end cat-bar div tag; ends accordion.

						echo "<div class='prod-display'>";
							$mPos = 0;
							foreach($main_category2 as $main_category2) {
								echo "<div class='group-container'>";
								echo "<div class='m-title'>";
									echo "<a href='./categories/?m0=".urlencode($main_category2->m0)."'>".$main_category2->m0."</a>";
								echo "</div>";
								$qm0 = addslashes($main_category2->m0); //Slash escape is required for special character such as " , ' , \ to search in query.
								$s1_category2 = $wpdb->get_results("SELECT DISTINCT s1 FROM wp_prodlegend WHERE m0 = '$qm0';");
								// print_r($s1_category2);
								if(!empty($s1_category2[0]->s1)) {
									echo "<div class='s1-box-background'>";
									echo "<div class='s1-box-flex-container'>";
									$counter = 0;
									$counter4 = 0;
									foreach($s1_category2 as $s1_category2) {
										$qs1 = addslashes($s1_category2->s1);	//Slash escape is required for special character such as " , ' , \ to search in query.
										// $img = $wpdb->get_results("SELECT img0 FROM wp_prod0 WHERE s1 = '$s1_category2->s1' AND img0 IS NOT NULL;");
										$img = $wpdb->get_results("SELECT DISTINCT cat1img FROM wp_prodlegend WHERE m0 = '$qm0' AND s1 = '$qs1' AND cat1img IS NOT NULL");
										// echo $img;
										// print_r($img);

										// print_r(sizeof($img));
										$s2_check = $wpdb->get_results("SELECT DISTINCT s2 FROM wp_prodlegend WHERE m0='$qm0' AND s1='$qs1';");
										// print_r(sizeof($s2_check));
										// print_r($s2_check[0]->s2);
										// print_r($main_category2->m0);
										// print_r($s1_category2->s1);
										if($counter < 4) {
											echo "<a href='./categories/?m0=".urlencode($main_category2->m0)."&s1=".urlencode($s1_category2->s1)."' class='s1-box'>";

											echo "<div class='item-img'>";
											if (sizeof($img) > 1) {
												// foreach($img as $img) {
												//   echo "<img src='' height='100' width='100'>";
												// }
												// echo "<img src='".$img[array_rand($img)]->img0."' height='100' width='100'>";
												echo "<img src='".$img[0]->cat1img."'>";


											} elseif (sizeof($img)===1) {
												// print_r($img->img0);
												echo "<img src='".$img[0]->cat1img."'>";
											} else {
												echo "<img src='http://files.coda.com.s3.amazonaws.com/imgv2/comingsoon.jpg'>";
											};
											// echo "<img src='https://s3.amazonaws.com/files.coda.com/content/prod/categories/193-brandedcableties.jpg' height='100' widht='100'>";
											echo "</div>";
											echo "<div class='s1-cat'>".$s1_category2->s1."</div>";
											echo "</a>";
											$counter++;
											$counter4++;
										} else {
											// if sub category is more than 4, this add class to hide.
											echo "<a href='./categories/?m0=".urlencode($main_category2->m0)."&s1=".urlencode($s1_category2->s1)."' class='s1-box extra-box pos".$mPos."'>";
											echo "<div class='item-img'>";
											if (sizeof($img) > 1) {
												echo "<img src='".$img[0]->cat1img."'>";
											}
											elseif (sizeof($img)===1) {
												// print_r($img->img0);
												echo "<img src='".$img[0]->cat1img."'>";
											}
											else {
												echo "<img src='http://files.coda.com.s3.amazonaws.com/imgv2/comingsoon.jpg'>";
											};
											// echo "<img src='https://s3.amazonaws.com/files.coda.com/content/prod/categories/193-brandedcableties.jpg' height='100' widht='100'>";
											echo "</div>";
											echo "<div class='s1-cat'>".$s1_category2->s1."</div>";
											echo "</a>";
											$counter++;
											$counter4++;
										}
									}
									for($k=$counter4; $k%4!=0; $k++){
										if($k < 4){
											echo "<a class='s1-box s1-box-filler'></a>";
										} else {
											echo "<a class='s1-box s1-box-filler extra-box pos".$mPos."'></a>";
										}
									}
									echo "</div>";	// end s1-box-flex-container
									if($counter > 3) {
										echo "<div class='show-hide'>";
											echo "<span class='sh-chev'><img class='chev' src='http://files.coda.com.s3.amazonaws.com/imgv2/icons/chev_down_blue.png'></span>";
											echo "<span class='display-extra pos".$mPos." toggle-class'>SHOW ALL ".strtoupper($main_category2->m0)." CATEGORIES</span>";
										echo "</div>";
									}
									echo "</div>";	// end s1-box-background
								}
								$mPos++;
								echo "</div>";  //end group-container div;
							}
						echo "</div>";	// end pro-display div tag.

					echo "</div>";		// end product-main-page id div tag.

				?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .container -->

<?php get_footer();
