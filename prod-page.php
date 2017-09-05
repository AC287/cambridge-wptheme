<!-- Template Name: Products -->

<?php get_header(); ?>

<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
				<?php
					global $wpdb;

					$main_category = $wpdb->get_results("SELECT DISTINCT m0 From wp_prod0;");
          // $distinct_s1 = $wpdb->get_results("SELECT DISTINCT s1 FROM wp_prod0;");
          // $distinct_s2 = $wpdb->get_results("SELECT DISTINCT s2 FROM wp_prod0;");
          $main_category2 = $main_category;
          // print_r(sizeof($main_category)+sizeof($distinct_s1)+sizeof($distinct_s2));
          // print_r($main_category);
          $allHeight = sizeof($main_category)+sizeof($distinct_s1)+sizeof($distinct_s2);
          echo "<table id='product-main-page'>";
          echo "<td class='cat-bar'>";
          echo "<h4><a href='./products'>PRODUCT CATEGORIES</a></h4>";
					foreach($main_category as $main_category) {
            $s1_category = $wpdb->get_results("SELECT DISTINCT s1 FROM wp_prod0 WHERE m0 = '$main_category->m0';");
						// print_r($main_category->m0);
						// print_r(gettype($temp_var));
						// print_r(sizeof($s1_category));
						// print_r($s1_category[0]->s1);
						if(!empty($s1_category[0]->s1)){
              // echo "<div>";
              echo "<div class='custaccordion'><img class='chev' src='http://files.coda.com.s3.amazonaws.com/imgv2/icons/chev-right.png'>&nbsp".$main_category->m0."</div>";
              echo "<div class='custpanel'>";
							foreach($s1_category as $s1_category) {
								$s2_category = $wpdb->get_results("SELECT DISTINCT s2 FROM wp_prod0 WHERE s1 = '$s1_category->s1';");
								if(!empty($s2_category[0]->s2)){
                  echo "<div class='custaccordion'><img class='chev' src='http://files.coda.com.s3.amazonaws.com/imgv2/icons/chev-right.png'>&nbsp".$s1_category->s1."</div>";
                  echo "<div class='custpanel'>";
									foreach($s2_category as $s2_category) {
										echo "<div class='custaccordion no-sub'><a class='no-sub' href='./ps2/?m0=".$main_category->m0."&s1=".$s1_category->s1."&s2=".$s2_category->s2."'>".$s2_category->s2."</a></div>";
									}
                  echo "</div>";  // end custpanel
								} else {
                  echo "<div class='custaccordion'><a class='no-sub' href='./ps2/?m0=".$main_category->m0."&s1=".$s1_category->s1."&s2=".$s2_category->s2."'>".$s1_category->s1."</a></div>";
                }
							}
              echo "</div>";  // end custpanel.
						}
            else {
              echo "<div class='custaccordion'>".$main_category->m0."</div>";
            }
						// echo "<hr/>";
						// echo "</div>";
					}
          echo "</td>";

					// THIS END ACCORDION.

          echo "<td class='prod-display'>";
          // echo "<h1> HELLO </h1>";
          $mPos = 0;
          foreach($main_category2 as $main_category2) {
            echo "<div class='group-container'>";
            echo "<div class='m-title'><a href='./pm0/?m0=".$main_category2->m0."'>".$main_category2->m0."</a></div>";
            $s1_category2 = $wpdb->get_results("SELECT DISTINCT s1 FROM wp_prod0 WHERE m0 = '$main_category2->m0';");
            // print_r($s1_category2);
            if(!empty($s1_category2[0]->s1)) {
              echo "<div class='s1-box-background'>";
              $counter = 0;
              foreach($s1_category2 as $s1_category2) {
                $img = $wpdb->get_results("SELECT img0 FROM wp_prod0 WHERE s1 = '$s1_category2->s1' AND img0 IS NOT NULL;");
                // print_r(sizeof($img));
                $s2_check = $wpdb->get_results("SELECT DISTINCT s2 FROM wp_prod0 WHERE m0='$main_category2->m0' AND s1='$s1_category2->s1';");
                // print_r(sizeof($s2_check));
                // print_r($s2_check[0]->s2);
                // print_r($main_category2->m0);
                // print_r($s1_category2->s1);
                if($counter < 4) {
                  if((sizeof($s2_check)>=1) && (($s2_check[0]->s2)!="")){  //if s2 is not empty, go to ps1 page. else, go to ps2.
                    echo "<a href='./ps1/?m0=".$main_category2->m0."&s1=".$s1_category2->s1."' class='s1-box'>";
                  } else {
                    echo "<a href='./ps2/?m0=".$main_category2->m0."&s1=".$s1_category2->s1."' class='s1-box'>";
                  }
                  echo "<div class='item-img'>";
                  if (sizeof($img) > 1) {
                    // foreach($img as $img) {
                    //   echo "<img src='' height='100' width='100'>";
                    // }
                    echo "<img src='".$img[array_rand($img)]->img0."' height='100' width='100'>";

                  } elseif (sizeof($img)===1) {
                    // print_r($img->img0);
                    echo "<img src='".$img[0]->img0."' height='100' width='100'>";
                  } else {
                    echo "<img src='http://files.coda.com.s3.amazonaws.com/imgv2/c_logo.jpg' height='100' width='100'>";
                  };
                  // echo "<img src='https://s3.amazonaws.com/files.coda.com/content/prod/categories/193-brandedcableties.jpg' height='100' widht='100'>";
                  echo "</div>";
                  echo "<div class='s1-cat'>".$s1_category2->s1."</div>";
                  echo "</a>";
                  $counter++;
                } else {
                  // if sub category is more than 4, this add class to hide.
                  if((sizeof($s2_check)>=1)&&(($s2_check[0]->s2)!="")){  //if s2 is not empty, go to ps1 page. else, go to ps2.
                    echo "<a href='./ps1/?m0=".$main_category2->m0."&s1=".$s1_category2->s1."' class='s1-box extra-box pos".$mPos."'>";
                  } else {
                    echo "<a href='./ps2/?m0=".$main_category2->m0."&s1=".$s1_category2->s1."' class='s1-box extra-box pos".$mPos."'>";
                  }
                  echo "<div class='item-img'>";
                  if (sizeof($img) > 1) {
                    echo "<img src='".$img[array_rand($img)]->img0."' height='100' width='100'>";
                  }
                  elseif (sizeof($img)===1) {
                    // print_r($img->img0);
                    echo "<img src='".$img[0]->img0."' height='100' width='100'>";
                  }
                  else {
                    echo "<img src='http://files.coda.com.s3.amazonaws.com/imgv2/c_logo.jpg' height='100' width='100'>";
                  };
                  // echo "<img src='https://s3.amazonaws.com/files.coda.com/content/prod/categories/193-brandedcableties.jpg' height='100' widht='100'>";
                  echo "</div>";
                  echo "<div class='s1-cat'>".$s1_category2->s1."</div>";
                  echo "</a>";
                  $counter++;
                }
              }
              if($counter > 3) {
                echo "<div class='show-hide'>";
                echo "<a class='display-extra pos".$mPos." toggle-class'>SHOW ALL ".strtoupper($main_category2->m0)." CATEGORIES</a>";
                echo "</div>";
              }
              echo "</div>";
            }
            $mPos++;
            echo "</div>";  //end group-container div;
          }
          echo "</td>";
          echo "</table>";

				?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .container -->

<?php get_footer();
