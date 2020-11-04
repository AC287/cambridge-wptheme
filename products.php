<!-- Template Name: Products 2.0 -->
<!-- This is a main /products/ page template. -->

<?php get_header();?>

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
        $getUrl = $_SERVER['REQUEST_URI'];
        $urlarr = array_values(array_filter(explode("/",$_SERVER['REQUEST_URI'])));
        // $urlarr = unset($urlarr);
        $catIndex = array_search('products',$urlarr); //categories in url.
        // print_r($catIndex);
        array_splice($urlarr, 0, $catIndex + 1);
        // print_r(count($urlarr));

        echo "<div id='product-main-page'>";
					//side accordion section
          echo "<div class='cat-bar'>";
            include 'phpsnippet/productaccordion2.php';
          echo "</div>";

					//product display section
          echo "<div class='prod-display'>";
            // print_r($_SERVER['REQUEST_URI']);

						$qurl0 = $urlarr[0];
					  $qurl1 = $urlarr[1];
					  $qurl2 = $urlarr[2];
					  $qurl3 = $urlarr[3];
					  $qurl4 = $urlarr[4];

						switch(count($urlarr)) {
							case 0:
								include 'phpsnippet/productdefault.php';
							break;
							case 1:
								include 'phpsnippet/productchain0.php';
							break;
							case 2:
								include 'phpsnippet/productchain1.php';
							break;
							case 3:
								include 'phpsnippet/productchain2.php';
							break;
							case 4:
								include 'phpsnippet/productchain3.php';
							break;
							case 5:
								include 'phpsnippet/productchain-item.php';
							break;
							default:
							break;
						}
          echo "</div>";
        echo "</div>";



      ?>
    </main>
  </div>
</div>



<?php get_footer(); ?>
