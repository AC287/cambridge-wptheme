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

          echo "<div class='ps-result-header'>";
          echo "<div class='ps-topinfo'>";
            echo "<div class='ps-search-results'>";
              echo "<p>".$total."&nbsp;".((int)$total > 1 ? 'items' : 'item' )."</p>";
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
            echo "<div class='search-found'>";
              echo "<p>Displaying ".((int)$total > 1 ? 'results' : 'result')." for ".stripslashes($searchValue)."&nbsp;. . .</p>";
            echo "</div>";
            echo "</div>";  // end if for ps-result-header.

            foreach ($prodSearch as $exactProd) {
              echo "<div class='search-each-container'>";
                echo "<div class='sec-thumb'>";
                  echo "<a class='sec-item-num' href='".home_url()."/products/item/?id=".urlencode($exactProd->item)."&m0=".urlencode($exactProd->m0)."&s1=".urlencode($exactProd->s1)."&s2=".urlencode($exactProd->s2)."' target='_blank' rel='noopener noreferrer'>";
                  $thumbCounter = 0;
                  for($x=0; $x<=9; $x++) {
                    //This will loop through all 10 image slots and see if there are any images.
                    $img = "img".$x;
                    if(($exactProd->$img) !=""){
                      echo "<img src='".$exactProd->$img."'>";
                      $thumbCounter++;
                      break;
                    }
                  }
                  if($thumbCounter == 0) {
                    //if no images are found, it will default to image placeholder.
                    echo "<img src='https://storage.codacambridge.com/files/comingsoon.jpg'>";
                  }
                  echo "</a>";
                echo "</div>";
                echo "<div class='sec-items'>";
                  echo "<div class='seci-title'>";
                    echo "<a class='sec-item-num' href='".home_url()."/products/item/?id=".urlencode($exactProd->item)."&m0=".urlencode($exactProd->m0)."&s1=".urlencode($exactProd->s1)."&s2=".urlencode($exactProd->s2)."' target='_blank' rel='noopener noreferrer'>".$exactProd->item."</a>";
                    // if($exactProd->s2!=''){
                    //   echo "<a class='sec-item-num' href='".home_url()."/products/item/?id=".urlencode($exactProd->item)."'>".$exactProd->item."&nbsp;|&nbsp;".$exactProd->s2."&nbsp;".$exactProd->m0."</a>";
                    // } else {
                    //   echo "<a class='sec-item-num' href='".home_url()."/products/item/?id=".urlencode($exactProd->item)."'>".$exactProd->item."&nbsp;|&nbsp;".$exactProd->s1."&nbsp;".$exactProd->m0."</a>";
                    // }
                    echo "<p>";
                      echo $exactProd->m0." > ";
                      if($exactProd->s1){
                        echo $exactProd->s1;
                        if(!empty($exactProd->s2)){
                          echo " > ";
                        }
                      }
                      if($exactProd->s2){
                        echo $exactProd->s2;
                      }
                    echo "</p>";
                  echo "</div>";  // end seci-title
                  echo "<div class='seci-spec'>";
                    $m0 = addslashes($exactProd->m0);
                    $s1 = addslashes($exactProd->s1);
                    $s2 = addslashes($exactProd->s2);

                    if($s1 != "" and $s2 != ""){
                      $get_item_legend = $wpdb->get_results("SELECT d1, d2, d3, d4, d5, d6, d7, d8 FROM wp_prodlegend WHERE m0='$m0' AND s1='$s1' AND s2='$s2';");
                    } elseif ($s1 != "" and $s2 == ""){
                      $get_item_legend = $wpdb->get_results("SELECT d1, d2, d3, d4, d5, d6, d7, d8 FROM wp_prodlegend WHERE m0='$m0' AND s1='$s1';");
                    } else {
                      $get_item_legend = $wpdb->get_results("SELECT d1, d2, d3, d4, d5, d6, d7, d8 FROM wp_prodlegend WHERE m0='$m0';");
                    }

                    // print_r($get_item_legend);

                    echo "<table class='secis-each-data-table'>";
                      for ($y=1; $y < 9; $y++) {
                        $d = "d".$y;
                        if ($exactProd->$d !="") {
                          echo "<tr class='secis-each-data'>";
                          echo "<th class='secis-legend'>".$get_item_legend[0]->$d."</th><td class='secis-data'>".$exactProd->$d."</td>";
                          echo "</tr>";
                        }
                      }
                    echo "</table>";
                    echo "<div class='secis-blur'></div>";
                  echo "</div>";  // end seci-spec;
                  echo "<div class='seci-button'>";
                    echo "<a class='btn btn-secondary' href='".home_url()."/products/item/?id=".urlencode($exactProd->item)."&m0=".urlencode($exactProd->m0)."&s1=".urlencode($exactProd->s1)."&s2=".urlencode($exactProd->s2)."' role='button' target='_blank' rel='noopener noreferrer'>View Details</a>";
                  echo "</div>";
                echo "</div>";  // end sec-items.
              echo "</div>";  // end search-each-container class.
            }
          } else {
            //product search is incorrect. Searching for keyword.
            echo "<div class='search-notfound'>";
              echo "<p>No match found for ".stripslashes($searchValue).".</p>";
            echo "</div>";
            echo "</div>";  // end else for ps-result-header.

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
