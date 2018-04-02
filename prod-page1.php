<!-- Template Name: Products sub 1 -->

<!-- // ps1 -->
<!-- // Page for sub category. -->
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

			$p1m0 = $wp_query->query_vars['m0'];	//assign query value
			$p1s1 = $wp_query->query_vars['s1'];	// assign query value
			// print_r($p1m0);
			// print_r($p1s1);

			$sub_category2 = $wpdb->get_results("SELECT DISTINCT s2 FROM wp_prodlegend WHERE m0='$p1m0' AND s1='$p1s1';");
			// print_r($sub_category1);

			echo "<div id='product-main-page'>";
			echo "<div class='cat-bar'>";
				include 'phpsnippet/productaccordion.php';
			echo "</div>";
			// END Main Category accordion panel.

			// Start Right column.
			echo "<div class='prod-display'>";
			// echo "<h1> HELLO </h1>";
			// $mPos = 0;
			echo "<div class='group-container'>";
			echo "<div class='m-title'><a href='".home_url()."/products'>PRODUCT HOME</a> >> <a href='../pm0/?m0=".urlencode($p1m0)."'>".$p1m0."</a>  >>  ".$p1s1."</div>";	//Title

				echo "<div class='s1-box-background'>";
				echo "<div class='s1-box-flex-container'>";
				$counter = 0;
				foreach($sub_category2 as $sub_category2) {
				$img = $wpdb->get_results("SELECT cat2img FROM wp_prodlegend WHERE m0 = '$p1m0' AND s1 = '$p1s1' AND s2 = '$sub_category2->s2' AND cat2img IS NOT NULL;");
				// print_r(sizeof($img));
				echo "<a href='../ps2/?m0=".urlencode($p1m0)."&s1=".urlencode($p1s1)."&s2=".urlencode($sub_category2->s2)."' class='s1-box'>";
				echo "<div class='item-img'>";
				if (sizeof($img) > 1) {
					// foreach($img as $img) {
					// 	echo "<img src='' height='100' width='100'>";
					// }
					echo "<img src='".$img[0]->cat2img."'>";
				} elseif (sizeof($img)===1) {
					// print_r($img->img0);
					echo "<img src='".$img[0]->cat2img."'>";
				} else {
					echo "<img src='http://files.coda.com.s3.amazonaws.com/imgv2/comingsoon.jpg'>";
				};
				// echo "<img src='https://s3.amazonaws.com/files.coda.com/content/prod/categories/193-brandedcableties.jpg' height='100' widht='100'>";
				echo "</div>";
				echo "<div class='s1-cat'>".$sub_category2->s2."</div>";
				echo "</a>";
				$counter++;
			}
			for($k=$counter; $k%4!=0; $k++){
				echo "<a class='s1-box s1-box-filler'></a>";
			}
			echo "</div>";	// end s1-box-flex-container
			echo "</div>";	// end s1-box-background
				// $mPos++;
			echo "</div>";  //end group-container div;
			echo "</div>";
			echo "</div>";

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
