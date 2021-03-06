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
			$item_m0 = $wp_query->query_vars['m0'];
			$item_s1 = $wp_query->query_vars['s1'];
			$item_s2 = $wp_query->query_vars['s2'];
			$item_s3 = $wp_query->query_vars['s3'];
			$item_jc = $wp_query->query_vars['jc'];

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
				if($item_jc=='' || !$item_jc){
					// echo "JC is empty.";
					$get_item_data = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE item='$item_id' AND m0='$item_m0';");
					$item_main_cat = $get_item_data[0]->m0;
				} else {
					// echo "Joint category is not empty.";
					$get_item_data = $wpdb->get_results("SELECT * FROM wp_prod0 WHERE item='$item_id' AND jointcat='$item_jc';");
					$item_main_cat = $item_m0;
				}
				$get_cert_img = $wpdb->get_results("SELECT * FROM wp_cert;");

				$item_sub1_cat = $get_item_data[0]->s1;
				$item_sub2_cat = $get_item_data[0]->s2;
				$item_sub3_cat = $get_item_data[0]->s3;
				$item_sub_jointcat = $get_item_data[0]->jointcat;

				$qim0c = addslashes($item_main_cat);
				$qis1c = addslashes($item_sub1_cat);
				$qis2c = addslashes($item_sub2_cat);
				$qis3c = addslashes($item_sub3_cat);
				$qijcc = addslashes($item_sub_jointcat);

				$totalquery = 0;
				(!empty($qim0c)?$totalquery++:$totalquery);
				(!empty($qis1c)?$totalquery++:$totalquery);
				(!empty($qis2c)?$totalquery++:$totalquery);
				(!empty($qis3c)?$totalquery++:$totalquery);


				echo "<div class='m-title'><a href='".home_url()."/products'>PRODUCT HOME</a> >> ";

					echo "<a href='../categories/?m0=".urlencode(stripslashes($item_m0))."&jc=".urlencode(stripslashes($item_jc))."'>".stripslashes($item_m0)."</a> >> ";
					if($item_s1) {
						echo "<a href='../categories/?m0=".urlencode(stripslashes($item_m0))."&s1=".urlencode(stripslashes($item_s1))."&jc=".urlencode(stripslashes($item_jc))."'>".stripslashes($item_s1)."</a> >> ";
						if($item_s2) {
							echo "<a href='../categories/?m0=".urlencode(stripslashes($item_m0))."&s1=".urlencode(stripslashes($item_s1))."&s2=".urlencode(stripslashes($item_s2))."&jc=".urlencode(stripslashes($item_jc))."'>".stripslashes($item_s2)."</a> >> ";
							if($item_s3) {
								echo "<a href='../categories/?m0=".urlencode(stripslashes($item_m0))."&s1=".urlencode(stripslashes($item_s1))."&s2=".urlencode(stripslashes($item_s2))."&s3=".urlencode(stripslashes($item_s3))."&jc=".urlencode(stripslashes($item_jc))."'>".stripslashes($item_s3)."</a> >> ";
							}
						}
					}
					echo $item_id;
				echo "</div>";	// end m-title div.

				switch($totalquery) {
					case 1:
						// echo $qim0c;
						// echo "this is case 1.";
						$get_item_legend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0='$qim0c';");
						// main0cat($item_main_cat);
					break;
					case 2:
						// echo $qim0c;
						switch (true) {
							case ($item_jc==$item_m0) :
							$get_item_legend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$qijcc' AND s1='$qis1c';");
							break;
							case ($item_jc==$item_s1) :
							$get_item_legend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$qijcc';");
							break;
							default:
							$get_item_legend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0='$qim0c' AND s1='$qis1c';");
							break;
						}
						// s1cat($item_main_cat,$item_sub1_cat);
					break;
					case 3:
						// echo $qim0c;
						switch(true) {
							case ($item_jc==$item_m0) :
							$get_item_legend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$qijcc' AND s1='$qis1c' AND s2='$qis2c';");
							break;
							case ($item_jc==$item_s1) :
							$get_item_legend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$qijcc' AND s2='$qis2c';");
							break;
							case ($item_jc==$item_s2) :
							$get_item_legend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$qijcc';");
							break;
							default:
							$get_item_legend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0='$qim0c' AND s1='$qis1c' AND s2='$qis2c';");
							break;
						}
						// s2cat($item_main_cat,$item_sub1_cat,$item_sub2_cat);
					break;
					case 4:
						// echo $qim0c;
						switch(true) {
							case ($item_jc==$item_m0) :
							$get_item_legend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$qijcc' AND s1='$qis1c' AND s2='$qis2c' AND s3='$qis3c';");
							break;
							case ($item_jc==$item_s1) :
							$get_item_legend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$qijcc' AND s2='$qis2c' AND s3='$qis3c';");
							break;
							case ($item_jc==$item_s2) :
							$get_item_legend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$qijcc' AND s3='$qis3c';");
							break;
							case ($item_jc==$item_s3) :
							$get_item_legend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$qijcc';");
							break;
							default:
							$get_item_legend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0='$qim0c' AND s1='$qis1c' AND s2='$qis2c' AND s3='$qis3c';");
							break;
						}
						// s3cat($item_main_cat,$item_sub1_cat,$item_sub2_cat,$item_sub3_cat);
					break;
					case 5:
						// echo $qim0c;
						switch(true) {
							case ($item_jc==$item_m0) :
							$get_item_legend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$qijcc' AND s1='$qis1c' AND s2='$qis2c' AND s3='$qis3c' AND s4='$qis4c';");
							break;
							case ($item_jc==$item_s1) :
							$get_item_legend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$qijcc' AND s2='$qis2c' AND s3='$qis3c' AND s4='$qis4c';");
							break;
							case ($item_jc==$item_s2) :
							$get_item_legend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$qijcc' AND s3='$qis3c' AND s4='$qis4c';");
							break;
							case ($item_jc==$item_s3) :
							$get_item_legend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$qijcc' AND s4='$qis4c';");
							break;
							case ($item_jc==$item_s4) :
							$get_item_legend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE jointcat='$qijcc';");
							break;
							default:
							$get_item_legend = $wpdb->get_results("SELECT * FROM wp_prodlegend WHERE m0='$qim0c' AND s1='$qis1c' AND s2='$qis2c' AND s3='$qis3c' AND s4='$qis4c';");
							break;
						}
						// s4cat($item_main_cat,$item_sub1_cat,$item_sub2_cat,$item_sub3_cat,$item_sub4_cat);
					break;
					default:
					break;
				}

				// function main0cat($item_main_cat) {
				// 	echo "<a href='../categories/?m0=".urlencode($item_main_cat)."'>".$item_main_cat."</a> >> ";
				// }
				// function s1cat($item_main_cat,$item_sub1_cat) {
				// 	main0cat($item_main_cat);
				// 	echo "<a href='../categories/?m0=".urlencode($item_main_cat)."&s1=".urlencode($item_sub1_cat)."'>".$item_sub1_cat."</a> >> ";
				// }
				// function s2cat($item_main_cat,$item_sub1_cat,$item_sub2_cat) {
				// 	s1cat($item_main_cat, $item_sub1_cat);
				// 	echo "<a href='../categories/?m0=".urlencode($item_main_cat)."&s1=".urlencode($item_sub1_cat)."&s2=".urlencode($item_sub2_cat)."'>".$item_sub2_cat."</a> >> ";
				// }
				// function s3cat($item_main_cat,$item_sub1_cat,$item_sub2_cat,$item_sub3_cat) {
				// 	s2cat($item_main_cat,$item_sub1_cat,$item_sub2_cat);
				// 	echo "<a href='../categories/?m0=".urlencode($item_main_cat)."&s1=".urlencode($item_sub1_cat)."&s2=".urlencode($item_sub2_cat)."&s3=".urlencode($item_sub3_cat)."'>".$item_sub3_cat."</a> >> ";
				// }
				// function s4cat($item_main_cat,$item_sub1_cat,$item_sub2_cat,$item_sub3_cat,$item_sub4_cat) {
				// 	s3cat($item_main_cat,$item_sub1_cat,$item_sub2_cat,$item_sub3_cat);
				// 	echo "<a href='../categories/?m0=".urlencode($item_main_cat)."&s1=".urlencode($item_sub1_cat)."&s2=".urlencode($item_sub2_cat)."&s3=".urlencode($item_sub3_cat)."&s4=".urlencode($item_sub4_cat)."'>".$item_sub4_cat."</a> >> ";
				// }

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
					        echo "<img class='main-view-lg main-imgnone' src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
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
										echo "<img class='single-thumb' src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
									}
								echo "</div>";	// end img-thumbnail-section;

							echo "</div>";	// end img-content-box.

						echo "</div>";	// end item-image class tag.

						echo "<div class='each-item-data'>";
							echo "<div class='item-spec-container'>";
								echo "<div class='ip-title'>";
								$ip_sku = $get_item_data[0]->SKU;
								if($ip_sku == '' || $ip_sku == 'N/A' || $ip_sku == ' ') {
									echo "<p class='ipt-item'>".$get_item_data[0]->item."</p>";
								} else {
									echo "<p class='ipt-sku'>".$ip_sku."</p>";
									echo "<p class='ipt-item'>".$get_item_data[0]->item."</p>";
								}
								echo "</div>";
								// echo "<div class='ip-type'>".$get_item_data[0]->s1." ".$get_item_data[0]->s2." ".$get_item_data[0]->m0."</div>";
								echo "<table class='ip-each-data-table'>";
								for ($x=1; $x <=9; $x++) {
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
								if((($get_item_data[0]->spec)!='' || ($get_item_data[0]->spec)) && ($get_item_data[0]->spec)!=" "){
									// echo "spec is not empty";
									echo "<div class='ip-pdf'><a class='spec-sheet' href='".$get_item_data[0]->spec."' rel='noopener noreferrer' target='_blank'>SPEC SHEET</a></div>";
								}
								if(($get_item_data[0]->usermanual)!='' || ($get_item_data[0]->usermanual)) {
									echo "<div class='ip-pdf'><a class='usermanual' href='".$get_item_data[0]->usermanual."' rel='noopener noreferrer' target='_blank'>USER MANUAL</a></div>";
								}

							echo "</div>";	// end item-spec-container div;
						echo "</div>";	// end each-item-data;

					echo "</div>";	// end each-img-data.
					echo "</div>";	// end each-img-data-container.

					if(($get_item_data[0]->cert0)!='' || ($get_item_data[0]->cert0)) {
						// Display only when certification value exist.

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
					}	// end if selection for certification.

					if(($get_item_data[0]->d0)!='' || ($get_item_data[0]->d0)) {
						// Display only when product description is available.
						echo "<div class='ip-description'>";
							echo "<div class='ip-desctitle'>PRODUCT DESCRIPTION</div>";
							echo "<p class='ip-detaildescription'>".$get_item_data[0]->d0."</p>";
						echo "</div>";	// end ip-description;
					}	// end if selection for product description.

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
							echo "<img src='https://storage.codacambridge.com/files/comingsoon.jpg' style='width: 100%'>";
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
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
