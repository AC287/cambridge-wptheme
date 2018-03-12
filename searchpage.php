<!--  Template Name: Search Page  -->

<?php get_header();?>
<div class="container">

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <div id="product-main-page">

        <div class="cat-bar">
          <?php include 'phpsnippet/productaccordion.php';?>
        </div>

        <div class="search-display">

          <?php
          // $searchValue = strtoupper($_REQUEST['isearch']);
          $searchValue = $_REQUEST['isearch'];
          // echo $searchValue;
          global $wp_query, $wpdb;
          //help link: https://wordpress.stackexchange.com/questions/53194/wordpress-paginate-wpdb-get-results

          $prodquery = "
          (SELECT * FROM wp_prod0 WHERE
          item LIKE '%$searchValue%'
          OR m0 LIKE '%$searchValue%'
          OR s1 LIKE '%$searchValue%'
          OR s2 LIKE '%$searchValue%'
          OR keyword  LIKE '%$searchValue%'
          OR d1 LIKE '%$searchValue%'
          OR d2 LIKE '%$searchValue%'
          OR d3 LIKE '%$searchValue%'
          OR d4 LIKE '%$searchValue%'
          OR d5 LIKE '%$searchValue%'
          OR d6 LIKE '%$searchValue%'
          OR d7 LIKE '%$searchValue%'
          OR d8 LIKE '%$searchValue%'
          OR d9 LIKE '%$searchValue%'
          )";
          $total = $wpdb -> get_var("SELECT COUNT(1) FROM (${prodquery}) AS combined_table");
          // echo "$total";
          // $total_query = "SELECT COUNT(*) FROM wp_prod0";
          // $total = $wpdb->get_var($total_query);
          $items_per_page = 10;
          $page = isset($_GET['cpage']) ? abs((int) $_GET['cpage']) : 1;

          $offset = ($page * $items_per_page) - $items_per_page;
          $prodSearch = $wpdb->get_results($prodquery . "LIMIT ${offset}, ${items_per_page}");

          echo "<div class='ps-topinfo'>";
            echo "<div class='ps-search-results'>";
              echo "<p>".$total."&nbsp;items</p>";
            echo "</div>";
            echo "<div class='ps-pages pagination'>";
              echo paginate_links( array(
                'base' => add_query_arg('cpage','%#%'),
                'format' => '',
                'prev_text' => __('&laquo;'),
                'next_text' => __('&raquo;'),
                'total' => ceil($total/$items_per_page),
                'current' => $page,
                'mid_size' => 2,
                // 'type' => 'list'
              ));
            echo "</div>";
          echo "</div>";

          if (sizeof($prodSearch) != 0) {
            //product search is correct and exist.
            echo "<p>Displaying products for ".$searchValue."...</p>";
            echo "<p>Total results found: ".$total."</p>";
            foreach ($prodSearch as $exactProd) {
              echo "<div class='search-each-container'>";
                echo "<div class='sec-thumb'>";
                  if($exactProd->img0 == ''){
                    echo "<img src='http://files.coda.com.s3.amazonaws.com/imgv2/comingsoon.jpg'>";
                  } else {
                    echo "<img src='".$exactProd->img0."'>";
                  }
                  // print_r($exactProd);
                echo "</div>";
                echo "<div class='sec-items'>";
                  echo "<div class='seci-title'>";
                    if($exactProd->s2!=''){
                      echo "<a class='sec-item-num' href='".home_url()."/products/item/?id=".urlencode($exactProd->item)."'>".$exactProd->item."&nbsp;|&nbsp;".$exactProd->s2."&nbsp;".$exactProd->m0."</a>";
                    } else {
                      echo "<a class='sec-item-num' href='".home_url()."/products/item/?id=".urlencode($exactProd->item)."'>".$exactProd->item."&nbsp;|&nbsp;".$exactProd->s1."&nbsp;".$exactProd->m0."</a>";
                    }
                  echo "</div>";
                echo "</div>";
              echo "</div>";  // end search-each-container class.
            }
          } else {
            //product search is incorrect. Searching for keyword.
            echo "<p>Displaying products by keyword: ".$searchValue."...</p>";

          };

          echo "<div class='ps-pages pagination'>";
            echo paginate_links( array(
            'base' => add_query_arg('cpage','%#%'),
            'format' => '',
            'prev_text' => __('&laquo;'),
            'next_text' => __('&raquo;'),
            'total' => ceil($total/$items_per_page),
            'current' => $page,
            'mid_size' => 2,
            // 'type' => 'list'
            ));
            echo "</div>";

            ?>

          </div>  <!--  end search display  -->

      </div>  <!--  end product-main-page id  -->

    </main> <!--  end main tag  -->
  </div>  <!--  end id primary  -->


</div>


<?php get_footer();?>
