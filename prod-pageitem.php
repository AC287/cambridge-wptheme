<!-- Template Name: Products Item page. -->

<!-- // Item page -->
<!-- // Data displaying individual item. -->
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
			global $wp_query;
			global $wpdb;
			//If query_vars[] value change, need to update in functions.php
			// echo 'Main Category : ' . $wp_query->query_vars['m0'];
			// echo '<br />';
			// echo 'Sub Category : ' . $wp_query->query_vars['s1'];

			$item_id = $wp_query->query_vars['id'];	//assign query value
			// print_r($p2m0);
			// print_r($p2s1);
			// print_r($p2s2);

			// $sub_category2 = $wpdb->get_results("SELECT DISTINCT s2 FROM wp_prod0 WHERE m0='$p1m0' AND s1='$p1s1';");
			// print_r($sub_category1);

			echo "<div id='product-main-page'>";
			echo "<div class='cat-bar'>";
				include 'phpsnippet/productaccordion.php';
			echo "</div>";
			// END Main Category accordion panel.
			//--------------
			// Start Right column.
			echo "<div class='prod-display'>";
			// echo "<h1> HELLO </h1>";
			// $mPos = 0;
			echo "<div class='group-container'>";
				$get_item_data = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE item='$item_id';");
				$get_cert_img = $wpdb->get_results("SELECT * FROM wp_cert;");

				$item_main_cat = $get_item_data[0]->m0;
				$item_sub1_cat = $get_item_data[0]->s1;
				$item_sub2_cat = $get_item_data[0]->s2;

				$qim0c = addslashes($item_main_cat);
				$qis1c = addslashes($item_sub1_cat);
				$qis2c = addslashes($item_sub2_cat);

				if($item_sub2_cat != ""){
					$get_item_legend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0='$qim0c' AND s1='$qis1c' AND s2='$qis2c';");
					echo "<div class='m-title'><a href='".home_url()."/products'>PRODUCT HOME</a> >> <a href='../pm0/?m0=".urlencode($item_main_cat)."'>".$item_main_cat."</a>  >>  <a href='../ps1/?m0=".urlencode($item_main_cat)."&s1=".urlencode($item_sub1_cat)."'>".$item_sub1_cat."</a>  >>  <a href='../ps2/?m0=".urlencode($item_main_cat)."&s1=".urlencode($item_sub1_cat)."&s2=".urlencode($item_sub2_cat)."'>".$item_sub2_cat."</a>  >>  ".$item_id."</div>";
					// print_r("sub2 is not empty");
				} else {
					$get_item_legend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0='$qim0c' AND s1='$qis1c';");
					echo "<div class='m-title'><a href='../pm0/?m0=".urlencode($item_main_cat)."'>".$item_main_cat."</a>  >>  <a href='../ps2/?m0=".urlencode($item_main_cat)."&s1=".urlencode($item_sub1_cat)."'>".$item_sub1_cat."</a>  >>  ".$item_id."</div>";	//Title
					// print_r("sub2 is empty");
				}
				echo "<div class='s1-box-background'>";

					echo "<div id='each-img-data-container'>";
					echo "<div id='each-img-data'>";
						echo "<div class='item-image'>";
							echo "<div class='img-content-box'>";
							/* - - - THIS IS MAIN VIEW - - - */

					      $imgExist = 0;
					      for ($y = 0; $y<=9; $y++){
					        $imgtemp = 'img'.$y;
					        if($get_item_data[0]->$imgtemp != '') {
					          $imgExist++;
					          // echo $imgExist;
					        }
					      }	//Checking to see if image exist

					      if ($imgExist == 0) {
					        echo "<img class='main-view-lg main-imgnone' src='http://files.coda.com.s3.amazonaws.com/imgv2/comingsoon.jpg'>";
					      } else {
					        $displayCounter = 0;
					        for ($x=0; $x<=9; $x++) {
					          $img = "img".$x;
					          // This will assign default image at main.
					          switch ($x) {
					            case (0):
					            {
					              if(($get_item_data[0]->$img) !=""){
					                echo "<img class='main-view-lg main-$img' src='".$get_item_data[0]->$img."' style='display:initial'>";
					                $displayCounter++;
					              } else {
					                break;
					              }
					            }
					            break;
					            default:
					            {
					              if(($x > 0) && ($displayCounter == 0) && ($get_item_data[0]->$img !="")){
					                echo "<img class='main-view-lg main-$img' src='".$get_item_data[0]->$img."' style='display:initial'>";
					                $displayCounter++;
					              } else {
					                if(($get_item_data[0]->$img) !=""){
					                  echo "<img class='main-view-lg main-$img' src='".$get_item_data[0]->$img."' style='display:none'>";
					                }
					              }
					            }
					            // endswitch;
					          }
					        }
					      }

								// Start thumbnail SECTION
								echo "<div class='img-thumbnail-section'>";
									$thumbCounter = 0;
									for ($x=0; $x<=9; $x++) {
										$img = "img".$x;
										if(($get_item_data[0]->$img) !=""){
											echo "<img class='single-thumb thumb-$img' src='".$get_item_data[0]->$img."'>";
											$thumbCounter++;
										}
									}
									if ($thumbCounter == 0) {
										echo "<img class='single-thumb' src='http://files.coda.com.s3.amazonaws.com/imgv2/comingsoon.jpg'>";
									}
								echo "</div>";	// end img-thumbnail-section;

							echo "</div>";	// end img-content-box.

						echo "</div>";	// end item-image class tag.

						echo "<div class='each-item-data'>";
							echo "<div class='item-spec-container'>";
								echo "<div class='ip-title'>".$get_item_data[0]->item."</div>";
								echo "<div class='ip-type'>".$get_item_data[0]->s1." ".$get_item_data[0]->s2." ".$get_item_data[0]->m0."</div>";
								echo "<table class='ip-each-data-table'>";
								for ($x=1; $x <=8; $x++) {
									$d = "d".$x;
									echo "<tr class='ip-each-data'>";
									if ($get_item_data[0]->$d !=""){
										# Need to revise this here if datatable will be updated.;
										// if legend has break tag, this will remove and replace it with space.
										// $splitlegend = explode("<br/>",$get_item_legend[0]->$d);
										// $joinlegend = implode(" ",$splitlegend);
										// print_r($splitlegend);
										echo "<th class='ip-legend'>".$get_item_legend[0]->$d.": </th>";
										// echo "<th class='ip-legend'>".$joinlegend.": </th>";
										// $splitdata = explode(" <br>",$get_item_data[0]->$d);
										// $joindata = implode("; ",$splitdata);
										echo "<td class='ip-spec'>".$get_item_data[0]->$d."</td>";
										// echo "<td class='ip-spec'>".$joindata."</td>";
									}
									echo "</tr>";	// end ip-each-data;
								}
								echo "</table>";
								echo "<br/>";
								echo "<a class='spec-sheet' href='".$get_item_data[0]->d9."'>SPEC SHEET</a>";

							echo "</div>";	// end item-spec-container div;
						echo "</div>";	// end each-item-data;

					echo "</div>";	// end each-img-data.
					echo "</div>";	// end each-img-data-container.


					echo "<div class='ip-certification'>";
						echo "<div class='ip-certitle'>CERTIFIED:</div>";
						echo "<div >";
							// print_r(sizeof($get_cert_img));
							for ($x=0; $x<=9; $x++) {	//this get total list of certified from item db.
								$cert = "cert".$x;
								$cert_type = $get_item_data[0]->$cert;
								// print_r($cert_type);
								// This data check against certification db one by one and if equal, display image.
								if($cert_type != ""){
									for ($y=0; $y < sizeof($get_cert_img); $y++) {
										if ($get_cert_img[$y]->type == $cert_type){
											echo "<img class='ip-cert-img' src='".$get_cert_img[$y]->link."'>";
										}
									}// end check loop for $get_cert_img;
								}
							}
						echo "</div>";
					echo "</div>";	// end ip-certification
					echo "<div class='ip-description'>";
						echo "<div class='ip-desctitle'>PRODUCT DESCRIPTION</div>";
						echo "<p class='ip-detaildescription'>".$get_item_data[0]->d0."</p>";
					echo "</div>";	// end ip-description;
				echo "</div>";	// end s1-box-background div;
				// $mPos++;
			echo "</div>";  //end group-container div;
			echo "</div>";
			echo "</div>";

			/* - - - IMAGE MODAL - - - */
			echo "<div id='itemModal' class='ip-modal'>";
				echo "<span class='ip-close'>&times;</span>";
				echo "<div class='ip-modal-content'>";
					if($imgExist == 0) {
						echo "<div class='ip-slides modal-imgnone'>";
							echo "<img src='http://files.coda.com.s3.amazonaws.com/imgv2/comingsoon.jpg' style='width: 100%'>";
						echo "</div>";
					} else {
						for($m=0; $m<=9; $m++){
							$imgLg = 'img'.$m;
							if($get_item_data[0]->$imgLg!=""){
								// echo $get_item_data[0]->$imgLg;
								echo "<div class='ip-slides modal-$imgLg'>";
								echo "<img src='".$get_item_data[0]->$imgLg."' style='width:100%'>";
								echo "</div>";	// end ip-slides;
							}
						}
					}
					// echo "<a class='ip-prev'>&#10094;</a>";
					// echo "<a class='ip-next'>&#10095;</a>";
				echo "</div>";	// end ip-modal-content
			echo "</div>";	// end #itemModal.

			// while ( have_posts() ) : the_post();
			//
			// 	get_template_part( 'template-parts/page/content', 'page' );
			//
			// 	// If comments are open or we have at least one comment, load up the comment template.
			// 	if ( comments_open() || get_comments_number() ) :
			// 		comments_template();
			// 	endif;
			//
			// endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
