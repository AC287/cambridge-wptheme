	<!-- Template Name: Products main 0 -->

<!-- // pm0 -->
<!-- // Page for main category. -->

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
			$p0m0 = $wp_query->query_vars['m0'];
			echo "<div id='product-main-page'>";
			echo "<div class='cat-bar'>";	// This is accordion section.
				include 'phpsnippet/productaccordion.php';
			echo "</div>";		// This end accordion section.

			echo "<div class='prod-display'>";	// Start product section.

			// echo "<h1> HELLO </h1>";
			// $mPos = 0;
			echo "<div class='group-container'>";
			echo "<div class='m-title'>".$p0m0."</div>";
			$s1_category2 = $wpdb->get_results("SELECT DISTINCT s1 FROM wp_prod0 WHERE m0 = '$p0m0';");
			// print_r($s1_category2);
			if(!empty($s1_category2[0]->s1)) {
				echo "<div class='s1-box-background'>";
				echo "<div class='s1-box-flex-container'>";
				$counter = 0;
				foreach($s1_category2 as $s1_category2) {
					$img = $wpdb->get_results("SELECT DISTINCT cat1img FROM wp_prodlegend WHERE m0 = '$p0m0' AND s1 = '$s1_category2->s1' AND cat1img IS NOT NULL;");
					// print_r(sizeof($img));
					$s2_check = $wpdb->get_results("SELECT DISTINCT s2 FROM wp_prod0 WHERE m0='$p0m0' AND s1='$s1_category2->s1';");
					if((sizeof($s2_check)>=1) && (($s2_check[0]->s2)!="")){  //if s2 is not empty, go to ps1 page. else, go to ps2.
						echo "<a href='../ps1/?m0=".urlencode($p0m0)."&s1=".urlencode($s1_category2->s1)."' class='s1-box'>";
					} else {
						echo "<a href='../ps2/?m0=".urlencode($p0m0)."&s1=".urlencode($s1_category2->s1)."' class='s1-box'>";
					}
					echo "<div class='item-img'>";
					if (sizeof($img) > 1) {
						// foreach($img as $img) {
						//   echo "<img src='' height='100' width='100'>";
						// }
						echo "<img src='".$img[0]->cat1img."' height='100' width='100'>";

					} elseif (sizeof($img)===1) {
						// print_r($img->img0);
						echo "<img src='".$img[0]->cat1img."' height='100' width='100'>";
					} else {
						echo "<img src='http://files.coda.com.s3.amazonaws.com/imgv2/comingsoon.jpg' height='100' width='100'>";
					};
					// echo "<img src='https://s3.amazonaws.com/files.coda.com/content/prod/categories/193-brandedcableties.jpg' height='100' widht='100'>";
					echo "</div>";
					echo "<div class='s1-cat'>".$s1_category2->s1."</div>";
					echo "</a>";
					$counter++;
				}
				for($k=$counter; $k%4!=0; $k++){
					echo "<a class='s1-box s1-box-filler'></a>";
				}
				echo "</div>";	// end s1-box-flex-container
				echo "</div>";	// end s1-box-background
				}
				// $mPos++;
				echo "</div>";  //end group-container div;
			echo "</div>";
			echo "</div>";
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
